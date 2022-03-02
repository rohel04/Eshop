@extends('layouts.front')
@section('title')
 Category  
@endsection
@section('content')

    <br><br>
    <div class="py-5">
      <div class="container">
        <h3 style="font-family:fantasy">All Categories</h3>
        <hr style="border:1px solid #4D4D4D">
        <br>
        <div class="row">
                    
          @foreach ($categories as $item)                      
          <div class="col-md-3">
              <a href="{{url('view-category/'.$item->slug)}}" style="text-decoration: none;color:black">
            <div class="card"  style="box-shadow: 3px 3px 3px 3px #BDB8B8;">
              <img src="{{asset('assets/uploads/category/'.$item->image)}}" alt="Category image" height="270px">
              <div class="card-body">
                <h5>{{$item->name}}</h5>
               <p>{{$item->description}}</p>
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