@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Users details</h4>
                        <a href="{{url('users')}}" class="btn btn-primary float-end">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Role</h5> 
                                <div class="border mt-4">
                                    {{$users->role_as == '0'?'USER':'ADMINISTRATOR'}}
                                </div>
                            </div>
                            <div class="col-md-4">    
                                <h5>First Name</h5> 
                                <div class="border mt-4">
                                    {{$users->name}}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h5>Last Name</h5>
                                <div class="border mt-4">
                                    {{$users->lname}}
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <h5>Email</h5>
                                <div class="border mt-4">
                                    {{$users->email}}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h5>Phone</h5>
                                <div class="border mt-4">
                                    {{$users->phone}}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h5>Address1</h5>
                                <div class="border mt-4">
                                    {{$users->address1}}
                                </div>
                            </div>
                                
                            <div class="col-md-4">
                                <h5>Address2</h5>
                                <div class="border mt-4">
                                    {{$users->address2}}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h5>City</h5>
                                <div class="border mt-4">
                                    {{$users->city}}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h5>State</h5>
                                <div class="border mt-4">
                                    {{$users->state}}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h5>Country</h5>
                                <div class="border mt-4">
                                    {{$users->country}}
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <h5>Pin Code</h5>
                                <div class="border mt-4">
                                    {{$users->pincode}}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection