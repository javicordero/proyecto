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
                                {{ $data['person']->name }} {{ $data['person']->surname }}
                                @if ($data['person']->personable_type_name == 'Jugador')
                                    <small>{{ $data['person']->current_team ? $data['person']->current_team->name : 'Sin equipo' }}</small>

                                @endif
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
                                        <img class="img-responsive avatar-view" src="{{ $data['person']->image_path }}"
                                            alt="Avatar" title="Change the avatar" width="320" height="320" />
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-9">
                                    <h4>{{ $data['person']->name }} {{ $data['person']->surname }}</h4>
                                    <ul class=" list-unstyled user_data">
                                        <li><i class="fa fa-phone user-profile-icon"></i> {{ $data['person']->phone }}
                                        </li>
                                        <li>
                                            <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                                        </li>
                                        <li>
                                            <i class="fa fa-external-link user-profile-icon"></i>
                                            <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                                        </li>
                                    </ul>
                                    <button class="btn btn-success" id="image"><i class="fa fa-edit m-right-xs"></i>Cambiar
                                        Imagen</button>
                                </div>
                            </div>
                            {{-- Middle column --}}
                            <div class="col-lg-6 col-xs-12">
                                @if ($data['person']->personable_type_name == 'Jugador')
                                    @include('admin.players.skills')
                                    @include('admin.players.skills-graph')
                                @else
                                    @include('admin.coaches.teams')
                                @endif
                            </div>
                            {{-- Middle column --}}
                            {{-- Right column --}}
                            <div class="col-lg-4  col-xs-12">
                                @include('admin.people.historial')
                                @if ($data['person']->personable_type_name == 'Jugador')
                                    @include('admin.players.games')
                                @endif
                            </div>
                            {{-- End right column --}}
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
                    position: 'top-end',
                    icon: 'success',
                    title: message,
                    showConfirmButton: false,
                    timer: 1500
                })
            });

        </script>
    @endif

    <script>
        $(document).ready(function() {
            //Pasa los valores del jugador actual para recoger los datos y pintar la gráfica de evolucion
            let csrf = $('.progress-bar').attr('data-csrf');
            let playerId = 1;
            if (csrf != undefined) //Si el csrf no es undefined está mostrando los gráficos
                recogerValores(playerId, csrf) //Funcion en charts.js
        });

    </script>


    <script>
        //Muestra el alert para añadir la imagen y llama por ajax al controlador que se encarga
        $('#image').click(function() {
            csrf = @json(csrf_token()); //Pasa el token csrf
            //Pasa el id del player actual
            var pathname = $(location).attr('href');
            var n = pathname.lastIndexOf('/');
            var id = pathname.substring(n + 1);

            //Pasa la ruta actual (El tipo de persona coaches o players)
            var stringVariable = window.location.pathname;
            personType = stringVariable.substring(0, stringVariable.lastIndexOf('/')).substring(1);


            Swal.fire({
                title: 'Escoge una foto',
                confirmButtonText: 'Subir',
                input: 'file',
                onBeforeOpen: () => {
                    $(".swal2-file").change(function() {
                        var reader = new FileReader();
                        reader.readAsDataURL(this.files[0]);
                    });
                }
            }).then((file) => {
                if (file.value) {
                    var formData = new FormData();
                    var file = $('.swal2-file')[0].files[0];
                    formData.append("fileToUpload", file);
                    formData.append('_token', csrf);
                    formData.append('id', id);
                    formData.append('personType', personType);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'post',
                        url: '/people/update-image',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(resp) {
                            setTimeout(function() {
                                document.location.reload(true);
                            }, 500);
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: resp,
                                showConfirmButton: false,
                                timer: 1500
                            })

                        },
                        /* error: function() {
                             Swal.fire({
                                 type: 'error',
                                 title: 'Oops...',
                                 text: 'Something went wrong!'
                             })
                         }*/
                    })
                }
            })
        })

    </script>





@endsection
