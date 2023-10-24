@extends('layouts.front')

@section('title')
My Cart
@endsection

@section('content')


<div class="py-3 mb-4 shadow-sm bg-warning border_top">
    <div class="container">
        <h6 class="mb-0">
                Home / Cart
        </h6>
    </div>
</div>

<div class="container my-5">

    @php $total=0; @endphp

    <div class="card shadow">
        @if(intval($cartItems->count()) > 0)
            <div class="card-body">
                @foreach ($cartItems as $item)
                    <div class="row product_data">
                        <div class="col-md-2">
                            <img src="{{asset('assets/uploads/products/'.$item->Products->image)}}" height="70px" width="70px">
                        </div>
                        <div class="col-md-5">
                            <h3>{{$item->Products->name}}</h3>
                        </div>
                        <div class="col-md-3">
                        @if(intval($item->Products->qty) >= intval($item->prod_qty))    
                            <input type="hidden" value="{{$item->prod_id}}" class="prod_id"/>
                            <label for="quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement_btn changeQuantity">-</button>
                                <input type="text" name="quantity" value="{{$item->prod_qty}}" class="form-control text-center qty_input"/>
                                <button class="input-group-text increment_btn changeQuantity">+</button>
                            </div>
                            @php $total += floatval($item->Products->selling_price) * intval($item->prod_qty); @endphp
                        @else
                            <h3 class="text-danger text-center">Out of stock</h3>
                        @endif
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger delete_cart_item"><i class="fa fa-trash"></i>Remove</button>
                        </div>
                    </div>
                    
                @endforeach
            </div>
            <div class="card-footer">
                <h6>Total price: {{$total}}
                <a href="{{url('checkout')}}" class="btn btn-outline-success float-end">Proceed to checkout</a>
                </h6>
            </div>
        @else
            <div class="card-body text-center">
                <h2>Your <i class="fa fa-shopping-cart"></i>Cart is empty</h2>
                <a href="{{url('category')}}" class="btn btn-outline-primary float-end">Continue Shopping</a>
            </div>
        @endif

    </div>
</div>




@endsection

@section('scripts')
<script>

    $(document).ready(function(e){

        $('.increment_btn').click(function (e){
            e.preventDefault();

            //var inc_value = $('.qty_input').val();
            var inc_value=$(this).closest('.product_data').find('.qty_input').val();
            var value = parseInt(inc_value,10);
            value = isNaN(value) ? 0 : value;
            
            if (value < 10)
            {
                value++;
                //$('.qty_input').val(value);
                $(this).closest('.product_data').find('.qty_input').val(value);
            }
        });

        $('.decrement_btn').click(function (e){
            e.preventDefault();

            //var dec_value = $('.qty_input').val();
            var dec_value=$(this).closest('.product_data').find('.qty_input').val();
            
            var value = parseInt(dec_value,10);
            value = isNaN(value) ? 0 : value;
            
            if (value > 1)
            {
                value--;
                //$('.qty_input').val(value);
                $(this).closest('.product_data').find('.qty_input').val(value);
            }
        });
        
        $('.changeQuantity').click(function (e){
            e.preventDefault();

            var prod_id=$(this).closest('.product_data').find('.prod_id').val();
            var qty=$(this).closest('.product_data').find('.qty_input').val();

            data = {
                'prod_id': prod_id,
                'prod_qty': qty,
            }

            $.ajaxSetup({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method:"POST",
                url:"update_cart",
                data:data,
                success: function(response){
                    window.location.reload();
                }
            });


        });



        $('.delete_cart_item').click(function (e){
            e.preventDefault();

            var prod_id=$(this).closest('.product_data').find('.prod_id').val();

            $.ajaxSetup({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method:"POST",
                url:"delete_cart_item",
                data:{
                    'prod_id':prod_id,
                },
                success: function(response){
                    swal("",response.status,"success");
                    window.location.reload();
                }
            });



        });

    });



</script>
@endsection

