@extends('layouts.layout')


@section('contentHeader')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{ $data['title'] }}
                                <span>
                                    <!-- Botón crear para todas las tablas -->
                                    @if ($data['buttonList']['create'])
                                        <button class="btn btn-success modal_id table-btn" id="create-modal" type="button"
                                            data-class="{{ $data['class'] }}" data-csrf="{{ csrf_token() }}"
                                            type="button">
                                            Crear
                                        </button>
                                    @endif

                                    <!-- Botón crear para tabla personas -->
                                    @if ($data['class'] == 'App\Models\People')
                                        <button class="btn btn-success table-btn" id="create-person"
                                            data-csrf="{{ csrf_token() }}" type="button">
                                            Crear
                                        </button>
                                    @endif
                                </span>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                    @endsection
                    @section('content')
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">

                            </p>
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        @foreach ($data['columns'] as $column)
                                            @if (is_array($column))
                                                @foreach ($column as $key => $value)
                                                    <td>{{ __($value) }}</td>
                                                @endforeach
                                            @else
                                                <td>{{ __($column) }}</td>
                                            @endif
                                        @endforeach
                                        <td>Acciones</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['all'] as $attribute)
                                        <tr>
                                            @foreach ($data['columns'] as $column)
                                                @if (is_array($column))
                                                    @foreach ($column as $key => $value)
                                                        <td>{{ $attribute->$value }}</td>
                                                    @endforeach
                                                @else
                                                    <td>{{ $attribute->$column }}</td>
                                                @endif
                                            @endforeach
                                            <td>
                                                <form class="form-inline mb-2" id="del_event{{ $attribute->id }}"
                                                    action="{{ route($data['tableName'] . '.destroy', $attribute->id) }}"
                                                    method="POST">
                                                    @if ($data['buttonList']['delete'])
                                                        <div class="form-group">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger del_id table-btn" type="submit"
                                                                data-attrId="{{ $attribute->id }}">Borrar</button>
                                                        </div>
                                                    @endif
                                                    @if ($data['buttonList']['edit'])
                                                        <div class="form-group">
                                                            <button
                                                                class="btn btn-primary pull-right modal_id table-btn edit-modal"
                                                                data-class="{{ $data['class'] }}"
                                                                data-attrId="{{ $attribute->id }}"
                                                                data-csrf="{{ csrf_token() }}" type="button">
                                                                Editar
                                                            </button>
                                                        </div>
                                                    @endif
                                                    @if ($data['buttonList']['show'])
                                                        <div class="form-group">
                                                            <a href="{{ route($data['tableName'] . '.show', $attribute->id) }}"
                                                                class="btn btn-success pull-right modal_id table-btn">
                                                                Ver
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

    <script src="{{ asset('js/modal/modal.js') }}"></script>
@endsection
