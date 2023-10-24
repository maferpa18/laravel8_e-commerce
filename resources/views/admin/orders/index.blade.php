@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Orders Page</h4>
    </div>

    <div class="card-header">
        <h4 class="text-white">
        <a href="{{url('order-history')}}" class="btn btn-success float-end">Order History</a>
        </h4>

    </div>

    <div class="card-body">
    
        <table class="table table-bordered table-striped">
        
        <thead>
            <tr>
                <th>Order Date</th>
                <th>Tracking number</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $item)
                <tr>    
                    <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                    <td>{{$item->tracking_no}}</td>
                    <td>{{$item->total_price}}</td>
                    <td>{{$item->status=='0'?'pending':'completed'}}</td>
                    <td>
                        <a href="{{ url('admin/view-order/'.$item->id)}}" class="btn btn-primary">View</a>
                    </td>
                
                </tr>
            @endforeach
        </tbody>
        
        
        
        </table>
    
    
    
    
    </div>

</div>

</div>

@endsection