@extends('layouts.front')
@section('title')
 My cart   
@endsection
@section('content')
<br><br><br>
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
  <div class="container">
      <h6  style="font-size: 14px" class="mb-0"><a style="text-decoration: none;color:black" href="{{url('/')}}">Home</a> &nbsp;>&nbsp; Cart</h6>
  </div>
</div>
<div class="container my-5">
    @if($cart_item->isEmpty())
    <center><h3>No items in cart</h3></center>
    @else
    <div class="card shadow" style="box-shadow: 3px 3px 3px 3px #BDB8B8;">
        <div class="card-body">
            @php
                $total_each;
                $total=0;
            @endphp
            @foreach($cart_item as $item)
            
           
           
            <div class="row product_data">
                <div class="col-md-2 my-auto">
                    <img src="{{asset('assets/uploads/products/'.$item->product->image)}}" alt="Product image" width="70" height="70">
                </div>
                <div class="col-md-3 my-auto">
                    <h6>{{$item->product->name}}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    @php
                        $total_each=$item->product->selling_price * $item->prod_qty;
                    @endphp
                    <h6>Rs. {{$total_each}}</h6>

                </div>
                <div class="col-md-3" my-auto>
                    <input type="hidden" value="{{$item->prod_id}}" class="prod_id">
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width:130px">
                        <button class="input-group-text changeQuantity decre-btn">-</button>
                        <input type="text" name="quantity" value="{{$item->prod_qty}}" class="form-control text-center quantity" />
                        <button class="input-group-text changeQuantity inc-btn">+</button>
                            
                    </div>  
            </div>
            <div class="col-md-2 my-auto">
                <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
            </div>
        </div>
       
        <hr>
        @php
        
         $total+= $total_each;
          
        @endphp
        @endforeach
       
    </div>
    <div class="card-footer">
        <h6>Total Price: Rs. {{$total}}</h6>

        <a href="{{url('checkout')}}"><button class="btn btn-outline-success" style="float:right">Proceed to Checkout</button></a>
    </div>
</div>
@endif

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
                var inc_value=$(this).closest('.product_data').find('.quantity').val();
                var value=parseInt(inc_value,10);
                value=isNaN(value)? 0 : value;
                if(value<10)
                {
                    value++;
                    $(this).closest('.product_data').find('.quantity').val(value);
                } 

            });
            $('.decre-btn').click(function(){
                var dec_value=$(this).closest('.product_data').find('.quantity').val();
                var value=parseInt(dec_value,10);
                value=isNaN(value)? 0 : value;
                if(value>1)
                {
                    value--;
                    $(this).closest('.product_data').find('.quantity').val(value);
                } 

            });
            $('.delete-cart-item').click(function(){

                var prod_id=$(this).closest('.product_data').find('.prod_id').val();
                
                $.ajaxSetup({
                        headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
});

                $.ajax({
                    method:"POST",
                    url:"/delete-cart-item",
                    data:{
                        'product_id': prod_id,
                    },
                    success:function(response)
                    {
                        window.location.reload();
                        swal(response.status1);
                    }
                });
            });
            $('.changeQuantity').click(function(){
                var prod_id=$(this).closest('.product_data').find('.prod_id').val();
                var prod_qty=$(this).closest('.product_data').find('.quantity').val();
                
                $.ajaxSetup({
                        headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                    });

                $.ajax({
                    method:'POST',
                    url: '/update-cart',
                    data:{
                        'prod_id':prod_id,
                        'prod_qty':prod_qty,
                    },
                    success:function(response){
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endsection