@extends('layouts.front')
@section('title')
 Checkout  
@endsection

@section('content')
<br><br><br>
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6  style="font-size: 14px" class="mb-0"><a style="text-decoration: none;color:black" href="{{url('/')}}">Home</a> &nbsp;>&nbsp; Checkout</h6>
    </div>
  </div>
    <div class="container mt-3">
        <form action="{{url('/place-order')}}" method="post">
            @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="card" style="background-color:#EBEAEA;padding:10px ">
                    <div class="card-body">
                        <h3>Biling Details</h3>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" name="fname" value="{{Auth::user()->name}}" class="form-control" placeholder="Enter First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" name="lname" value="{{Auth::user()->lname}}" class="form-control" placeholder="Enter Last Name">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" placeholder="Enter Phone Number">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <input type="text" name="address1" value="{{Auth::user()->address1}}" class="form-control" placeholder="Enter Address 1">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" name="address2" value="{{Auth::user()->address2}}" class="form-control" placeholder="Enter Address 2">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text" name="city" value="{{Auth::user()->city}}" class="form-control" placeholder="Enter City">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">State</label>
                                <input type="text" name="state" value="{{Auth::user()->state}}" class="form-control" placeholder="Enter State">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Country</label>
                                <input type="text" name="country" value="{{Auth::user()->country}}" class="form-control" placeholder="Enter Country">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pincode</label>
                                <input type="text" name="pincode" value="{{Auth::user()->pincode}}" class="form-control" placeholder="Enter Pincode">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card"  style="background-color:#EBEAEA;padding:10px ">
                    <div class="card-body">
                        <h3>Order Details</h3>
                        <hr>
                       
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>Items</td>
                                    <td>Quantity</td>
                                    <td>Price (Rs.)</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                @php
                                $totaleach= $item->prod_qty * $item->product->selling_price ;   
                               @endphp
                                    <tr>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{$item->prod_qty}}</td>
                                    <td>{{$totaleach}}</td>
                                    </tr>
                                @endforeach
                                    
                            </tbody>
                        </table>
                        <a href="{{url('/place-order')}}"><button class="btn btn-primary w-100" style="float:right">Place order</button></a>
                    </div>
            </div>
        </div>
    </div>
        </form>
    </div>


@endsection