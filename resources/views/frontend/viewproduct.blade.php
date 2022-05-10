@extends('layouts.front')
@section('title', $products->name)


@section('content')

    <br><br><br>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ url('add-rating') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rate this product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                <input type="radio" value="1" name="product_rating" checked id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="product_rating" id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="product_rating" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="product_rating" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="product_rating" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info btn-sm">Rate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 style="font-size: 14px" class="mb-0"><a style="text-decoration: none;color:black"
                    href="{{ url('categories_front') }}">Collections</a> &nbsp;> &nbsp;<a
                    style="text-decoration: none;color:black"
                    href="{{ url('view-category/' . $products->category->slug) }}">{{ $products->category->name }}</a>
                &nbsp;>
                &nbsp; {{ $products->name }}</h6>
        </div>
    </div>
    <div class="container">
        <div class="card-shadow product_data" style="box-shadow: 2px 2px 2px 2px #D8D8D8;">
            <div class="card-body" style="background-color: #FCFAFA">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <div class="prod_img">

                            <img src="{{ asset('assets/uploads/products/' . $products->image) }}" class="w-100"
                                height="400" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h3 class="mb-0">
                            {{ $products->name }}
                            <label style="font-size: 16px;color:white" class="float-end badge bg-danger trending_tag"
                                style="float: right">{{ $products->trending == '1' ? 'Trending' : '' }}</label>
                        </h3>

                        <hr>
                        <label class="me-3">Original Price: <s>Rs.
                                {{ $products->original_price }}</s>&nbsp;&nbsp;&nbsp;<label class="fw-fold"
                                style="font-weight: bold;color:#64756B">Selling Price: Rs.
                                {{ $products->selling_price }}</label></label><br>

                        @php $value=number_format($ratings_value) @endphp
                        <div class="ratings">
                            @for ($i = 1; $i <= $value; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for ($j = $value + 1; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                            <label style="font-weight: bold;color:#64756B">{{ $ratings->count() }} Ratings</label>
                        </div>
                        <p class="mt-5">
                            {{ $products->small_description }}
                        </p>
                        <hr>
                        @if ($products->qty > 0)
                            <label class="badge bg-success" style="color:white">In stock</label>
                        @else
                            <label class="badge bg-danger" style="color:white">Out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-1">
                                    <button class="input-group-text decre-btn">-</button>
                                    <input type="text" name="quantity" value="1"
                                        class="form-control text-center quantity" />
                                    <button class="input-group-text inc-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br>
                                @if ($products->qty > 0)
                                    <button type="button" class="btn btn-primary w-50 me-3 addToCart float-start">Add to
                                        cart <i class="fa fa-shopping-cart"></i></button>
                                @endif
                            </div>

                        </div>

                    </div>

                    <div class="col-md-12">
                        <hr>
                        <h3 style="font-family:fantasy">Product Description</h3>
                        <p class="mt-3">{{ $products->description }}</p>

                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-4 border-left">
                    @if (Auth::check())
                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal"
                            style="color: #D05C5C">
                            Rate this product
                        </button>
                        @if ($review_check != null)
                        @else
                            <a href="{{ url('/add-review/' . $products->slug . '/userreview') }}" class="btn btn-link"
                                style="color: #D05C5C">Review this product</a>
                        @endif
                    @else
                        <h6 style="color: #D05C5C">* Login to rate and review this product</h6>
    
                    @endif
    
                </div>
                <div class="col-md-8">
                    <h6>Product Reviews:</h6>

                    @foreach ($review as $item)
                        <div class="user-review" style="padding-top: 20px">
                            <label style="color: #707171;font-size:14px"
                                >by&nbsp;{{ $item->user->name }}&nbsp;{{ $item->user->lname }}</label>&nbsp;&nbsp;
                                <i class='fas fa-check-circle' style='color:#429da9'></i><span style="font-size: 14px;color:#429da9"> Verified Purchase</span>
                            <br>
                            @php
                                $rating = App\Models\Rating::where('prod_id', $item->prod_id)
                                    ->where('user_id', $item->user_id)
                                    ->first();
                                
                            @endphp
                            @if ($rating)
                                @php $userrated=$rating->stars_rated @endphp
                                @for ($i = 1; $i <= $userrated; $i++)
                                    <i class="fa fa-star checked"></i>
                                @endfor
                                @for ($j = $userrated + 1; $j <= 5; $j++)
                                    <i class="fa fa-star" style="color:707171"></i>
                                @endfor
                            @endif
                            <small>{{ $item->created_at->format('d M Y') }}</small>
                            <br>


                            <span style="font-size:14px">{{ $item->user_review }}</span>
                            &nbsp;&nbsp;
                            @if ($item->user_id == Auth::id())
                                <a href="{{ url('edit-review/' . $products->slug . '/userreview') }}">edit</a><br>
                            @endif
                    @endforeach
                </div>
            </div>
            
        </div>
        
        


    <br><br>
    
        <div class="rel" style="margin:10px">

            <a style="text-decoration: none;color:black" href="{{ url('view-category/' . $products->category->slug) }}">
                <h3 style="font-family:fantasy">More {{ $products->category->name }} products</h3>
            </a>
            <hr style="border:1px solid #4D4D4D">
            <br>
            <div class="row" style="margin:9px">
                
            @foreach ($rel_products as $item)
                @if ($item->name == $products->name)
                @else
                    <div class="col-md-3">
                        <a href="{{ url('category/' . $item->category->slug . '/' . $item->slug) }}"
                            style="text-decoration: none;color:black">
                            <div class="card" style="box-shadow: 1px 1px 1px 1px #D8D8D8;">
                                <img src="{{ asset('assets/uploads/products/' . $item->image) }}" alt="product image"
                                    height="290" class="card-image">
                                <div class="card-body">
                                    <h6>{{ $item->name }}</h6>
                                    <small style="font-weight: bold">Rs. {{ $item->selling_price }}</small>&nbsp;&nbsp;
                                    <s>Rs. {{ $item->original_price }}</s>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <br>
        </div>
</div>
    

    <br><br>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            $('.addToCart').click(function() {
                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.quantity').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "/add-to-cart",
                    data: {
                        'product_id': product_id,
                        'product_qty': product_qty
                    },
                    success: function(response) {
                        swal(response.status1);
                        cartcount();
                    }

                });

            });

            $('.inc-btn').click(function() {
                var inc_value = $('.quantity').val();
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    value++;
                    $('.quantity').val(value);
                }

            });
            $('.decre-btn').click(function() {
                var dec_value = $('.quantity').val();
                var value = parseInt(dec_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--;
                    $('.quantity').val(value);
                }

            });

            function cartcount() {
                $.ajax({
                    method: "GET",
                    url: "/load-cart-data",
                    success: function(response) {
                        $('.cartcount').html(response.count);
                        console.log(response.count)
                    }
                });
            }
        });
    </script>
    @if (session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
    @endif
@endsection
