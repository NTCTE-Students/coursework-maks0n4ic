<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
</head>

<body>
    <nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span>Auction</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    @guest
                    <li class="nav-item"><a class="btn btn-primary shadow" role="button" href="{{ url('/register') }}">Регистрация</a></li>
                    <li class="nav-item"><a class="btn btn-primary shadow" role="button" href="{{ url('/login') }}">Авторизация</a></li>
                    @endguest
                    <li class="nav-item"><a class="btn btn-primary shadow" href="{{ url('/lots') }}">Лоты</a></li>
                    @auth
                    <li class="nav-item"><a class="btn btn-primary shadow" href="{{ url('/createposts') }}">Создать лот</a></li>
                    <a class="btn btn-primary shadow" role="button" href="{{ url('/logout') }}">Выйти</a>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
