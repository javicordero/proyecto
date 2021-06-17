<form action="{{ route('messages.store') }}" method="POST">

@csrf


    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <label class="control-label col-md-12" for="user_receive_id[]">Para: <span class="required"></span>
                </label>
                <div class="col-md-12">
                    <select class="form-control" name="user_receive_id[]"  style="width: 100%" required="required">
                        <option value="" disabled selected>Selecciona el destinatario: </option>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Título: <span class="required"></span>
                </label>
                <div class="col-md-12">
                    <input type="text" name="title" required="required" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="content">Contenido: <span class="required"></span>
                </label>
                <div class="col-md-12">
                    <textarea class="form-control" rows="6" placeholder="Contenido" style="resize: none" name="content"></textarea>
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
