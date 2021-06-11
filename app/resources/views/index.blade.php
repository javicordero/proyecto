@extends('layouts.layout')

@section('content')
    <div class="hero-wrap js-fullheight" style="background-image: url('public-template/images/bg_1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                data-scrollax-parent="true">
                <div class="col-md-6 mt-5 pt-5 ftco-animate mt-5" data-scrollax=" properties: { translateY: '70%' }">
                    <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.2 }">CLUB BALONCESTO ARBOLEDA
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

    <section class="ftco-section ftco-no-pt ftco-highlights">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="img video-wrap ftco-animate d-flex align-items-center justify-content-center py-5"
                        style="background-image: url(public-template/images/victory.jpg); width: 100%;">
                        <p class="text-center mb-0 py-5">
                            <a href="https://vimeo.com/45830194"
                                class="icon-video-2 popup-vimeo d-flex justify-content-center align-items-center mr-3">
                                <span class="ion-ios-play"></span>
                            </a>
                            <small style="color: rgba(255,255,255,1); font-size: 16px;">Watch Highlights</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <section class="ftco-section ftco-team img" style="background-image:url(public-template/images/bg_3.jpg);"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-6 heading-section heading-section-white text-center ftco-animate">
                    <span class="subheading">Team Squad</span>
                    <h2 class="mb-4">Our Team <span>Squad</span></h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="carousel-team owl-carousel">
                        <div class="item">
                            <div class="team-wrap text-center">
                                <div class="img" style="background-image: url(public-template/images/staff-1.jpg);"></div>
                                <div class="text">
                                    <h3 class="mb-0">David Scott</h3>
                                    <span class="position">Catcher</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team-wrap text-center">
                                <div class="img" style="background-image: url(public-template/images/staff-2.jpg);"></div>
                                <div class="text">
                                    <h3 class="mb-0">David Scott</h3>
                                    <span class="position">Tight End</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team-wrap text-center">
                                <div class="img" style="background-image: url(public-template/images/staff-3.jpg);"></div>
                                <div class="text">
                                    <h3 class="mb-0">David Scott</h3>
                                    <span class="position">Pitcher</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team-wrap text-center">
                                <div class="img" style="background-image: url(public-template/images/staff-4.jpg);"></div>
                                <div class="text">
                                    <h3 class="mb-0">David Scott</h3>
                                    <span class="position">First Baseman</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team-wrap text-center">
                                <div class="img" style="background-image: url(public-template/images/staff-5.jpg);"></div>
                                <div class="text">
                                    <h3 class="mb-0">David Scott</h3>
                                    <span class="position">Second Baseman</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team-wrap text-center">
                                <div class="img" style="background-image: url(public-template/images/staff-6.jpg);"></div>
                                <div class="text">
                                    <h3 class="mb-0">David Scott</h3>
                                    <span class="position">Third Baseman</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team-wrap text-center">
                                <div class="img" style="background-image: url(public-template/images/staff-7.jpg);"></div>
                                <div class="text">
                                    <h3 class="mb-0">David Scott</h3>
                                    <span class="position">Right Fielder</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team-wrap text-center">
                                <div class="img" style="background-image: url(public-template/images/staff-7.jpg);"></div>
                                <div class="text">
                                    <h3 class="mb-0">David Scott</h3>
                                    <span class="position">Center Fielder</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team-wrap text-center">
                                <div class="img" style="background-image: url(public-template/images/staff-7.jpg);"></div>
                                <div class="text">
                                    <h3 class="mb-0">David Scott</h3>
                                    <span class="position">Left Fielder</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


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

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Blog</span>
                    <h2>Recent News</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="blog-single.html" class="block-20"
                            style="background-image: ulr('public-template/images/image_1.jpg');">
                        </a>
                        <div class="text mt-3 float-right d-block">
                            <div class="d-flex align-items-center p-2 pr-3 mb-4 topp">
                                <div class="one">
                                    <span class="day mr-1">29</span>
                                </div>
                                <div class="two">
                                    <span class="yr">2019</span>
                                    <span class="mos">May</span>
                                </div>
                            </div>
                            <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="blog-single.html" class="block-20"
                            style="background-image: ulr('public-template/images/image_2.jpg');">
                        </a>
                        <div class="text mt-3 float-right d-block">
                            <div class="d-flex align-items-center p-2 pr-3 mb-4 topp">
                                <div class="one">
                                    <span class="day mr-1">29</span>
                                </div>
                                <div class="two">
                                    <span class="yr">2019</span>
                                    <span class="mos">May</span>
                                </div>
                            </div>
                            <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single.html" class="block-20"
                            style="background-image: ulr('public-template/images/image_3.jpg');">
                        </a>
                        <div class="text mt-3 float-right d-block">
                            <div class="d-flex align-items-center p-2 mb-4 topp">
                                <div class="one">
                                    <span class="day mr-1">29</span>
                                </div>
                                <div class="two">
                                    <span class="yr">2019</span>
                                    <span class="mos">May</span>
                                </div>
                            </div>
                            <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single.html" class="block-20"
                            style="background-image: ulr('public-template/images/image_4.jpg');">
                        </a>
                        <div class="text mt-3 float-right d-block">
                            <div class="d-flex align-items-center p-2 pr-3 mb-4 topp">
                                <div class="one">
                                    <span class="day mr-1">29</span>
                                </div>
                                <div class="two">
                                    <span class="yr">2019</span>
                                    <span class="mos">May</span>
                                </div>
                            </div>
                            <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
