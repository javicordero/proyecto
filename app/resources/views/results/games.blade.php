


<div class="col-md-8">
    <div class="heading-section ftco-animate">
        <span class="subheading">Game Report</span>
      <h2 class="mb-4">Baseball Game Reports 2019</h2>
    </div>
    <div class="row">
        @foreach ($data['games'] as $game)

        <div class="col-md-12">
            <div class="scoreboard scoreboard-2 slash">
                <div class="divider ftco-animate text-center mb-4">
                    <span>{{ $game->date_formateada }}</span></div>
                <div class="sport-team-wrap ftco-animate">
                    <span class="vs">vs</span>
                    <div class="d-sm-flex mb-4">
                        <div class="sport-team d-flex align-items-center">
                            <div class="img logo"
                                style="background-image: url({{ $game->home ? $game->team->image_path : $game->opponent->image_path }});">
                            </div>
                            <div class="text-center px-1 px-md-3 desc">
                                <h3 class="
                                @if ($game->home) {{ $game->victory ? 'score win' : 'score lost' }}

                                @else
                                    {{ $game->victory ? 'score lost' : 'score win' }} @endif
                                    ">
                                    <span>{{ $game->home ? $game->points : $game->opponent_points }}</span>
                                </h3>
                                <h4 class="team-name">
                                    {{ $game->home ? $game->team->short_name : $game->opponent->name }}
                                </h4>
                            </div>
                        </div>
                        <div class="sport-team d-flex align-items-center">
                            <div class="img logo order-sm-last"
                                style="background-image: url({{ $game->home ? $game->opponent->image_path : $game->team->image_path }});">
                            </div>
                            <div class="text-center px-1 px-md-3 desc">
                                <h3 class="
                                @if (!$game->home) {{ $game->victory ? 'score win' : 'score lost' }}

                                @else
                                    {{ $game->victory ? 'score lost' : 'score win' }} @endif
                                    ">
                                    <span>{{ $game->home ? $game->opponent_points : $game->points }}</span>
                                </h3>
                                <h4 class="team-name">
                                    {{ $game->home ? $game->opponent->name : $game->team->short_name }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center ftco-animate">
                    <p class="mb-0"><a href="#" class="btn btn-black">Detalles</a></p>
                </div>
            </div>
        </div>
    @endforeach

    </div>
    @include('paginator.default', ['paginator' => $data['games']])



  </div>
