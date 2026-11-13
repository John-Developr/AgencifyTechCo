
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer" style="color:white !important; font-weight: 700; background-color:black;">
                    Copyright 2022 - <?= date('Y') ?> <span class="footer_comp"></span> Designed by <a href="http://proweaver.com" class="font-weight-bold text-inverse" style="color:#81fdeb !important;"  target="_blank">Proweaver</a>.
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
                <!-- <script>
        var base_url = '</?= base_url() ?>'
        
    </script> -->
                <script>
                    var param = [];
                    param['BASE_URL'] = '<?= base_url() ?>';
                </script>
                <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/jquery/jquery.min.js"></script>
                <!-- Bootstrap tether Core JavaScript -->
                <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/bootstrap/js/popper.min.js"></script>
                <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/bootstrap/js/bootstrap.min.js"></script>
                <!-- slimscrollbar scrollbar JavaScript -->
                <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/ps/perfect-scrollbar.jquery.min.js"></script>
                <!-- Calendar JavaScript -->
                <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/calendar/jquery-ui.min.js"></script>
                <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/moment/moment.js"></script>
                <script src='<?= base_url('assets/adminwrap/assets/') ?>node_modules/calendar/dist/fullcalendar.min.js'></script>
                <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/calendar/dist/cal-init.js"></script>
                <script src="<?= base_url('assets/adminwrap/assets/') ?>/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
                <!--Wave Effects -->
                <script src="<?= base_url('assets/adminwrap/assets/') ?>js/waves.js"></script>
                <!--Menu sidebar -->
                <script src="<?= base_url('assets/adminwrap/assets/') ?>js/sidebarmenu.js"></script>
                <!--stickey kit -->
                <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
                <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/sparkline/jquery.sparkline.min.js"></script>
                <!--Custom JavaScript -->
                <script src="<?= base_url('assets/adminwrap/assets/') ?>js/custom.min.js"></script>
                <script src="<?= base_url('assets/adminwrap/assets/') ?>js/toastr.js"></script>
                <script src="<?= base_url('assets/') ?>plugins/toastr/toastr.min.js"></script>
                <!-- Sweet-Alert  -->
                <script src="<?= base_url() ?>assets/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
                <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweet-alert.init.js"></script>
                <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/raphael/raphael.min.js"></script>
                <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/morrisjs/morris.min.js"></script>
               
                 <!-- Chart JS -->
                <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/Chart.js/chartjs.init.js"></script>
                <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/Chart.js/Chart.min.js"></script>
                <!-- ============================================================== -->
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
                <!-- Select2 -->
                <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/alfrcr/paginathing/dist/paginathing.min.js"></script>
                <!-- ============================================================== -->
                <!-- Style switcher -->
                <!-- ============================================================== -->
                <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/styleswitcher/jQuery.style.switcher.js"></script>
                <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/bootstrap-switch/bootstrap-switch.min.js"></script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="<?php echo base_url(); ?>/assets/js/global.js"></script>
                <?php
                __load_assets__($__assets__, 'js');
                ?>
                <script type="text/javascript">
                    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
                    var radioswitch = function() {
                        var bt = function() {
                            $(".radio-switch").on("switch-change", function() {
                                $(".radio-switch").bootstrapSwitch("toggleRadioState")
                            }), $(".radio-switch").on("switch-change", function() {
                                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
                            }), $(".radio-switch").on("switch-change", function() {
                                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
                            })
                        };
                        return {
                            init: function() {
                                bt()
                            }
                        }
                    }();
                    $(function() {
                        radioswitch.init()
                    });
                </script>
                <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/bootstrap-switch/bootstrap-switch.min.js"></script>


                <script>
                // A jQuery function that will execute the function when the document is ready. */
                $(document).ready(function() {
                    notification();
                    markallasread();
                });

                const notification = () => {
                    $(document).on('click', '#view-notification', function() {
                        param['id'] = $(this).attr('data-id');
                        param['FORM'] = new FormData();
                        param['FORM'].append('id', param['id']);
                        param['serve_request'] = server1(`${param['BASE_URL']}dashboard/view`, param['FORM']);
                        if (param['serve_request'].status) {
                            $(this).removeClass('unread-noti');
                            $(this).addClass('read-noti');
                            $('#count-notification').text(`${param['serve_request'].count == 0 ? '' : param['serve_request'].count}`);
                            if (param['serve_request'].count == 0) {
                                $('#notify-unq').remove();
                            }
                            
                            window.location = `${param['BASE_URL']}${param['serve_request'].url_redirect}`;
                        } else {
                            alert('error');
                        }
                    });
                }

                const markallasread = () => {
                    $(document).on('click', '#markall', function() {
                        // param['id'] = $(this).attr('data-id');
                        param['FORM'] = new FormData();
                        // param['FORM'].append('id', param['id']);
                        param['serve_request'] = server1(`${param['BASE_URL']}dashboard/readall`, param['FORM']);
                        if (param['serve_request'].status) {
                            $(this).removeClass('unread-noti');
                            $(this).addClass('read-noti');
                            $('#count-notification').text(`${param['serve_request'].count == 0 ? '' : param['serve_request'].count}`);
                            if (param['serve_request'].count == 0) {
                                $('#notify-unq').remove();
                            }
                            
                            window.location = `${param['BASE_URL']}${param['serve_request'].url_redirect}`;
                        } else {
                            alert('error');
                        }
                    });
                }
            </script>

                </body>

                </html>