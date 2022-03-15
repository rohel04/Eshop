@extends('layouts.admin')
@section('title')
Add Products
@endsection
@section('content')
<div class="card" >
    <div class="card-header">
        <h3>Add Product</h3>
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
        <form action="{{url('insert-products')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select" name="cate_id" style="padding: 2px">
                        <option value="">Select a Category:</option>
                        @foreach($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        
                      </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text"  name="name" class="form-control" value="{{old('name')}}" style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{old('slug')}}" style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-12 mb-3">
                    <label for="">Small Description</label>
                    <textarea maxlength="500" name="small_description" rows="3" class="form-control" style="background-color: #E3E3E3;padding:5px">{{old('description')}}</textarea>
                </div><!--col-->
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea maxlength="1000" name="description" rows="3" class="form-control" style="background-color: #E3E3E3;padding:5px">{{old('description')}}</textarea>
                </div><!--col-->
                <div class="col-md-6 mb-3">
                    <label for="">Oiginal Price:</label>
                    <input type="number" name="original_price" class="form-control" style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-6 mb-3">
                    <label for="">Selling Price:</label>
                    <input type="number" name="selling_price" class="form-control" style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" name="tax" class="form-control" style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" name="quantity" class="form-control" style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status"  style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-6 mb-3">
                    <label for="">Trending:</label>
                    <input type="checkbox" name="trending"  style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" value="{{old('meta_title')}}" style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control"  style="background-color: #E3E3E3;padding:5px"> {{old('meta_keywords')}}</textarea>
                </div><!--col-->
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control" style="background-color: #E3E3E3;padding:5px">{{old('meta_description')}}</textarea>
                </div><!--col-->
                <div class="col-mid-12">
                    <input type="file" name="image" value="{{old('image')}}" class="form-control-file">
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
    
