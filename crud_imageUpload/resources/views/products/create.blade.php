@extends('layout')
@section('content')
    <div class="row" style="text-align: center">
        <div class="col-2"></div>
        <div class="col-8">
            <h1>Add New Product</h1>
        </div>
        <div class="col-2">
        <a href="{{ route('home')  }}"><button type="button" class="btn btn-danger"><b>Back</b></button></a>
        </div>
    </div>
    <div class="row" style="margin: 10px; padding: 10px;">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    This is some text within a card body.
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
@endsection