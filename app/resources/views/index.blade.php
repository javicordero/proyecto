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
                    <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.2 }">A small river named
                        Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <p><a href="#" class="btn btn-secondary py-3 px-4">Watch match</a> <a href="#"
                            class="btn btn-primary py-3 px-4">Get ticket</a></p>
                </div>
            </div>
        </div>
    </div>



    @include('index.lastGame')

    @include('index.video')

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
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia Even
                                the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic life One day however a small line of blind text by the name of Lorem Ipsum
                                decided to leave for the far World of Grammar.</p>
                            <p><a href="#" class="btn btn-secondary py-3 px-4">Ver más</a></p>
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




    <section class="ftco-section services-section bg-light">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-flex">
                        <div class="icon"><span class="flaticon-baseball-ball"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Baseball Training</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-flex">
                        <div class="icon"><span class="flaticon-helmet"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Softball Training</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-flex">
                        <div class="icon"><span class="flaticon-helmet-1"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Basic Defense</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-flex">
                        <div class="icon"><span class="flaticon-baseball-bat"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Basic Tactics</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('index.coaches')

    <section class="ftco-section ftco-counter bg-light" id="section-counter">
        <div class="container">
            <div class="row">
                <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="20">0</strong>
                            <span>Game Played</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="3">0</strong>
                            <span>Coaches</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="24">0</strong>
                            <span>Trophies</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="18">0</strong>
                            <span>Members</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
