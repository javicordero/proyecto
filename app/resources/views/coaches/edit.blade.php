@extends('layouts.modal')

@section('action')
{{ route('coaches.update', $data['coach']) }}
@endsection

@section('method')
    @method('PUT')
@endsection

@section('body')
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre<span
                    class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="name" required="required"
                    class="form-control col-md-7 col-xs-12" value="{{ $data['coach']->person->name }}">
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Apellidos<span
                    class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="surname" required="required" class="form-control col-md-7 col-xs-12" value="{{ $data['coach']->person->surname }}">
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Teléfono<span
                    class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="phone" required="required" class="form-control col-md-7 col-xs-12" value="{{ $data['coach']->person->phone }}">
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha nacimiento<span
                    class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="date" name="birthDate" required="required" class="form-control col-md-7 col-xs-12" value="{{ $data['coach']->person->birth_date }}">
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
                    <option value="masculino" @if ($data['coach']->person->gender == 'masculino') selected @endif>Masculino</option>
                    <option value="femenino" @if ($data['coach']->person->gender == 'femenino') selected @endif>Femenino</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Licencia</label>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <select class="form-control" name="license" required="required">
                    <option value="" disabled selected>Selecciona un valor</option>
                    <option value="0" @if ($data['coach']->license == '0') selected @endif>0</option>
                    <option value="1" @if ($data['coach']->license == '1') selected @endif>1</option>
                    <option value="2" @if ($data['coach']->license == '2') selected @endif>2</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <input type="file" name="image">
            </div>
        </div>
    </div>
</div>
@endsection
