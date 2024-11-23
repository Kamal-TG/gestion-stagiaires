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

    <!-- Style for debugging -->
    <style>
        .debug {
            border: 3px solid red !important;
        }
    </style>

</head>

<body>