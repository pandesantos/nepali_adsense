<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\AuthController;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function postSubmit(Request $request)
    {
      $auth = new AuthController;  
      if (isset($_POST['signup'])) 
      {
          if ($auth->postSignUp($request)) 
          {
            return redirect()->route('home')->with('info','Your account has been created. Try login!');
          }
      }
      elseif (isset($_POST['login'])) 
      {
        if ($auth->postSignIn($request)) 
        {
          return redirect()->route('home')->with('info','You are now logged into the system');
        }
      }
    }

}
