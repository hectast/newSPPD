<?php
$url = "http://localhost/newSPPD/";
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= isset($ttl) ? $ttl : 'SPPD'; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= $url; ?>assets/dist/img/LOGO1.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= $url; ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= $url; ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= $url; ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= $url; ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= $url; ?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= $url; ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <style>
    .nav-link:hover {
      color: #e89007 !important;
    }

    .nav-link:hover {
      color: #e89007 !important;
    }

    .nvlnk:hover {
      color: #cbd3da !important;
    }

    .btn-yellow {
      color: #fff;
      background-color: #e89007;
      border-color: #e89007;
    }

    .btn-primary {
      color: #fff !important;
      background-color: #e89007 !important;
      border-color: #e89007 !important;
    }

    .btn-primary:hover, .btn-primary:focus, .btn-primary.focus {
      background-color: #ff9b00 !important;
      border-color: #ff9b00 !important;
      color: #FFFFFF !important;
    }

    .bgc-yellow {
      background-color: #e89007;
    }

    .txc-yellow {
      color: #e89007;
    }

    .txc-white {
      color: #fff !important;
    }

    .bg-login {
      background-image: url('<?= $url; ?>assets/dist/img/bg1.png');
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      padding-bottom: 0px;
    }

    .pagination > li.active > a, .pagination > li.active > span {
      background-color: #e89007 !important;
      border-color: #e89007 !important ;
    }

  </style>
</head>