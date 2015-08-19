<?php
/*
Directory Location: github/ajax_markers
File Name: index.php
Author: Circle Squared Data Labs
Author URI: http://www.heatery.io
Description: Delivering map markers with jQuery AJAX.
Version: 1.0.0
License: Except as otherwise noted, the content of this page is licensed under the Creative Commons Attribution 3.0 License, and code samples are licensed under the Apache 2.0 License.
License URI: license.txt
Tags: responsive-layout, fluid-layout, custom-background, custom-menu, custom-maps, AJAX, Facebook Graph API, Heatmap Visualizations, Google Maps, Bootstrap, Heatery, Circle Squared Data Labs, restaurants, social media analysis, spatial data analysis
*/
?>

<?php $pg_title = 'AJAX Markers';?>

<?php require '../assets/common/header.php'; ?>

    <link rel="stylesheet" href="assets/css/inf_win_style.css" />

    <?php require 'assets/common/am_nav.php';?>

        <div id="map-canvas"></div>

        <?php require 'assets/common/am_page.php';?>

            <script src="../assets/js/main.js"></script>

            <script src="assets/js/am_query.js"></script>

            <?php require '../assets/common/footer.php';?>

<!-- BEGIN CONTENT -->

<body style="background-color: #000">