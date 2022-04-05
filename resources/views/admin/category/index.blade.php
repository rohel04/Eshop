@extends('layouts.admin')
@section('title')
    Category
@endsection
@section('content')
<div class="card">
    <div class="card-header" >
        <H3> Category Page</H3>       
    </div>
    <div class="card-body">
        <table class="table" style="color: #232222;font-size:15px">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
           @php
            $i=0;   
           @endphp
                @foreach ($category as $item)
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;{{++$i}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                        <img src="{{asset('assets/uploads/category/'.$item->image)}}" alt="No img" width="80" height="90">
                    </td>
                    <td>
                        <a href="{{url('edit-category/'.$item->id)}}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{url('delete-category/'.$item->id)}}"  class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
               

            </tbody>

        </table>
    </div>
</div>
@endsection
    
