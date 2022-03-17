<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders=Order::where('status','0')->orderBy('id','DESC')->get();
        return view('admin.orders.index',compact('orders'));
    }
    public function view($id)
    {
        $orders=Order::where('id',$id)->first();
        return view('admin.orders.view',compact('orders'));
    }
    public function update(Request $request, $id)
    {
        $orders=Order::find($id);
        $orders->status=$request->order_status;
        $orders->update();
        return redirect('orders')->with('status','Order updated Succesfully');
    }
    public function history()
    {
        $orders=Order::where('status','1')->orderBy('id','DESC')->get();
        return view('admin.orders.history',compact('orders'));
    }
}
