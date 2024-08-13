<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\User;
use Illuminate\Http\Request;

class pageContoller extends Controller
{
    function loop(){
        return view('index',[
            'listings' => item::all()
        ]);
    }

    function store($id){
        return view('buy',[
            'listing' => item::find($id)
        ]);
    }

    function r_show(){
        return view('register');
    }

    function v_show($email){
        $find = User::where('email','=',$email)->first();
        if(!$find){
            return redirect('/login');
        }
       return view('verify',[
        'email' => $email
       ]);
    }

    function l_show(){
        return view('login');
    }
}
