<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Redirect;



class AuthenticateController extends Controller
{
    public function login(Request $request)
    {
    	if($request->session()->exists('id')){
            return redirect()->route('dashboard');
        }else{
            return view('login');
        }
    }

    public function loginUser()
    {
        return view('loginuser');
    }


    public function loginProcess(Request $request)
    { 
    	$email = $request->get('email');
    	$password = $request->get('password');
    	
    	try {
    		$admin = Admin::where('email', $email)->where('password', $password)->where('role', 1)->firstOrFail();
    		$request->session()->put('id', $admin->user_id);
    		$request->session()->put('role', 1);
    		return redirect()->route('dashboard');
    	} catch (Exception $e) {
    		return Redirect::route('login')->with('error' , 'Sai mật khẩu hoặc tài khoản');
    	}
    }
    public function loginUserProcess(Request $request)
    { 
    	$email = $request->get('email');
    	$password = $request->get('password');
    	
    	try {
    		$admin = Admin::where('email', $email)->where('password', $password)->where('role', 0)->firstOrFail();
    		$request->session()->put('id', $admin->user_id);
    		$request->session()->put('role', 0);
    		return redirect()->route('listbook.index');
    	} catch (Exception $e) {
    		return Redirect::route('login-user')->with('error' , 'Sai mật khẩu hoặc tài khoản');
    	}
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return Redirect::route('welcome');
    }
}
