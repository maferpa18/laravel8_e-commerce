@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Product</h4>
    </div>

    <div class="card-body">
        
        <form action="{{url('update-product/'.$products->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-md-12 mb-3">
                <select class="form-select" name="cate_id">
                    <option value="">{{$products->Category->name}}</option>
                </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value={{$products->name}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug" value={{$products->slug}}>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Small Description</label>
                    <input type="textarea" class="form-control" rows="3" name="small_description" value={{$products->small_description}}>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <input type="textarea" class="form-control" rows="3" name="description" value={{$products->description}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Original Price</label>
                    <input type="number" class="form-control" name="original_price" value={{$products->original_price}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input type="number" class="form-control" name="selling_price" value={{$products->selling_price}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" name="qty" value={{$products->qty}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" class="form-control" name="tax" value={{$products->tax}}>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" {{$products->status == "1" ? 'checked':''}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" name="trending" {{$products->trending == "1" ? 'checked':''}}>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" value={{$products->meta_title}}>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <input type="text" class="form-control" name="meta_keywords" value={{$products->meta_keywords}}>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <input type="text" class="form-control" name="meta_description" value={{$products->meta_description}}>
                </div>
                <div class="col-md-12 mb-3">
                    @if($products->image)
                        <img src="{{asset('assets/uploads/products/'.$products->image)}}" class="cate_image2" alt="">
                    @endif
                </div>
                
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>


            </div>
        </form> 
    
    
    </div>

</div>

</div>

@endsection