<section class="ftco-section pt-2">
    <div class="container">
            <div class="heading-section ftco-animate">
                <span class="subheading">Jugadores</span>
              <h2 class="mb-4">Jugadores</h2>
            </div>

      <div class="row ">

        @foreach ($data['players'] as $person)
        <div class="col-3 top-score pb mb-1 card__players" id="cardPlayerModal"
            data-playerId="{{ $person->personable->id }}" data-csrf="{{ csrf_token() }}"
        >
            <div class="img" style="background-image: url({{ $person->image_path }});"></div>
            <div class="text text-center">
                <h3 class="mb-0">{{ $person->full_name }}</h3>
            </div>
        </div>
        @endforeach
      </div>
    </div>




  </section>
