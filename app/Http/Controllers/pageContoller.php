<?php

namespace App\Http\Controllers;

use App\Models\address;
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
        $listings = information::where('user_id','=',Auth::id())->get();
        $address = address::where('user_id','=',Auth::id())->get();
        $cart = cart::selectRaw('*,carts.id as newid')
        ->where('user_id','=',Auth::id())
        ->where('status','!=','cart')
        ->where('status','!=','done')
        ->join('items','carts.item_id','=','items.id')
        ->get();
        return view('about',[
            'listings' => $listings,
            'cart' => $cart,
            'addresses' => $address
        ]);
    }

    function c_show(){
        $listings = cart::selectRaw('*,carts.id as newid')->where('user_id','=',Auth::id())->where('status','=','cart')->join('items','carts.item_id','=','items.id')->get();
        $cart = cart::where('user_id','=',Auth::id())->where('status','=','cart')->sum('total_price');
        $address = address::where('user_id','=',Auth::id())->get();
        if(!$cart){
            return view('cart',[
                'listings' => 'No item in cart',
            ]);
        }
        return view('cart',[
            'listings' => $listings,
            'total' => $cart,
            'addresses' => $address
        ]); 
    }


    function c_edit($id){
        return view('editcart',[   
            'listing' => cart::find($id)
        ]);
    }


    function admin(){
        $items = item::all();
        $carts = cart::selectRaw('*,carts.id as newid')
        ->where('carts.status','=','pending')
        ->join('items','carts.item_id','=','items.id')
        ->join('users','carts.user_id','=','users.id')
        ->join('addresss','users.id','=','addresss.user_id')
        ->join('informations','users.id','=','informations.user_id')
        ->rightJoin('cartids','carts.user_id','=','cartids.user_id')
        ->get();
        $user = User::where('status','!=','admin')->get();
        return view('admin',[
            'items' => $items,
            'carts' => $carts,
            'users' => $user
        ]);
    }

    function add_address(){
        return view('address_create');
    }


}
