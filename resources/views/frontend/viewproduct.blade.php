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
    <div class="card-shadow product_data" style="box-shadow: 3px 3px 3px 3px #BDB8B8;">
        <div class="card-body" style="background-color: #F5EFEF">
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
                            <input type="hidden" value="{{$products->id}}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-1">
                                <button class="input-group-text decre-btn">-</button>
                                <input type="text" name="quantity" value="1" class="form-control text-center quantity" />
                                <button class="input-group-text inc-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br>
                            <button type="button" class="btn btn-success me-3 addToCart float-start">Add to wishlist <i class="fa fa-heart"></i></button>
                            <button type="button" class="btn btn-primary me-3 addToCart float-start">Add to cart <i class="fa fa-shopping-cart"></i></button>

                        </div>
                        
                    </div>
                  
                </div>
            </div>
            <div class="col-md-12">
            <hr>
            <h3 style="font-family:fantasy">Product Description</h3>
            <p class="mt-3">{{$products->description}}</p>
            </div>
        </div>
    </div>
    <br><br>
    <a style="text-decoration: none;color:black" href="{{url('view-category/'.$products->category->slug)}}"> <h3 style="font-family:fantasy">More {{$products->category->name}} products</h3></a>
    <hr style="border:1px solid #4D4D4D">
    <br>
    <div class="row">
                
      @foreach ($rel_products as $item)   
      @if($item->name == $products->name)
      @else                   
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
      @endif
      @endforeach
    </div>
</div>
<br><br>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){

            $('.addToCart').click(function (){
                var product_id=$(this).closest('.product_data').find('.prod_id').val();
                var product_qty=$(this).closest('.product_data').find('.quantity').val();

                $.ajaxSetup({
                        headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
});

               $.ajax(
                   {
                       method:"POST",
                       url: "/add-to-cart",
                       data:{
                           'product_id':product_id,
                           'product_qty':product_qty
                       },
                       success:function(response){
                        swal(response.status1);
                       }
                       
                   }
               );

            });

            $('.inc-btn').click(function(){
                var inc_value=$('.quantity').val();
                var value=parseInt(inc_value,10);
                value=isNaN(value)? 0 : value;
                if(value<10)
                {
                    value++;
                    $('.quantity').val(value);
                } 

            });
            $('.decre-btn').click(function(){
                var dec_value=$('.quantity').val();
                var value=parseInt(dec_value,10);
                value=isNaN(value)? 0 : value;
                if(value>1)
                {
                    value--;
                    $('.quantity').val(value);
                } 

            });
        });
    </script>
@endsection