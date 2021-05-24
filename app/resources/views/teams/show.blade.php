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
                            <button class="btn btn-success table-btn" id="btn-modal-practices"
                            data-teamId="{{ $data['team']->id }}" data-csrf="{{ csrf_token() }}"
                            >Calendario entrenamientos</button>
                        </div>
                    @endsection

                    @section('content')
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                            </p>
                            <table id="datatable-responsive" class="table table-striped table-bordered nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <td>Jugadores</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['contracts'] as $contract)
                                        @if ($contract->person->personable_type == 'App\Models\Player')
                                            <tr>
                                                <td>{{ $contract->person->name }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endsection
                    <div id="divModal">

                    </div>
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
@endsection
