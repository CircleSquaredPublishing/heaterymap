<?php 

$pg_title = 'PHP Markers';

require 'assets/common/mrk_header.php';

require 'assets/common/mrk_nav.php'; 

require 'assets/common/mrk_geo.php';  

if($_POST){
  
    
    $data_arr = geocode($_POST['address']);
           
    if($data_arr){
        
        $latitude = $data_arr[0];
        
        $longitude = $data_arr[1];
        
        $city = $data_arr[2];
       
require 'assets/common/mrk_page.php';        
        
require_once 'assets/common/mrk_conn.php';   
        
require_once 'assets/common/mrk_insert.php';
        
require 'assets/common/mrk_main_js.php'; 
  
       
        
} else { 
        echo "No map found.";
       }
} 

require 'assets/common/mrk_footer.php';
?>