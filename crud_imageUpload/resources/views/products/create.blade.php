@extends('layout')
@section('content')
    <div class="row" style="text-align: center">
        <div class="col-2"></div>
        <div class="col-8">
            <h1>Add New Product</h1>
        </div>
        <div class="col-2">
        <a href="{{ route('products.index')  }}"><button type="button" class="btn btn-primary"><b>Back</b></button></a>
        </div>
    </div>
    
    <div class="row" style="margin: 10px; padding: 10px;">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div>
            @endif
                <div class="card-body">
                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a Product Discription here" id="detail" name="detail"></textarea>
                        <label for="detail">Product Details</label>
                    </div>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image of Product:</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
@endsection