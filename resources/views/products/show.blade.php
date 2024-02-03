@extends('products.layout')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <a href="{{ route('products.index') }}" class="btn btn-dark" style="margin: 3px">All Products</a>
        </div>
    </div>

    <div class="card p-5">
        <div class="mb-3">
           <h3> Name: {{ $product->name }} </h3>
            
        </div>
        <div class="mb-3"> 
            <h4>Description</h4>
            <p id="productDescription">{{ $product->description }}</p>
        </div>
        <div class="mb-3">
           <h4>Price</h4>
            <p id="productPrice">${{ $product->price }}</p>
        </div>
        <div class="mb-3">
           
            <img src="/images/{{ $product->image }}" alt="{{ $product->name }}" width="200px" class="img-fluid">
        </div>
    </div>
</div>

@endsection
