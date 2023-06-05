@php
    $navLinks = [
        'Início' => route('index') . '#hero',
        'Sobre nós' => route('index') . '#about',
        'Produtos' => route('produtos'),
        'Blog' => route('blog'),
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <header>
        <nav class="navbar bg-light navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="/docs/5.1/assets/brand/dolcevita-logo.svg" alt="" width="90" height="80">
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
        @if (!Route::is('index'))
            <section class="hero" id="hero">
                <h3 class="title">@yield('title')</h3>
            </section>
        @endif

        @yield('content')

        <x-section>
            <x-slot:id>contact</x-slot:id>
            <x-slot:title>Contate-nos</x-slot:title>
            <x-slot:description>Entre em contato conosco preenchendo o formulário abaixo</x-slot:description>
            <x-slot:content>
                <div class="contact">
                    <form id="contactForm" action="{{ route('postContato') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 d-flex align-content-between flex-wrap">
                                <input class="form-control" name="contactName" type="text" value="{{ old('contactName') }}" required placeholder="Seu nome" />
                                <input class="form-control" name="contactEmail" type="email" value="{{ old('contactEmail') }}" required placeholder="Seu email" />
                                <input class="form-control" name="contactPhone" type="text" value="{{ old('contactPhone') }}" required placeholder="Seu telefone" />
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" name="contactMessage" required placeholder="Sua mensagem">{{ old('contactMessage') }}</textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary align-center" type="submit">Enviar mensagem</button>
                        </div>
                    </form>
                </div>
            </x-slot:content>
        </x-section>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
</body>

</html>
