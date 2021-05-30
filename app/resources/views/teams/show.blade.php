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
                            <button class="btn btn-success" id="btn-modal-practices"
                            data-teamId="{{ $data['team']->id }}" data-csrf="{{ csrf_token() }}"
                            >Calendario entrenamientos</button>
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
                                        <td>Jugadores</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['contracts'] as $contract)
                                        @if ($contract->person->personable_type == 'App\Models\Player')
                                            <tr>
                                                <td>{{ $contract->person->name }}</td>
                                                <td>
                                                    <form class="form-inline mb-2" id="del_event{{ $contract->person->id }}"
                                                        action="{{ route('players.removeFromTeam', $contract->person->id)  }}"
                                                        method="POST">
                                                            <div class="form-group">
                                                                @csrf
                                                                <button class=" del_id table-btn table-btn-danger" type="submit"
                                                                    data-attrId="{{ $contract->person->id }}"><i
                                                                        class="fa fa-trash"></i></button>
                                                            </div>
                                                            <div class="form-group">
                                                                <a href="{{ route('players.show', $contract->person->personable_id) }}"
                                                                        class="pull-right table-btn table-btn-success">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                            </div>
                                                            <div class="form-group">
                                                                <button
                                                                    class="pull-right modal_id table-btn move-player-modal table-btn-warning"
                                                                    data-personId={{ $contract->person->id }}
                                                                    data-csrf="{{ csrf_token() }}"  type="button">
                                                                    <i class="fa fa-send"></i>
                                                                </button>
                                                            </div>
                                                    </form>
                                                </td>
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
