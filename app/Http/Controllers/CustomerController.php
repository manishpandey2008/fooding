<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Products;
use App\Models\Order;
use DB;
use Illuminate\Support\Facades\App;
class CustomerController extends Controller
{
    public function AddToCart(Request $request)
    {
    	$pro=$request->data;
    	$userId=session('id_of_user');
    	$role=session('role_of_user');
    	if ($request->session()->get('id_of_user')===null) {
    		return ['stats'=>0,'msg'=>'Not Add In Card'];
    	}
    	$check=Order::all()->where('product_id',$pro)->where('customer_id',$userId)->where('order_id',null)->count();
    	if ($check) {
    		return ['stats'=>0,'msg'=>'This Product In Card'];
    	}

    	$restName=Products::join('registration', 'products.restaurant_id', '=', 'registration.user_id')
            ->select('registration.restaurant_name')
            ->where('products.product_id',$pro)->get();

    	$data=new Order;

    	$count=Order::all()->count();
    	$data->cart_id='cart'.($count+1);
    	$data->customer_id=$userId;
    	$data->product_id=$pro;
    	$data->restaurant_name=$restName[0]['restaurant_name'];

    	$data->save();
    	return ['stats'=>1,'msg'=>'Product Add In Card'];
    }

    public function Cart()
    {
    	$userId=session('id_of_user');
    	 $list=Order::join('products', 'order.product_id', '=', 'products.product_id')
            ->select('products.product_name','products.product_price','order.cart_id','order.restaurant_name')
            ->where('order.customer_id',$userId)
            ->where('order.order_id',null);

 
    	return view('Index.cart',[
    		'cart_list'=>$list->get(),
    	]);	
    }

    public function DeleteFromCart($id)
    {
    	$userId=session('id_of_user');
    	$check=Order::all()->where('cart_id',$id)->where('customer_id',$userId)->where('order_id',null)->count();
    	if ($check) {
    		DB::table('order')->where('cart_id',$id)->delete();
    		return redirect()->route('cart');
    	}
    	return redirect()->route('cart');
    }

    public function FinalOrder()
    {
    	$count=Order::all()->count();
    	$userId=session('id_of_user');
    	$orderId='order'.($count+1);
    	DB::table('order')->where('customer_id',$userId)->where('order_id',null)->update(['order_id'=>$orderId]);
    	return redirect()->route('index');
    }

    public function OrderList()
    {
    	$userId=session('id_of_user');
    	$orderList=Order::join('products', 'order.product_id', '=', 'products.product_id')
            ->select('products.product_name','products.product_price','order.cart_id','order.restaurant_name','order.order_id','order.receving_status')
            ->where('order.customer_id',$userId)
            ->get();

    	return view('Index.cusOrderDetails',[
    		'order_list'=>$orderList,
    	]);
    }

    public function OrderPdf($id)
    {

        $list = DB::table('order')
            ->join('products', 'order.product_id', '=', 'products.product_id')
            ->join('registration', 'products.restaurant_id', '=', 'registration.user_id')
            ->select('products.product_name','registration.restaurant_name','registration.phone_number','registration.address','products.product_price','order.created_at')
            ->where('order.cart_id',$id)
            ->get();

         $list= $list[0];
        $userId=session('id_of_user');
        $user=Registration::all()->where('user_id',$userId)->first();
       $pdf = App::make('dompdf.wrapper');
        $x='
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
                   <div class="my-2 container">
                    <h4 class="text-center pt-2"><strong>'.$list->restaurant_name.'</strong></h4>
                    <p class="text-center">'.$list->address.'<br><strong>'.$list->phone_number.'</strong></p>
                    <div style="width: 100%;height: 2px;background-color: black;" class="ty-5"></div>
                    <p class="float-left mx-2"><strong>Date:</strong> '. date("Y/m/d").'</p>
                    <p class="float-right mx-2"><strong>Time:</strong> '. date("h:i:sa").'</p>
            </div>
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <p class="border text-center mt-5" style="background-color: beige;"><strong>FOR</strong></p>
                            <p>
                                '. strtoupper($user['name']) .'<br>
                                '.$user['address'] .'<br>
                                '. $user["phone_number"].'
                            </p>
                        </div>
                    </div>
                    <div class="my-1 row">
                        <div class="col-12">
                            <table class="table text-center table-bordered">
                                <thead style="background-color: bisque;">
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Orer Date/Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>'.$list->product_name.'</td>
                                        <td>'.$list->product_price.'</td>
                                        <td>'.$list->created_at.'</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
        </div>

                </div>';

                   $pdf->loadHTML($x);
                    return $pdf->download('invoice.pdf');
                  // return $pdf->stream();
    }
}
