@extends('layouts.layout')

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('public-template/images/gamesBackground.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <h1 class="mb-3 bread">Resultados</h1>
        </div>
      </div>
    </div>
  </section>
    <section class="ftco-section p-5">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-xs-12">
                @include('results.games')
                </div>
                <div class="col-lg-4 sidebar">
                    @include('results.filter')

                    @include('results.scorers')
                    @include('results.assisters')
                    @include('results.rebounders')
                </div>
            </div>
        </div>
    </section>

@endsection
