@extends('layout')
@section('content')
    <div class="row" style="text-align: center; padding: 10px; margin: 10px;">
        <h1>Showing Product Details....</h1>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6" style="text-align: center; padding: 10px; margin: 10px;">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Status</th>
                            <th style="text-align: center; padding: 10px; margin: 10px;">
                                <a href="{{route('home')}}"><button type="button" class="btn btn-danger"><b>Back</b></button></a>
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>{{ $product->name}}</td>
                            <td>{{$product->detail}}</td>
                            <td>Available</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
@endsection