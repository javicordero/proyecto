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
                                <div class="user-img mb-4"
                                    style="background-image: url({{ $coach->person->image_path }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text p-3">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia
                                        and Consonantia, there live the blind texts.</p>
                                    <p class="name">{{ $coach->person->fullname }}</p>
                                    <span class="position">Viewer</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
