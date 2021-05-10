  <!-- footer content -->
  <footer>
    <div class="pull-right">
      Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="{{ asset('vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{ asset('vendors/nprogress/nprogress.js')}}"></script>
<!-- Chart.js')}} -->
<script src="{{ asset('vendors/Chart.js')}}/dist/Chart.min.js')}}"></script>
<!-- gauge.js')}} -->
<script src="{{ asset('vendors/gauge.js')}}/dist/gauge.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ asset('vendors/iCheck/icheck.min.js')}}"></script>
<!-- Skycons -->
<script src="{{ asset('vendors/skycons/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{ asset('vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{ asset('vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{ asset('vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{ asset('vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{ asset('vendors/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{ asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{ asset('vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{ asset('vendors/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{ asset('vendors/DateJS/build/date.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{ asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{ asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('vendors/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<!-- Datatables -->
<script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{ asset('vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>

<script src="{{ asset('js/alerts/alerts.js') }}"></script> <!-- Alerts -->
<script src="{{ asset('js/datatable/language.js')}}"></script> <!-- Idioma datatable -->

<!-- Custom Theme Scripts -->
<script src="{{ asset('build/js/custom.js')}}"></script>

<script src="{{ asset('js/app.js') }}"></script>




<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>  <!-- Alerts -->

<!-- Muestra alerta de la operacion recibida -->
@if (session('status'))
<script>
    $(document).ready(function () {
        message = @json(session('status'));
        console.log(message);
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: message,
            showConfirmButton: false,
            timer: 1500
            })
        });
</script>
@endif
</body>
</html>
