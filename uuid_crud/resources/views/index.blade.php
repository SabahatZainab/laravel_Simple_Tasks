@extends('app.layout')
@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1>SCHOOL MANAGEMENT</h1>
        </div>
        <div class="col-2">
            <a href="{{ route('schools.create') }}"><button type="button" class="btn btn-primary">Create</button></a>
        </div>
    </div>
@endsection