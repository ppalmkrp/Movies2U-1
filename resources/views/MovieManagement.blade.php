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

    </div>
    <div class="row">
        @foreach ($movie as $m)
        <div class="col-3">
                <div class="card-img-top mt-5" style="width: 18rem;">
                    <a href="/moviedetail/{{ $m->movie_id }}">
                    <img src="{{ asset('Materials/Movies/' . $m->movie_id . '.png') }}" alt="Movie poster" width="250" height="370"/>
                    </a>
                    <div class="card-body">
                      <h6 class="card-title">{{ $m->movie_name }}</h6>
                      <p class="card-text"><i class="bi bi-star-fill star-icon"> </i>{{ $m->movie_score }}</p>
                      <p><a href="">{{ $m->movie_year_on_air }}</a>-
                        @foreach ($ctr as $r)
                            @if ($m->critical_rate == $r->ctr_id)
                            <a href="">{{ $r->ctr_name }}</a>
                            @endif
                        @endforeach
                        -{{ number_format($m->movie_time/60) }}h {{ number_format($m->movie_time%60) }}m</p>
                    <a href="/moviemanagement/editForm/{{ $m->movie_id }}"><button type="button" class="btn btn-warning">Edit</button></a>
                    <a href="/moviemanagement/delete/{{ $m->movie_id }}"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</button></a>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
