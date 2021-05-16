<div class="modal fade create" id="players-create-attributes">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  data-parsley-validate class="form-horizontal form-label-left" action=""  method="POST">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                    <h4>Crear</h4>
                </div>
                <div class="modal-body">
                        <div class="x_content">
                            <!-- Smart Wizard -->
                            <p>This is a basic form wizard example that inherits the colors from the selected scheme.</p>
                            <div id="wizard" class="form_wizard wizard_horizontal">
                                <ul class="wizard_steps">
                                    @foreach ($attribute_types as $attribute_type)
                                        <li>
                                            <a href="#step-{{ $attribute_type->id }}">
                                                <span class="step_no">1</span>
                                                <span class="step_descr">
                                                    {{ $attribute_type->name }}<br />
                                                    <small>Step 1 description</small>
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>

                                @foreach ($attribute_types as $attribute_type)
                                    <div id="step-{{ $attribute_type->id }}">
                                        @foreach ($attribute_type->attributes as $attribute)
                                        <div class="row" style="margin-top: 10px ">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ $attribute->name }}</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input class="form-control" type="number" id="quantity" name="quantity" min="1" max="5"><br><br>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                @endforeach

                            </div>
                            <!-- End SmartWizard Content -->
                        </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>

@section('customJs')
    <script src="{{ asset('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js') }}"></script>
@endsection
