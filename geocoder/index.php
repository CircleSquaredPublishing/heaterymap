<?php
/*
Template Name: PHP Geocoder
Author: Circle Squared Data Labs
Author URI: http://www.heatery.io
Description: Geocode input and query by distance.
Version: 1.0.0
License: Except as otherwise noted, the content of this page is licensed under the Creative Commons Attribution 3.0 License, and code samples are licensed under the Apache 2.0 License.
License URI: license.txt
Tags: responsive-layout, fluid-layout, custom-background, custom-menu, custom-maps, AJAX, Facebook Graph API, Heatmap Visualizations, Google Maps, Bootstrap, Heatery, Circle Squared Data Labs, restaurants, social media analysis, spatial data analysis
*/
?>

<?php $pg_title = 'Top Ten Table';?>

<link rel="stylesheet" href="assets/css/geo_style.css"/>

<?php require '../assets/common/header.php';?>

    <?php require 'assets/common/geo_nav.php';?>

        <?php require 'assets/common/geo_form.php';?>

            <?php require '../assets/db/conn.php';?>

                <?php require '../assets/db/post.php';?>

                    <?php require '../assets/db/insert_top10_mrk.php';?>

                        <?php require 'assets/common/geo_table.php';?>

                            <?php require '../assets/common/footer.php';?>
<!-- BEGIN CONTENT -->

<body id="gc_body">