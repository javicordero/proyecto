<section class="ftco-section pt-2">
    <div class="container">
            <div class="heading-section ftco-animate">
                <span class="subheading">Resultados</span>
              <h2 class="mb-4">últimos partidos</h2>
            </div>

      <div class="row ">

@foreach ($data['lastGames'] as $game)
                <div class="col-lg-12">
                    <div class="scoreboard scoreboard-2 slash scoreboard-4 scoreboard-5">
                        <div class="divider ftco-animate text-center mb-4">
                            <span>{{ $game->date_formateada }}</span></div>
                        <div class="sport-team-wrap ftco-animate">
                            <span class="vs d-xl-block d-lg-none d-xs-block">vs</span>
                            <div class="d-sm-flex mb-4">
                                <div class="sport-team d-flex align-items-center">
                                    <div class="img logo"
                                        style="background-image: url({{ $game->home ? $game->team->logo_image_path : $game->opponent->image_path }});">
                                    </div>
                                    <div class="text-center px-1 px-md-3 desc">
                                        <h3 class="
                                        @if ($game->home) {{ $game->victory ? 'score win' : 'score lost' }}

                                        @else
                                            {{ $game->victory ? 'score lost' : 'score win' }} @endif
                                            ">
                                            <span>{{ $game->home ? $game->points : $game->opponent_points }}</span>
                                        </h3>
                                        <h4 class="team-name d-xl-block d-lg-none d-xs-block">
                                            {{ $game->home ? $game->team->short_name : $game->opponent->name }}
                                        </h4>
                                    </div>
                                </div>
                                <div class="sport-team d-flex align-items-center">
                                    <div class="img logo order-sm-last"
                                        style="background-image: url({{ $game->home ? $game->opponent->image_path : $game->team->logo_image_path }});">
                                    </div>
                                    <div class="text-center px-1 px-md-3 desc">
                                        <h3 class="
                                        @if (!$game->home) {{ $game->victory ? 'score win' : 'score lost' }}

                                        @else
                                            {{ $game->victory ? 'score lost' : 'score win' }} @endif
                                            ">
                                            <span>{{ $game->home ? $game->opponent_points : $game->points }}</span>
                                        </h3>
                                        <h4 class="team-name d-xl-block d-lg-none d-xs-block">
                                            {{ $game->home ? $game->opponent->name : $game->team->short_name }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center ftco-animate">
                            <p class="mb-0"><a href="{{ route('games.show', $game) }}" class="btn btn-black">Detalles</a></p>
                        </div>
                    </div>
                </div>
                @endforeach
      </div>
    </div>
</section>
