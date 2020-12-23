
@if(session()->has('success'))
<script>
  $(function(){
    $.notify("{{session()->get('success')}}",{globalPosition: 'top-right', className: 'success'});
    });
</script>
@endif
@if(session()->has('error'))
<script>
  $(function(){
    $.notify("{{session()->get('error')}}",{globalPosition: 'top-right', className: 'error'});
    });
</script>
@endif

<footer class="main-footer">
    <strong>Copyright &copy;2020 <a href="https://adminlte.io"></a>.</strong>
  
    <div class="float-right d-none d-sm-inline-block">
      <b>Designed and Developed By</b> HAMS_School
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/backend')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('/backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('/backend')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('/backend')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('/backend')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('/backend')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/backend')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('/backend')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('/backend')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('/backend')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('/backend')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/backend')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/backend')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/backend')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/backend')}}/dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('/backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/backend')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
{{-- <script src="{{asset('/backend')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/backend')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('/backend')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/backend')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> --}}
{{-- <script src="{{asset('/backend')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('/backend')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('/backend')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('/backend')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('/backend')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('/backend')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script> --}}
<!-- jquery-validation -->
<script src="{{asset('/backend')}}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{asset('/backend')}}/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="{{asset('/backend')}}/dist/js/handlebars.min.js"></script>
<!-- Select2 -->
<script src="{{asset('/backend')}}/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      //"responsive": true, "lengthChange": false, "autoWidth": false,
      //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script>
<!-- Delete  sweet alert -->
<script>
  $(function(){
    $(document).on('click', '#delete', function(e){
      //alert('ok');
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
      title: 'Are you sure?',
      text: "Delete this data!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link;
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
});
    });
  });
</script>
<!-- Approve sweet alert -->
<script>
  $(function(){
    $(document).on('click', '#approveBtn', function(e){
      //alert('ok');
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
      title: 'Are you sure?',
      text: "Approve this data!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Approve it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link;
        Swal.fire(
          'Approved!',
          'Your file has been approved.',
          'success'
        )
      }
});
    });
  });
</script>
<script>
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files['0'])
      });
  });
</script>
<script>
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    });
  </script>
</body>
</html>

