@extends('layouts.front')
@section('title')
 Checkout  
@endsection
@section('content')
<br><br><br>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h3>Biling Details</h3>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter Last Name">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" placeholder="Enter Phone Number">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control" placeholder="Enter Address 1">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control" placeholder="Enter Address 2">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">State</label>
                                <input type="text" class="form-control" placeholder="Enter State">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pincode</label>
                                <input type="text" class="form-control" placeholder="Enter Pincode">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
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
                        <button class="btn btn-primary" style="float:right">Place order</button>
                    </div>
            </div>
        </div>
    </div>


@endsection