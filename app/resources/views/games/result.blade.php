<section class="hero-wrap hero-wrap-3"  data-stellar-background-ratio="0.5">
        <div class="col-md-12">
            <div class="scoreboard scoreboard-3 slash">
                <div class="divider ftco-animate text-center mb-4">
                    <span>{{ $data['game']->date_formateada }}</span></div>
                <div class="sport-team-wrap ftco-animate">
                    <span class="vs">vs</span>
                    <div class="d-sm-flex mb-4">
                        <div class="sport-team d-flex align-items-center">
                            <div class="img logo"
                                style="background-image: url({{ $data['game']->home ? $data['game']->team->image_path : $data['game']->opponent->image_path }});">
                            </div>
                            <div class="text-center px-1 px-md-3 desc">
                                <h3 class="
                                @if ($data['game']->home) {{ $data['game']->victory ? 'score win' : 'score lost' }}

                                @else
                                    {{ $data['game']->victory ? 'score lost' : 'score win' }} @endif
                                    ">
                                    <span>{{ $data['game']->home ? $data['game']->points : $data['game']->opponent_points }}</span>
                                </h3>
                                <h4 class="team-name">
                                    {{ $data['game']->home ? $data['game']->team->short_name : $data['game']->opponent->name }}
                                </h4>
                            </div>
                        </div>
                        <div class="sport-team d-flex align-items-center">
                            <div class="img logo order-sm-last"
                                style="background-image: url({{ $data['game']->home ? $data['game']->opponent->image_path : $data['game']->team->image_path }});">
                            </div>
                            <div class="text-center px-1 px-md-3 desc">
                                <h3 class="
                                @if (!$data['game']->home) {{ $data['game']->victory ? 'score win' : 'score lost' }}

                                @else
                                    {{ $data['game']->victory ? 'score lost' : 'score win' }} @endif
                                    ">
                                    <span>{{ $data['game']->home ? $data['game']->opponent_points : $data['game']->points }}</span>
                                </h3>
                                <h4 class="team-name">
                                    {{ $data['game']->home ? $data['game']->opponent->name : $data['game']->team->short_name }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
  </section>
