@extends('admin.layouts.modal')

@section('action')
{{ route('admin.teams.store') }}
@endsection

@section('title')
Crear equipo
@endsection

@section('body')
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Apodo<span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="nickname" required="required" class="form-control col-md-7 col-xs-12">
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Categoría</label>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <select class="form-control" name="category" required="required">
                    <option value="" disabled selected>Selecciona un valor</option>
                    @foreach ($data['categories'] as $selectKey => $selectValue)
                    <option value="{{ $selectKey }}">
                        {{ $selectValue }}
                    </option>
                    @endforeach
                </select>
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
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Entrenador</label>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <select class="form-control" name="coach" required="required">
                    <option value="" disabled selected>Selecciona un entrenador</option>
                    @foreach ($data['coaches'] as $coach)
                    <option value="{{ $coach->person->id }}">
                        {{ $coach->person->full_name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
            <div  id="preview" >
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6" >
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

<style>
    #preview img{
        width: 250px !important;
    }
</style>
@endsection
