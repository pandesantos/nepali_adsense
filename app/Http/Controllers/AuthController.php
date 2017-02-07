<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{
	 
 	public function postSignUp(Request $request)
 	{
 		$this->validate($request,[
 			'email' => 'required|unique:users|email|max:255',
 			'cname' =>'required',
 			'type'	=> 'required',
 			'password' => 'required|min:6',
 			'confirm_password'=>'required|same:password'
 			]);

 		User::create([
 			'email' => $request->input('email'),
 			'companyname' => $request->input('cname'),
 			'type'=> $request->input('type'),
 			'password' => bcrypt($request->input('password')),
 			]);

 		return true;

 	}

 	public function postSignIn(Request $request)
 	{

 		$this->validate($request,[
 			'email' => 'required',
 			'password' => 'required',
 			]);

 		if (!Auth::attempt($request->only(['email','password']), $request->has('remember'))) 
 		{
 			return redirect()->back()->with('info','Couldnot sign you in with those details.');
 		}

 		return true;
 	}

 	public function getSignOut()
 	{
 		Auth::logout();
 		return redirect()->route('home');
 	}

}