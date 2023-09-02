<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }
        
    public function check(Request $request)
    {  
        $user = $request->username;
        $pass  = $request->password;
 
        if (auth()->attempt(array('name' => $user, 'password' => $pass)))
        {
            return response()->json([ [1] ]);
        } 
        else
         {  
            return response()->json([ [3] ]);
         }  
    }
 
    public function home()
    {
        return view('home');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect('/');
    }
}
