
@extends('admin.layouts.layout')

@section('contentHeader')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title index-title">
                        <div class="index-title-title">
                            <h2>Mensajes
                                <small></small>
                            </h2>
                        </div>

                            <div class="index-title-button">
                                <button class="btn btn-success modal_id " type="button" data-csrf="{{ csrf_token() }}"

                                type="button"
                                id="newMessage-modal">
                                    Nuevo
                                </button>
                            </div>

                    </div>
                    @endsection

                    @section('content')



                    <div class="x_content">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                @foreach ($data['messagesReceived'] as $message)
                                <div class="col-xs-12">
                                    <div class="messageNotOpen" style="@if(!$message->read)
                                            font-weight: bold;
                                            color: white !important;
                                            @else
                                            color: #979797 !important;
                                    @endif"
                                    data-csrf="{{ csrf_token() }}"
                                    data-messageId="{{ $message->id }}"
                                    >
                                        <div class="profile_pic profile_pic_messages">
                                            <img src="{{ $message->sender_image_path }}" alt="..." class="img-circle profile_img ">
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
                            <div class="col-xs-12 col-sm-8">
                                <div class="messageOpen" id="messageOpen">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                                  <!-- Modal -->
                            <div id="divModal"></div>
                        </div>
                    </div>
                    @endsection

                    @section('contentCerrarDivs')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection

@section('customJs')

    <script src="{{ asset('js/messages/messages.js') }}"></script>

    <!-- Muestra alerta de la operacion recibida -->
    @if (session('status'))
        <script>
            $(document).ready(function() {
                message = @json(session('status'));
                console.log(message);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: message,
                    showConfirmButton: false,
                    timer: 1500
                })
            });

        </script>
    @endif
@endsection
