                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer bg-primary text-white">
                    Copyright 2022 - <?= date('Y') ?> <span class="footer_comp"></span> Designed by <a href="http://proweaver.com" class="font-weight-bold text-inverse" style="color:#000 important;"  target="_blank">Proweaver</a>.
                </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script>
        var param = [];
        param['BASE_URL'] = '<?= base_url() ?>';
    </script>
    <script src="<?= base_url() ?>assets/horizontal/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="<?= base_url() ?>assets/horizontal/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/horizontal/plugins/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url() ?>assets/horizontal/plugins/ps/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>assets/horizontal/theme/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url() ?>assets/horizontal/theme/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url() ?>assets/horizontal/theme/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>assets/horizontal/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url() ?>assets/horizontal/plugins/select2/dist/js/select2.full.min.js"></script>
    <!--morris JavaScript -->
    <script src="<?= base_url() ?>assets/horizontal/plugins/raphael/raphael.min.js"></script>
    <script src="<?= base_url() ?>assets/horizontal/plugins/morrisjs/morris.min.js"></script>
    <!--c3 JavaScript -->
    <script src="<?= base_url() ?>assets/horizontal/plugins/d3/d3.min.js"></script>
    <script src="<?= base_url() ?>assets/horizontal/plugins/c3-master/c3.min.js"></script>
    <!-- Popup message jquery -->
    <script src="<?= base_url() ?>assets/horizontal/plugins/toast-master/js/jquery.toast.js"></script>
    <!-- Calendar JavaScript -->
    <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/calendar/jquery-ui.min.js"></script>
    <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/moment/moment.js"></script>
    <script src='<?= base_url('assets/adminwrap/assets/') ?>node_modules/calendar/dist/fullcalendar.min.js'></script>
    <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/calendar/dist/cal-init.js"></script>
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>/assets/js/global.js"></script>
   
    <!-- TOAST -->
    <script src="<?= base_url('assets/adminwrap/assets/') ?>js/toastr.js"></script>
    <script src="<?= base_url('assets/') ?>plugins/toastr/toastr.min.js"></script>
    <!--GOBAL JS -->
    <script src="<?php echo base_url(); ?>/assets/js/global.js"></script>
    <!-- DataTables  & Plugins -->
        <script src="<?= base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url('assets') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- ============================================================== -->
    <script src="<?= base_url() ?>assets/horizontal/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <?php __load_assets__($__assets__,'js'); ?>
</body>
</html>