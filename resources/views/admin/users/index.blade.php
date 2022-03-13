@extends('layouts.admin')

@section('title')
 Users
@endsection
@section('content')
<div class="container my-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background-color:#F4F5F5;">
                <div class="card-header" style="background-color: #2D2F32;">
                    <h4 style="color: white">Register Users</h4>
                   
                </div>
                <div class="card-body">
                    <table class="table table-bordered" style="color: black">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$item->name.' '.$item->lname}}</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs. {{$item->email}}</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$item->phone}}</td>
                                <td>
                                    <a href="{{'admin/view-users/'.$item->id}}"><button class="btn btn-primary">View</button></a>
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>
    </div>
</div>


@endsection