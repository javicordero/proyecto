<form action="{{ route('messages.store') }}" method="POST">

@csrf


    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <label class="control-label col-md-12" for="user_receive_id[]">Destinatarios: <span class="required"></span>
                </label>
                <div class="col-md-12">
                    <select class="form-control select-2-multiple" name="user_receive_id[]" multiple="multiple" style="width: 100%" required="required">
                        <option value="" disabled>Selecciona el destinatario: </option>
                        @foreach ($data['users'] as $user)
                        <option value="{{ $user->id }}">{{ $user->person ? $user->person->full_name : $user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">

                <div class="col-md-12">
                    <input type="text" name="title" required="required" class="form-control" placeholder="Título">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <textarea class="form-control" rows="6" placeholder="Cuerpo" style="resize: none" name="content"></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <button type="submit" class="form-control btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
    $('.select-2-multiple').select2();
});
</script>
