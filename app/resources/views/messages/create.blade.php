@extends('admin.layouts.modal')

@section('action')
    {{ route('messages.store') }}
@endsection

@section('method')
    @method('POST')
@endsection

@section('title')
    Nuevo mensaje
@endsection

@section('body')
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_receive_id[]">Para:  <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="select-2-multiple form-control col-md-7 col-xs-12" name="user_receive_id[]" multiple="multiple" style="width: 100%"  required="required">
                    <option value="" disabled>Selecciona los destinatarios: </option>
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
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Título: <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="title" required="required" class="form-control col-md-7 col-xs-12">
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="content">Contenido: <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea class="form-control" rows="6" placeholder="Contenido" style="resize: none" name="content"></textarea>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    $(document).ready(function() {
    $('.select-2-multiple').select2();
});
</script>
