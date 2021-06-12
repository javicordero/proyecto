
    <section class="ftco-section ftco-game-schedule ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-section text-center ftco-animate mb-4">
                    <span class="subheading">Calendario</span>
                    <h2 class="mb-4">Calendario</h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12 carousel-game-schedule owl-carousel">
                    @foreach ($data['nextGames'] as $game)
                    <div class="item">
                        <div class="game-sched text-vs text-center">
                            <div class="divider">
                                <p><span>{{ $game->date_formateada }}</span></p>
                            </div>
                            <div class="d-flex sched-wrap">
                                <span class="vs">vs</span>
                                <div class="team-logo text-center">
                                    <div class="img" style="background-image: url({{ $game->home ? $game->team->image_path : $game->opponent->image_path}});">
                                    </div>
                                    <h3><span>{{ $game->home ? $game->team->short_name : $game->opponent->name }}</span></h3>
                                </div>
                                <div class="team-logo text-center">
                                    <div class="img" style="background-image: url({{ $game->home ? $game->opponent->image_path : $game->team->image_path  }});">
                                    </div>
                                    <h3><span>{{ $game->home ? $game->opponent->name : $game->team->short_name}}</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
