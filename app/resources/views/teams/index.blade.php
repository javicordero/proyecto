@extends('layouts.layout')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('public-template/images/teamsBg.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">Equipos</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section p-5">
    <div class="container">
        <div class="heading-section ftco-animate">
            <span class="subheading">Equipos</span>
            <h2 class="mb-4">Nuestros Equipos</h2>
        </div>
        <div class="row cards">
            @foreach ($data['teams'] as $team)

            <article class="card card--1" style="background-image: url('{{ $team->image_path }};" onclick="location.href = '/teams/{{ $team->id }}'">
                <div class="card__info-hover">
                    <h5>Entrenamientos</h5>
                    <ul>
                        @foreach ( $team->practiceDays as $practiceDay)
                        <li>{{ $practiceDay->day_name }}: {{ $practiceDay->time_formateada }} -- {{ $practiceDay->time_end }}</li>
                        @endforeach
                    </ul>

                </div>
                <div class="card__img" style="background-image: url('{{ $team->image_path }}');"></div>
                <a href="#" class="card_link">
                    <div class="card__img--hover" style="background-image: url('{{ $team->image_path }}');"></div>
                </a>
                <div class="card__info">
                    <h3 class="card__title">{{ $team->name }}</h3>

                    <span class="card__by">Entrenador: <span class="card__author" title="author">{{ $team->current_coach->full_name }}</span></span>
                </div>
            </article>
            @endforeach


        </div>
    </div>
    @include('paginator.default', ['paginator' => $data['teams']])

</section>
@endsection
