<!-- @extends('app.layout')
@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1>SCHOOL MANAGEMENT</h1>
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
                @dd($schools)
                @if(isset($schools) && !empty($schools))
                    <tr>
                        <td>{{ $school->sch_name }}</td>
                        <td>{{ $school->city }}</td>
                        <td>{{ $school->date }}</td>  
                    </tr>
                @endif
                    
                </tbody>
        </table>
        </div>
        <div class="col-2"></div>
    </div>
@endsection -->