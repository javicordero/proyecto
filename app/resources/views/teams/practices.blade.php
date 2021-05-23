<div class="modal fade practices" id="practices-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                    <h4>Elige los días de entrenamiento del equipo</h4>
                </div>
                <form id="demo-form" data-parsley-validate>
                    <div class="modal-body">
                        <div class="checkbox">
                            <label>
                              <input type="checkbox" name="days[]" value="1"  data-parsley-mincheck="2"> Lunes
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                              <input type="checkbox" name="days[]" value="2"  data-parsley-mincheck="2"> Martes
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                              <input type="checkbox" name="days[]" value="3"  data-parsley-mincheck="2"> Miércoles
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                              <input type="checkbox" name="days[]" value="4"  data-parsley-mincheck="2"> Jueves
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                              <input type="checkbox" name="days[]" value="5"  data-parsley-mincheck="2"> Viernes
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                    </div>
                </form>
        </div>
    </div>
</div>
