<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(request $request)
    {
        // dd($request);
        $validation = $request->validate([


                'name'       =>      'required',
                'password'    =>       'required'
            ],
            [

                'name.required'  =>     'Password Required'
           ]
        );

        $name=$request->input('name');
        $password=$request->input('password');
        $data=DB::select('select id from login_user where name=? and password=?',[$name,$password]);
        if(count($data))
        {
            return view('employee.index');
        }
        else
        {
            return redirect('/')->with('success','Wrong Username or Password');
            /*echo "Wrong Username or Password";*/
        }
    }

    public function logout()
    {

     Auth::logout();
     return redirect('login');
    }
}
