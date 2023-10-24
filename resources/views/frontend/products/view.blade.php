@extends('layouts.front')

@section('title')
{{$products->name}}
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border_top">
    <div class="container">
        <h6 class="mb-0">Collections / {{$products->Category->name}} / {{$products->name}} </h6>
    </div>
</div>

<div class="container">

    <div class="card shadow product_data">
        <div class="row">
            <div class="col-md-4 border-right">
                <img src="{{asset('assets/uploads/products/'.$products->image)}}" class="cate_img">
            </div>
            <div class="col-md-8">
                <h2 class="mb-0">
                    {{$products->name}}
                    @if($products->trending=='1')
                        <label style="font-size:16px;" class="float-end badge bg-danger trending_img">
                            Trending
                        </label>
                    @endif
                </h2>   
            <hr>
            <label class="mb-3">Original price: <s> $ {{$products->original_price}}</s></label>
            <label class="fw-bold">Selling price: $ {{$products->selling_price}}</label>
            
            <p class="mt-3">
                {{$products->small_description}}
            </p>
            <hr>

            @if(intval($products->qty) > 0)
                <label class="badge bg-success">In stock</label> 
            @else
                <label class="badge bg-danger">Out of stock</label>
            @endif
            
            </div>
    
    
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
            </div>
            <div class="col-md-2">
                <input type="hidden" value="{{$products->id}}" class="prod_id"/>
                <label for="quantity">Quantity</label>
                <div class="input-group text-center mb-3">
                    <button class="input-group-text decrement_btn">-</button>
                    <input type="text" id="quantity" name="quantity" value="1" class="form-control text-center qty_input"/>
                    <button class="input-group-text increment_btn"">+</button>
                </div>
            </div>    
            <div class="col-md-6">
                <br/>
                <button type="button" class="btn btn-success me-3 float-start">Add to wishlist <i class="fa fa-heart"></i></button>
                @if(intval($products->qty) > 0)
                    <button type="button" class="addtocart btn btn-primary me-3 float-start">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                @endif
            </div>
        
        </div>
    </div>

</div>


@endsection

@section('scripts')
<script>

    $(document).ready(function(e){

        $('.increment_btn').click(function (e){
            e.preventDefault();

            var inc_value = $('#quantity').val();
            var value = parseInt(inc_value,10);
            value = isNaN(value) ? 0 : value;
            
            if (value < 10)
            {
                value++;
                $('#quantity').val(value);
            }
        });

        $('.decrement_btn').click(function (e){
            e.preventDefault();

            var dec_value = $('#quantity').val();
            var value = parseInt(dec_value,10);
            value = isNaN(value) ? 0 : value;
            
            if (value > 1)
            {
                value--;
                $('#quantity').val(value);
            }
        });


        $('.addtocart').click(function (e){
            e.preventDefault();

            var product_id=$(this).closest('.product_data').find('.prod_id').val();
            var product_qty=$(this).closest('.product_data').find('#quantity').val();
            

            $.ajaxSetup({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method:"POST",
                url:"/add_to_cart",
                data:{
                    'product_id':product_id,
                    'product_qty':product_qty
                },
                success: function(response){
                    swal(response.status);
                }
            });


        });




    });



</script>
@endsection

