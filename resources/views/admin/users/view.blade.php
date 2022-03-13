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
                    <h4 style="color: white">Users Detail
                    <a href="{{url('users')}}"><button class="btn btn-light" style="float: right">Back</button></a></h4>
                   
                </div>
                <div class="card-body" style="background-color:#EBEAEA;color:black ">
                   <div class="row">
                       <div class="col-md-4 mt-3">
                        <label for"">First Name</label>
                        <div class="p2-border">&nbsp;{{$users->name}}</div>
                       </div>
                       <div class="col-md-4 mt-3">
                        <label for"">Last Name</label>
                        <div class="p2-border">&nbsp;{{$users->lname}}</div>
                       </div>
                       <div class="col-md-4 mt-3">
                        <label for"">Email</label>
                        <div class="p2-border">&nbsp;{{$users->email}}</div>
                       </div>
                       <div class="col-md-4 mt-3">
                        <label for"">Phone</label>
                        <div class="p2-border">&nbsp;{{$users->phone}}</div>
                       </div>
                       <div class="col-md-4 mt-3">
                        <label for"">Address 1</label>
                        <div class="p2-border">&nbsp;{{$users->address1}}</div>
                       </div>
                       <div class="col-md-4 mt-3">
                        <label for"">Address</label>
                        <div class="p2-border">&nbsp;{{$users->address2}}</div>
                       </div>
                       <div class="col-md-4 mt-3">
                        <label for"">City</label>
                        <div class="p2-border">&nbsp;{{$users->city}}</div>
                       </div>
                       <div class="col-md-4 mt-3">
                        <label for"">State</label>
                        <div class="p2-border">&nbsp;{{$users->state}}</div>
                       </div>
                       <div class="col-md-4 mt-3">
                        <label for"">Country</label>
                        <div class="p2-border">&nbsp;{{$users->country}}</div>
                       </div>
                       <div class="col-md-4 mt-3">
                        <label for"">Pincode</label>
                        <div class="p2-border">&nbsp;{{$users->pincode}}</div>
                       </div>
                       
                       <div class="col-md-4 mt-3">
                        <label for"">Role</label>
                        <div class="p2-border">&nbsp;{{$users->role_as == '1' ? 'Administration':'User'}}</div>
                       </div>
                   </div>
                </div>
            </div>
           
        </div>
    </div>
</div>


@endsection