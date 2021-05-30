@extends('layouts.layout')

@section('contentHeader')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{ $data['team']->name }}</h2>
                            <div class="clearfix"></div>
                        </div>
                    @endsection

                    @section('content')
                        <div class="x_content">
                            <div class="col-lg-4 col-xs-12">
                                @include('teams.players')
                            </div>
                            <div class="col-lg-4 col-xs-12">
                                @include('teams.last_games')
                            </div>
                            <div class="col-lg-4 col-xs-12">
                                @include('teams.next_games')
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
