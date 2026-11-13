    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url('assets/adminwrap/assets/') ?>node_modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('assets/js/global.js') ?>"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        var base_url = '<?= base_url() ?>'
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
    <?php
        __load_assets__($__assets__,'js');
    ?>
</body>

</html>