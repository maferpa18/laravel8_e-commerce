@extends('layouts.front')

@section('title')
Checkout
@endsection

@section('content')
    <div class="container mt-5">
        <form action="{{url('place-order')}}" method="POST">
        @csrf
            
        <div class="row">    
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="firstname">First Name</label>
                                <input type="text" name="fname" value="{{Auth::user()->name}}" class="form-control" placeholder="Enter first name">
                            </div>
                            <div class="col-md-6">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lname" value="{{Auth::user()->lname}}"  class="form-control"  placeholder="Enter last name">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="{{Auth::user()->email}}"  class="form-control"  placeholder="Enter email">
                            </div>
                            <div class="col-md-6">
                                <label for="phonenumber" >Phone Number</label>
                                <input type="text" name="phone" value="{{Auth::user()->phone}}"  class="form-control"  placeholder="Enter phone number">
                            </div>
                            <div class="col-md-6">
                                <label for="address1" >Address 1</label>
                                <input type="text" name="address1" value="{{Auth::user()->address1}}"  class="form-control" placeholder="Enter address 1">
                            </div>
                            <div class="col-md-6">
                                <label for="address2" >Address 2</label>
                                <input type="text" name="address2" value="{{Auth::user()->address2}}"  class="form-control" placeholder="Enter address 2">
                            </div>
                            <div class="col-md-6">
                                <label for="city">City</label>
                                <input type="text" name="city" value="{{Auth::user()->city}}"  class="form-control" placeholder="Enter City">
                            </div>
                            <div class="col-md-6">
                                <label for="state">State</label>
                                <input type="text" name="state" value="{{Auth::user()->state}}"  class="form-control" placeholder="Enter State">
                            </div>
                            <div class="col-md-6">
                                <label for="country">Country</label>
                                <input type="text" name="country" value="{{Auth::user()->country}}"  class="form-control" placeholder="Enter country">
                            </div>
                            <div class="col-md-6">
                                <label for="pincode">Pin Code</label>
                                <input type="text" name="pincode" value="{{Auth::user()->pincode}}"  class="form-control" placeholder="Enter Pin Code">
                            </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        @if($cantidadItems > 0)    
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </thead>
                                <tbody>
                                        @php $total=0; @endphp
                                        @foreach($cartItems as $item)
                                        @php $total += floatval($item->Products->selling_price) *  intval($item->prod_qty); @endphp
                                        <tr>
                                            <td>{{$item->Products->name}}</td>
                                            <td>{{$item->prod_qty}}</td>
                                            <td>{{floatval($item->Products->selling_price)}}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            <span class="text-dark">Grand Total: {{floatval($total)}}</span>
                            <button class="btn btn-primary w-100">Place Order</button>  
                        @else
                            <h4 class="text-center">No products in cart</h4>
                            <a href="{{url('/home')}}" class="float-end">Back to home</a>
                        @endif             
                        
                        
                </div>
            </div>
       </form>
    </div>

@endsection