@extends('layouts.layout')

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('public-template/images/gamesBackground.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <h1 class="mb-3 bread">Resultados</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('index') }}">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Resultados<i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @include('results.games')
                <div class="col-md-4 sidebar">

                    @include('results.filter')
                    @include('results.scorers')
                    @include('results.assisters')
                    @include('results.rebounders')
                </div>
            </div>
        </div>
    </section>

@endsection
