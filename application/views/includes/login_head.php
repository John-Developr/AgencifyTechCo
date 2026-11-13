<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assets/img/favicon.png">
    <title> Agencify Tech Co</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/plugins/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/theme/css/style.css" rel="stylesheet">
    <?php if ($gateways['authorize'] || $gateways['payeezy'] || $gateways['nmi']) : ?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/payment-assets/css/card.css">
    <?php endif; ?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/payment-assets/css/square.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/payment-assets/css/style.css">
    <?php __load_assets__($__assets__,'css'); ?>     
    <script type="text/javascript">
    var onloadCallback = function() {
      grecaptcha.render('form_recaptcha', {
        'sitekey': '6LftnpIUAAAAAGSTlCV2ZtZxiKevQ7SrM5baht7p'
      });
    };
  </script> 
    </head>
    <body>
        <div>
