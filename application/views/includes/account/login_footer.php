          </div>
          <!-- ============================================================== -->
          <!-- All Jquery -->
          <!-- ============================================================== -->
          <script src="<?= base_url() ?>assets/horizontal/plugins/jquery/jquery.min.js"></script>
          <!-- Bootstrap popper Core JavaScript -->
          <script src="<?= base_url() ?>assets/horizontal/plugins/bootstrap/js/popper.min.js"></script>
          <script src="<?= base_url() ?>assets/horizontal/plugins/bootstrap/js/bootstrap.min.js"></script>
          <!--Custom JavaScript -->
          <script>
               var param = [];
               param['BASE_URL'] = '<?= base_url() ?>';
          </script>
          <!--Custom JavaScript -->
          <script src="<?= base_url() ?>assets/horizontal/theme/js/custom.min.js"></script>
          <?php __load_assets__($__assets__, 'js'); ?>
          <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
</body>
</html>