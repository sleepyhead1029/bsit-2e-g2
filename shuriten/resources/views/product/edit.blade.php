@extends('app')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form method="POST" action="{{ route('product.update',$product) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label> Product Name <span class="text-danger"></span></label>
                <input type="text" class="form-control" name="product_name" value="{{ old('product_name',
                    $product->product_name)}}"/>    
            </div>
            <div class="mb-3">
                <label> Category <span class="text-danger"></span></label>
                <input type="text" class="form-control" name="category" value="{{ old('category',
                    $product->category)}}"/>
            </div>
            <div class="mb-3">
                <label> Unit <span class="text-danger"></span></label>
                <input type="number" class="form-control" name="unit" value="{{ old('unit'),
                    $product->unit}}"/>
            </div>
            <div class="mb-3">
                <label> In Stock <span class="text-danger"></span></label>
                <input type="number" class="form-control" name="in_stock" value="{{ old('in_stock'),
                    $product->in_stock}}"/>
            </div>
            <div class="mb-3">
                <label> On Order <span class="text-danger"></span></label>
                <input type="number" class="form-control" name="on_order" value="{{ old('on_order'),
                    $product->on_order}}"/>
            </div>
            <div class="mb-3">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="{{ route('product.index') }}">Back</a>
            </div>
    </div>
</div>
@endsection