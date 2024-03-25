<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light"><div class="container-fluid">
        <span class="navbar-brand">Karam's Gallery</span>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('categories') }}">Categories</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('articles') }}">Articles</a></li>
            </ul>
            <span class="navbar-text">

            Last posted article: {{ $lastPostedArticle }}<br>
            </span>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-10 text-left">
            @yield('content')
        </div>
    </div>
</div>
<footer class="container-fluid text-center">
    @yield('footer')
</footer>
</body>
</html>
