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
            <a href="/home"><img class="logo" src="{{ asset('./img/logo_V.3.png') }}" alt="logo"></a>
                @guest <!-- ตรวจสอบว่าไม่มีใครล็อกอิน -->
                <div class="btn-group">
                    <a href="/login" class="btn btn-outline-danger me-2">Login</a>
                    <a href="/register" class="btn btn-danger">Register</a>
                </div>
                @else <!-- ถ้ามีใครล็อกอินแล้ว -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle" style="font-size: 1.2rem;"> </i>{{ Auth::user()->name }}<span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/user/profile">Setting</a></li>
                            <li><a class="dropdown-item" href="/category">Category</a></li>
                            @if( Auth::user()->roles  == 2)
                            <li><a class="dropdown-item" href="/moviemanagement">Management</a></li>
                            <li><a class="dropdown-item" href="/addUserForm">Add user</a></li>
                            @else
                            <li><a class="dropdown-item" href="/MyWatchlist">Watch list</a></li>
                            @endif
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                        Logout
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
        </div>
    </div>
    <div class="container mt-3">
        @yield('content')
        <hr class="mt-5">
    </div>
    <div class="container-fluid mt-3">
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
    </div>
</body>
</html>
