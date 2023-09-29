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
                -{{ floor($m->movie_time/60) }}h {{ floor($m->movie_time%60) }}m</p>
                <h5>Movie Score</h5>
                <h6><i class="bi bi-star-fill text-warning"> </i>{{ $m->movie_score }}/10</h6>
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
                        <p><a href="/type/{{ $mt->type_id }}">{{ $mt->type_name }}</a></p>
                    @endif
                @endforeach
                <h5>Movie info</h5>
                <p>{{ $m->movie_info }}</p>
                <p>
                    Director:
                    @foreach ($detail as $d)
                    @foreach ($emp as $e)
                        @foreach ($empt as $et)
                            @if($d->movie_id == $m->movie_id && $d->emp_id == $e->emp_id && $d->emp_type_id == $et->emp_type_id)
                                @if($et->emp_type_name == 'Director')
                                    {{ $e->emp_name }}
                                @endif
                            @endif
                        @endforeach
                     @endforeach
                     @endforeach
                </p>
                <p>
                    Writer:
                    @foreach ($detail as $d)
                    @foreach ($emp as $e)
                        @foreach ($empt as $et)
                            @if($d->movie_id == $m->movie_id && $d->emp_id == $e->emp_id && $d->emp_type_id == $et->emp_type_id)
                                @if($et->emp_type_name == 'Writer')
                                    {{ $e->emp_name }}
                                @endif
                            @endif
                        @endforeach
                     @endforeach
                     @endforeach
                </p>
                <p>
                    Actor:
                    @foreach ($detail as $d)
                    @foreach ($emp as $e)
                        @foreach ($empt as $et)
                            @if($d->movie_id == $m->movie_id && $d->emp_id == $e->emp_id && $d->emp_type_id == $et->emp_type_id)
                                @if($et->emp_type_name == 'Actor')
                                    {{ $e->emp_name }}
                                @endif
                            @endif
                        @endforeach
                     @endforeach
                     @endforeach
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-8">
                <h5>Review</h5>
                @guest
                <form method="post" action="/review" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3 mt-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Movie:</span>
                            <input name="movie" value="{{ $m->movie_id }}" class="form-control" aria-describedby="basic-addon1" readonly disabled>
                          </div>
                        <div class="input-group">
                            <span class="input-group-text">Review:</span>
                            <textarea name="comment" class="form-control" placeholder="comment!" aria-label="With textarea" required disabled></textarea>
                        </div>
                        <div class="input-group mt-3">
                            <input class="btn-outline-light" type="submit" value="review">
                        </div>
                    </div>
                </form>
                @else
                <form method="post" action="/review" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3 mt-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Movie:</span>
                            <input name="movie" value="{{ $m->movie_id }}" type="text" class="form-control hide" placeholder="{{ $m->movie_name }}" aria-label="Username" aria-describedby="basic-addon1" readonly>
                          </div>
                        <div class="input-group">
                            <span class="input-group-text">{{ Auth::user()->name }}:</span>
                            <textarea name="comment" class="form-control" placeholder="comment!" aria-label="With textarea" required></textarea>
                        </div>
                        <div class="input-group mt-3">
                            <input class="btn-outline-light" type="submit" value="review">
                        </div>
                    </div>
                </form>
                @endguest
                <hr class="mt-5">
                <h5>User review!</h5>
                @foreach ($reviews as $rv)
                @foreach ($user as $u)
                @guest
                    @if($rv->user_id == $u->id && $rv->movie_id == $m->movie_id)
                    <div class="card mt-3">
                        <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{{ $rv->review_info }}</p>
                            <footer class="blockquote-footer">{{ $u->name }}</cite></footer>
                        </blockquote>
                        </div>
                    </div>
                    @endif
                @else
                    @if($rv->user_id == $u->id && $rv->movie_id == $m->movie_id && Auth::user()->roles == 1)
                    <div class="card mt-3">
                        <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{{ $rv->review_info }}</p>
                            <footer class="blockquote-footer">{{ $u->name }}     <cite>@if(Auth::user()->id == $rv->user_id)
                                <a href="/delcomment/{{ $rv->id }}"><button type="button" class="btn btn-outline-danger">Delete</button></a></cite>
                            @endif </footer>
                        </blockquote>
                        </div>
                    </div>
                    @elseif(Auth::user()->roles == 2 && $rv->user_id == $u->id && $rv->movie_id == $m->movie_id)
                    <div class="card mt-3">
                        <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{{ $rv->review_info }}</p>
                            <footer class="blockquote-footer">{{ $u->name }}     <cite><a href="/delcomment/{{ $rv->id }}"><button type="button" class="btn btn-outline-danger">Delete</button></a></cite></footer>
                        </blockquote>
                        </div>
                    </div>
                    @endif
                @endguest
                @endforeach
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection

