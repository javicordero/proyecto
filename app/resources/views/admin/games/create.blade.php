@extends('admin.layouts.modal')

@section('action')
    {{ route('games.store') }}
@endsection

@section('title')
    Nuevo partido
@endsection

@section('body')
    @if ($data['team'])
        <input type="hidden" name="teamId" value="{{ $data['team']->id }}">
    @else
        <div class="form-group">
            <div class="row">
                <div class="col-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Equipo<span
                            class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="teamId" required="required">
                            <option value="" disabled selected>Selecciona un valor</option>
                            @foreach ($data['teams'] as $team)
                            <option value="{{ $team->id }}">
                                {{ $team->name }}
                            </option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rival<span
                        class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="opponent" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha<span
                        class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="date" name="date" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Lugar</label>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <select class="form-control" name="home" required="required">
                        <option value="" disabled selected>Selecciona un valor</option>
                        <option value="1">Local</option>
                        <option value="0">Visitante</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
@endsection
