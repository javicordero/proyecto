<div class="modal fade edit" id="edit{{ $attribute->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  data-parsley-validate class="form-horizontal form-label-left" action="{{ route($data['tableName'].'.update', $attribute->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                    <h4>Editar</h4>
                </div>
                <div class="modal-body">
                    @foreach ($data['columns'] as $column)
                        @if (is_array($column))
                            @foreach ($column as $columnKey => $columnValue)
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ __($columnValue) }}</label>
                                        <div class="col-md-6 col-sm-6 col-xs-1">
                                          <select class="form-control" name="{{ $columnKey }}">
                                            @foreach ($data['selectOptions'] as $selectKey => $selectValue)
                                                <option value="{{ $selectKey }}" @if ($attribute->$columnKey == $selectKey)selected @endif>
                                                    {{ $selectValue }}
                                                </option>
                                            @endforeach
                                          </select>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            @endforeach
                        @else
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">{{ __($column) }} <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" name="{{ $column }}" required="required" class="form-control col-md-7 col-xs-12"
                                            @if ($column == 'id')
                                                readonly
                                            @endif
                                          value="{{ $attribute->$column }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>
