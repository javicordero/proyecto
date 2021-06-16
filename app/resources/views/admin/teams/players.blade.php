{{-- Start jugadores --}}
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title index-title">
            <div class="index-title-title">
                <h2>Jugadores
                    <small></small>
                </h2>
            </div>
            @if ($data['team']->current_coach->user == Auth::user() || Auth::user()->role == 1)
                <div class="index-title-button">
                    <button class="btn btn-success modal_id " type="button" data-csrf="{{ csrf_token() }}"
                    data-teamId="{{ $data['team']->id }}"
                    type="button"
                    id="freePlayers-modal">
                        Añadir
                    </button>
                </div>
            @endif
        </div>
        <div class="x_content">
            <div class="col-lg-12  col-xs-12">
                <table class="table table-striped table-bordered" id="team-players-table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['players'] as $person)
                            <tr>
                                <td>{{ $person->personable->number }}</td>
                                <td>{{ $person->full_name }}</td>
                                <td>
                                    <form class="form-inline" id="del_event{{ $person->id }}"
                                        action="{{ route('admin.players.removeFromTeam', $person->id) }}" method="POST">
                                         @if ($data['team']->current_coach && $data['team']->current_coach->user == Auth::user() || Auth::user()->role == 1)
                                        <div class="form-group">
                                            @csrf
                                            <button class=" del_id table-btn table-btn-danger" type="submit"
                                                data-attrId="{{ $person->id }}" data-toggle="tooltip" data-placement="top" title="Eliminar del equipo"><i class="fa fa-trash"></i></button>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <a href="{{ route('admin.players.show', $person->personable_id) }}"
                                                class="pull-right table-btn table-btn-success">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                        @if (Auth::user()->role == 1)
                                            <div class="form-group">
                                                <button
                                                    class="pull-right modal_id table-btn move-player-modal table-btn-warning"
                                                    data-personId={{ $person->id }} data-csrf="{{ csrf_token() }}"
                                                    type="button"  data-toggle="tooltip" data-placement="top" title="Mover a otro equipo">
                                                    <i class="fa fa-send"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- End jugadores --}}

</div>
