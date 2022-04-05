<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class FrontendController extends Controller
{
    public function index()
    {
        $product=Product::where('status','1')->get();
        $category=Category::all();
        $user=User::all();
        $order=Order::all();
        $order_complete=Order::where('status','1');
        $order_pending=Order::where('status','0');
        $total_user=$user->count();
        $total_product=$product->count();
        $total_category=$category->count();
        $total_order=$order->count();
        $total_order_complete=$order_complete->count();
        $total_order_pending=$order_pending->count();
        return view('admin.index',compact('total_product','total_category','total_user','total_order_complete','total_order_pending','total_order'));
    }
}
