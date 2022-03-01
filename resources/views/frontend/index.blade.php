@extends('layouts.front')
@section('title')
 Welcome to E-shop   
@endsection
@section('content')

    @include('layouts.inc.slider')

    <div class="py-5">
      <div class="container">
        <h3>Featured Products</h3>
        <hr style="border:1px solid #4D4D4D">
        <br>
        <div class="row">
                    
          @foreach ($featured_products as $item)                      
          <div class="col-md-3">
            <a href="{{url('category/'.$item->category->slug.'/'.$item->slug)}}" style="text-decoration: none;color:black">
            <div class="card"  style="box-shadow: 3px 3px 3px 3px #BDB8B8;">
              <img src="{{asset('assets/uploads/products/'.$item->image)}}" alt="product image">
              <div class="card-body">
                <h5>{{$item->name}}</h5>
                <small style="font-weight: bold">Rs. {{$item->selling_price}}</small>&nbsp;&nbsp;
                <s>Rs. {{$item->original_price}}</s>
              </div>
            </div>
            </a>
          </div>
          @endforeach
        </div>
        <br><br>
        <h3>Popular Categories</h3>
        <hr style="border:1px solid #4D4D4D">
        <br>
        <div class="row">
                    
          @foreach ($trending_cat as $trend)                      
          <div class="col-md-3">
            <a href="{{url('view-category/'.$trend->slug)}}" style="text-decoration: none;color:black">
            <div class="card"  style="box-shadow: 3px 3px 3px 3px #BDB8B8;">
              <img src="{{asset('assets/uploads/category/'.$trend->image)}}" alt="category image" height="270px">
              <div class="card-body">
                <h5>{{$trend->name}}</h5>
                <p>{{$trend->description}}</p>
              </div>
            </div>
          </a>
          </div>
          @endforeach
        </div>

        </div>
      </div>
    </div>
   
@endsection

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