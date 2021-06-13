<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
<div class="card_player">
    <div class="ds-top"></div>
    <div class="avatar-holder">
      <img src="{{ $data['player']->person->image_path }}" alt="Albert Einstein">
    </div>
    <div class="name">
        {{ $data['player']->person->full_name }}
        <p class="games">{{ $data['player']->games_played }} partidos jugados</p>
    </div>
    <div class="ds-info">
      <div class="ds pens">
        <h6 title="Number of pens created by the user">Puntos</h6>
        <p>{{ $data['player']->avg_points }}</p>
      </div>
      <div class="ds projects">
        <h6 title="Number of projects created by the user">Asistencias</h6>
        <p>{{ $data['player']->avg_assists }}</p>
      </div>
      <div class="ds posts">
        <h6 title="Number of posts">Rebotes</h6>
        <p>{{ $data['player']->avg_rebounds }}</p>
      </div>
    </div>
    <div class="ds-skill">
      <h6>Atributos</h6>
      @foreach ($data['attributeTypes'] as $attributeType)

      <div class="skill">
        <h6>{{ $attributeType->name }} </h6>
        <div class="bar bar-html" style="width: {{ $data['player']->getAvgOfAttributeType($attributeType->id) * 5.5 }}%">
          <p>{{ $data['player']->getAvgOfAttributeType($attributeType->id) * 5 }}</p>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>
</div>
</div>

