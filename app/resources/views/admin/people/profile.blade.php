@extends('admin.layouts.layout')

@section('contentHeader')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            {{ $data['person']->full_name}}

                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    @endsection

                    @section('content')
                    <div class="x_content">
                        <div class="col-lg-2 col-md-12 profile_left ">
                            <div class="profile_img col-lg-12 col-xs-3 mb-2">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="{{ $data['person']->image_path }}" alt="Avatar" title="Change the avatar" width="320" height="320" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-9">
                                <h4>{{ $data['person']->name }} {{ $data['person']->surname }}</h4>
                                <ul class=" list-unstyled user_data">
                                    @if ($data['person']->personable_type_name == 'Jugador')
                                    <li>
                                        <i class="fa fa-briefcase user-profile-icon"></i> {{ $data['person']->current_team ? $data['person']->current_team->name : 'Sin equipo' }}
                                    </li>
                                    @endif
                                    <li><i class="fa fa-phone user-profile-icon"></i> {{ $data['person']->phone }}</li>
                                    <li><i class="fas fa-envelope user-profile-icon"></i> {{ $data['person']->user->email }}</li>
                                </ul>
                            </div>
                        </div>
                        {{-- Middle column --}}
                        <div class="col-lg-9 col-xs-12">
                            <div class="col-xs-12">
                                @if ($data['person']->personable_type_name == 'Jugador')
                                @include('admin.players.skills')
                                @include('admin.players.skills-graph')
                                @else
                                @include('admin.coaches.teams')
                                @endif
                            </div>

                            <div class="col-lg-12  col-xs-12">
                                @include('admin.people.historial')
                                @if ($data['person']->personable_type_name == 'Jugador')
                                @include('admin.players.games')
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="divModal">

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
<script src="{{ asset('js/modal/modal.js') }}"></script>
<!-- Muestra alerta de la operacion recibida -->
@if (session('status'))
<script>
    $(document).ready(function() {
        message = @json(session('status'));
        console.log(message);
        Swal.fire({
            position: 'top-end'
            , icon: 'success'
            , title: message
            , showConfirmButton: false
            , timer: 1500
        })
    });

</script>
@endif

<script>
    $(document).ready(function() {
        //Pasa los valores del jugador actual para recoger los datos y pintar la gráfica de evolucion
        let csrf = $('.progress-bar').attr('data-csrf');
        let playerId = $('.progress-bar').attr('data-playerId');
        if (csrf != undefined) //Si el csrf no es undefined está mostrando los gráficos
            recogerValores(playerId, csrf) //Funcion en charts.js
    });

</script>






@endsection
