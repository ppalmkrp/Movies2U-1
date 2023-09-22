@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h1>{{ $movie->movie_name}}</h1>

        <h2>Movie Employees</h2>
        <ul>
            @foreach ($movie->employees as $employee)
                <li>
                    {{ $employee->emp_name }} ({{ $employee->pivot->emp_role }})
                    - {{ $employee->employeeTypes->pluck('emp_type_name')->implode(', ') }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
