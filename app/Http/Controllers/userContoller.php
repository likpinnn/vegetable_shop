<?php

namespace App\Http\Controllers;

use App\Mail\verify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class userContoller extends Controller
{
    

    function register(Request $request){
        $form = $request->validate([
            'email' => ['required',Rule::unique('users','email')],
            'password' => 'required|confirmed'
        ]);

        $form['OTP'] = rand(100000,999999);
        $form['status']  = 'pending';

        $user = User::create($form);

        Mail::to($user->email)->send(new verify($user));
        
        return redirect("/verify/$user->email");

        
    }


    function verify(Request $request){
        $find = User::where('email','=',$request->email)->first();

        if($find){
            $otp = $find->OTP;
            if($request->OTP == $otp){
                $find->update([
                    'status' => 'complete'
                ]);

                return redirect('/login')->with('success','');

            }else{
                return redirect()->back()->with('error','OTP is error');
            }
        }
    }

    function login(Request $request){
        $form = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        
        if(Auth::attempt($form)){
            return redirect('/')->with('success','');
        }else{
            return redirect()->route('login');
        }
    }

}
