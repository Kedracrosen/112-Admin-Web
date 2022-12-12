<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin - 911 Video App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon.ico">

    <!-- DataTables -->
    <link href="<?= base_url(); ?>/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?= base_url(); ?>/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?= base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url(); ?>/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <script src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/sweet-alert2/sweetalert2.min.js"></script> 

</head>
<body>

<?php
    if( !empty($flash_message) ){
        echo '<script> Swal.fire("'.$flash_message.'"); </script>';
    }
?>
<style>
    .pagination {
        margin-top: 2em;
        margin-left: 2em;
    }
    .pagination li {
        background-color: #757372;
        color: #ffffff;
        padding: 1em 1.2em 1em 1.2em;
        margin-right: 0.5em;
        border-radius: 5px;
    }
    .pagination li:hover, .pagination li.active  {
        background-color: #ee2828;
    }
    .pagination li .active {
        background-color: #ee2828;
        color: #fff;
    }
    @media only screen and (max-width:768px) {
        .pagination {
            margin-left: 1em;
            font-size: 13px;
        }
        .pagination li {
            padding: 0.5em;
            margin-right: 0.2em;
        }
    }
</style>