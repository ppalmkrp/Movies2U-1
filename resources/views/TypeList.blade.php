@extends('layouts.navbar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <header>
                <h2>Type</h2>
            </header>
        </div>
        <div class="col-10">
            @foreach ($mtype as $mt)
            <header>
                <h2>{{ $mt->type_name }}</h2>
            </header>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <ul class="nav nav-link">
                @foreach($type as $t)
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/type/{{ $t->type_id }}">{{ $t->type_name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-10">
            <div class="row">
                @foreach ($mtype as $mt)
                @php
                    $foundMovies = false;
                @endphp
                    @foreach ($movie as $m)
                    @if($mt->type_id == $m->movie_type_id)
                    <div class="col-4">
                        <div class="card h-100 mt-3" style="width: 18rem;">
                            <a href="/moviedetail/{{ $m->movie_id }}">
                                <img src="{{ asset('Materials/Movies/' . $m->movie_id . '.png') }}" class="card-img-top" alt="Movie poster" />
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $m->movie_name }}</h5>
                                <p class="card-text">
                                    <i class="bi bi-star-fill star-icon"></i> {{ $m->movie_score }}
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
                                <a href="/moviemanagement/editForm/{{ $m->movie_id }}" class="btn btn-warning">Edit</a>
                                <a href="/moviemanagement/delete/{{ $m->movie_id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</a>
                            </div>
                        </div>
                    </div>
                        @php
                            $foundMovies = true;
                        @endphp
                    @endif
                    @endforeach
                    @if (!$foundMovies)
                    <div class="col-12 mt-3">
                        <div class="alert alert-dark" role="alert">
                            Not found movies in this type.
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
