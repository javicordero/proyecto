@extends('layouts.layout')

@section('content')
<section class="hero-wrap hero-wrap-2 hero-wrap-3" style="background-image: url('public-template/images/teamsBg.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">Equipos</h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-xs-12">
                <section class="ftco-section p-0">
                    <div class="container">
                        <div class="heading-section ftco-animate">
                            <span class="subheading">Configuración</span>
                            <h2 class="mb-4">Configuración del usuario</h2>
                        </div>
                        <div class="row">
                            <form action="{{ route('users.UpdatePassword') }}" method="POST">
                                @if ($message = Session::get('status'))
                                <div class="alert alert-success">
                                    {{ $message }}
                                </div>
                                @endif
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label col-md-12 " for="title">Contraseña acutal: <span class="required"></span>
                                            </label>
                                            <div class="col-md-12">
                                                <input type="password" name="password1" required="required" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label col-md-12 " for="title">Contraseña nueva: <span class="required"></span>
                                            </label>
                                            <div class="col-md-12">
                                                <input type="password" name="password2" required="required" class="form-control" minlength="8">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->any())
                                <div class="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <button type="submit" class="form-control btn btn-primary">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
</section>



@endsection
