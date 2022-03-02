<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function addproducts(Request $request)
    {
        $product_id=$request->input('product_id');
        $product_qty=$request->input('product_qty');

        if(Auth::check())
        {
            $prod_check=Product::where('id',$product_id)->first();
            if($prod_check)
            {
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status1'=>$prod_check->name." Already added into cart"]);
                }
                else
                {
                $cartItem=new Cart();
                $cartItem->user_id=Auth::id();
                $cartItem->prod_id=$product_id;
                $cartItem->prod_qty=$product_qty;
                $cartItem->save();
                return response()->json(['status1'=>$prod_check->name." Added to cart"]);
                }
            }
        }
        else
        {
            return response()->json(['status1'=>"Login to continue"]);
        }
    }

    public function viewcart()
    {
        $cart_item=Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cart_item'));
    }
    public function delete(Request $request)
    {
        $prod_id=$request->input('product_id');

        if(Auth::check())
        {
            
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
            {
                $cartItem=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status1'=>"Product removed from cart"]);
            }
        }
        else
        {
            return response()->json(['status1'=>"Login to continue"]);
        }
    }
}
