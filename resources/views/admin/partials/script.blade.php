<!-- jQuery -->
<script src="{{ asset('backend/assets/adminlte/js/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend/assets/adminlte/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/assets/adminlte/js/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- ChartJS -->
 <script src="{{ asset('backend/assets/adminlte/js/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('backend/assets/adminlte/js/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('backend/assets/adminlte/js/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('backend/assets/adminlte/js/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('backend/assets/adminlte/js/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('backend/assets/adminlte/js/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('backend/assets/adminlte/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('backend/assets/adminlte/js/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote --> 

<!-- overlayScrollbars -->
<script src="{{ asset('backend/assets/adminlte/js/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/assets/adminlte/js/adminlte.js') }}"></script>

{{--  data table  --}}
<script src="{{ asset('backend/assets/adminlte/js/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('backend/assets/adminlte/js/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
{{--  toastr  --}}
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
@stack('script')
