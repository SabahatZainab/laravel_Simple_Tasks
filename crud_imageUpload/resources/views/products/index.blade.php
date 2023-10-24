@extends('layout')
@section('content')
    <div class="row" style="text-align: center;">
        <div class="col">
            <h1>Product Detail...</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-9"></div>
        <div class="col-3">
            <a href="{{ route('create')  }}"><button type="button" class="btn btn-info"><b>Create New Product</b></button></a>
        </div>
    </div>
@endsection