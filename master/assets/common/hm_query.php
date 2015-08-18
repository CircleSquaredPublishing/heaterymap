<?php 

$mrk_cnt = 0;

require 'queries/hm_q_top_ten.php';
//require 'queries/hm_q_dist.php';

while 

($obj= $stmt->fetch_object()) 
    
{

$fbname[$mrk_cnt]= $obj->fb_name;

$lat[$mrk_cnt]= $obj->fb_lat;

$lng[$mrk_cnt]= $obj->fb_lng;

$street[$mrk_cnt]= $obj->fb_street;

$talking_about[$mrk_cnt]= $obj->fb_talking_about;

$date[$mrk_cnt]= $obj->fb_date;

$mrk_cnt++;

}