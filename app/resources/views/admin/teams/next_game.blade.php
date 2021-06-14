{{-- Start partidos --}}
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title index-title">
            <div class="index-title-title">
                <h2>Próximo partido
                    <small></small>
                </h2>
            </div>
            <div class="index-title-button">
                <button class="btn btn-success modal_id " type="button" data-csrf="{{ csrf_token() }}"
                data-teamId="{{ $data['team']->id }}"
                type="button"
                id="convocatoria-modal">
                    Hacer convocatoria
                </button>
            </div>
        </div>
        <div class="x_content">
            <div class="col-lg-12  col-xs-12">
                @if (!$data['nextGame'])

                @else
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Rival</th>
                            <th class="text-center">Lugar</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{ $data['nextGame']->date->format('d-m-Y') }}</td>
                                <td>{{ $data['nextGame']->opponent->name }}</td>
                                <td>{{ $data['nextGame']->place }}</td>
                            </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered" id="team-players-table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['nextGame']->players as $player)
                            <tr>
                                <td>{{ $player->number }}</td>
                                <td>{{ $player->person->full_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
    {{-- End partidos --}}

</div>
