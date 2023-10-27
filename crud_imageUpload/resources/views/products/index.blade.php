@extends('layout')
@section('content')
    <div class="row" style="text-align: center;">
        <div class="col">
            <h1>Product Details...</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-9"></div>
        <div class="col-3">
            <a href="{{ route('products.create')  }}"><button type="button" class="btn btn-info"><b>Create New Product</b></button></a>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <table class="table" style="padding: 20px; margin: 20px;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                
                    <tr>
                    <th scope="row">{{++$i}} </th>
                    <td><img src="/images/{{ $product->image }}" width="100px"></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->detail}}</td>
                    <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        <a href="{{ route('products.show',$product->id)  }}"><button type="button" class="btn btn-info"><b>View</b></button></a>
                        <a href="{{ route('products.edit',$product->id) }}"><button type="button" class="btn btn-primary"><b>Edit</b></button></a>
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>   
                    </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-2"></div>
    </div>
@endsection