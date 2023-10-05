<script>
    function confirmDelete(movie_id) {
        if (confirm('Are you sure you want to delete this movie?')) {
            window.location.href = '/moviemanagement/delete/' + movie_id;
        }
    }
</script>
@extends('layouts.navbar')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/moviemanagement">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/moviemanagementEmp">Employees</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <header>Movies Management</header>
            <nav class="navbar z-1 navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-text" href="/moviemanagement"><i class="bi bi-arrow-counterclockwise"> </i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Filter
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    @foreach ($mtype as $mt)
                                        <li><a class="dropdown-item"
                                                href="/moviemanagement/type/{{ $mt->type_id }}">{{ $mt->type_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <a class="navbar-text" href="/moviemanagement/forminsertmovie"><button type="button"
                            class="btn btn-outline-secondary"><i class="bi bi-upload"> </i>Add Movie</button></a>
                </div>
            </nav>
        </div>

        <div class="row mt-2">
            @foreach ($movie as $m)
                <div class="col-3">
                    <div class="card mt-4" style="width: auto">
                        <a href="/moviedetail/{{ $m->movie_id }}">
                            <img class="card-img-top" src="{{ asset('Materials/Movies/' . $m->movie_id . '.png') }}"
                                alt="Movie poster" width="300px" height="450px" />
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $m->movie_name }}</h5>
                            <p class="card-text">
                                <i class="bi bi-star-fill text-warning"> </i> {{ $m->movie_score }}
                            </p>
                            <p>
                                <a href="">{{ $m->movie_year_on_air }}</a> -
                                @foreach ($ctr as $r)
                                    @if ($m->critical_rate == $r->ctr_id)
                                        <a href="">{{ $r->ctr_name }}</a>
                                    @endif
                                @endforeach
                                - {{ number_format($m->movie_time / 60, 1) }}h
                            </p>
                        </div>
                        <div class="card-body">
                            <a href="/moviemanagement/editForm/{{ $m->movie_id }}" class="btn btn-warning"
                                style="width: 48%;">Edit</a>
                            <a href="/moviemanagement/delete/{{ $m->movie_id }}" class="btn btn-danger"
                                style="width: 48%;"
                                onclick="return confirm('Are you sure you want to delete this movie?')">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
