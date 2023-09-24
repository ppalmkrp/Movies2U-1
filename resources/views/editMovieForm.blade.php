<script>
    function previewImage(input) {
     var imgPreview = document.getElementById('img-preview');
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function(e) {
             imgPreview.src = e.target.result;
             imgPreview.style.display = 'block';
         }

         reader.readAsDataURL(input.files[0]);
     } else {
         imgPreview.style.display = 'none';
     }
 }

 function previewVideo(input) {
     var videoPreview = document.getElementById('video-preview');
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function(e) {
             videoPreview.src = e.target.result;
             videoPreview.style.display = 'block';
         }

         reader.readAsDataURL(input.files[0]);
     } else {
         videoPreview.style.display = 'none';
     }
 }

 </script>
@extends('layouts.navbar')
@section('content')
    <header>Edit Movie</header>
    <div class="container-fluid">
        @foreach ($edit_movie as $m)
        <form method="post" action="/moviemanagement/update" enctype="multipart/form-data">
            @csrf
            <div class="row mt-3">
                <div class="col-5">
                    <div class="input-group mb-3">
                        <input name="img" type="file" class="form-control" accept=".png" onchange="previewImage(this)">
                        <label class="input-group-text" for="inputGroupFile02">Upload Image (PNG only)</label>
                    </div>
                        <img id="img-preview" src="{{ asset('Materials/Movies/' . $m->movie_id . '.png') }}"  style="max-width: 250px" alt="Movie poster" >
                        <div class="input-group mb-3 mt-3">
                            <input name="video" type="file" class="form-control" accept=".mp4" onchange="previewVideo(this)">
                            <label class="input-group-text" for="inputGroupFile02">Upload Video (MP4 only)</label>
                        </div>
                        <video id="video-preview" src="{{ asset('Materials/Movies/' . $m->movie_id . '.mp4') }}" type="video/mp4" controls style="max-width: 100%; max-height: 400px;"></video>
                    </video>
                </div>
                <div class="col-7">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">MovieID:</span>
                        <input type="text" name="id" value="{{ $m->movie_id }}" readonly placeholder="MXXX (XXX is Numbers)" class="form-control" aria-describedby="basic-addon1" required>
                      </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Movie name:</span>
                        <input type="text" name="name" value="{{ $m->movie_name }}" class="form-control" aria-describedby="basic-addon1" required>
                      </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Movie type:</span>
                        <select name="type" class="form-select" aria-label="Default select example" required>
                            <option @if($m->movie_type_id == "MT01")@selected(true) @endif value="MT01">Action</option>
                            <option @if($m->movie_type_id == "MT02")@selected(true) @endif value="MT02">Adventure</option>
                            <option @if($m->movie_type_id == "MT03")@selected(true) @endif value="MT03">War</option>
                            <option @if($m->movie_type_id == "MT04")@selected(true) @endif value="MT04">Drama</option>
                            <option @if($m->movie_type_id == "MT05")@selected(true) @endif value="MT05">Sci-Fi</option>
                            <option @if($m->movie_type_id == "MT06")@selected(true) @endif value="MT06">Family</option>
                            <option @if($m->movie_type_id == "MT07")@selected(true) @endif value="MT07">Thriller</option>
                            <option @if($m->movie_type_id == "MT08")@selected(true) @endif value="MT08">Crime</option>
                            <option @if($m->movie_type_id == "MT09")@selected(true) @endif value="MT09">Documentaries</option>
                            <option @if($m->movie_type_id == "MT10")@selected(true) @endif value="MT10">Animation</option>
                            <option @if($m->movie_type_id == "MT11")@selected(true) @endif value="MT11">Comedy</option>
                            <option @if($m->movie_type_id == "MT12")@selected(true) @endif value="MT12">Erotic</option>
                            <option @if($m->movie_type_id == "MT13")@selected(true) @endif value="MT13">Fantasy</option>
                            <option @if($m->movie_type_id == "MT14")@selected(true) @endif value="MT14">Musicals</option>
                            <option @if($m->movie_type_id == "MT15")@selected(true) @endif value="MT15">Romance</option>
                            <option @if($m->movie_type_id == "MT16")@selected(true) @endif value="MT16">Western</option>
                          </select><br>
                    </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Movie score <i class="bi bi-star-fill star-icon"> </i>:</span>
                            <input type="number" name="score" value="{{ $m->movie_score }}" placeholder="" class="form-control" aria-describedby="basic-addon1" step="0.1" required>
                            <span class="input-group-text" id="basic-addon1">/10</span>
                        </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Movie Time:</span>
                        <input type="number" name="time" value="{{ $m->movie_time }}" placeholder="" class="form-control" aria-describedby="basic-addon1" required>
                        <span class="input-group-text" id="basic-addon1">minute</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Year on air:</span>
                        <input type="number" name="year" value="{{ $m->movie_year_on_air }}" placeholder="" class="form-control" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Rate general:</span>
                        <select name="rate" class="form-select" aria-label="Default select example" required>
                            <option @if($m->critical_rate == "CTR02")@selected(true) @endif value="CTR02">G: General Audiences</option>
                            <option @if($m->critical_rate == "CTR03")@selected(true) @endif value="CTR03">PG: Parental Guidance Suggested</option>
                            <option @if($m->critical_rate == "CTR01")@selected(true) @endif value="CTR01">PG-13: Parents Strongly Cautioned</option>
                            <option @if($m->critical_rate == "CTR04")@selected(true) @endif value="CTR04">R: Restricted</option>
                            <option @if($m->critical_rate == "CTR05")@selected(true) @endif value="CTR05">NC-17: Adults Only</option>
                            <option @if($m->critical_rate == "CTR06")@selected(true) @endif value="CTR06">NR: Not Rated</option>
                          </select><br>
                    </div>

                      <div class="input-group" >
                        <span class="input-group-text">Movie info:</span>
                        <textarea name="info" class="form-control" aria-label="With textarea">{{ $m->movie_info }}</textarea>
                      </div><br>
                      <a href="/moviemanagement/update"><button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to update this movie?')">Save</button></a>
                </div>
            </div>
        </form>
        @endforeach
    </div>
@endsection
