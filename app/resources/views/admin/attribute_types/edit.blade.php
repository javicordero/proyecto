@extends('admin.layouts.modal')

@section('action')
{{ route('attribute_types.update', $data['attributeType']) }}
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
                    class="form-control col-md-7 col-xs-12" value="{{ $data['attributeType']->name }}">
            </div>
        </div>
    </div>
</div>
@endsection
