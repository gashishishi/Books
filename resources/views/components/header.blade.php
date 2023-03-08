<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    @vite(['resources/css/style.css'])

    <title>@yield('title')</title>
  </head>

<body>
<header class="bg-light">
  <!-- ナビバー -->
<nav class="navbar navbar-expand-lg navbar-light">
<div class="container-fluid">

    <a class="navbar-brand" href="/">laravel books</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav align-items-end mb-2 mb-lg-0">
        @if(Auth::check())
        <li class="nav-item">
            <a class="nav-link" href="/mypage">{{__('My Page')}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{__('Logout')}}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            </form>
        </li>

        @else
        <li class="nav-item">
        <a class="nav-link" href="/login">{{__('Login')}}</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/register">{{__('Register')}}</a>
        </li>

        @endif
    </ul>

    </div>
</div>
</nav>

</header>
