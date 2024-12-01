<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .bg-primary-custom { background-color: #0056b3; }
        .bg-secondary-custom { background-color: #f8f9fa; }
    </style>
</head>
<body class="d-flex flex-column h-100">
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('etudiants.index') }}">Liste des Étudiants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('etudiants.create') }}">Ajouter Étudiant</a>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Langue</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('lang', 'fr')}}">@lang('Français')</a></li>
                        <li><a class="dropdown-item" href="{{route('lang', 'en')}}">@lang('Anglais')</a></li>
                    </ul>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">@lang ('Se Connecter')</a>
                        @else
                            <a class="nav-link" href="{{route('logout')}}">@lang('Se Deconnecter')</a>
                        @endguest
                    </li>
                
                    
            </ul>
        </div>
    </div>
</nav>

    </header>

    <!-- Responsive container that adjusts based on screen size -->
    <main class="container-lg my-4">
    @auth
            <p>{{trans('lang.text_welcome')}} <strong>{{Auth::user()->name}},</strong></p>
        @else
            <p>Veuillez vous connecter pour continuer</p>
        @endauth
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="footer mt-auto py-3 bg-secondary-custom text-dark">
        <div class="container text-center">
            &copy; {{ date('Y') }} {{ config('app.name') }}. Tous droits réservés.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
