<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form data-parsley-validate class="form-horizontal form-label-left" action="@yield('action')" method="POST" enctype="multipart/form-data">
                @csrf
                @yield('method')
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                    <h4>@yield('title')</h4>
                </div>
                <div class="modal-body">
                    @yield('body')
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>
