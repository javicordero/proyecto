@extends('admin.layouts.modal')

@section('action')
{{ route('admin.games.update', $data['game']) }}
@endsection

@section('method')
    @method('PUT')
@endsection

@section('title')
    Editar partido
@endsection

@section('body')
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha<span
                    class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="date" name="date" required="required" class="form-control col-md-7 col-xs-12" value="{{ substr($data['game']->date, 0, -8)}}">
            </div>
        </div>
    </div>
</div>
@endsection
