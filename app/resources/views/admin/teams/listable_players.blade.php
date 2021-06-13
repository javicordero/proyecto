@extends('admin.layouts.modal')

@section('action')
{{ route('admin.teams.savePlayersForNextGame') }}

@endsection

@section('method')

@endsection

@section('body')
<input type="hidden" name="gameId" value="{{ $data['team']->next_game->id }}">
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <h4 id="accordion-click1" class="accordion-click">Jugadores propios:</h4>
                <div id="accordion1">
                    @foreach ($data['teamPlayers'] as $player)
                        <div class="col-2">
                            <input type="checkbox" name="players[]" value="{{ $player->id }}" />
                            {{ $player->full_name }}
                        </div>
                    @endforeach
                </div>
                @if ($data['listablePlayers'])
                    <h4 id="accordion-click2" class="accordion-click">Jugadores convocables:</h4>
                    <div id="accordion2" style="display: none">
                        @foreach ($data['listablePlayers'] as $player)
                            <input type="checkbox" name="players[]" value="{{ $player->id }}" />
                            {{ $player->person->full_name }} ({{ $player->person->current_team->name }}) <br>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        $('#accordion-click1').click(function(e) {
            $('#accordion1').slideToggle('slow')
        });
        $('#accordion-click2').click(function(e) {
            $('#accordion2').slideToggle('slow')
        });

    </script>
@endsection
