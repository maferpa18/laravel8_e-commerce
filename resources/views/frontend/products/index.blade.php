@extends('layouts.front')

@section('title')
$category->name
@endsection

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <h2>{{$category->name}}</h2>
                <div class="row">
                        @foreach($products as $prod)
                            <div class="col-md-3 mb-3">
                                <a href="{{url('category/'.$category->slug.'/'.$prod->slug)}}">
                                    <div class="card">
                                        <img src="{{asset('assets/uploads/products/'.$prod->image)}}" alt="Product Image">
                                        
                                        <div class="card-body">
                                            <h5>{{$prod->name}}</h5>
                                            <span class="float-start">{{$prod->selling_price}}</span>
                                            <span class="float-end"><s>{{$prod->original_price}}</s></span>
                                            
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                </div>    
            </div>
        </div>
    </div>

</div>
@endsection
