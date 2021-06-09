@extends('admin.layouts.modal')

@section('action')
{{ route('teams.update', $data['team']) }}
@endsection

@section('method')
    @method('PUT')
@endsection

@section('title')
    Editar equipo
@endsection

@section('body')
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Apodo<span
                    class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="nickname" required="required"
                    class="form-control col-md-7 col-xs-12" value="{{ $data['team']->nickname }}">
            </div>
        </div>
    </div>
</div>
@endsection
