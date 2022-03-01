@extends('layouts.front')
@section('title',$products->name)
   

@section('content')
<br><br><br>
<div class="py-2 mb-4 shadow-sm bg-warning border-top" >
    <div class="container">
        <h6  style="font-size: 14px" class="mb-0">Collections &nbsp;> &nbsp;{{$products->category->name}} &nbsp;> &nbsp; {{$products->name}}</h6>
    </div>
</div>
<div class="container">
    <div class="card-shadow" style="box-shadow: 3px 3px 3px 3px #BDB8B8;">
        <div class="card-body" style="background-color: #FCF0F0">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('assets/uploads/products/'.$products->image)}}" class="w-100" alt="">
                </div>
                <div class="col-md-8">
                    <h3 class="mb-0">
                        {{$products->name}}<br>
                        <label style="font-size: 16px;color:white" class="float-end badge bg-danger trending_tag" >{{$products->trending =="1"?'Trending':''}}</label>
                    </h3>
                    
                    <hr>
                    <label class="me-3">Original Price: <s>Rs. {{$products->original_price}}</s></label><br>
                    <label class="fw-fold" style="font-weight: bold;">Selling Price: Rs. {{$products->selling_price}}</label>
                    <p class="mt-3">
                        {{ $products->small_description }}
                    </p>
                    <hr>
                    @if($products->qty>0)
                    <label class="badge bg-success" style="color:white">In stock</label>
                    @else
                    <label class="badge bg-danger" style="color:white">Out of stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-1">
                                <span class="input-group-text">-</span>
                                <input type="text" name="quantity" value="1" class="form-control" />
                                <span class="input-group-text">+</span>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br>
                            <button type="button" class="btn btn-success me-3 float-start">Add to wishlist <i class="fa fa-heart"></i></button>
                            <button type="button" class="btn btn-primary me-3 float-start">Add to cart <i class="fa fa-shopping-cart"></i></button>

                        </div>
                        
                    </div>
                  
                </div>
            </div>
            <div class="col-md-12">
            <hr>
            <h3>Product Description</h3>
            <p class="mt-3">{{$products->description}}</p>
            </div>
        </div>
    </div>
</div>
<br><br>
@endsection