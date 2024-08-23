<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\information;
use App\Models\item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return redirect()->route('login');
        }
       return view('verify',[
        'email' => $email
       ]);
    }

    function l_show(){
        return view('login');
    }

    function i_show(){
        return view('information');
    }

    function about(){
        return view('about',[
            'listings' => information::where('user_id','=',Auth::id())->first()
        ]);
    }

    function c_show(){
        $listings = cart::selectRaw('*,carts.id as newid')->where('user_id','=',Auth::id())->join('items','carts.item_id','=','items.id')->get();
        return view('cart',[
            'listings' => $listings
        ]); 
    }

}
