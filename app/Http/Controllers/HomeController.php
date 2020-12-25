<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Products;
use App\Models\Order;
use DB;
Use Validator;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    public function Index(Request $request)
    {
        $allPro=Products::join('registration', 'products.restaurant_id', '=', 'registration.user_id')
            ->select('registration.restaurant_name','registration.address','products.product_id','products.product_name','products.product_type','products.product_price','products.photo')
            ->where('products.stock_status','1');

        $userId=session('id_of_user');
        $restName=Registration::all()->where('user_id',$userId)->pluck('restaurant_name');

        if ($request->session()->get('id_of_user')===null) {
            return view('Index.index',[
                'session_Status'=>0,
                'role'=>0,
                'all_pro'=>$allPro->get(),
                'food'=>'0',
                'cartVal'=>'0',
            ]);
            
        }else{
            $role=session('role_of_user');

            if ($role==='customer') {
                $food_type=Registration::all()->where('user_id',$userId)->pluck('food_type');
                if($food_type[0]!='both'){
                    $allPro=$allPro->where('products.product_type',$food_type[0]);
                }
                $cartVal=Order::all()->where('customer_id',$userId)->where('order_id',null)->count();
                return view('Index.index',[
                'session_Status'=>1,
                'role'=>$role,
                'all_pro'=>$allPro->get(),
                'food'=>$food_type[0],
                'cartVal'=>$cartVal,
                ]);

            }else{
                $allPro=$allPro->where('products.restaurant_id',$userId);
                return view('Index.index',[
                'session_Status'=>1,
                'role'=>$role,
                'all_pro'=>$allPro->get(),
                'food'=>'0',
                'cartVal'=>'0',
                ]);
            }
        }
    }


    public function Signup(Request $request)
    {
        $msg=$request->msg;
    	return view('Index.signup',[
            'msg'=>$msg,
        ]);
    }
    public function Otp($id)
    {
        return view('Index.otp',[
            'id'=>$id,
        ]);
    }

    public function FinalSignup(Request $request,$id)
    {
        $rules=[
                'signUpFor'=>'required',
                'userName'=>'required',
                'userPhone'=>'required',
                '_token'=>'required',
                ];

            $validator=Validator::make($request->all(),$rules);
            if ($validator->fails()) {
                return response()->json( $validator->errors(),400);
            }

        if($id=='1'){

            $phone=$request->userPhone;
            $role=$request->signUpFor;
            $check=Registration::all()->where('phone_number',$phone)->where('user_type',$role)->count();
            if ($check) {
                $msg='Phone No'.$phone.' Is Already Use For '.$role.' Role';
                return redirect()->route('Signup')->with('msg',$msg);
            }
            $reg=new Registration;
            $count=Registration::all()->count();

            $reg->user_type=$request->signUpFor;
            $reg->name=$request->userName;
            $reg->phone_number=$request->userPhone;
            $reg->otp='1234';
            $reg->otp_status='0';
            $reg->last_ip_address=$request->ip();
            $reg->remember_token=$request->_token;
            if($role=='customer'){
                $reg->user_id='customer'.($count+1);
                $reg->address=$request->customerLocation;
                $reg->food_type=$request->foodType;
                
            $reg->save();
            return redirect()->route('otp_verification',[
                    'id'=>$reg->user_id,
            ]);
            }
            elseif ($role=='restaurant') {
                $reg->user_id='restaurant'.($count+1);
                $reg->address=$request->restaurantLocation;
                $reg->restaurant_name=$request->restaurantName;
                $reg->save();
            return redirect()->route('otp_verification',[
                'id'=>$reg->user_id,
            ]);
                
            }else{
                return redirect()->route('Signup');
            }

        }
        else{
            return redirect()->route('Signup');
        }
    }

    public function OtpVerification()
    {
     
        $data=request('data');
        $otp=$data['otp'];
        $userId=$data['userId'];

        $count=Registration::all()->where('user_id',$userId)->where('otp',$otp)->first();

        if($count->count()){
            session(['id_of_user' => $userId]);
            session(['role_of_user' => $count['user_type']]);
            DB::table('registration')->where('user_id',$userId)->update(['otp_status'=>'1']);
           return '1';
        }else{
            return '0';
        }
    }

    public function SetPassword(Request $request)
    {
        if ($request->session()->get('id_of_user')!==null) {
            $pass1=$request->password;
            $pass2=$request->rePassword;
            $userId=session('id_of_user');
            $role=session('role_of_user');
            if($pass1==$pass2){
                $pass=Hash::make($pass1);
            DB::table('registration')->where('user_id',$userId)->update(['password'=>$pass]);
            if ($role=='restaurant') {
                return redirect()->route('dashboard');
            }elseif ($role=='customer') {
                return redirect()->route('index');
            }
            
            }else{
                return redirect()->route('otp_verification',[
                    'id'=>$userId,
                ]);
            }
        }
    }
    

    public function Logout(Request $request)
    {
       $request->session()->flush();
       return redirect()->route('index');
    }

    public function Login()
    {
        return view('Index.login',[
            'msg'=>"0",
        ]);
    }
    public function FinalLogin(Request $request)
    {
       $user_id=$request->userId;
       $pass=$request->password;
       $count=Registration::all()->where('user_id',$user_id)->first();
       if(Hash::check($pass, $count['password'])){
        session(['id_of_user' => $user_id]);
        session(['role_of_user' => $count['user_type']]);
        return redirect()->route('index');
       }else{
        return view('Index.login',[
            'msg'=>'1',
        ]);
       }
       
    }

    public function LiveSearch(Request $request)
    {
        
        $val = $request->data;
        $session_Status=0;
        
        $allPro=Products::join('registration', 'products.restaurant_id', '=', 'registration.user_id')
            ->select('registration.restaurant_name','registration.address','products.product_id','products.product_name','products.product_type','products.product_price','products.photo')
            ->where('products.stock_status','1');

        $userId=session('id_of_user');
        if ($request->session()->get('id_of_user')===null) {
             if ($val=='') {
                $data = $allPro->get();
             }else{
                $data = $allPro->where('products.product_name', 'like', '%'.$val.'%')->get();
             }
           
           $session_Status=0;
        }
        else{
            $session_Status=1;
             $role=session('role_of_user');
             if($role=='restaurant'){
                if ($val=='') {
                    $data = $allPro->where('products.restaurant_id',$userId)->get();
                }else{
                    $data = $allPro->where('products.product_name', 'like', '%'.$val.'%')->where('products.restaurant_id',$userId)->get();
                }
            
             }
             else{
                $user=Registration::all()->where('user_id',$userId)->first();
                if ($user['food_type']=='both') {
                    if ($val=='') {
                        $data = $allPro->get();
                    }else{
                        $data = $allPro->where('products.product_name', 'like', '%'.$val.'%')->get();
                    }
                
                }
                else if ($user['food_type']=='veg') {
                    if ($val=='') {
                        $data = $allPro->where('products.product_type','veg')->get();
                    }else{
                        $data = $allPro->where('products.product_name', 'like', '%'.$val.'%')->where('products.product_type','veg')->get();
                    }
                    
                }
                else{
                    if ($val=='') {
                        $data = $allPro->where('products.product_type','nveg')->get();
                    }else{
                        $data = $allPro->where('products.product_name', 'like', '%'.$val.'%')->where('products.product_type','nveg')->get();
                    }
                    
                }
             }
        }
  

               $role=session('role_of_user');
                
                 $total_row = $data->count();
                 if($total_row > 0)
                 {
                  $count=0;
                  $output="";
                  
                  foreach($data as $al)
                 {
                 $xyz="http://127.0.0.1:8000/uploads/".$al->photo;
                  $output .='<div class="col-lg-4 col-sm-6 mx-auto py-2">
          <div class="card" style="width: 18rem;">
                <img class="card-img-top" style="height: 150px" src="'.$xyz.'" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">'.$al->product_name.'<span class="float-right">';

                    if($al->product_type =="veg")
                    {
                     $output .='<i class="fa fa-circle" aria-hidden="true" style="color:green"></i>'; 
                    }
                    else if($al->product_type=='nveg')
                    {
                    $output .='<i class="fa fa-circle" aria-hidden="true" style="color:red"></i>';
                    }

                 $output .='
                  </span></h5>
                  <p>
                    <strong>'.$al->restaurant_name.'</strong><br>
                    <span><i class="fa fa-map-marker" aria-hidden="true"></i> '.$al->address.'</span>
                    <span class="float-right"><i class="fa fa-inr" aria-hidden="true"></i>'.$al->product_price.'</span>
                  </p>';

                  if($role=='restaurant')
                  {
                    $output .='<button class="btn btn-primary editPro" style="width: 100%" value="'.$al->product_id.'" data-toggle="modal" data-target="#myModal">Edit</button>';
                  }
                  else{
                    if($session_Status){

                     $output .='<button class="btn btn-primary order" style="width: 100%" value="'.$al->product_id.'">Order</button>';
                    }else{
                        $output .=' <a class="btn btn-primary" style="width: 100%" href="{{route("login")}}" >Order</a>';
                    }
                  }
                  
                  $output .='</div></div></div>';
                 
                  $count +=1;
                 }
                }
                else
                {
                 $output = '
                 <tr>
                  <td align="center" colspan="5">No Data Found</td>
                 </tr>
                 ';
                }
                // $data = array(
                //  'table_data'  => $data,
                // );

           return ['status'=>1,'data'=>$output];
    }

    public function Profile()
    {
         $userId=session('id_of_user');
         $profile=Registration::all()->where('user_id',$userId)->first();
        return view('Index.profile',['profile'=>$profile]);
    }
}
