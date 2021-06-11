<section class="ftco-section ftco-game-schedule">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-6 heading-section text-center ftco-animate">
                <span class="subheading">Resultados</span>
                <h2 class="mb-4">Resultados</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 d-flex">
                <div class="img img-game d-flex align-selg-stretch"
                    style="background-image: url(public-template/images/about-1.jpg);"></div>
            </div>
            <div class="col-md-5">
                @foreach ($data['lastGames'] as $game)
                <div class="game-sched text-vs text-center mb-1 ftco-animate">
                    <div class="divider">
                        <p><span>{{ $game->date_formateada }}</span></p>
                    </div>
                    <div class="d-flex sched-wrap">
                        <span class="vs vsCustom">{{ $game->home ? $game->points : $game->opponent_points}} - {{ $game->home ? $game->opponent_points : $game->points }}</span>
                        <div class="team-logo text-center">
                            <div class="img" style="background-image: url({{ $game->home ? $game->team->image_path : $game->opponent->image_path}});"></div>
                            <h3><span>{{ $game->home ? $game->team->short_name : $game->opponent->name }}</span></h3>
                        </div>
                        <div class="team-logo text-center">
                            <div class="img" style="background-image: url({{ $game->home ? $game->opponent->image_path : $game->team->image_path  }});"></div>
                            <h3><span>{{ $game->home ? $game->opponent->name : $game->team->short_name}}</span></h3>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
