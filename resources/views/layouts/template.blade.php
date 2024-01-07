<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Keterlambatan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a class="fs-8" href="#">Rekam Keterlambatan</a>
                </div>
           
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="{{ route('home') }}" class="sidebar-link">
                            Dashboard
                        </a>
                    </li>
                   
                    @if(Auth::check() && Auth::user()->role === 'admin')
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                            aria-expanded="false"><i></i>
                            Data Master
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{ route('rayons.index') }}" class="sidebar-link mx-4"> Data Rayon</a>
                                <a href="{{ route('rombels.index') }}" class="sidebar-link mx-4"> Data Rombel</a>
                                <a href="{{ route('siswas.index') }}" class="sidebar-link mx-4"> Data Siswa</a>
                                <a href="{{ route('users.index') }}" class="sidebar-link mx-4"> Data User</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if(Auth::check() && Auth::user()->role === 'ps')
                    <li class="sidebar-item">
                        <a href="{{ route('siswas.index') }}" class="sidebar-link">
                            Data Siswa
                        </a>
                    </li>
                    @endif
                    <li class="sidebar-item">
                        <a href="{{ route('latest.index') }}" class="sidebar-link collapsed" data-bs-target="#keterlambatan" 
                        aria-expanded="false"><i></i>
                        Data Keterlambatan
                        </a>
                    </li>
                 
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        @if(Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                    </ul>
                </div>
            </nav>

            <div class="container mt-5">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
