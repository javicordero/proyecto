{{-- Start jugadores --}}
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title index-title">
            <div class="index-title-title">
                <h2>Entrenamientos
                    <small></small>
                </h2>
            </div>
            @if ($data['team']->current_coach->user == Auth::user() || Auth::user()->role == 1)
            <div class="index-title-button">
                <button class="btn btn-success modal_id " type="button" data-csrf="{{ csrf_token() }}"
                data-teamId="{{ $data['team']->id }}"
                type="button"
                id="btn-modal-practices">
                    Cambiar horarios
                </button>
            </div>
            @endif

        </div>
        <ul>
            @foreach ( $data['team']->practiceDays as $practiceDay)
            <li>{{ $practiceDay->day_name }}: {{ $practiceDay->time }}</li>
            @endforeach
        </ul>
        <div class="x_content">
            <div class="col-lg-12  col-xs-12">

            </div>
        </div>
    </div>
</div>
{{-- End jugadores --}}
