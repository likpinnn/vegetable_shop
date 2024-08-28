<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class itemController extends Controller
{
    function cart(Request $request, $id){
        if(isset($_POST['index_add'])){
            $item = item::find($id);
            $price = $item->price;
            $mass = '1000';

            $find = cart::where('user_id','=',Auth::id())->where('item_id','=', $item->id)->where('status','=', 'cart')->first();
            if($find){
                $cart_id = $find->id;
                $old_price = $find->total_price;
                $old_mass = $find->mass;

                $new_price = $old_price + $price;
                $new_mass = $old_mass + $mass;

                cart::where('id','=', $cart_id)->update([
                    'total_price' => $new_price,
                   'mass' => $new_mass
                ]);

                return redirect('/')->with('cart','Item added to cart');
            }

            cart::create([
                'user_id'  => Auth::id(),
                'item_id' => $id,
                'total_price' => $price,
                'mass' => $mass
            ]);

            return redirect('/')->with('success','Item added to cart');
        }elseif(isset($_POST['add_to_cart'])){
            $item = item::find($id);
            $price = $item->price;
            $multipe = $price/1000;
            $mass = $request->mass;
            $total_price = $multipe * $mass;

            $find = cart::where('user_id','=',Auth::id())->where('item_id','=', $item->id)->where('status','=', 'cart')->first();
            if($find){
                $cart_id = $find->id;
                $old_price = $find->total_price;
                $old_mass = $find->mass;

                $new_price = $old_price + $price;
                $new_mass = $old_mass + $mass;

                cart::where('id','=', $cart_id)->update([
                    'total_price' => $new_price,
                   'mass' => $new_mass
                ]);

                return redirect('/')->with('success','Item added to cart');
            }

            cart::create([
                'user_id'  => Auth::id(),
                'item_id' => $id,
                'total_price' => $total_price,
                'mass' => $request->mass
            ]);

            return redirect()->route('buy',[$id])->with('success','Item added to cart');
        }
       
    }

    function remove(cart $id){
        $id->delete();
        return redirect()->route('cart')->with('success','Item removed from cart');
    }


    function update(cart $id){
        if(isset($_POST['plus'])){
            $item = item::find($id->item_id);
            $price = $item->price/10;
            $new_mass = $id->mass + 100;
            $new_price = $id->total_price + $price;
            $id->update([
                'mass' => $new_mass,
                'total_price' => $new_price
            ]);
        }elseif(isset($_POST['minus'])){
            if($id->mass <= 100){
                $id->delete();
            }
            $item = item::find($id->item_id);
            $price = $item->price/10;
            $new_mass = $id->mass - 100;
            $new_price = $id->total_price - $price;
            $id->update([
                'mass' => $new_mass,
                'total_price' => $new_price
            ]);
        }

        return redirect()->route('cart')->with('success','Item updated in cart');
    }

    function checkout(Request $request){
        $cart = cart::where('user_id','=',Auth::id());
        $address = $request->address;
        $cart->update([
            'status' => 'pending',
            'address_id' => $address,
        ]);

        return redirect()->route('cart')->with('success','Order placed successfully');
    }
}
