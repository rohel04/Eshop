@extends('layouts.front')
@section('title')
 My cart   
@endsection
@section('content')
<br><br><br>
<div class="py-2 mb-4 shadow-sm bg-warning border-top">
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

            @foreach($cart_item as $item)
            
           
           
            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{asset('assets/uploads/products/'.$item->product->image)}}" alt="Product image" width="70" height="70">
                </div>
                <div class="col-md-5">
                    <h6>{{$item->product->name}}</h6>
                </div>
                <div class="col-md-3">
                    <input type="hidden" value="{{$item->prod_id}}" class="prod_id">
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width:130px">
                        <button class="input-group-text decre-btn">-</button>
                        <input type="text" name="quantity" value="{{$item->prod_qty}}" class="form-control text-center quantity" />
                        <button class="input-group-text inc-btn">+</button>
                            
                    </div>  
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
            </div>
        </div>
       
        <hr>

        @endforeach
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
        });
    </script>
@endsection