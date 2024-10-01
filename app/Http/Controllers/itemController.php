<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\cart;
use App\Models\cartid;
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
                'mass' => $mass,
                'cart_id' => '0'
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
                'mass' => $request->mass,
                'cart_id' => '0'
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
        $cartid = cart::selectRaw('MAX(cart_id) as cart_id')->where('user_id',Auth::id())->first();
        $cart = cart::where('user_id',Auth::id())->where('cart_id','0');
        $address = $request->address;

        if($cartid->cart_id == 0){
            $cart_id = 1;
        }else{
            $cart_id = $cartid->cart_id + 1;
        }

        $update = $cart->update([
            'status' => 'pending',
            'address_id' => $address,
            'cart_id' => $cart_id
        ]);

        if($update){
            $exp = 'Express';
            $rand_trade = rand(100000,999999);
            $full_exp = $exp.$rand_trade;

            $check = cartid::where('trade_number',$full_exp)->first();
            if($check){
                $rand_trade = rand(100000,999999);
                $full_exp = $exp.$rand_trade;
            }

            cartid::create([
                'user_id' => Auth::id(),
                'cart_id' => $cart_id,
                'trade_number' => $full_exp
            ]);
        }

        return redirect()->route('cart')->with('success','Order placed successfully');
    }

    function admin_checkout(cart $id){
        $id->update([
            'status' => 'completed',
        ]);

        return redirect()->route('admin.dashboard','#orders')->with('success','completed successfully');
    }

    function destroy(cart $id){
        $id->update([
            'status' => 'done',
        ]);
        return redirect()->route('about')->with('success','Item removed from cart');
    }

    function del_address(address $id){
        $count = count(address::where('user_id',Auth::id())->get());
        if($count == 1){
            return redirect()->back()->with('error','You can not delete the last address');
        }
        $id->delete();
        return redirect()->back();
    }

    function del_item(item $id){
        $id->delete();
        return redirect()->route('admin.dashboard','#products')->with('success','Item deleted successfully');
    }

    function add_item(Request $request){
        $form = $request->validate([
            'p_name' => 'required',
            'price_mass' => 'required',
            'price' => 'required',
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $destinationPath = public_path('images');
            $imageName = $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $form['image']="images/$imageName";
        }

        item::create($form);

        return redirect()->route('admin.dashboard','#items')->with('success','Item added successfully');

    }
}
