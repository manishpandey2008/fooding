<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Registration;
use DB;
Use Validator;
class DashboardController extends Controller
{
    public function RestaurantDashboard()
    {
    	$userId=session('id_of_user');
    	$restName=Registration::all()->where('user_id',$userId)->pluck('restaurant_name');
    	$allPro=Products::all()->where('restaurant_id',$userId);
        return view('Index.dashboard',[
        	'msg'=>'0',
        	'all_pro'=>$allPro,
        	'rest_name'=>$restName[0],
        ]);
    }

    public function AddProduct(Request $request)
    {
        $rules=[
                'productName'=>'required|max:40',
                'productPrice'=>'required|max:10',
                'productType'=>'required|max:10',
                'photo'=>'required|mimes:jpeg,bmp,png|max:4000',
                ];

            $validator=Validator::make($request->all(),$rules);
            if ($validator->fails()) {
                return response()->json( $validator->errors(),400);
            }

        if ($request->hasfile('photo')) {
            $file=$request->file('photo');
            $extention=$file->getClientOriginalExtension();
            $fileName=time().'.'.$extention;
            $file->move('uploads/',$fileName);
        }
        else{
            $fileName='photo';
        }

    	$pro=new Products;
    	$userId=session('id_of_user');
    	$count=Products::all()->count();

    	$pro->product_id='pro'.($count+1);
    	$pro->product_name=$request->productName;
    	$pro->restaurant_id=$userId;
    	$pro->product_type=$request->productType;
    	$pro->product_price=$request->productPrice;
    	$pro->stock_status='1';
    	$pro->photo=$fileName;
    	$pro->remember_token=$request->_token;
    	$pro->save();

    	$restName=Registration::all()->where('user_id',$userId)->pluck('restaurant_name');
    	$allPro=Products::all()->where('restaurant_id',$userId);
    	return view('Index.dashboard',[
    		'msg'=>'Product Add Successfully',
    		'all_pro'=>$allPro,
        	'rest_name'=>$restName[0],
    	]);

    }

    public function ProCheck(Request $request)
    {
    	$data=$request->data;

    	$userId=session('id_of_user');
    	$check=Products::all()->where('restaurant_id',$userId)->where('product_name',$data)->count();
    	if($check){
    		$html='<strong>This Product Added Already</strong>';
    		return $html;
    	}else{
    		return '0';
    	}
    }

    public function EditProduct(Request $request)
    {
        $rules=[
                'proId'=>'required|max:20',
                'proName'=>'required|max:40',
                'proPrice'=>'required|max:10',
                ];

        $validator=Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json( $validator->errors(),400);
        }

    	$proId=$request->proId;
    	$data=[
    		'product_name'=>$request->proName,
    		'product_price'=>$request->proPrice,
    	];

		DB::table('products')->where('product_id',$proId)->update($data);

		return redirect()->route('index');
    }

    public function GetProductData(Request $request)
    {
    	$proId=$request->data;

    	$proData=Products::all()->where('product_id',$proId)->first();

    	return ['pro_name'=>$proData['product_name'],'pro_price'=>$proData['product_price']];
    }
    public function OrderDetails()
    {
        $userId=session('id_of_user');
        $restName=Registration::all()->where('user_id',$userId)->pluck('restaurant_name');
        $list = DB::table('order')
            ->join('products', 'order.product_id', '=', 'products.product_id')
            ->join('registration', 'order.customer_id', '=', 'registration.user_id')
            ->select('registration.name','products.product_name','registration.address','order.created_at','order.receving_status','order.cart_id')
            ->where('order.restaurant_name',$restName)
            ->get();

        return view('Index.restOrderDetails',[
            'order_list'=>$list,
        ]);
    }

    public function OrderConf(Request $request)
    {
        $cartId=$request->data;
        if ($request->session()->get('id_of_user')!==null) {
           DB::table('order')->where('cart_id',$cartId)->update(['receving_status'=>'1']);
           return '1';
        }else{
            return '0';
        }

    }

    public function StockControl(Request $request)
    {
      
       $proId=$request->data;
       $status=Products::all()->where('product_id',$proId)->first();
        if ($status['stock_status']=='1') {
            $x='0';
        }else{
            $x='1';
        }
        DB::table('products')->where('product_id',$proId)->update(['stock_status'=>$x]);
        return $x;
    }
}
