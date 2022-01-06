<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tracker') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('earnings.index') }}">{{ __('Earnings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('physiques.index') }}">{{ __('Physique') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('posts.index') }}">{{ __('Notes') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('goals.index') }}">{{ __('Goals') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    <a class="dropdown-item" href="{{ route('profiles.show', ['profile' => Auth::user()->id]) }}">Profile</a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                <div class="col-md-10">
                @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger ">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                </div>
                </div>

                @auth
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card mb-4">
                        <div class="card-body shadow-sm">
                        <div class="jumbotron text-center">
                          <h2>Days before you turn 30 years old:</h2>
                          <strong><h1>{{session('daysToThirties')}}</h1></strong>
                          <p class="lead text-muted">,,{{session('quotes')[rand(0,49)]['q'] ?? 'Be gigachad.'}}''</p>
                          <hr class="my-4">
                          <div class="progress mb-3" style="height: 30px;">
                                <div class="progress-bar bg-danger" style="width: {{ session('lifePercentUsed') }}%" role="progressbar"><strong>{{session('daysSinceBirth')}} days passed since your birth.</strong> 
                                </div>
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ session('lifePercentRest') }}%" > <strong>{{session('daysToThirties')}} left.</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div></div></div>
                @endauth
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
