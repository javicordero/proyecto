@extends('admin.layouts.layout')

@section('contentHeader')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            {{ $game->result_with_names }}
                            <small></small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    @endsection
                    @section('content')
                    {{-- Start partidos --}}
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Estadísticas <small></small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Jugador</th>
                                            <th>Minutos</th>
                                            <th>Puntos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($game->players as $player)
                                        <tr>
                                            <td>{{ $player->pivot->number }}</td>
                                            <td>{{ $player->person->full_name }}</td>
                                            <td>{{ $player->pivot->minutes }}</td>
                                            <td>{{ $player->pivot->points }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- End partidos --}}
                    @endsection

                    @section('contentCerrarDivs')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection
