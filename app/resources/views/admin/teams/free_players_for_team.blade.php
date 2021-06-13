<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form data-parsley-validate class="form-horizontal form-label-left" action="{{ route('admin.teams.savePlayersOnTeam' ,$data['team']) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                    <h4>Añadir jugadores</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                @if ($data['players'])
                                <h4>Jugadores disponibles:</h4>
                                @else
                                <h4>No hay jugadores disponibles</h4>
                                @endif
                                <div>
                                    @foreach ($data['players'] as $player)
                                    <div class="col-2">
                                        <input type="checkbox" name="players[]" value="{{ $player->id }}" />
                                        {{ $player->person->full_name }}
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($data['hideBtn'] != true)
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
                @endif
            </form>
        </div>
    </div>
</div>
