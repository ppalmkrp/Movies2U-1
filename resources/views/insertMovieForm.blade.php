@extends('layouts.navbar')
@section('content')
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
    <div class="container-fluid">
        <form method="post" action="/moviemanagement/insert" enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="col-5">
                    <div class="input-group mb-3">
                        <input name="img" type="file" class="form-control" accept=".png" required onchange="previewImage(this)">
                        <label class="input-group-text" for="inputGroupFile02">Upload Image (PNG only)</label>
                    </div>
                    <img id="img-preview" src="#" alt="Image Preview" style="display: none; max-width: 100px;">
                    <div class="input-group mb-3">
                        <input name="video" type="file" class="form-control" accept=".mp4" required onchange="previewVideo(this)">
                        <label class="input-group-text" for="inputGroupFile02">Upload Video (MP4 only)</label>
                    </div>
                    <video id="video-preview" controls style="display: none; max-width: 300px;"></video>

                </div>
                <div class="col-7">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">MovieID:</span>
                        <input type="text" name="id" class="form-control" aria-describedby="basic-addon1" required>
                      </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Movie name:</span>
                        <input type="text" name="name" class="form-control" aria-describedby="basic-addon1" required>
                      </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Movie type:</span>
                        <select name="type" class="form-select" aria-label="Default select example" required>
                            <option value="" selected>Please select type</option>
                            <option value="MT01">Action</option>
                            <option value="MT02">Adventure</option>
                          </select><br>                      </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Movie score:</span>
                            <input type="number" name="score" class="form-control" aria-describedby="basic-addon1" step="0.1" required>
                        </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Movie Time:</span>
                        <input type="number" name="time" class="form-control" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Year on air:</span>
                        <input type="number" name="year" class="form-control" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Rate general:</span>
                        <select name="rate" class="form-select" aria-label="Default select example" required>
                            <option value="" selected>Please select rate</option>
                            <option value="CTR02">G: General Audiences</option>
                            <option value="CTR03">PG: Parental Guidance Suggested</option>
                            <option value="CTR01">PG-13: Parents Strongly Cautioned</option>
                            <option value="CTR04">R: Restricted</option>
                            <option value="CTR05">NC-17: Adults Only</option>
                            <option value="CTR06">NR: Not Rated</option>
                          </select><br>
                    </div>

                      <div class="input-group" >
                        <span class="input-group-text">Movie info:</span>
                        <textarea name="info" class="form-control" aria-label="With textarea"></textarea>
                      </div><br>
                      <a href="/moviemanagement/insert"><button type="submit" class="btn btn-success">Save</button></a>
                </div>
            </div>
        </form>

    </div>
@endsection
