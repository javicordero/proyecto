{{-- Start partidos --}}
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Últimos partidos <small></small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Resultado</th>
                        <th class="text-center">Minutos</th>
                        <th class="text-center">Puntos</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data['person']->personable->games()->where('played', 1)->get() as $game)
                    <tr class="{{ $game->victory ? 'bg-success' : 'bg-danger'}}">
                        <td>{{ $game->date->format('d-m-Y') }}</td>
                        <td><a href="{{ route('admin.games.show', $game) }}">{{ $game->result }}</a></td>
                        <td>{{ $game->pivot->minutes }}</td>
                        <td>{{ $game->pivot->points }}</td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- End partidos --}}
