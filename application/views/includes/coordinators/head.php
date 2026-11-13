<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/img/favicon.png">
    <title><?= $title ?></title>
	<link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap/" />
    <link href="<?= base_url() ?>assets/horizontal/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/horizontal/plugins/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="<?= base_url() ?>assets/horizontal/plugins/morrisjs/morris.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="<?= base_url() ?>assets/horizontal/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="<?= base_url() ?>assets/horizontal/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/horizontal/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Select2 -->
    <link href="<?= base_url() ?>assets/horizontal/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/horizontal/theme/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/adminwrap/assets/css/pages/tab-page.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?= base_url() ?>assets/horizontal/theme/css/pages/dashboard1.css" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="<?= base_url('assets/adminwrap/assets/') ?>node_modules/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url() ?>assets/horizontal/theme/css/colors/default.css" id="theme" rel="stylesheet">
    <?php __load_assets__($__assets__,'css'); ?>
    <!-- TOAST -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/toastr/toastr.min.css">
    <link href="<?= base_url('assets/adminwrap/assets/') ?>css/toastr.css" rel="stylesheet">

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
</head>

<body class="card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
        </div>
    </div>