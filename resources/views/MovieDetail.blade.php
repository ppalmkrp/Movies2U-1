@extends('layouts.navbar')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                @foreach($movie as $m)
                <h2>{{ $m->movie_name }}</h2>
                <p><a href="">{{ $m->movie_year_on_air }}</a>-
                @foreach ($ctr as $r)
                    @if ($m->critical_rate == $r->ctr_id)
                    <a href="">{{ $r->ctr_name }}</a>
                    @endif
                @endforeach
                -{{ number_format($m->movie_time/60) }}h {{ number_format($m->movie_time%60) }}m</p>
                <h5>Movie Score</h5>
                <h6><i class="bi bi-star-fill"> </i>{{ $m->movie_score }}/10</h6>

                @endforeach
            </div>
            <div class="col-8">
                @foreach ($movie as $m )

                <video style="max-width: 700px" controls>
                    <source src="{{ asset('Materials/Movies/' . $m->movie_id . '.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                @foreach($movie as $m)
                <img src="{{ asset('Materials/Movies/' . $m->movie_id . '.png') }}" alt="Movie poster" style="max-width: 250px"/>
                @endforeach
            </div>
            <div class="col-8">
                @foreach($movie as $m)
                <br>
                @foreach ($mtype as $mt)
                    @if($m->movie_type_id == $mt->type_id)
                        <p><a href="">{{ $mt->type_name }}</a></p>
                    @endif
                @endforeach
                <h5>Movie info</h5>
                <p>{{ $m->movie_info }}</p>
                <p>Director:
                    {{-- Director --}}
                </p>
                <p>Writer:
                    {{-- Writer --}}
                </p>
                <p>Actor:
                    {{-- Actor --}}
                </p>
                @endforeach
            </div>
        </div>
    </div>
@endsection

