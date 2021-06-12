<section class="ftco-section pt-2">
    <div class="container">
        <div class="heading-section ftco-animate">
            <span class="subheading">Jugadores</span>
          <h2 class="mb-4">Jugadores</h2>
        </div>
      <div class="row cards">

        @foreach ($data['players'] as $person)
          <article class="card card--1 card-2" style="background-image: url('{{ $person->image_path }};" onclick="location.href = '/teams/{{ $data['team']->id }}'">
            <div class="card__info-hover card__info__players-hover">
                <h5>Estadísticas</h5>
              <ul>
                  <li>{{ $person->personable->avg_points }} puntos</li>
                  <li>{{ $person->personable->avg_assists }} asistencias</li>
                  <li>{{ $person->personable->avg_rebounds }} rebotes</li>
                  <li>{{ $person->personable->avg_minutes }} minutos</li>
                  <li>{{ $person->personable->games_played }} partidos</li>
              </ul>

            </div>
            <div class="card__img " style="background-image: url('{{ $person->image_path }}');"></div>
            <a href="#" class="card_link">
               <div class="card__img--hover card__img__players--hover" style="background-image: url('{{ $person->image_path }}');"></div>
             </a>
            <div class="card__info card__info__players">
              <h3 class="card__title card__title__players">#{{ $person->personable->number }} {{ $person->full_name }}</h3>
              <span class="card__by"><span class="card__author" title="author"></span></span>

            </div>
          </article>
        @endforeach




      </div>
    </div>

  </section>
