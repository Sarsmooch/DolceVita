@extends('layouts.app')

@section('title', 'Início')

@section('content')
    <section id="hero">
        <div class="carousel slide pointer-event" id="carouselHero" data-bs-ride="carousel">
            <div class="carousel-indicators"> <button class="active" data-bs-target="#carouselHero" data-bs-slide-to="0" type="button" aria-label="Slide 1" aria-current="true"></button> <button class="" data-bs-target="#carouselHero" data-bs-slide-to="1" type="button" aria-label="Slide 2"></button> <button class="" data-bs-target="#carouselHero" data-bs-slide-to="2" type="button" aria-label="Slide 3"></button> </div>
            <div class="carousel-inner">
                <div class="carousel-item carousel-item-next carousel-item-start"> <img class="w-100" src="/images/carousel1.png"> </div>
                <div class="carousel-item">
                    <img class="w-100" src="/images/carousel3.png">
                </div>
                <div class="carousel-item active carousel-item-start"> <img class="w-100" src="/images/carousel2.png"> </div>
            </div><button class="carousel-control-prev" data-bs-target="#carouselHero" data-bs-slide="prev" type="button"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="visually-hidden">Próximo</span> </button> <button class="carousel-control-next" data-bs-target="#carouselHero" data-bs-slide="next" type="button"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="visually-hidden">Anterior</span> </button>
        </div>
    </section>

    <x-section>
        <x-slot:id>about</x-slot:id>
        <x-slot:title>Sobre nós</x-slot:title>
        <x-slot:description>Conheça nossa marca.</x-slot:description>
        <x-slot:content>
            <div class="row">
                <div class="col-md-7">
                    <p>Na <strong>Dolce Vita</strong>, somos apaixonados por trazer momentos deliciosos e inesquecíveis através da arte da confeitaria. Somos uma confeitaria especializada em bolos, salgados, doces em geral, tortas e uma variedade de outras delícias, perfeitas para todas as ocasiões festivas.</p>
                    <p>Nossa equipe de confeiteiros altamente habilidosos e dedicados trabalha com amor e dedicação para criar verdadeiras obras de arte comestíveis. Utilizamos apenas os melhores ingredientes, selecionados com cuidado, combinando técnicas tradicionais e inovações contemporâneas para entregar produtos de alta qualidade que encantam tanto o paladar quanto os olhos.</p>
                    <p>Acreditamos que a experiência gastronômica vai além do sabor. É sobre criar memórias preciosas, celebrar momentos importantes e compartilhar alegria com aqueles que amamos. É por isso que nos esforçamos para oferecer um atendimento personalizado, entendendo suas preferências e transformando suas ideias em realidade.</p>
                    <p>Além disso, valorizamos a responsabilidade social e ambiental. Buscamos minimizar nosso impacto no meio ambiente, utilizando embalagens eco-friendly e priorizando fornecedores locais, sempre que possível.</p>
                    <p>Convidamos você a explorar nosso site e descobrir todas as maravilhas que a <strong>Dolce Vita</strong> tem a oferecer. Sinta-se à vontade para entrar em contato conosco e discutir suas necessidades e desejos. Estamos ansiosos para tornar seus momentos especiais ainda mais doces.</p>
                    <p>Seja bem vindo à <strong>Dolce Vita</strong>, <span class="text-secondary">onde a doçura encontra a vida!</span></p>
                </div>
                <div class="col-md-5 align-self-center">
                    <svg class="img-fluid" role="img" aria-label="Placeholder: 500x500" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder </title>
                        <rect width="100%" height="600px" fill="#A23049"> </rect> <text x="50%" y="50%" fill="#000000" dy=".3em">500x500</text>
                    </svg>
                </div>
            </div>
        </x-slot:content>
    </x-section>

    <x-section>
        <x-slot:id>products</x-slot:id>
        <x-slot:title>Produtos</x-slot:title>
        <x-slot:description>Conheça abaixo nossas maravilhosas criações</x-slot:description>
        <x-slot:content>
            <div class="row text-center g-3">
                <div class="col-lg-3 col-md-6">
                    <svg class="bd-placeholder-img rounded-circle" role="img" aria-label="Placeholder" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder </title>
                        <rect width="100%" height="600px" fill="#A23049"> </rect>
                    </svg>
                    <h2 class="fw-normal">Bolos</h2>
                    <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column. </p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <svg class="bd-placeholder-img rounded-circle" role="img" aria-label="Placeholder" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder </title>
                        <rect width="100%" height="600px" fill="#A23049"> </rect>
                    </svg>
                    <h2 class="fw-normal">Doces</h2>
                    <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column. </p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <svg class="bd-placeholder-img rounded-circle" role="img" aria-label="Placeholder" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder </title>
                        <rect width="100%" height="600px" fill="#A23049"> </rect>
                    </svg>
                    <h2 class="fw-normal">Tortas</h2>
                    <p>And lastly this, the third column of representative placeholder content. </p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <svg class="bd-placeholder-img rounded-circle" role="img" aria-label="Placeholder" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder </title>
                        <rect width="100%" height="600px" fill="#A23049"> </rect>
                    </svg>
                    <h2 class="fw-normal">Salgados</h2>
                    <p>And lastly this, the third column of representative placeholder content. </p>
                </div>
            </div>
        </x-slot:content>
    </x-section>

    <x-section>
        <x-slot:id>contact</x-slot:id>
        <x-slot:title>Contate-nos</x-slot:title>
        <x-slot:description>Entre em contato conosco preenchendo o formulário abaixo.</x-slot:description>
        <x-slot:content>
            <div class="contact-form">
                <form>
                    <div class="row">
                        <div class="col-md-6 d-flex align-content-between flex-wrap">
                            <input class="form-control" name="contactName" type="text" value="" placeholder="Seu nome" />
                            <input class="form-control" name="contactEmail" type="text" value="" placeholder="Seu email" />
                            <input class="form-control" name="contactPhone" type="text" value="" placeholder="Seu telefone" />
                        </div>
                        <div class="col-md-6">
                            <textarea class="form-control" name="contactMessage" placeholder="Sua mensagem"></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary align-center" type="submit">Enviar mensagem</button>
                    </div>
                </form>
            </div>
        </x-slot:content>
    </x-section>
@endsection
