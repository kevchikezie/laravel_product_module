@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center">
                <h3>List of Products</h3><h3>Product Description</h3>
                <a href="{{ route('products.create') }}" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-arrow-left"></i> Create Product
                </a>
            </div>
        </div>
    </div>

    @foreach ($products as $product)
        <div class="row justify-content-center my-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $product->name }}</h5>
                    </div>

                    <div class="card-body">
                        <a href="/products/{{ $product->id }}" class="btn btn-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center mt-3">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
