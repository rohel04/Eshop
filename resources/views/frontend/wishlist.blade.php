@extends('layouts.front')
@section('title')
 My cart   
@endsection

@section('content')
<br><br><br>
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
  <div class="container">
      <h6  style="font-size: 14px" class="mb-0"><a style="text-decoration: none;color:black" href="{{url('/')}}">Home</a> &nbsp;>&nbsp; WishList</h6>
  </div>
</div>
<div class="container my-5">
    
   
    <div class="card shadow" style="box-shadow: 3px 3px 3px 3px #BDB8B8;">
     @if($wishlists->count()>0)

     
         
     @else
         <h1>No items n wishlists</h1>
     @endif
    </div>



</div>
<br><br><br>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            cartcount();

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
                        cartcount();
                        
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

            function cartcount()
            {
                $.ajax({
                    method:"GET",
                    url:"/load-cart-data",
                    success:function(response)
                    {
                        $('.cartcount').html(response.count);
                        console.log(response.count)
                    }
                });
            }
        });
    </script>
@endsection