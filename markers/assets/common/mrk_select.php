<?php 

$mrk_cnt = 0;

//require '../assets/db/q_top10.php';

require '../assets/db/q_dist.php';

while    
    ($obj = $stmt->fetch_object()) {//get the data and store it in variables
    
    $fbname[$mrk_cnt] = $obj->fb_name;
    
    $lat[$mrk_cnt] = $obj->fb_lat;
    
    $lng[$mrk_cnt] = $obj->fb_lng;
    
    $street[$mrk_cnt] = $obj->fb_street;
    
    $talking_about[$mrk_cnt] = $obj->fb_talking_about;
    
    $likes[$mrk_cnt] = $obj->fb_likes;
    
    $were_here[$mrk_cnt] = $obj->fb_were_here;
    
    $date[$mrk_cnt] = $obj->fb_date;
    
    $fb_description[$mrk_cnt] = $obj->fb_description;
    
    $fb_web[$mrk_cnt] = $obj->fb_web;
    
    $mrk_cnt++;
}

print_r($fb_web);
print_r($fb_description);
?>