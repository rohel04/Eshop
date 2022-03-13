@extends('layouts.admin')

@section('title')
 Orders
@endsection
@section('content')

<div class="container my-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background-color:#F4F5F5;">
                <div class="card-header" style="background-color: #2D2F32;">
                    <h4 style="color: white">New Orders
                    <a href="{{url('orders-history')}}" style="float:right"><button class="btn btn-warning">Order History</button></a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" style="color: black">
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
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{date('d-m-y',strtotime($item->created_at)) }}</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$item->tracking_no}}</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs. {{$item->total_price}}</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$item->status == '0' ? 'Pending': 'Completed'}}</td>
                                <td>
                                    <a href="{{'admin/view-orders/'.$item->id}}"><button class="btn btn-primary">View</button></a>
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