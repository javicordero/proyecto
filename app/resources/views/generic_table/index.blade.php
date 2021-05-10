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
                                <small>
                                    @if ($data['buttonList']['create'])
                                        <button class="btn btn-success modal_id table-btn" data-toggle="modal"
                                            data-target="#create" type="button">Crear</button>
                                    @endif

                                </small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
@endsection


                    @section('content')
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                                @include('generic_table.create')
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
                                                            <button class="btn btn-primary pull-right modal_id table-btn"
                                                                data-toggle="modal"
                                                                data-target="#edit{{ $attribute->id }}" type="button">
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
                                            @include('generic_table.edit')
                                        </tr>
                                    @endforeach
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

@endsection
