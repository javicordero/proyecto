@extends('admin.layouts.layout')


@section('contentHeader')
<!-- page content -->
<div class="right_col" role="main">
    <div class="" id="csrf" data-csrf="{{ csrf_token() }}">

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title index-title">
                        <div class="index-title-title">
                            <h2>Resultados
                            </h2>
                        </div>
                        <div class="index-title-button">
                        </div>
                    </div>
                    @endsection
                    @section('content')
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                        </p>
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Equipo</td>
                                    <td>Rival</td>
                                    <td>Fecha</td>
                                    <td>Resultado</td>
                                    <td>Video</td>
                                    <td>Acciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['games'] as $game)
                                <tr>
                                    <td>{{ $game->id }}</td>
                                    <td>{{ $game->team->name }}</td>
                                    <td>{{ $game->opponent->name }}</td>
                                    <td>{{ $game->date_formateada }}</td>
                                    <td>{{ $game->result }}</td>
                                    <td>@if ($game->video)
                                        <a href="{{ $game->video }}" target="blank">Video</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <button class="pull-right modal_id table-btn table-btn-warning game-video-modal" data-attrId="{{ $game->id }}" data-csrf="{{ csrf_token() }}" id="" type="button">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </div>
                                        <div class="form-group">
                                            <a href="{{ route('admin.games.show', $game->id) }}" class="pull-right table-btn table-btn-success">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                <div id="divModal">

                                </div>
                            </tbody>
                        </table>
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



@endsection
