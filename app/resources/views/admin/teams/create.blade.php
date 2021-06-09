@extends('admin.layouts.modal')

@section('action')
    {{ route('teams.store') }}
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
              <input type="text" name="nickname" required="required" class="form-control col-md-7 col-xs-12"
                >
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label
                class="control-label col-md-3 col-sm-3 col-xs-12">Categoría</label>
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
            <label
                class="control-label col-md-3 col-sm-3 col-xs-12">Sexo</label>
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
@endsection
