<?php

echo $_SERVER['DOCUMENT_ROOT'] . '<br>';

echo (__DIR__ . '/hm-assets/hm-css/') . '<br>';

echo __FILE__ . '<br>';

$media_path = ($_SERVER['DOCUMENT_ROOT'] . 'heaterymap/hm-assets/hm-common/');

echo "<img src=\"https://heatery.io/heaterymap/hm-assets/hm-media/hm_static_map.png\"/>";
?>
