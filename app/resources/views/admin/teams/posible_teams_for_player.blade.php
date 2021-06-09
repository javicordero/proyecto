<div class="modal fade edit" id="posible-teams-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form data-parsley-validate class="form-horizontal form-label-left" action="{{ route('admin.people.movePerson', $data['person']) }}"
                method="POST">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                    <h4>Mover jugador</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Equipo<span
                                        class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="team" required="required">
                                        <option value="" disabled selected>Selecciona un equipo</option>
                                        @foreach ($data['teams'] as $team )
                                            <option value="{{ $team->id }}">
                                                {{ $team->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                    </div>
            </form>
        </div>
    </div>
</div>
