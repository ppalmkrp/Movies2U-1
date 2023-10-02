@extends('layouts.navbar')
@section('content')
  <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide mt-5">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button> <!-- สไลด์ที่ 1 -->
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button> <!-- สไลด์ที่ 2 -->
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> <!-- สไลด์ที่ 3 -->
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button> <!-- สไลด์ที่ 4 -->
            </div>
            <div class="carousel-inner">
                <!-- รูปที่ 1 -->
                <div class="carousel-item active">
                    <img src="{{ asset('./img/1.png') }}" class="d-block w-100" alt="Avatar">
                </div>
                <!-- รูปที่ 2 -->
                <div class="carousel-item">
                    <img src="{{ asset('./img/2.png') }}" class="d-block w-100" alt="Inception">
                </div>
                <!-- รูปที่ 3 -->
                <div class="carousel-item">
                    <img src="{{ asset('./img/5.png') }}" class="d-block w-100" alt="spiderman">
                </div>
                <!-- รูปที่ 4 -->
                <div class="carousel-item">
                    <img src="{{ asset('./img/6.png') }}" class="d-block w-100" alt="spiderman">
                </div>
            </div>
            <!-- ปุ่มกำหนดไปรูปก่อนหน้า -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <!-- ปุ่มกำหนดไปรูปถัดไป -->
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- topic Recommend for Movies 2 U this week -->
        <div class="top10 mt-5">
            <h2 class="h2_top10">Recommend for Movies 2 U this week</h2>
            <div class="row">
                @foreach ($movie as $m)
                <div class="col-3">
                    <div class="card mt-5" style="width: auto">
                        <a href="/moviedetail/{{ $m->movie_id }}">
                            <img class="card-img" src="{{ asset('Materials/Movies/' . $m->movie_id . '.png') }}" alt="Movie poster" width="300px" height="450px"/>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title  d-flex justify-content-between align-items-center">
                                <b>{{ $m->movie_name }}</b>
                                <i class="bi bi-star-fill text-warning"><b class="text-black"> {{ $m->movie_score }} </b></i>
                            </h5>
                            @guest
                            <div class="d-flex justify-content-between align-items-center mt-5">
                                <a href="{{ url('/moviedetail/'.$m->movie_id) }}" class="btn btn-warning" style="width: 48%;">Detail</a>
                                <a href="/addwatchlist/{{ $m->movie_id}}" class="btn btn-dark" style="width: 48%;"><i class="bi bi-plus-lg"></i> Watchlist</a>
                            </div>
                            @else
                            <div class="d-flex justify-content-between align-items-center mt-5">
                                @if( Auth::user()->roles  == 1)
                                <a href="{{ url('/moviedetail/'.$m->movie_id) }}" class="btn btn-warning" style="width: 48%;">Detail</a>
                                <a href="/addwatchlist/{{ $m->movie_id}}" class="btn btn-dark" style="width: 48%;"><i class="bi bi-plus-lg"></i> Watchlist</a>
                                @elseif ( Auth::user()->roles  == 2 )
                                <a href="/moviemanagement/editForm/{{ $m->movie_id }}" class="btn btn-warning" style="width: 48%;">Edit</a>
                                <a href="/moviemanagement/delete/{{ $m->movie_id }}" class="btn btn-danger" style="width: 48%;" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</a>
                                @else
                                <a href="{{ url('/moviedetail/'.$m->movie_id) }}" class="btn btn-warning" style="width: 48%;">Detail</a>
                                <a href="/addwatchlist/{{ $m->movie_id}}" class="btn btn-dark" style="width: 48%;"><i class="bi bi-plus-lg"></i> Watchlist</a>
                                @endif
                            </div>
                            @endguest
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- topic Category Movies -->
        <p class="title_category_Movies mt-5">Category Movies</p>
        @foreach ($mtype as $mt)
            @php
                $moviesInCategory = $movie->filter(function ($m) use ($mt) {
                    return $m->movie_type_id == $mt->type_id;
                });
            @endphp
            @if ($moviesInCategory->count() > 0)
                <div class="top-10 mt-4">
                    <h2 class="category">{{ $mt->type_name }}</h2>
                    <div class="row">
                        @foreach ($moviesInCategory as $m)
                            <div class="col-3">
                                <div class="card mt-4" style="width: auto">
                                    <a href="/moviedetail/{{ $m->movie_id }}">
                                        <img class="card-img" src="{{ asset('Materials/Movies/' . $m->movie_id . '.png') }}" alt="Movie poster" width="300px" height="450px"/>
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title  d-flex justify-content-between align-items-center">
                                            <b>{{ $m->movie_name }}</b>
                                            <i class="bi bi-star-fill text-warning"><b class="text-black"> {{ $m->movie_score }} </b></i>
                                        </h5>
                                        @guest
                                        <div class="d-flex justify-content-between align-items-center mt-5">
                                            <a href="{{ url('/moviedetail/'.$m->movie_id) }}" class="btn btn-warning" style="width: 48%;">Detail</a>
                                            <a href="/addwatchlist/{{ $m->movie_id}}" class="btn btn-dark" style="width: 48%;"><i class="bi bi-plus-lg"></i> Watchlist</a>
                                        </div>
                                        @else
                                        <div class="d-flex justify-content-between align-items-center mt-5">
                                            @if( Auth::user()->roles  == 1)
                                            <a href="{{ url('/moviedetail/'.$m->movie_id) }}" class="btn btn-warning" style="width: 48%;">Detail</a>
                                            <a href="/addwatchlist/{{ $m->movie_id}}" class="btn btn-dark" style="width: 48%;"><i class="bi bi-plus-lg"></i> Watchlist</a>
                                            @elseif ( Auth::user()->roles  == 2 )
                                            <a href="/moviemanagement/editForm/{{ $m->movie_id }}" class="btn btn-warning" style="width: 48%;">Edit</a>
                                            <a href="/moviemanagement/delete/{{ $m->movie_id }}" class="btn btn-danger" style="width: 48%;" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</a>
                                            @else
                                            <a href="{{ url('/moviedetail/'.$m->movie_id) }}" class="btn btn-warning" style="width: 48%;">Detail</a>
                                            <a href="/addwatchlist/{{ $m->movie_id}}" class="btn btn-dark" style="width: 48%;"><i class="bi bi-plus-lg"></i> Watchlist</a>
                                            @endif
                                        </div>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach

        {{-- <div class="top10 mt-4">
            <h2 class="category">Action</h2>
            <div class="row">
            @foreach ($action as $act)
                @foreach ($movie as $m)
                @if($act->type_id == $m->movie_type_id)
                <div class="col-3">
                    <div class="card mt-4" style="width: auto">
                        <a href="/moviedetail/{{ $m->movie_id }}">
                            <img class="card-img" src="{{ asset('Materials/Movies/' . $m->movie_id . '.png') }}" alt="Movie poster" width="300px" height="450px"/>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title  d-flex justify-content-between align-items-center">
                                <b>{{ $m->movie_name }}</b>
                                <i class="bi bi-star-fill text-warning"><b class="text-black"> {{ $m->movie_score }} </b></i>
                            </h5>
                            <div class="d-flex justify-content-between align-items-center mt-5">
                                @if( Auth::user()->roles  == 1)
                                <a href="{{ url('/moviedetail/'.$m->movie_id) }}" class="btn btn-warning" style="width: 48%;">Detail</a>
                                <a href="/addwatchlist/{{ $m->movie_id}}" class="btn btn-dark" style="width: 48%;"><i class="bi bi-plus-lg"></i> Watchlist</a>
                                @elseif ( Auth::user()->roles  == 2 )
                                <a href="/moviemanagement/editForm/{{ $m->movie_id }}" class="btn btn-warning">Edit</a>
                                <a href="/moviemanagement/delete/{{ $m->movie_id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            @endforeach
           </div>
        </div>

        <div class="top10 mt-5">
            <h2 class="category">Comedy</h2>
            <div class="row">
            @foreach ($comedy as $cm)
                @foreach ($movie as $m)
                @if($cm->type_id == $m->movie_type_id)
                <div class="col-3">
                    <div class="card mt-4" style="width: auto">
                        <a href="/moviedetail/{{ $m->movie_id }}">
                            <img class="card-img" src="{{ asset('Materials/Movies/' . $m->movie_id . '.png') }}" alt="Movie poster" width="300px" height="450px"/>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title  d-flex justify-content-between align-items-center">
                                <b>{{ $m->movie_name }}</b>
                                <i class="bi bi-star-fill text-warning"><b class="text-black"> {{ $m->movie_score }} </b></i>
                            </h5>
                            <div class="d-flex justify-content-between align-items-center mt-5">
                                <a href="{{ url('/moviedetail/'.$m->movie_id) }}" class="btn btn-warning" style="width: 48%;">Detail</a>
                                <a href="/addwatchlist/{{ $m->movie_id}}" class="btn btn-dark" style="width: 48%;"><i class="bi bi-plus-lg"></i> Watchlist</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            @endforeach
           </div>
        </div> --}}
        <div class="d-grid gap-2 col-4 mx-auto mt-5">
            <a href="/category"><button class="btn btn-warning d-grid gap-2 col-4 mx-auto " type="button">More . . .</button></a>
        </div>
        {{-- <hr class="mt-5"> --}}
    </div>

    <!-- Footer -->
    {{-- <div class="container-fluid">
        <footer>
            <div class="footer_social">
                <ul>
                    <li class="icon"><a href=""><i class="bi bi-facebook text-primary" style="font-size: 1.5rem;"></i></a></li>
                    <li class="icon"><a href=""><i class="bi bi-twitter text-primary" style="font-size: 1.5rem;"></i></a></li>
                    <li class="icon"><a href=""><i class="bi bi-instagram text-danger" style="font-size: 1.5rem;"></i></a></li>
                    <li class="icon"><a href=""><i class="bi bi-github" style="font-size: 1.5rem;"></i></a></li>
                </ul>
                <p>@ 2023 by Movie2U</p>
            </div>

        </footer>
    </div> --}}

@endsection
