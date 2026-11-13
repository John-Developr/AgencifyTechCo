                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer bg-primary text-white">
                    Copyright 2022 - <?= date('Y') ?> <span class="footer_comp"></span> Designed by <a href="http://proweaver.com" class="font-weight-bold text-inverse" style="color:#000 important;" target="_blank">Proweaver</a>.
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
                <?php 
                
                ?>
                <script>
                    var param = [];
                    param['BASE_URL'] = '<?= base_url() ?>';
                    var user_type = '<?= $this->session->userdata('type')?>';
                    
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
                <!-- This is data table -->
                <script src="<?= base_url() ?>assets/horizontal/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
                <script src="<?= base_url() ?>assets/horizontal/plugins/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
                <!-- start - This is for export functionality only -->
                <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
                <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
                <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
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
                <!-- ============================================================== -->
                <!-- Style switcher -->
                <!-- ============================================================== -->
                <script src="<?= base_url() ?>assets/horizontal/plugins/styleswitcher/jQuery.style.switcher.js"></script>
                <?php __load_assets__($__assets__, 'js'); ?>
                </body>

                </html>