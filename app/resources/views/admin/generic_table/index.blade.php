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
                                <h2>{{ $data['title'] }}
                                </h2>
                            </div>
                            <div class="index-title-button">
                                @if ($data['buttonList']['create'])
                                    <button class="btn btn-success modal_id " @if ($data['tableName'] == 'people') id="create-person" {{-- Para tabla personas --}}
                                    @else
                                                id="create-modal" {{-- Para el resto de tablas --}} @endif
                                        type="button" data-class="{{ $data['class'] }}"
                                        data-tableName="{{ $data['tableName'] }}" data-csrf="{{ csrf_token() }}"
                                        type="button">
                                        Nuevo
                                        <i class="fa fa-plus"></i>

                                    </button>
                                @endif
                            </div>
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
                                                @if ($data['buttonList']['delete'])
                                                    <form class="form-inline mb-2" id="del_event{{ $attribute->id }}"
                                                        action="{{ route('admin.'.$data['tableName'] . '.destroy', $attribute->id) }}"
                                                        method="POST">
                                                        <div class="form-group">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class=" del_id table-btn table-btn-danger" type="submit"
                                                                data-attrId="{{ $attribute->id }}"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </div>
                                                @endif
                                                @if ($data['buttonList']['edit'])
                                                    <div class="form-group">
                                                        <button
                                                            class="pull-right modal_id table-btn edit-modal table-btn-warning"
                                                            @if ($data['class'] == 'App\Models\People') data-class="{{ $attribute->personable_type }}"
                                                                        data-attrId="{{ $attribute->personable->id }}"
                                                                @else
                                                                        data-attrId="{{ $attribute->id }}" @endif data-csrf="{{ csrf_token() }}"
                                                            data-class="{{ $data['class'] }}"
                                                            data-tableName="{{ $data['tableName'] }}" @if ($data['tableName'] == 'teams')
                                                            id="edit-team"
                                                            @endif type="button">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                    </div>
                                                @endif
                                                @if ($data['buttonList']['show'])
                                                    <div class="form-group">
                                                        @if ($data['tableName'] == 'people')
                                                            <a href="{{ route('admin.'.$attribute->personable_type::TableName() . '.show', $attribute->personable_id) }}"
                                                            {{-- Enlace para tabla desde People llegar al tipo de persona correcto --}} @else <a
                                                                href="{{ route('admin.'.$data['tableName'] . '.show', $attribute->id) }}"
                                                                @endif

                                                                class="pull-right table-btn table-btn-success">
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
                    position: 'top-end',
                    icon: 'success',
                    title: message,
                    showConfirmButton: false,
                    timer: 1500
                })
            });

        </script>
    @endif


    @if (session('status'))
        <script>
            if (@json(session('status') == 'player-created')) {
                let csrf = $('#csrf').attr('data-csrf');
                var formData = new FormData();
                formData.append("_token", csrf);
                $.ajax({
                    type: "post",
                    url: "/players/getDataForPlayersCreateAttributes",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // console.log(response);
                        $("#divModal").html(response);
                        $("#players-create-attributes").modal("show");
                    },
                });
            }

        </script>
    @endif


@endsection
