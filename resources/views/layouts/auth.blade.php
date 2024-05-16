<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/back.css">
    <title>@yield('title', 'Food Stock App')</title>

    <!-- Fonts -->

</head>
<body>
<header class="bg-black">
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container-fluid ">
            <a class="navbar-brand text-white" href="{{route('welcome')}}">Food Stock</a>
            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('edit.profile', auth()->user())}}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('logout')}}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
@if (session('success'))
    <div class="container  alert alert-success text-center" id="alertSuccess">
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <div class="container  alert alert-danger text-center" id="alertDanger">
        <ul class="my-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
