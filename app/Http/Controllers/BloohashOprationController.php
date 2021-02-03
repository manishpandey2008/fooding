<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bloohash;
use Validator;
use DB;
class BloohashOprationController extends Controller
{
    public function SignUp(Request $request)
    {
    	$rules=[
                'userName'=>'required|max:30',
                'phone'=>'required|max:10',
                'password'=>'required|max:30',
                ];

            $validator=Validator::make($request->all(),$rules);
            if ($validator->fails()) {
                return response()->json( $validator->errors(),400);
            }

           $phone=$request->phone;
           $userName=$request->userName;
          
            $check=Bloohash::all()->where('phone',$phone)->count();
            if ($check) {
                $msg='Phone No '.$phone.' Is Already Use';
                return redirect()->route('b_signup')->with('msg',$msg);
            }
            $check=Bloohash::all()->where('userName',$userName)->count();
            if ($check) {
                $msg='User Name '.$userName.' Is Already Use';
                return redirect()->route('b_signup')->with('msg',$msg);
            }

            $reg=new Bloohash;
            $reg->userName=$userName;
            $reg->role='user';
            $reg->phone=$request->phone;
            $reg->pass=$request->password;
            $reg->dataStatus='0';
            $reg->loginStatus='1';
            $reg->activityStatus='1';

            $x=$reg->save();

            if ($x) {
            	session(['id' =>$userName]);
            	session(['role' => 'user']);
            	return redirect()->route('b_user_data');
            }
            return view('bloohash.signup');
            
    }

    public function UserData(Request $request)
    {
    	$rules=[
                'fName'=>'required|max:30',
                'lName'=>'required|max:30',
                'address'=>'required|max:100',
                'zipCode'=>'required|max:6',
                'photo'=>'required|mimes:jpeg,jpg,bmp,png|max:4000',
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

        $data=[
    		'firstName'=>$request->fName,
    		'lastName'=>$request->lName,
    		'add'=>$request->address,
    		'zip_code'=>$request->zipCode,
    		'dataStatus'=>'1',
    		'photo'=>$fileName,
    	];

    	$id=session('id');
    	DB::table('bloohash')->where('userName',$id)->update($data);
    	return redirect()->route('b_user_home');
    }

    public function Login(Request $request)
    {
    	$rules=[
                'userName'=>'required|max:30',
                'password'=>'required|max:20',
                ];

        $validator=Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json( $validator->errors(),400);
        }

        $userName=$request->userName;
        $pass=$request->password;

        $check=Bloohash::all()->where('userName',$userName)->where('pass',$pass);
        if ($check->count()) {
        	$user=$check->first();
        	session(['id' =>$userName]);
            session(['role' => $user['role']]);
            DB::table('bloohash')->where('userName',$userName)->update(['loginStatus'=>'1']);
            
            if($user['role']=='admin'){
            	return redirect()->route('b_index');
            }else if($user['role']=='user'){
            	return redirect()->route('b_index');
            }

        }else{
        	$msg="Something Is Wrong.";
        	 return redirect()->route('b_login')->with('msg',$msg);
        }
    }

    public function StatusChange(Request $request,$id)
    {
    	$user=Bloohash::all()->where('userName',$id)->first();
    	$val='1';
    	if ($user['activityStatus']=='1') {
    		$val='0';
    	}
    	DB::table('bloohash')->where('userName',$id)->update(['activityStatus'=>$val]);
    	return redirect()->route('b_admin_home');
    }
}
