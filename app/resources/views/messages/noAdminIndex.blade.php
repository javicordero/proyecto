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

            <div class="col-lg-6 col-xs-12">
                <section class="ftco-section p-0 section-messages">
                    <div class="container">
                        <div class="heading-section ftco-animate">
                            <span class="subheading">Mensajes</span>
                            <h2 class="mb-4">Mensajes recibidos</h2>
                        </div>
                        <div class="row">
                            @foreach ($data['messagesReceived'] as $message)
                            <div class="col-md-12">
                                <div class="messageNotOpen" style="@if(!$message->read)
                                                            font-weight: bold;
                                                            color: white !important;
                                                            @else
                                                            color: #979797 !important;
                                                    @endif" data-csrf="{{ csrf_token() }}" data-messageId="{{ $message->id }}">
                                    <div class="profile_pic profile_pic_messages">
                                        <img src="{{ $message->sender_image_path }}" alt="..." class="img-circle profile_img " style="width: 100px">
                                    </div>
                                    <div class="messagesNotOpen_resume">
                                        <p class="messageNotOpen_name">{{ $message->message_sender_name }}</p>
                                        <p class="messageNotOpen_title">{{ $message->title }}</p>
                                        <p class="messageNotOpen_content">{{ $message->content_resume }}</p>
                                    </div>
                                    <div class="messagesNotOpen_date">
                                        {{ $message->date }}
                                    </div>
                                </div>
                            </div>

                            @endforeach


                        </div>
                    </div>


                </section>
            </div>
            <div class="col-lg-6 sidebar">
                <button class="btn btn-primary " type="button" data-csrf="{{ csrf_token() }}"

                type="button"
                id="newMessage">Nuevo</button>
                <div class="messageOpen" id="messageOpen">
            </div>


        </div>
    </div>
</section>



@endsection

@section('customJs')

@endsection
