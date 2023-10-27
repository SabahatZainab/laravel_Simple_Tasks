@extends('layout')
@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <h1>Showing Product Details...</h1>
        </div>
        <div class="col-3">
        <a href="{{ route('products.index')  }}"><button type="button" class="btn btn-primary"><b>Back</b></button></a> 
        </div>
    </div>
    <div class="row" style="margin: 20px; padding: 20px;">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card" style="width: 18rem;">
                <img src="/images/{{ $product->image }}" class="card-img-top" alt="{{ $product->name}}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->detail }}</p>
                    <a href="#" class="btn btn-primary">Add To Card</a>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
@endsection