{{-- Start equipos --}}
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Equipos<small></small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-lg-12  col-xs-12">
                <table class="table table-striped table-bordered" id="team-players-table">
                    <thead>
                        <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Días de entrenamiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['person']->personable->current_teams as $team)
                            <tr>
                                <td><a href="{{ route('admin.teams.show', $team->id) }}"> {{ $team->name }}</a></td>
                                <td>
                                    <ul style="padding-left: 0; list-style: none;">
                                        @foreach ( $team->practiceDays as $practiceDay)
                                            <li class="p-0">{{ $practiceDay->day_name }}: {{ $practiceDay->time }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- End equipos --}}
