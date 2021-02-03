<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bloohash;
use DB;
class BloohashController extends Controller
{
    public function Home()
    {
    	$id=session('id');
    	if($id){
    		$user=Bloohash::all()->where('userName',$id)->first();
    		return view('bloohash.index',[
    			'msg'=>1,
    			'user'=>$user,
    		]);
    	}
    	return view('bloohash.index',[
    			'msg'=>0,
    		]);
    	
    }
    public function Login()
    {
    	return view('bloohash.login');
    }
    public function Signup()
    {
    	return view('bloohash.signup');
    }
    public function UserData(Request $request)
    {
    	if($request->session()->get('id')===null){
    		return redirect()->route('b_index');
    	}
    	$id=session('id');
    	$user=Bloohash::all()->where('userName',$id)->first();
    	if($user['dataStatus']=='1'){
    		return redirect()->route('b_user_home');
    	}
    		return view('bloohash.userData');
    }
    public function UserHome()
    {
    	$id=session('id');
    	$user=Bloohash::all()->where('userName',$id)->first();
    	return view('bloohash.userHome',[
    		'user'=>$user,
    	]);
    }
    public function AdminHome()
    {
    	$id=session('id');
    	$users=Bloohash::all()->where('role','user');
    	$user=Bloohash::all()->where('userName',$id)->first();
    	return view('bloohash.adminHome',[
    		'users'=>$users,
    		'user'=>$user,
    	]);
    }
    public function UserProfile($id)
    {
    	$user=Bloohash::all()->where('userName',$id)->first();
    	return view('bloohash.profile',[
    		'user'=>$user,
    	]);
    }
    public function Logout(Request $request)
    {
    	$id=session('id');
    	DB::table('bloohash')->where('userName',$id)->update(['loginStatus'=>'0']);
    	 $request->session()->flush();
       return redirect()->route('b_index');
    }
}
