<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function adminLogin(){
        return view('admin.login');
    }

    public function adminAuthentication(Request $request){
    
        $credentials=[
            'name' => $request->username,
            'password' => $request->password
        ];
        if(auth()->guard('admin')->attempt($credentials)){

            return redirect(route('admin.dashboard'))->with('message','Login Successfully');

        }else{

            return redirect(route('admin'))->with('message','Invalid Credentials..');

        }

    }

    //logout user
    public function logout(){
        auth()->guard('admin')->logout();
        return redirect()->route('admin')->with('message', 'Logout Successfully');
    }

    public function index(){

        return view('admin.index');
    }
}
