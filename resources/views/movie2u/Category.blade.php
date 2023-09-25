@extends('layouts.navbar')
@section('content')
<div class="container-fluid">
    <p class="title_category_Movies mt-3">Category Movies</p>
    <div class="row">
        <div class="col-2 mt-4">
            <header>
                <h2 class="type">Type</h2>
            </header>
        </div>
        <div class="col-10 mt-4">
            <!-- หนังที่เรื่องนำมาโชว์ -->
            <header>
                <h2 class="type">All Category</h2>
            </header>
        </div>
        
    </div>
    <div class="row">
        <div class="col-2">
            <ul class="nav nav-link"> <!-- วนลูปนำหัวข้อประเภทหนังมาโชว์ -->
                @foreach($type as $t)
                <li class="mt-3">
                    <p class="title_list_type"><i class="bi bi-caret-right-fill text-black"></i><a class="list_type" aria-current="page" href="/type/{{ $t->type_id }}"> {{ $t->type_name }}</a></p>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-10">
            <div class="row"> <!-- วนลูปแสดงหนังในตาราง movie -->
            @foreach ($movie as $m)
                <div class="col-3">
                    <div class="card mt-4" style="width: auto">
                        <a href="/moviedetail/{{ $m->movie_id }}">
                            <img class="card-img-top" src="{{ asset('Materials/Movies/' . $m->movie_id . '.png') }}" alt="Movie poster" width="150px" height="350px"/>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title  d-flex justify-content-between align-items-center">
                                {{ $m->movie_name }}
                            </h5>
			                <div class="mt-3">
                                <i class="bi bi-star-fill text-warning"><b class="text-black"> {{ $m->movie_score }} </b></i>
                            </div>
                            <div class="mt-3">
                                    <a href="{{ url('/moviedetail/'.$m->movie_id) }}" class="btn btn-warning" style="width: 100%;">Detail</a>
                                    <a href="" class="btn btn-dark mt-2" style="width: 100%;"><i class="bi bi-plus-lg"></i> Watchlist</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection