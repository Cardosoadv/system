
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0-rc
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src="<?= base_url('plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap -->
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- Ekko Lightbox -->
<script src="<?= base_url('plugins/ekko-lightbox/ekko-lightbox.min.js')?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('dist/js/adminlte.min.js')?>"></script>
<!-- Filterizr-->
<script src="<?= base_url('plugins/filterizr/jquery.filterizr.min.js')?>"></script>
 <!-- InputMask -->
 <script src="<?= base_url('plugins/moment/moment.min.js')?>"></script>
<script src="<?= base_url('plugins/inputmask/jquery.inputmask.min.js')?>"></script>   

<!-- Page specific script -->
<script>
$(function () {
  $(document).ready(function(){
  $(":input").inputmask();
});
  })
</script>