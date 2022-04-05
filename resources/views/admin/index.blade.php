@extends('layouts.admin')

@section('content')
<style>
    .card span{
        padding:15px 70px 15px 40px;
        
        color:white
    }
</style>
<div class="card">
    <div class="card-body" style="height: 400px">
        <H3> Welcome to dashboard</H3>
        <div class="row mt-6">
            <div class="col-md-3">
                <span style="background-color:#74D2F6">Total products:{{$total_product}}</span>
            </div>
            <div class="col-md-3">                
                <span style="background-color:#89999F">Total Category:{{$total_category}}</span>
            </div>
            <div class="col-md-3">
                <span style="background-color: #DBE32C;color:black">Total Users:{{$total_user}}</span>
            </div>
        </div>          
        <div class="row mt-6" >
            <div class="col-md-3">
                <span style="background-color: #57A0E0">Total Orders:{{$total_order}}</span>
            </div>
            <div class="col-md-3">
                <span style="background-color: #72BD62">Complete Orders:{{$total_order_complete}}</span>
            </div>
            <div class="col-md-3">
                <span style="background-color: #E07435">Pending Orders:{{$total_order_pending}}</span>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
    
