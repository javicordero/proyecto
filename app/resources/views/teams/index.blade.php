@extends('layouts.layout')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <h1 class="mb-3 bread">Blog</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>

   <section class="ftco-section">
    <div class="container">
      <div class="row d-flex">
          @foreach ($data['teams'] as $team)

        <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="blog-entry justify-content-end">
            <a href="blog-single.html" class="block-20" style="background-image: url('public-template/images/image_1.jpg');">
            </a>
            <div class="text mt-3 float-right d-block">
                <div class="d-flex align-items-center p-2 pr-3 mb-4 topp">
                    <div class="one">
                        <span class="day mr-1">29</span>
                    </div>
                    <div class="two">
                        <span class="yr">2019</span>
                        <span class="mos">2020</span>
                    </div>
                </div>
              <h3 class="heading"><a href="#">{{ $team->name }}</a></h3>
            </div>
          </div>
        </div>
        @endforeach


      </div>
    </div>
    @include('paginator.default', ['paginator' => $data['teams']])

  </section>
@endsection
