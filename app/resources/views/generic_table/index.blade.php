@extends('layouts.layout')

@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

              <div class="clearfix"></div>

              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>{{ $data['title'] }} <small><button class="btn btn-success modal_id table-btn" data-toggle="modal" data-target="#create" type="button">Crear</button></small></h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <p class="text-muted font-13 m-b-30">
                          {{ Route::current()->getName() }}
                        @include('generic_table.create')
                    </p>
                      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            @foreach ($data['columns'] as $column)
                            @if (is_array($column))
                                @foreach ($column as $key => $value)
                                <td>{{  __($value)  }}</td>
                                @endforeach
                            @else
                                <td>{{  __($column)  }}</td>
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
                                            <td>{{  $attribute->$value }}</td>
                                        @endforeach
                                    @else
                                        <td>{{ $attribute->$column }}</td>
                                    @endif
                                @endforeach
                                <td>
                                    <form class="form-inline mb-2" id="del_event{{ $attribute->id }}" action="{{ route($data['tableName'].'.destroy', $attribute) }}" method="POST">
                                        <div class="form-group">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger del_id table-btn" type="submit" data-attrId="{{ $attribute->id }}">Borrar</button>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary pull-right modal_id table-btn" data-toggle="modal" data-target="#edit{{ $attribute->id }}" type="button">
                                                Editar
                                            </button>
                                        </div>
                                    </form>
                                </td>

                                @include('generic_table.edit')

                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /page content -->
@endsection

@section('customJs')



@endsection
