{{-- Start partidos --}}
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title index-title">
            <div class="index-title-title">
                <h2>Próximos partidos
                </h2>
            </div>
            <div class="index-title-button">
                <button class="btn btn-success modal_id " type="button" data-csrf="{{ csrf_token() }}"
                data-tableName="games"
                data-teamId="{{ $data['team']->id }}"
                id="create-modal"
                type="button">
                    Añadir
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="x_content">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Rival</th>
                        <th class="text-center">Lugar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data['nextGames'] as $game)
                        <tr>
                            <td>{{ $game->date->format('d-m-Y') }}</td>
                            <td>{{ $game->opponent->name }}</td>
                            <td>{{ $game->place }}</td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- End partidos --}}
