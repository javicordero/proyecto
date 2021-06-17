@extends('layouts.layout')

@section('content')
    <div class="hero-wrap js-fullheight" style="background-image: url('public-template/images/bg_1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                data-scrollax-parent="true">
                <div class="col-md-6 mt-5 pt-5 ftco-animate mt-5" data-scrollax=" properties: { translateY: '70%' }">
                    <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.2 }">Club baloncesto Arboleda
                    </h1>
                    <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.2 }" style="font-style: italic"><span style="font-style: italic">"El talento gana partidos, pero el trabajo en equipo y la inteligencia ganan campeonatos" </span>&nbsp; - Michael Jordan </p>
                </div>
            </div>
        </div>
    </div>



    @include('index.lastGame')


    @include('index.nextGames')


    <section class="ftco-section img ftco-about ftco-no-pt ftco-no-pb"
        style="background-image: url(public-template/images/bg_2.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-5 py-md-5">
                    <div class="row justify-content-start py-md-5">
                        <div class="col-md-12 heading-section heading-section-white ftco-animate">
                            <h2 class="mb-4">Sobre el club</h2>
                            <p>El Club Baloncesto La Arboleda fue fundado en 1987 por un grupo de amigos apasionados del deporte.
                                Desde su creación, se fueron incorporando jugadores de todas las categorías hasta llegar a los más de 300
                                 con los que contamos actualmente.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6 d-flex">
                    <div class="img d-flex align-self-stretch"
                        style="background-image:url(public-template/images/about.jpg);"></div>
                </div>
            </div>
        </div>
    </section>

    @include('index.lastGames')



    @include('index.coaches')


@endsection
