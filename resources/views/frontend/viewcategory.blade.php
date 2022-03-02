@extends('layouts.front')
@section('title')
 {{$category->name}}  
@endsection
@section('content')
<br><br><br>
<div class="py-2 mb-4 shadow-sm bg-warning border-top">
  <div class="container">
      <h6  style="font-size: 14px" class="mb-0"><a style="text-decoration: none;color:black" href="{{url('categories_front')}}">Collections</a> &nbsp;>&nbsp; {{$category->name}}</h6>
  </div>
</div>
<div class="py-5">
    <div class="container">
      <h3 style="font-family:fantasy">{{$category->name}}</h3>
      <hr style="border:1px solid #4D4D4D">
      <br>
      <div class="row">
                  
        @foreach ($products as $item)                      
        <div class="col-md-3">
          <a href="{{url('category/'.$category->slug.'/'.$item->slug)}}" style="text-decoration: none;color:black">
          <div class="card" style="box-shadow: 3px 3px 3px 3px #BDB8B8;">
            <img src="{{asset('assets/uploads/products/'.$item->image)}}" alt="product image">
            <div class="card-body">
              <h5>{{$item->name}}</h5>
              <small>Rs. {{$item->selling_price}}</small>
            </div>
          </div>
          </a>
        </div>
        @endforeach
      </div>

@section('scripts')
    <script>
      $('.feature-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
    </script>
@endsection