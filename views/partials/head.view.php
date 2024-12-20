<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion <?= isset($heading) ? '-' . $heading : 'des stagiaires' ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="/vendor/bootstrap/icons/bootstrap-icons.min.css">

    <!-- Bootstrap JS -->
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js" defer></script>

    <link rel="stylesheet" href="/assets/css/dashboard.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <script src="/assets/js/main.js" defer></script>

    <style>
        /* Style for debugging */
        .debug {
            border: 3px solid red !important;
        }

        /* Highcharts */

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 320px;
            max-width: 660px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

        .highcharts-description {
            margin: 0.3rem 10px;
        }
    </style>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <script src="/vendor/jquery/jquery.min.js" defer></script>

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js" defer></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js" defer></script>

    <!-- Page level custom scripts -->
    <script src="/assets/js/demo/chart-area-demo.js" defer></script>
    <script src="/assets/js/demo/chart-pie-demo.js" defer></script>

</head>