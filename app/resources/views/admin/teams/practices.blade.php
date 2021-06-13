@extends('admin.layouts.modal')

@section('action')
    {{ route('admin.teams.savePraticesDays', $data['team']) }}
@endsection

@section('method')
@method('POST')
@endsection

@section('title')
Cambiar los días de entrenamiento
@endsection

@section('body')
@for ($i = 0; $i < 3; $i++) <div class="d-flex">
    <select class="form-control" name="days[]" required="required">
        <option value="1">Lunes</option>
        <option value="2">Martes</option>
        <option value="3">Miércoles</option>
        <option value="4">Jueves</option>
        <option value="5">Viernes</option>
    </select>
    <input type="time" name="times[]" id="" class="form-control" required>
    </div>
    @endfor
    @endsection



    <style>
        .d-flex {
            display: flex;
        }

    </style>
