<?php
/*
Template Name:  Start Page
File Name: start.php (dev. version)
Author: Circle Squared Data Labs
Author URI: http://www.heatery.io
Description: The first page a visitor sees.
Version: 1.0.0
License: Except as otherwise noted, the content of this page is licensed under the Creative Commons Attribution 3.0 License, and code samples are licensed under the Apache 2.0 License.
License URI: license.txt
Tags: responsive-layout, fluid-layout, custom-background, custom-menu, custom-maps, AJAX, Facebook Graph API, Heatmap Visualizations, Google Maps, Bootstrap, Heatery, Circle Squared Data Labs, restaurants, social media analysis, spatial data analysis
*/
$pg_title = 'Welcome to heatery';

$common_path = 'hm-start/hm-assets/hm-common/';

$js_path = 'hm-start/hm-assets/hm-js/';

$style_path = 'hm-start/hm-assets/hm-css/';

$img_path= '../hm-media/hm-img/';

require $common_path . 'hm_header.php';

require $common_path . 'hm_page.php'; 

require  $common_path . 'hm_footer.php'; 

?>