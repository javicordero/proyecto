@extends('layouts.layout')

@section('contentHeader')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Perfil de
                                {{ $data['person']->personable_type_name }}<small>{{ $data['person']->currentTeam->name }}
                                    (Nombre del equipo)</small></h2>
                            <div class="clearfix"></div>
                        </div>
                    @endsection

                    @section('content')
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                            </p>
                            <div class="col-md-2 col-sm-2 col-xs-12 profile_left">
                                <div class="profile_img">
                                    <div id="crop-avatar">
                                        <!-- Current avatar -->
                                        <img class="img-responsive avatar-view" src="{{ $data['person']->image_path }}"
                                            alt="Avatar" title="Change the avatar" width="300" height="300" />
                                    </div>
                                </div>
                                <h3>{{ $data['person']->name }}</h3>
                                <ul class="list-unstyled user_data">
                                    <li><i class="fa fa-phone user-profile-icon"></i> {{ $data['person']->phone }}
                                    </li>
                                    <li>
                                        <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                                    </li>
                                    <li class="m-top-xs">
                                        <i class="fa fa-external-link user-profile-icon"></i>
                                        <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                                    </li>
                                </ul>
                                <button class="btn btn-success" id="image"><i class="fa fa-edit m-right-xs"></i>Cambiar
                                    Imagen</button>
                                <br />
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <div class="profile_title mb-2">
                                    <div class="col-md-6">
                                        <h2>User Activity Report</h2>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                                @if ($data['person']->personable_type_name == 'Jugador')
                                    @include('players.skills')

                                @endif
                                @include('people.historial')
                                @if ($data['person']->personable_type_name == 'Jugador')

                                @endif
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



    <script>
        $(document).ready(function() {
            $('.progress-bar').each(function() {
                if ($(this).attr('data-transitiongoal') <= 30) {
                    $(this).addClass('bg-red');
                } else {
                    if ($(this).attr('data-transitiongoal') <= 60) {
                        $(this).addClass('bg-blue');
                    } else {
                        $(this).addClass('bg-green');
                    }
                }
            });
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
