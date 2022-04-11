@extends('layouts.front')
@section('title')
 Welcome to E-shop   
@endsection
@section('content')
<br>
{{-- <div class="" style="
  background-image: url('{{asset('assets/images/ban7.jpg')}}');
  height: 450px;
  
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;"
> </div> --}}
@include('layouts.inc.slider')




    

    <div class="py-5">
      <div class="container">
        <h3 style="font-family:fantasy">Featured Products</h3>
        <hr style="border:1px solid  #585858">
        <br>
        <div class="row">
                    
          @foreach ($featured_products as $item)                      
          <div class="col-md-3 mt-5">
            <a href="{{url('category/'.$item->category->slug.'/'.$item->slug)}}" style="text-decoration: none;color:black">
            <div class="card"  style="box-shadow: 1px 1px 1px 1px #D8D8D8;">
              <img src="{{asset('assets/uploads/products/'.$item->image)}}" alt="product image" height="270" class="card-image" >
              <div class="card-body">
                <h6>{{$item->name}}</h6>
                <small style="font-weight: bold">Rs. {{$item->selling_price}}</small>&nbsp;&nbsp;
                <s>Rs. {{$item->original_price}}</s>
                
              </div>
            </div>
            </a>
          </div>
          @endforeach
        </div>
        <br><br>
        <h3 style="font-family:fantasy">Popular Categories</h3>
        <hr style="border:1px solid #4D4D4D">
        <br>
        <div class="row">
                    
          @foreach ($trending_cat as $trend)                      
          <div class="col-md-3">
            <a href="{{url('view-category/'.$trend->slug)}}" style="text-decoration: none;color:black">
            <div class="card" style="box-shadow: 1px 1px 1px 1px #D8D8D8;">
              <img src="{{asset('assets/uploads/category/'.$trend->image)}}" alt="category image" height="270" style="object-fit: cover">
              <div class="card-body">
                <h6>{{$trend->name}}</h6>
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