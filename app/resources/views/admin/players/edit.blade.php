@extends('admin.layouts.modal')

@section('action')
{{ route('admin.players.update', $data['player']) }}
@endsection

@section('method')
@method('PUT')
@endsection

@section('title')
Editar jugador
@endsection


@section('body')
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre<span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="name" required="required" class="form-control col-md-7 col-xs-12" value="{{ $data['player']->person->name }}">
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Apellidos<span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="surname" required="required" class="form-control col-md-7 col-xs-12" value="{{ $data['player']->person->surname }}">
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Teléfono<span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="phone" required="required" class="form-control col-md-7 col-xs-12" value="{{ $data['player']->person->phone }}">
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha nacimiento<span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="date" name="birthDate" required="required" class="form-control col-md-7 col-xs-12" value="{{ $data['player']->person->birth_date }}">
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sexo</label>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <select class="form-control" name="gender" required="required">
                    <option value="" disabled selected>Selecciona un valor</option>
                    <option value="masculino" @if ($data['player']->person->gender == 'masculino') selected @endif>Masculino</option>
                    <option value="femenino" @if ($data['player']->person->gender == 'femenino') selected @endif>Femenino</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número favorito<span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="number" name="number" required="required" class="form-control col-md-7 col-xs-12" value="{{ $data['player']->number }}">
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
            <div class="profile_pic" id="preview">
                <img src="{{ $data['player']->person->image_path }}" alt="Imagen del usuario" class="img-circle profile_img">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <input id="file" type="file" name="image">
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("file").onchange = function(e) {
  // Creamos el objeto de la clase FileReader
  let reader = new FileReader();

  // Leemos el archivo subido y se lo pasamos a nuestro fileReader
  reader.readAsDataURL(e.target.files[0]);

  // Le decimos que cuando este listo ejecute el código interno
  reader.onload = function(){
    let preview = document.getElementById('preview'),
            image = document.createElement('img');

    image.src = reader.result;

    preview.innerHTML = '';
    preview.append(image);
  };
}
</script>
@endsection
