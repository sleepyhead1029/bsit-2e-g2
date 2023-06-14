@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <form class="row row-cols-auto g-1">
            <div class="col">
                <input class="form-control" type="text" name="q" value="{{ $q }}" placeholder="Search here..." />
            </div>
            <div class="col">
                <button class="btn btn-success">Refresh</button>
            </div>
            <div class="col">
                <a href="{{ route('product.create') }}" class="btn btn-primary">Add</a>
            </div>
        </form>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-striped table-hover m-0">
            <th>#</th>
            <td>Product Name</td>
            <td>Category</td>
            <td>Unit</td>
            <td>Stocks</td>
            <td>Orders</td>
            <td>Image</td>
            <td>Action</td>
            <?php $no = 1?>
            @foreach($products as $product)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->unit}}</td>
                <td>{{$product->in_stock}}</td>
                <td>{{$product->on_order}}</td>
                <td style="text-align: center;"><img src="image/{{ $product->image }}" style="width: 130px; height: 50px;"></td>
                <td>
                    <a class="btn btn-sm btn-warning" href="{{ route('product.edit',$product) }}"> Edit </a>
                    <form method="POST" action="{{ route('product.destroy',$product) }}" style="display: inline;"
                        onsubmit="return confirm('Delete?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
