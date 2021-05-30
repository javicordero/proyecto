{{-- Start partidos --}}
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Próximos partidos <small></small></h2>
            <div class="clearfix"></div>
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
                                <td>{{ $game->opponent }}</td>
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
