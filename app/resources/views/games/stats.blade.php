<div class="col-lg-8 col-xs-12">
    <div class="heading-section ftco-animate">
        <span class="subheading">Game Report</span>
      <h2 class="mb-4">Estadísticas</h2>
    </div>
    <div class="row">
    <table class="table table-league">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th >Jugador</th>
                    <th class="text-center">Minutos</th>
                    <th class="text-center">Puntos</th>
                    <th class="text-center">Asistencias</th>
                    <th class="text-center">Rebotes</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data['players'] as $player)

                  <tr>
                    <td class="text-center">{{ $player->pivot->number }}</td>
                    <td>{{ $player->person->full_name }}</td>
                    <td class="text-center">{{ $player->pivot->minutes }}</td>
                    <td class="text-center">{{ $player->pivot->points }}</td>
                    <td class="text-center">{{ $player->pivot->assists }}</td>
                    <td class="text-center">{{ $player->pivot->rebounds }}</td>
                  </tr>
                  @endforeach
                  <tr style="background-color: #207dff;">
                    <td class="text-center">#</td>
                    <td class></td>
                    <td class="text-center">{{ 200 }}</td>
                    <td class="text-center">{{ $data['players']->sum('pivot.points') }}</td>
                    <td class="text-center">{{ $data['players']->sum('pivot.assists') }}</td>
                    <td class="text-center">{{ $data['players']->sum('pivot.rebounds') }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
</div>
