

<!-- jQuery custom content scroller -->
<!-- <script src="<?php echo base_url()."assets/" ?>vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script> -->

<!-- footer script -->
<!-- jQuery -->
<script src="<?php echo base_url()."assets/" ?>vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url()."assets/" ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()."assets/" ?>vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url()."assets/" ?>vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?php echo base_url()."assets/" ?>vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?php echo base_url()."assets/" ?>vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url()."assets/" ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()."assets/" ?>vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?php echo base_url()."assets/" ?>vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?php echo base_url()."assets/" ?>vendors/Flot/jquery.flot.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/Flot/jquery.flot.time.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php echo base_url()."assets/" ?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?php echo base_url()."assets/" ?>vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url()."assets/" ?>vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url()."assets/" ?>vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url()."assets/" ?>build/js/custom.min.js"></script>




<!-- Datatables -->
<script src="<?php echo base_url()."assets/" ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>vendors/pdfmake/build/vfs_fonts.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    var user_designation = <?php echo json_encode($_SESSION['user_designation']) ?>;
    if (user_designation=='admin') {
      $('#inhouse').css('display','none');
      $('#deposit_cost').css('display','none');
      $('#report_div').css('display','none');
    }else {
      $('#deposit_cost').css('display','block');
      $("#inhouse").css("display","block");
      $("#report_div").css("display","block");

    }
  });
</script>
