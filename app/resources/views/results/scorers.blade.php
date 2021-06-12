<div class="sidebar-box">
    <h2 class="mb-4">Máximos Anotadores</h2>
    <div class="row">
        @foreach ($data['scorers'] as $player)
        <div class="col-md-6 top-score pb-4 mb-1">
            <div class="img" style="background-image: url({{ $player->person->image_path }});"></div>
            <div class="text text-center">
                <h3 class="mb-0">{{ $player->person->full_name }}</h3>
                <span class="score">{{ $player->avg_points }} pts / {{ $player->games_played }} partidos </span>
            </div>
        </div>
        @endforeach
    </div>
</div>
