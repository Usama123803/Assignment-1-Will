<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mannat Themes">
        <meta name="keyword" content="">

        <title>My Virtual Repair</title>

        <!-- Theme icon -->
        <link rel="shortcut icon" href="Modules/Backend/assets/images/favicon.ico">

        <!-- Theme Css -->
        <link href="Modules/Backend/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="Modules/Backend/assets/css/slidebars.min.css" rel="stylesheet">
        <link href="Modules/Backend/assets/css/icons.css" rel="stylesheet">
        <link href="Modules/Backend/assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="Modules/Backend/assets/css/style.css" rel="stylesheet">
</head>

<?= $this->renderSection('content') ?>

<?= $this->extend('master') ?>
<?= $this->section('content') ?>  
<?= $this->endSection() ?>

        <!-- jQuery -->
        <script src="Modules/Backend/assets/js/jquery-3.2.1.min.js"></script>
        <script src="Modules/Backend/assets/js/popper.min.js"></script>
        <script src="Modules/Backend/assets/js/bootstrap.min.js"></script>
        <script src="Modules/Backend/assets/js/jquery-migrate.js"></script>
        <script src="Modules/Backend/assets/js/modernizr.min.js"></script>
        <script src="Modules/Backend/assets/js/jquery.slimscroll.min.js"></script>
        <script src="Modules/Backend/assets/js/slidebars.min.js"></script>

        <!--plugins js-->
        <script src="Modules/Backend/assets/plugins/counter/jquery.counterup.min.js"></script>
        <script src="Modules/Backend/assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="Modules/Backend/assets/plugins/sparkline-chart/jquery.sparkline.min.js"></script>
        <script src="Modules/Backend/assets/pages/jquery.sparkline.init.js"></script>

        <script src="Modules/Backend/assets/plugins/chart-js/Chart.bundle.js"></script>
        <script src="Modules/Backend/assets/plugins/morris-chart/raphael-min.js"></script>
        <script src="Modules/Backend/assets/plugins/morris-chart/morris.js"></script>
        <script src="Modules/Backend/sassets/pages/dashboard-init.js"></script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjVoaCW3PAn52C7WPpJ7NBBqU1_TUfnSI" type="text/javascript"></script>
        <script src="Modules/Backend/assets/plugins/gmap/js/gmaps.min.js"></script>
        <script src="Modules/Backend/assets/js/jquery.magnific-popup.min.js"></script>

        <!--app js-->
        <script src="Modules/Backend/assets/js/jquery.app.js"></script>
    </body>
</html>
