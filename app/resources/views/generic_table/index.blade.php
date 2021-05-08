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
                      <h2>{{ $data['title'] }} <small>Users</small></h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <p class="text-muted font-13 m-b-30">
                        DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                      </p>
                      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            @foreach ($data['spanishColumns'] as $column)
                                <td>{{ $column }}</td>
                            @endforeach
                                <td>Acciones</td>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data['all'] as $attribute)
                            <tr>
                                @foreach ($data['columns'] as $column)
                                    <td>{{ $attribute->$column }}</td>
                                @endforeach
                                <td>
                                    <form id="del_event{{ $attribute->id }}" action="{{ route($data['tableName'].'.destroy', $attribute) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger del_id" type="submit" data-attrId="{{ $attribute->id }}">Borrar</button>
                                    </form>
                                </td>
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
