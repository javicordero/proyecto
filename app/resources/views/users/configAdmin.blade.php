@extends('admin.layouts.layout')


@section('contentHeader')
<!-- page content -->
<div class="right_col" role="main">
    <div class="" id="csrf" data-csrf="{{ csrf_token() }}">

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title index-title">
                        <div class="index-title-title">
                            <h2>Configuración
                            </h2>
                        </div>
                        <div class="index-title-button">
                        </div>
                    </div>
                    @endsection
                    @section('content')
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                        </p>
                        <form action="{{ route('users.UpdatePassword') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label class="control-label col-md-12 " for="title">Contraseña acutal: <span class="required"></span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="password" name="password1" required="required" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label class="control-label col-md-12 " for="title">Contraseña nueva: <span class="required"></span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="password" name="password2" required="required" class="form-control" minlength="8">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($errors->any())
                            <div class="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="col-md-12">
                                            <button type="submit" class="form-control btn btn-primary">Enviar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endsection



                    @section('contentCerrarDivs')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection

@section('customJs')

<script src="{{ asset('js/modal/modal.js') }}"></script>
<!-- Muestra alerta de la operacion recibida -->
@if (session('status'))
<script>
    $(document).ready(function() {
        message = @json(session('status'));
        console.log(message);
        Swal.fire({
            position: 'top-end'
            , icon: 'success'
            , title: message
            , showConfirmButton: false
            , timer: 1500
        })
    });

</script>
@endif



@endsection
