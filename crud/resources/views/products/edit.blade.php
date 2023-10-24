@extends('layout')
@section('content')
    <div class="row" style="text-align: center; padding: 10px; margin: 10px;">
        <h1>Let's Update Product....</h1>
    </div>
    <div class="row" style="text-align: right; padding: 10px; margin: 10px;">
        <a href="{{route('home')}}"><button type="button" class="btn btn-danger"><b>BACK</b></button></a>
    </div>
    <div class="row" >
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action = "{{route('update',$product->id)}}" method="post">
                        @method('PUT')    
                        @csrf
                        <div class="mb-3">
                            <strong><label for="name" class="form-label">Name:</label></strong>
                            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                        </div>
                        <div class="mb-3">
                            <strong><label for="detail" class="form-label">Detail:</label></strong>
                            <textarea class="form-control" style="height: 150px;" name="detail" id="detail">{{$product->detail}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
@endsection