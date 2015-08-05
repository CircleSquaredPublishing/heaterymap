<?php

include_once("conn.php");

        $res = $conn->query(
        "SELECT DISTINCT fb_rest.fb_name, fb_rest.FID,
        fb_soc.fb_talking_about,
        fb_soc.fb_heatery_score,
        fb_soc.fb_date,
        fb_loc.fb_city,
        fb_loc.fb_lat,
        fb_loc.fb_lng
        FROM fb_rest
        INNER JOIN fb_loc
        ON fb_rest.`FID` = fb_loc.`FID`
        INNER JOIN fb_soc
        ON fb_rest.`FID` = fb_soc.`FID`
        WHERE 
        fb_soc.fb_date >=CURDATE() AND fb_loc.fb_city = '$city'
        ORDER BY fb_soc.fb_talking_about + fb_soc.fb_heatery_score DESC LIMIT 10;");

        $mrk_cnt = 0;

while 
    
    ($obj = $res->fetch_object()) {

            $lat[$mrk_cnt] = $obj->fb_lat;

            $lng[$mrk_cnt] = $obj->fb_lng;

            $fbname[$mrk_cnt] = $obj->fb_name; 

            $street[$mrk_cnt] = $obj->fb_street; 

            $date[$mrk_cnt] = $obj->fb_date; 

            $heateryScore[$mrk_cnt] = $obj->fb_heatery_score;

            $mrk_cnt++;

        }