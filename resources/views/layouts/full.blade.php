<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:og='http://ogp.me/ns#'>

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset='utf-8'>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='apple-mobile-web-app-capable' content='yes' />
    <!-- Référencement -->
    <title>@yield('Title')Mouud</title>
    <meta name="icon" content="{{ asset('mouud.ico')}}"/>
    <meta name="description" content="@yield('Description')">
    <link rel="icon" type="image/png" href="/public/icon/xandroid-icon-192x192.png.pagespeed.ic.obgqgII-gM.webp"/>
    <meta name="keywords" content="mouud, music, song, playlist, soundcloud, spotify, streaming">
    <meta name="copyright" content="© Sarah Mauriaucourt"/>
    <meta name="robots" content="index, follow, archive"/>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- RS !-->
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="Mouud"/>
    <meta property="og:url" content="http://mouud.sarahmauriaucourt.fr"/>
    <meta property="og:title" content="@yield('Title')Mouud">
    <meta property="og:description" content="@yield('Description')">
    <meta property="og:locale" content="fr_FR"/>
    <!-- Favicon -->
    <link href="{{ asset('mouud.ico')}}" rel="shortcut icon" />
    <!-- Stylesheets -->
    <script src="https://kit.fontawesome.com/39042e23fe.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <header class="header-section">
        <nav class="navbar_guest">
            @guest
            <a data-pjax href="/">
                <img style="filter: invert(100%);" data-pjax class="mouud_logo" src="/logo.png" />
            </a>
            <ul>
                <li class="nav-item">
                    <a data-pjax class="btn btn_bordureOrange" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li>
                    <a data-pjax class="btn btn_fondOrange" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
            </ul>
        </nav>
        @else
        <nav class="navbar navbar-expand-lg navbar_login">
            <form class="search-bar" data-pjax id="search">
                <input class="search-bar" name="search" type="search" required placeholder="Search" />
                <button class="search-btn linkOrange_hover" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="linkOrange_hover dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            @if(Auth::user()->unReadNotifications->count())
                            {{Auth::user()->unReadNotifications->count()}}
                            @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item btn notif_read" href="{{route('markRead')}}" data-pjax-toggle><b>Notifications read</b></a>
                            @foreach (Auth::user()->unReadNotifications as $notification)
                            <a data-pjax class="dropdown-item notif" href="/utilisateur/{{$notification->data['user_id']}}">
                                <img class="avatar_icon" src="/uploads/avatars/{{Auth::user()->avatar}}"
                                    alt="avatar_{{Auth::user()->id}}" />
                                <div>
                                    <p><b>{{$notification->data['user_name']}}</b>
                                        <span>
                                            {{$notification->created_at->format('H:i')}}</span></p>
                                    <span>liked a song
                                        {{-- {{$notification->created_at->diffForHumans()}} --}}
                                    </span>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            @endforeach
                        </div>
                    </li>
            </div>
            <a data-pjax href="/utilisateur/{{Auth::id()}}">
                <img class="avatar_icon" src="/uploads/avatars/{{Auth::user()->avatar}}" alt="avatar" />
            </a>
        </nav>
        @endguest
    </header>

    @auth
    <nav class="sidebar">
        <ul class="sidebar-nav">
            <li class="logo">
                <a href="/" class="linkOrange_hover sidebar-nav-link" data-pjax>
                    <img style="filter: invert(100%);" class="mouud_logo" src="/logo.png" /></i></a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ asset('/') }}" class="linkOrange_hover sidebar-nav-link" data-pjax>
                    <i class="fas fa-home"></i> <span class="sidebar-link-text">Home</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="/utilisateur/{{Auth::id()}}" class="linkOrange_hover sidebar-nav-link" data-pjax>
                    <i class="fas fa-user"></i>
                    <span class="sidebar-link-text">Profile</span></a>
            </li>
            <li class="sidebar-nav-item">
                <a href="/chanson/nouvelle" class="linkOrange_hover sidebar-nav-link" data-pjax>
                    <i class="fas fa-cloud-upload-alt"></i>
                    <span class="sidebar-link-text">New&nbsp;song</span></a>
            </li>
            <li class="sidebar-nav-item">
                <a href="/playlist/nouvelle" class="linkOrange_hover sidebar-nav-link" data-pjax>
                    <i class="fas fa-plus-square"></i>
                    <span class="sidebar-link-text">New&nbsp;playlist</span></a>
            </li>
            <li class="sidebar-nav-item">
                <a class="linkOrange_hover sidebar-nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-pjax>
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="sidebar-link-text">{{ __('Logout') }}</span>
                </a>
                <form data-pjax id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
            </li>
        </ul>
    </nav>
    @endauth
    <main id="pjax-container">
        @yield('content')
    </main>

    @auth
    
    <footer class="footer-section text-center">
        <audio id="audio" controls></audio>
    </footer>
    @endauth

    <!--====== Javascripts & Jquery ======-->
    <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('js/jquery.pjax.js') }}"></script>
    <script src="{{ asset('js/divers.js') }}"></script>
    <script src="{{ asset('js/toastr-min.js') }}"></script>
    {{-- <script src="{{ asset('js/autoplayer.js') }}"></script> --}}
    <script type="text/javascript">
        $("#search").submit(function (e) {
            e.preventDefault();
            console.log($.support.pjax);
            if ($.support.pjax)
                $.pjax({
                    url: "/recherche/" + e.target.elements[0].value,
                    container: '#pjax-container'
                });
            else
                window.location.href = "/recherche/" + e.target.elements[0].value;
        });
    </script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
