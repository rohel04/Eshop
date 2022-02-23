@extends('layouts.admin')

@section('content')
<div class="card" >
    <div class="card-header">
        <h3>Add Category</h3>
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
       
        <form action="{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text"  name="name" class="form-control" value="{{$category->name}}" style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{$category->slug}}" style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" rows="3" class="form-control" style="background-color: #E3E3E3;padding:5px">{{$category->description}}</textarea>
                </div><!--col-->
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" {{$category->status=='1'?'checked':''}} style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" name="popular" {{$category->popular=='1'? 'checked':''}} style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}" style="background-color: #E3E3E3;padding:5px">
                </div><!--col-->
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control"  style="background-color: #E3E3E3;padding:5px"> {{$category->meta_keywords}}</textarea>
                </div><!--col-->
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control" style="background-color: #E3E3E3;padding:5px">{{$category->meta_descrip}}</textarea>
                </div><!--col-->
                @if($category->image)
                <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="category image" style="width: 150px;height:150px;margin-bottom: 2px">
                @endif
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
    
