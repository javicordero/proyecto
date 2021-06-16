@extends('layouts.layout')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('public-template/images/contactBg.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <h1 class="mb-3 bread">Contacto</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contacto <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>



      <section class="ftco-section contact-section">
    <div class="container">
      <div class="row block-9">
        <div class="col-md-12 order-md-last d-flex">
          <form action="{{ route('messages.guest') }}" class="bg-light p-5 contact-form" method="POST">
            @if ($message = Session::get('status'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
            @endif
            @csrf
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Nombre" required name="name">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email" required name="email">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Título" name="title">
            </div>
            <div class="form-group">
              <textarea name="content" id="" cols="30" rows="7" class="form-control" placeholder="Contenido"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Enviar mensaje" class="btn btn-primary py-3 px-5">
            </div>
          </form>

        </div>


      </div>
    </div>
  </section>
@endsection
