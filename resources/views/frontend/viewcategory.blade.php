@extends('layouts.front')
@section('title',$category->name)

@section('content')
<br><br><br>

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
  <div class="container">
      <h6 style="font-size: 14px" class="mb-0"><a style="text-decoration: none;color:black" href="{{url('categories_front')}}">Collections</a> &nbsp;>&nbsp; {{$category->name}}</h6>
  </div>
</div>
  <div class="py-5">

    <div class="container">
      <h3 style="font-family:fantasy">{{$category->name}} 
      </h3>
      <hr style="border:1px solid #4D4D4D">
      <br>
      <div class="row">
        <div class="col-12 mb-4">
          <span class="sort-heading">Sort by:</span>
          <a class="sort-font" href="{{URL::current()}}">All</a>
          <a class="sort-font" href="{{URL::current().'?sort=price_asc'}}" class="sort-font">Low to High</a>
          <a class="sort-font" href="{{URL::current().'?sort=price_desc'}}" class="sort-font">High to Low</a>
        </div>
        @foreach ($products as $item)                      
        <div class="col-md-3">
          <a href="{{url('category/'.$category->slug.'/'.$item->slug)}}" style="text-decoration: none;color:black">
          <div class="card" style="box-shadow: 1px 1px 1px 1px #BDB8B8;">
            <img src="{{asset('assets/uploads/products/'.$item->image)}}" alt="product image" height="270" class="card-image">
            <div class="card-body">
              <h6>{{$item->name}}</h6>
              <small>Rs. {{$item->selling_price}}</small>&nbsp;&nbsp;
              <s>Rs. {{$item->original_price}}</s>
            </div>
          </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
