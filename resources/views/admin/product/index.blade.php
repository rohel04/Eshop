@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header" >
        <H3> Products Page</H3>       
    </div>
    <div class="card-body">
        <table class="table" style="color: #232222;font-size:15px">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Selling Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
           @php
            $i=0;   
           @endphp
                @foreach ($products as $item)
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;{{++$i}}</td>
                    <td>{{$item->name}}</td>
                    <td>&nbsp;&nbsp;{{$item->category->name}}</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$item->description}}</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.{{$item->selling_price}}</td>
                    <td>
                        <img src="{{asset('assets/uploads/products/'.$item->image)}}" alt="No img" width="80" height="90">
                    </td>
                    <td>
                        <a href="{{url('edit-products/'.$item->id)}}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{url('delete-products/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
               

            </tbody>

        </table>
    </div>
</div>
@endsection
    
