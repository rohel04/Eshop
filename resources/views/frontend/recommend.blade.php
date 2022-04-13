@extends('layouts.front')
@section('title')
    Recommendation
@endsection
@section('content')
    <br>
  

    <div class="container mt-5">
        <div class="row">
           @empty($a)
                <div class="nothing" style="margin:auto;height:300px;margin-top:50px">
                    <h4>Nothing to Recommend for you</h4>
                </div>
            
            @else
            @foreach ($a as $item)
            <div class="col-md-3 mt-5">
                @php
                                $product = App\Models\Product::where('id', $item->prod_id)->first();
                                    
                                
                            @endphp
                <a href="{{url('category/'.$product->category->slug.'/'.$item->product->slug)}}" style="text-decoration: none;color:black">
                <div class="card"  style="box-shadow: 1px 1px 1px 1px #D8D8D8;">
                  <img src="{{asset('assets/uploads/products/'.$item->product->image)}}" alt="product image" height="270" class="card-image" >
                  <div class="card-body">
                    <h6>{{$item->product->name}}</h6>
                    <small style="font-weight: bold">Rs. {{$item->product->selling_price}}</small>&nbsp;&nbsp;
                    <s>Rs. {{$item->product->original_price}}</s>
                    
                  </div>
                </div>
                </a>
              </div>
            @endforeach
            @endempty
            {{-- @endif --}}
        </div>
    </div>
    
@endsection
