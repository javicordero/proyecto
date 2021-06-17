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
                                style="background-image: url({{ $data['game']->home ? $data['game']->team->logo_image_path : $data['game']->opponent->image_path }});">
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
                                style="background-image: url({{ $data['game']->home ? $data['game']->opponent->image_path : $data['game']->team->logo_image_path }});">
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

  <section class="ftco-section ftco-no-pt ftco-highlights ftco-highlights-2 div-video">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="img video-wrap ftco-animate d-flex align-items-center justify-content-center video-wrap-2"
                    style="width: 100%;">
                    <iframe style="width: 100%; height: 100%"  src="{{ $data['game']->video_url }}" title="YouTube video player"
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

