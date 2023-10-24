@extends('layouts.front')

@section('title')
Welcome to e-shop
@endsection

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Featured Products</h2>
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach($feautured_products as $prod)
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('assets/uploads/products/'.$prod->image)}}" alt="Product Image">
                            <div class="card-body">
                                <h5>{{$prod->name}}</h5>
                                <span class="float-start">{{$prod->selling_price}}</span>
                                <span class="float-end"><s>{{$prod->original_price}}</s></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <br><br>
            <h2>Trending Category</h2>
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach($trending_category as $category)
                    <div class="item">
                        <a href="{{url('view-category/'.$category->slug)}}">
                            <div class="card">
                                <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="Product Image">
                                <div class="card-body">
                                    <h5>{{$category->name}}</h5>
                                    <p>{{$category->description}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>

$('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})

</script>
@endsection