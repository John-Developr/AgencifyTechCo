<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Proweaver System | <?php echo $page_title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>dist/css/adminlte.min.css">

    <!-- DataTables -->
  <?php if(//$page_title == 'Users list'): ?>
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <?php// endif; ?>
  <!-- sweet alerts -->
  <link rel="stylesheet" href="<?php echo base_url('assets/loading-overlay') ?>/loading-overlay.jquery.css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/file_upload') ?>/multiple-image-video(MIV).css">
  
  <?php if(//$page_title == 'Stock Photos'): ?>
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="<?php // echo base_url('assets/') ?>dist/css/adminlte.min.css"> -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('node_modules/') ?>selectize/selectize/dist/css/selectize.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('node_modules/') ?>selectize/selectize/dist/css/selectize.bootstrap5.css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/codemirror/theme/monokai.css">
  <?php// endif; ?>


</head>
    <?php
        __load_assets__($__assets__,'css');
        $this->load->view('includes/lte/modals');

    ?>

