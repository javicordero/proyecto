<section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="heading-section text-center ftco-animate">
                    <span class="subheading">Último partido</span>
                    <h2 class="mb-4">Último partido</h2>
                </div>
                <div class="scoreboard slash">
                    <div class="divider ftco-animate text-center mb-4">
                        <span>{{ $data['lastGame']->date_formateada }}</span></div>
                    <div class="sport-team-wrap ftco-animate">
                        <span class="vs">vs</span>
                        <div class="d-sm-flex mb-4">
                            <div class="sport-team d-flex align-items-center">
                                <div class="img logo"
                                    style="background-image: url({{ $data['lastGame']->home ? $data['lastGame']->team->image_path : $data['lastGame']->opponent->image_path }});">
                                </div>
                                <div class="text-center px-1 px-md-3 desc">
                                    <h3 class="
                                    @if ($data['lastGame']->home) {{ $data['lastGame']->victory ? 'score win' : 'score lost' }}

                                    @else
                                        {{ $data['lastGame']->victory ? 'score lost' : 'score win' }} @endif
                                        ">
                                        <span>{{ $data['lastGame']->home ? $data['lastGame']->points : $data['lastGame']->opponent_points }}</span>
                                    </h3>
                                    <h4 class="team-name">
                                        {{ $data['lastGame']->home ? $data['lastGame']->team->short_name : $data['lastGame']->opponent->name }}
                                    </h4>
                                </div>
                            </div>
                            <div class="sport-team d-flex align-items-center">
                                <div class="img logo order-sm-last"
                                    style="background-image: url({{ $data['lastGame']->home ? $data['lastGame']->opponent->image_path : $data['lastGame']->team->image_path }});">
                                </div>
                                <div class="text-center px-1 px-md-3 desc">
                                    <h3 class="
                                    @if (!$data['lastGame']->home) {{ $data['lastGame']->victory ? 'score win' : 'score lost' }}

                                    @else
                                        {{ $data['lastGame']->victory ? 'score lost' : 'score win' }} @endif
                                        ">
                                        <span>{{ $data['lastGame']->home ? $data['lastGame']->opponent_points : $data['lastGame']->points }}</span>
                                    </h3>
                                    <h4 class="team-name">
                                        {{ $data['lastGame']->home ? $data['lastGame']->opponent->name : $data['lastGame']->team->short_name }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center ftco-animate">
                        <p class="mb-0"><a href="{{ route('games.show', $data['lastGame']) }}" class="btn btn-black">Detalles</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
