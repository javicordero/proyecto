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
                            <h2>Jugadores
                            </h2>
                        </div>
                        <div class="index-title-button">
                            @if ($data['buttonList']['create'])
                            <button class="btn btn-success modal_id " id="create-modal" {{-- Para el resto de tablas --}} type="button" data-class="App\Models\Players" data-tableName="players" data-csrf="{{ csrf_token() }}" type="button">
                                Nuevo
                            </button>
                            @endif
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
                                    <td>Nombre</td>
                                    <td>Apellidos</td>
                                    <td>Teléfono</td>
                                    <td>Fecha de nacimiento</td>
                                    <td>Número favorito</td>
                                    <td>Acciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['players'] as $player)
                                <tr>
                                    <td>{{ $player->id }}</td>
                                    <td>{{ $player->person->name }}</td>
                                    <td>{{ $player->person->surname }}</td>
                                    <td>{{ $player->person->phone }}</td>
                                    <td>{{ $player->person->birth_date }}</td>
                                    <td>{{ $player->number }}</td>
                                    <td>
                                        @if ($data['buttonList']['edit'])
                                        <div class="form-group">
                                            <button class="pull-right modal_id table-btn edit-modal table-btn-warning" data-attrId="{{ $player->id }}" data-csrf="{{ csrf_token() }}" {{-- data-class="{{ $data['class'] }}" --}} data-tableName="players" type="button">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </div>
                                        @endif
                                        @if ($data['buttonList']['show'])
                                        <div class="form-group">
                                            <a href="{{ route('admin.players.show', $player->id) }}" class="pull-right table-btn table-btn-success">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                        @endif
                                        </form>
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
