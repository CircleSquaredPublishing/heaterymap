<?php 

$pg_title = 'Heatery Map';
$common_path = ($_SERVER['DOCUMENT_ROOT'] . '/heaterymap/hm-assets/hm-common/');
$js_path = ($_SERVER['DOCUMENT_ROOT'] . '/heaterymap/hm-assets/hm-js/');
$media_path = ($_SERVER['DOCUMENT_ROOT'] . '/heaterymap/hm-media/');

require($common_path . 'hm_header.php');
require($common_path . 'hm_geo.php');  
require($common_path . 'hm_nav.php');
require($common_path . 'hm_conn.php');
require($common_path . 'hm_insert.php');
require($common_path . 'hm_main_js.php');
require($common_path . 'hm_footer.php');
?>