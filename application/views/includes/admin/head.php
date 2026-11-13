<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/adminwrap/assets/') ?>images/favicon.png">
    <title><?= $title ?></title>
	<link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap/" />
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/adminwrap/assets/') ?>node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="<?= base_url('assets/adminwrap/assets/') ?>node_modules/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <link href="<?= base_url('assets/adminwrap/assets/') ?>node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/adminwrap/assets/') ?>css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets/adminwrap/assets/') ?>css/toastr.css" rel="stylesheet">
    <link href="<?= base_url('assets/adminwrap/assets/') ?>css/pages/dashboard2.css" rel="stylesheet">
    <link href="<?= base_url('assets/adminwrap/assets/') ?>node_modules/morrisjs/morris.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/adminwrap/assets/')?>css/pages/tab-page.css">
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url('assets/adminwrap/assets/') ?>css/colors/default.css" id="theme" rel="stylesheet">
    <link href="<?= base_url('assets/adminwrap/assets/') ?>css/pages/bootstrap-switch.css" rel="stylesheet">

        <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <?php
        __load_assets__($__assets__,'css');
    ?>
</head>

<body class="fix-header card-no-border fix-sidebar">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Agencify Tech Co.</p>
        </div>
    </div>