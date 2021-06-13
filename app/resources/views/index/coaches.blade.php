<section class="ftco-section testimony-section slash">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                <span class="subheading">El equipo</span>
                <h2 class="mb-4">Entrenadores</h2>
            </div>
        </div>
        <div class="row ftco-animate justify-content-center">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    @foreach ($data['coaches'] as $coach)
                        <div class="item">
                            <div class="testimony-wrap text-center">
                                <div class="user-img "
                                    style="background-image: url({{ $coach->person->image_path }})">

                                </div>
                                <div class="text p-3">
                                    <p class="name">{{ $coach->person->fullname }}</p>
                                    @foreach ($coach->current_teams as $team)
                                    <p class="position m-0">{{ $team->name }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
