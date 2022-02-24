@extends('layouts.admin')

@section('content')
<div class="card" >
    <div class="card-header">
        <h3>Edit Product</h3>
    </div>
    <div class="card-body" >
        @if ($errors->any())
         <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
                <li style="color: aliceblue">{{ $error }}</li>
            @endforeach
        </ul>
        </div>
        @endif
        <form action="{{url('update-products/'.$products->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select"  style="padding: 2px">
                        <option value="">{{$products->category->name}}</option>
                     </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text"  name="name" value="{{$products->name}}" class="form-control"  style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" value="{{$products->slug}}" name="slug" style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-12 mb-3">
                    <label for="">Small Description</label>
                    <textarea name="small_description" rows="3" class="form-control" style="background-color: #E3E3E3;padding:5px">{{$products->small_description}} </textarea>
                </div><!--col-->
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" rows="3" class="form-control" style="background-color: #E3E3E3;padding:5px">{{$products->description}}</textarea>
                </div><!--col-->
                <div class="col-md-6 mb-3">
                    <label for="">Oiginal Price:</label>
                    <input type="number" value="{{$products->original_price}}" name="original_price" class="form-control" style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-6 mb-3">
                    <label for="">Selling Price:</label>
                    <input type="number" name="selling_price" value="{{$products->selling_price}}" class="form-control" style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" name="tax" class="form-control" value="{{$products->tax}}" style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" name="quantity" class="form-control" value="{{$products->qty}}" style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" {{$products->status=='1'? 'checked':''}} style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-6 mb-3">
                    <label for="">Trending:</label>
                    <input type="checkbox" name="trending" {{$products->trending=='1'?'checked':''}} style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" class="form-control" value="{{$products->meta_title}}" name="meta_title"  style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3"  class="form-control"  style="background-color: #E3E3E3;padding:5px"> {{$products->meta_keywords}}</textarea>
                </div><!--col-->
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control" style="background-color: #E3E3E3;padding:5px">{{$products->meta_description}}</textarea>
                </div><!--col-->
                @if($products->image)
                    <img src="{{asset('assets/uploads/products/'.$products->image)}}" alt="Category img" style="width: 70px;height:100px;padding:5px">
                @endif
                <div class="col-mid-12">
                    <input type="file" name="image"  class="form-control-file">
                </div><!--col-->
                <br><br>
                <div class="col-mid-13">
                    <button type="submit" name="submit" class="btn btn-info">Submit</button>
                </div><!--col-->
            </div><!--row-->
        </form>
    </div>
</div>
@endsection
    
