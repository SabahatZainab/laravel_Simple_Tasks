@extends('layout')
@section('content')
    <div class="row">
        <div class="col">
            <h1 style="padding: 5px; margin: 5px; text-align: center; color: green;">PRODUCTS LISTING</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{$message}}</p>
                </div>
            @endif
        </div>
    </div>
    <div class="row"  style="text-align: right; margin: 10px; padding: 10px;">
        <div class="col-6"></div>
        <div class="col-3"></div>
        <div class="col-3">
            <a href="{{route('create')}}"><button type="button" class="btn btn-success"><b>Create New Product</b></button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Detail</th>
                    <th scope="col" style="text-align: center;" >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <th>{{++$i}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->detail}}</td>
                        <td style="text-align: center;">

                        <form action="{{route('delete',$product->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{route('edit',$product->id)}}"><button type="button" class="btn btn-outline-success"><b>Edit</b></button></a>
                            <a href="{{route('show',$product->id)}}"><button type="button" class="btn btn-outline-info"><b>Show</b></button></a>
                            
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
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
<script type="text/javascript">
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
    
});

</script>
    