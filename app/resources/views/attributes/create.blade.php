@extends('layouts.modal')

@section('action')
    {{ route('attributes.store') }}
@endsection

@section('body')
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre<span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="name" required="required" class="form-control col-md-7 col-xs-12"
                >
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label
                class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de atributo</label>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <select class="form-control" name="attributeType" required="required">
                    <option value="" disabled selected>Selecciona un valor</option>
                    @foreach ($data['attributeTypes'] as $selectKey => $selectValue)
                        <option value="{{ $selectKey }}">
                            {{ $selectValue }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
@endsection
