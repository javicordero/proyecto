@extends('admin.layouts.modal')

@section('action')
    {{ route('admin.players.evaluate.store', $data['player']->id) }}
@endsection

@section('title')
    Evaluar jugador
@endsection

@section('body')
    @foreach ($data['attribute_types'] as $attribute_type)
        <div class="form-group">
            <div class="col-md-4 col-xs-4">
                <h4 class="attribute-type">{{ $attribute_type->name }}</h4>
                @foreach ($attribute_type->attributes as $attribute)
                    <ul class="list-unstyled user_data">
                        <li>
                            <p>{{ $attribute->name }}</p>
                            <input type="number" name="at{{ $attribute->id }}" max="20" min="0"
                                value="{{ $attribute->getPlayerCurrentValue($data['player']->id) }}" required>
                        </li>
                    </ul>
                @endforeach
            </div>
    @endforeach
    </div>


@endsection




