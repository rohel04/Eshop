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
                    
                    <h3>You are editing your review for {{$review->product->name}}</h3>
                        <form action="{{url('/update-review')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{$review->id}}" name="review_id">
                            <textarea class="form-control" rows="5" name="user_review"> {{$review->user_review}}</textarea><br>
                            <button type="submit" class="btn btn-warning mt-3">Save Change</button>
                        </form>
                        
                   
                 
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection