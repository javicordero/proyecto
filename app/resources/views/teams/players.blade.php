{{-- Start partidos --}}
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Jugadores<small></small></h2>
            <div class="clearfix"></div>
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
                                <td>{{ $person->name }}</td>
                                <td>
                                    <form class="form-inline" id="del_event{{ $person->id }}"
                                        action="{{ route('players.removeFromTeam', $person->id) }}" method="POST">
                                        <div class="form-group">
                                            @csrf
                                            <button class=" del_id table-btn table-btn-danger" type="submit"
                                                data-attrId="{{ $person->id }}"><i class="fa fa-trash"></i></button>
                                        </div>
                                        <div class="form-group">
                                            <a href="{{ route('players.show', $person->personable_id) }}"
                                                class="pull-right table-btn table-btn-success">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                        <div class="form-group">
                                            <button
                                                class="pull-right modal_id table-btn move-player-modal table-btn-warning"
                                                data-personId={{ $person->id }} data-csrf="{{ csrf_token() }}"
                                                type="button">
                                                <i class="fa fa-send"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- End partidos --}}

</div>
