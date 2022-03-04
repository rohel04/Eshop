@extends('layouts.front')
@section('title')
My Profile  
@endsection
@section('content')
<br><br><br>
<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background-color:#F4F5F5;">
                <div class="card-header" style="background-color: #2D2F32;color:white;">
                    <h4>Orders View
                    <a href="{{url('/my-orders')}}"><button class="btn btn-light" style="float: right">Back</button></a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <label for="">First Name</label>
                            <div class="border p-2">{{$orders->fname}}</div>
                            <label for="">Last Name</label>
                            <div class="border p-2">{{$orders->lname}}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{$orders->email}}</div>
                            <label for="">Phone</label>
                            <div class="border p-2">{{$orders->phone}}</div>
                            <label for="">Shipping Address</label>
                            <div class="border p-2">
                                {{$orders->address1}},
                                {{$orders->address2}},
                                {{$orders->city}},
                                {{$orders->state}},
                                {{$orders->country}}
                            </div>
                            <label for="">Pincode</label>
                            <div class="border p-2">{{$orders->pincode}}</div>
                        </div>
                        <div class="col-md-6">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Image</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders->order_item as $item)
                            <tr>
                               <td>{{$item->product->name}}</td>
                               <td>{{$item->qty}}</td>
                               <td>{{$item->price}}</td>
                               <td><img src="{{asset('assets/uploads/products/'.$item->product->image)}}" alt="product_img" width=70 height=70></td>
                               
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                    <h5 style="float:right">Grand Total:Rs. {{$orders->total_price}}</h5>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>


@endsection