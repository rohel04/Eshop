@extends('layouts.front')
@section('title')
 Write a review  
@endsection
@section('content')
<br><br><br>
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if($verified_purchase->count()>0)
                    <h3>You are writing review for {{$product->name}}</h3>
                        <form action="{{url('/add-review')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$product->id}}" name="product_id">
                            <textarea class="form-control" rows="5" name="user_review" placeholder="Write Review"></textarea><br>
                            <button type="submit" class="btn btn-warning mt-3">Review</button>
                        </form>
                        
                    @else
                    <div class="alert alert-danger">
                        <h5>You are not eligible to review this product !! </h5>
                        <h6>For the trustworthiness of the reviews, only customer who purchased the product can review.</h6>
                        <a href="{{url('/')}}" class="btn btn-danger mt-3">Return to homepage</a>
                    </div>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection