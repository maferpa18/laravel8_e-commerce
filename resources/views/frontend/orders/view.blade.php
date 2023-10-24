@extends('layouts.front')

@section('title')
View Order
@endsection

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order View</h4>
                    <a href="{{url('my-orders')}}" class="btn btn-warning text-white float-end">Back</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Shipping details</h4>
                            <label for="">First Name</label>
                            <div class="border p-2">{{ $orders->fname}}</div>
                            <label for="">Last Name</label>
                            <div class="border p-2">{{ $orders->lname}}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{ $orders->email}}</div>
                            <label for="">Contact Number</label>
                            <div class="border p-2">{{ $orders->phone}}</div>
                            <label for="">Shipping Address</label>
                            <div class="border p-2">
                                {{ $orders->address1}},
                                {{ $orders->address2}},
                                {{ $orders->city}},
                                {{ $orders->state}},
                                {{ $orders->country}}
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border p-2">{{ $orders->pincode}}</div>
                        </div>
                        <div class="col-md-6">

                            <h4>Order Details</h4>
                            <table class="table table-bordered">
                    
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders->OrderItems as $item)
                                    <tr>
                                        <td>{{$item->Products->name}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>
                                            <img src="{{asset('assets/uploads/products/'.$item->Products->image)}}" class="cate_image" alt="Product Image">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>

                    </div>
                    
                </div>
                <div class="card-footer">
                    @php $grand_total = $orders->total_price; @endphp
                    <h4>Grand Total: <span class="float-end">{{number_format($grand_total,2)}}</span></h4>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
