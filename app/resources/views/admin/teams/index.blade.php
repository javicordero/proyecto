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
                            <h2>Equipos
                            </h2>
                        </div>
                        <div class="index-title-button">
                            @if ($data['buttonList']['create'])
                            <button class="btn btn-success modal_id " id="create-modal" {{-- Para el resto de tablas --}} type="button" data-class="App\Models\Teams" data-tableName="teams" data-csrf="{{ csrf_token() }}" type="button">
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
                                    <td>Entrenador</td>
                                    <td>Acciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['teams'] as $team)
                                <tr>
                                    <td>{{ $team->id }}</td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->current_coach->full_name }}</td>
                                    <td>
                                        @if ($data['buttonList']['delete'])
                                        <form class="form-inline mb-2" id="del_event{{ $team->id }}" action="{{ route('admin.teams.destroy', $team->id) }}" method="POST">
                                            <div class="form-group">
                                                @csrf
                                                @method('DELETE')
                                                <button class=" del_id table-btn table-btn-danger" type="submit" data-attrId="{{ $team->id }}"><i class="fa fa-trash"></i></button>
                                            </div>
                                            @endif
                                            @if ($data['buttonList']['edit'])
                                            <div class="form-group">
                                                <button class="pull-right modal_id table-btn edit-modal table-btn-warning" id="edit-team" data-attrId="{{ $team->id }}" data-csrf="{{ csrf_token() }}" {{-- data-class="{{ $data['class'] }}" --}} data-tableName="teams" type="button">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </div>
                                            @endif
                                            @if ($data['buttonList']['show'])
                                            <div class="form-group">
                                                <a href="{{ route('admin.teams.show', $team->id) }}" class="pull-right table-btn table-btn-success">
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
