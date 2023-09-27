<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies2U</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">

    <!--icons import-->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        @import url( {{asset('css/web.css')}} );
    </style>
</head>
<body>
    <div class="navbar z-2">
        <div class="container">
            <a href="/home"><h1>Movies2U</h1></a>
                @guest <!-- ตรวจสอบว่าไม่มีใครล็อกอิน -->
                    <a href="/login" class="btn btn-outline-danger me-2">Login</a>
                    <a href="/register" class="btn btn-danger">Register</a>
                @else <!-- ถ้ามีใครล็อกอินแล้ว -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle" style="font-size: 1.2rem;"> </i>@if( Auth::user()->roles == '2')Admin @else User
                           @endif:{{ Auth::user()->name }}<span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/user/profile">Setting</a></li>
                            @if( Auth::user()->roles  == 2)
                            <li><a class="dropdown-item" href="/moviemanagement">Management</a></li>
                            @else
                            <li><a class="dropdown-item" href="/MyWatchlist">Watch list</a></li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Log out
                                </a>
                            </li>
                        </ul>
                    </div>
                @endguest
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
    <div class="container mt-3">
        @yield('content')
    </div>
</body>
</html>
