@extends('layouts.navbar')
@section('content')
<div class="row">
    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/moviemanagement">Movies</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/moviemanagementEmp">Employees</a>
        </li>
      </ul>
</div>
<div class="row">
    <header>Employees Management</header>
    <nav class="navbar z-1 navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-text" href="/moviemanagementEmp"><i class="bi bi-arrow-counterclockwise"> </i></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                @foreach ($movies as $m)
                <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $m->movie_name }}
                  </button>
                @endforeach
                <ul class="dropdown-menu dropdown-menu-dark">
                    @foreach($allmovie as $am)
                    <li><a class="dropdown-item" href="/moviemanagementEmp/movie/{{ $am->movie_id }}">{{ $am->movie_name }}</a></li>
                    @endforeach
                </ul>
              </li>
            </ul>
          </div>
          <a class="navbar-text" href="/moviemanagementEmp/forminsertEmp"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-upload"> </i>Add Employee</button></a>
        </div>
      </nav>
      @foreach ($movies as $m)
      <table class="table table-hover mt-3">
        <thead>
          <tr>
            <th scope="col">EmpID</th>
            <th scope="col">Name</th>
            <th scope="col">Performance</th>
            <th scope="col">Role</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($detail as $d)
            @php
            $foundEmp = false;
            @endphp
            @foreach($emp as $e)
            @foreach ($empt as $et)
            @if($d->movie_id == $m->movie_id && $d->emp_id == $e->emp_id && $d->emp_type_id == $et->emp_type_id)
            <tr>
                <th scope="row">{{ $e->emp_id }}</th>
                <td>{{ $e -> emp_name }}</td>
                <td>{{ $m->movie_name }}</td>
                <td>{{ $et->emp_type_name }}</td>
                <td><a href="/moviemanagementEmp/editEmpForm/{{ $e->emp_id }}"><button type="button" class="btn btn-warning">Edit</button></a></td>
                <td>
                    <a href="/moviemanagementEmp/deleteEmp/{{ $e->emp_id }}" onclick="return confirm('คุณแน่ใจที่ต้องการลบพนักงานคนนี้?')">
                        <button type="button" class="btn btn-danger">Delete</button>
                    </a>
                </td>
                </tr>
            @php
            $foundEmp = true;
            @endphp
            @endif
            @endforeach
            @endforeach
            @if (!$foundEmp)
        <div class="col-12 mt-3">
            <div class="alert alert-dark" role="alert">
                Not found employee in this movie.
            </div>
        </div>
        @endif
            @endforeach
        </tbody>
      </table>
      @endforeach
</div>

@endsection
