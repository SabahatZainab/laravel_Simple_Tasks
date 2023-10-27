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
    <div class="row" style="padding: 20px; margin: 20px;">
        <div class="col-2"></div>
        <div class="col-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">School Name</th>
                        <th scope="col">City</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @if(isset($schools) && !empty($schools))
                    @foreach($schools as $school)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $school->name }}</td>
                        <td>{{ $school->city }}</td>
                        <td>{{ $school->date }}</td> 
                        <td class="col-sm-4">
                        <form action="{{ route('schools.destroy', $school->id) }}" method="POST">

                        <!-- <a href="{{ route('schools.show', $school->id) }}" ><button type="button" class="btn btn-info" style="margin: 2px;">Show</button</a>
                        <a href="{{ route('schools.edit', $school->id) }}" ><button type="button" class="btn btn-primary" style="margin: 2px;">Edit</button</a> -->
                        <a class="btn btn-info" href="{{ route('schools.show', $school->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('schools.edit', $school->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </td>     
                    </tr>
                    @endforeach
                @endif
                    
                </tbody>
        </table>
        </div>
        <div class="col-2"></div>
    </div>
@endsection