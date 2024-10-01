<?php

namespace App\Http\Controllers;

use App\Mail\verify;
use App\Models\address;
use App\Models\information;
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
        
        return redirect()->route('verify',["email" => $user->email]);

        
    }


    function verify(Request $request){
        $find = User::where('email','=',$request->email)->first();

        if($find){
            $otp = $find->OTP;
            if($request->OTP == $otp){
                $find->update([
                    'status' => 'complete'
                ]);

                return redirect()->route('login')->with('success','');

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

        $find = User::where('email',$form['email'])->first();
        
        if(Auth::attempt($form)){
            if($find->status == 'pending'){
                return redirect()->route('verify',["email" => $find->email]);
            }elseif($find->status == 'admin'){
                return redirect()->route('admin.dashboard');
            }
            return redirect('/')->with('success','');
        }else{
            return redirect()->route('login')->with('error','Email or Password is wrong');
        }
    }


    function logout(Request $request){
        Auth::logout();

        return redirect('/');
    }

    function information(Request $request){
        if(isset($_POST['information'])){
            $form = $request->validate([
                'f_name' => 'required',
                'l_name' => 'required',
                'gender' => 'required',
                'phone' => 'required',
            ]);

            $form2 = $request->validate([
                'address_line_1' => 'required',
                'city' => 'required',
                'state' => 'required',
                'p_code' => 'required',
            ]);
            
            $form['user_id'] = Auth::user()->id;
            $form2['user_id'] = Auth::user()->id;

            $info = information::create($form);
            $address = address::create($form2);

            return redirect('/')->with('success','');
        }elseif(isset($_POST['address'])){
            $form2 = $request->validate([
                'address_line_1' => 'required',
                'city' => 'required',
                'state' => 'required',
                'p_code' => 'required',
            ]);
            $form2['user_id'] = Auth::user()->id;
            $address = address::create($form2);

            return redirect()->route('cart')->with('success','');
        }
       
    }

}
