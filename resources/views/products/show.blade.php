@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Product Description</h3>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Back to Products
                </a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center my-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $product->name }}</h5>
                </div>

                <div class="card-body">
                    {{ $product->description }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
