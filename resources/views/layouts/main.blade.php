<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    @yield('css')
    <link rel="stylesheet" href="/css/main.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body>
    <div class="flex-center full-height">

        <div class="navbar-top {{!Auth::check() ? ' links-derecha' : ''}}">
            @auth
                <div class="nav-hamburg">
                    <svg class="svg-inline--fa fa-bars fa-w-14" aria-hidden="true" data-prefix="fas" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg>
                </div>
            @endauth
            <div class="nav-user">
                @auth
                    <p>{{Auth::user()->name}}</p>
                    <div class="nav-user-submenu">
                        <div class="logout">

                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                @endauth
                @guest
                    <div class="links">
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    </div>
                @endguest
            </div>
        </div>
        @auth
            <div class="sidebar">
                <nav>
                    <ul>
                        <li class="sidebar-item">
                            <a href="/manuales/laravel">
                                <i class="fab fa-laravel"></i>
                                <span>Laravel</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/manuales/javascript" class="with-submenu">
                                <i class="fab fa-js-square"></i>
                                <span>Javascript</span>
                            </a>
                            <ul>
                                <li class="sidebar-subitem">
                                    <a href="/manuales/javascript/clase01">
                                        <span>Clase 01</span>
                                    </a>
                                </li>
                                <li class="sidebar-subitem">
                                    <a href="/manuales/javascript/clase02">
                                        <span>Clase 02</span>
                                    </a>
                                </li>
                                <li class="sidebar-subitem">
                                    <a href="/manuales/javascript/clase03">
                                        <span>Clase 03</span>
                                    </a>
                                </li>
                                <li class="sidebar-subitem">
                                    <a href="/manuales/javascript/clase04">
                                        <span>Clase 04</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="/manuales/conectemos">
                                <i class="fas fa-plug"></i>
                                <span>Deploy <br>Conectemos</span>
                            </a>
                        </li>
                        @if (Auth::check() && Auth::user()->email === 'contacto@nicorodrigues.com.ar')
                            <li class="sidebar-item">
                                <a href="#">
                                    <i class="fas fa-unlock-alt"></i>
                                    <span>Admin Panel</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        @endauth


        <div class="content">
            @yield('content')
        </div>
    </div>
    <script src="/js/main.js"></script>
    @yield('scripts')
</body>
</html>
