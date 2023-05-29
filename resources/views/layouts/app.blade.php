@php
    $navLinks = [
        'Início' => '#hero',
        'Sobre nós' => '#about',
        'Produtos' => '#products',
        'Blog' => '#',
        'Contato' => '#contact',
    ];
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - @yield('title')</title>
    @if (env('APP_ENV') === 'local')
        <link href="/css/bootstrap.css" rel="stylesheet">
    @else
        <link href="/css/bootstrap.min.css" rel="stylesheet">
    @endif
</head>

<body class="bg-light">
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="90" height="80">
                </a>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navLinks" type="button" aria-controls="navLinks" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navLinks">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @foreach ($navLinks as $key => $item)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $item }}">{{ $key }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="bg-light">
        @yield('content')
    </main>

    <footer class="footer">
        <ul class="nav justify-content-center">
            @foreach ($navLinks as $key => $item)
                <li class="nav-item">
                    <a class="nav-link px-2 text-body-secondary" href="{{ $item }}">{{ $key }}</a>
                </li>
            @endforeach
        </ul>
        <p class="text-center">© {{ date('Y') }} {{ env('APP_NAME') }}. Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
</body>

</html>
