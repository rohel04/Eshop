<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function add($product_slug)
    {
        
        $product=Product::where('status','1')->where('slug',$product_slug)->first();
        if($product)
        {
            $prod_id=$product->id;
            $verified_purchase=Order::where('user_id',Auth::id())
            ->join('order_items','orders.id','order_items.order_id')
            ->where('order_items.prod_id',$prod_id)->get();
            return view('frontend.reviews.index',compact('product','verified_purchase'));
        }
        else
        {
            return redirect()->back()->with('status',"Link broken");
        }
    }
    public function review(Request $request)
    {
        $prod_id=$request->product_id;
        $product=Product::where('id',$prod_id)->where('status','1')->first();

        if($product)
        {
            $user_review=$request->input('user_review');
            $new_review=Review::create([
                'user_id'=>Auth::id(),
                'prod_id'=>$prod_id,
                'user_review'=>$user_review,
            ]);
            $categoryslug=$product->category->slug;
            $productslug=$product->slug;
            return redirect('category/'.$categoryslug.'/'.$productslug)->with('status',"Product Reviewed Sucessfully");
        }
        else
        {
            return redirect()->back()->with('status',"Link is broken");
        }
    }
    public function edit($product_slug)
    {
        $product=Product::where('slug',$product_slug)->first();
        if($product)
        {
            $review=Review::where('user_id',Auth::id())->where('prod_id',$product->id)->first();
            return view('frontend.reviews.edit',compact('review','product'));
        }
        else
        {

        }
    }
    public function update(Request $request)
    {
        $review_id=$request->input('review_id');
        $review=Review::where('id',$review_id)->first();
        $product=Product::where('id',$review->prod_id)->first();
        $categoryslug=$product->category->slug;
        $productslug=$product->slug;

        $user_review=$request->input('user_review');
        $review->user_review=$user_review;
        $review->update();

        return redirect('category/'.$categoryslug.'/'.$productslug)->with('status','Review updated successfully!');
    }
}
