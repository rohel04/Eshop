@extends('layouts.front')
@section('title')
My Profile  
@endsection
@section('content')
<br><br><br>
<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background-color:#F4F5F5;">
                <div class="card-header" style="background-color: #2D2F32;color:white;">
                    <h4>My Orders</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order Date</th>
                                <th>Tracking No</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                            <tr>
                                <td>{{date('d-m-y',strtotime($item->created_at)) }}</td>
                                <td>{{$item->tracking_no}}</td>
                                <td>{{$item->total_price}}</td>
                                <td>{{$item->status == '0' ? 'Pending': 'Completed'}}</td>
                                <td>
                                    <a href="{{'/view-orders/'.$item->id}}"><button class="btn btn-primary">View</button></a>
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