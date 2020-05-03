<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use Hash;

class EmployerRegisterController extends Controller
{
    Public function employerRegister(Request $request){
        $this->validate($request,[
        'cname'=>'required|string|max:255',
        'email'=>'required|string|email|max:255|unique:users',
        'password'=>'required|string|min:8|confirmed'
        
]);

    $user =  User::create([
            
            'email' => request('email'),
            'password' => Hash::make(request('password')),
             'user_type' =>request('user_type')
        ]);

        Company::create([
            'user_id'=>$user->id,
            'cname'=>request('cname'),
            'slug'=>str_slug(request('cname')),


        ]);
        $user->sendEmailVerificationNotification();
        return redirect()->back()->with('message','A verification link is sent to your email.Please follow the link to verify it');
    }
}
