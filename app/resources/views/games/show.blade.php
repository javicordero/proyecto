@extends('layouts.layout')

@section('content')

    @include('games.result')


    <section class="ftco-section pt-3">
        <div class="container">
            <div class="row">
                @include('games.stats')
                <div class="col-lg-4 sidebar">
                    @include('games.scorers')
                    @include('games.assisters')
                    @include('games.rebounders')

                </div>
            </div>
        </div>
    </section>

@endsection
