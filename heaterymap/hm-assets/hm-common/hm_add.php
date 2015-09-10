<?php 
/* 
File Name: hm_add.php 
Description: Uses stored variable data from top 10 query to place markers and infowindows on the map. 
Author: Circle Squared Data Labs 
Author URI: http://www.heatery.io 
*/ 
/*@NOTE Need to have a backup query when result set is less than 10. Current combined query does not return respresentative set for small towns.*/

$stmt = "SELECT
fb_web,
fb_cover,
fb_about,
fb_culinary_team,
fb_description,
fb_name,
fb_date,
fb_lat,
fb_lng,
fs_lat,
fs_lng,
fb_city,
fb_state,
fb_street,
fb_zip,
fb_talking_about,
fb_were_here,
fb_likes,
fs_name,  
fs_phone,
fs_menu,
fs_mobile_menu,
fs_reservations,
fs_checkins,
fs_users,
fs_tips,
TRUNCATE((fb_talking_about * 0.5) + (((fs_users + fs_checkins + fb_were_here + fb_likes)/4) * 0.5), 0) AS heatery_score,
TRUNCATE(fb_lat,3) AS fb_lat, 
TRUNCATE (fs_lat,3) AS fs_lat,
TRUNCATE (fs_lng,3) AS fs_lng,
TRUNCATE (fb_lng,3) AS fb_lng,
TRUNCATE((SQRT(POW(69.1 * (fb_lat - $latitude),2) + POW(69.1 *( $longitude - fb_lng) * COS(fb_lat/57.3), 2)) * 0.621371),2)
AS fb_distance
FROM top10_markers
INNER JOIN foursquare
WHERE  fs_name LIKE fb_name AND 
fb_date = curdate() AND fs_date = curdate()
HAVING fb_distance < 10 
ORDER BY heatery_score DESC LIMIT 10;";

if ($result = $conn->query($stmt)) {
    
$fb_web=$fb_cover=$fb_about=$fb_culinary_team=$fb_description=$fb_name=$fb_date=$fb_lat=$fb_lng=$fb_city=$fb_state=$fb_zip=$fb_street=$fb_talking_about=$fb_were_here=$fb_likes=$fs_name=$fs_phone=$fs_menu=$fs_mobile_menu=$fs_reservations=$fs_checkins=$fs_users=$fs_tips=$heatery_score=array();

$c = 0;

     while ($obj = $result->fetch_object()) {
            $fb_name[$c] = $obj->fb_name;
            $fb_lat[$c] = $obj->fb_lat;
            $fb_lng[$c] = $obj->fb_lng;
            $fb_street[$c] = $obj->fb_street;
            $fb_city[$c] = $obj->fb_city;
            $fb_state[$c] = $obj->fb_state;
            $fb_zip[$c] = $obj->fb_zip;
            $fb_talking_about[$c] = (number_format($obj->fb_talking_about, 0, null, ','));
            $fb_likes[$c] = (number_format($obj->fb_likes, 0, null, ','));
            $fb_were_here[$c] = (number_format($obj->fb_were_here, 0, null, ','));
            $fb_date[$c] = $obj->fb_date;
            $fb_description[$c] = $obj->fb_description;
            $fb_web[$c] = $obj->fb_web;
            $fb_web_parse[$c] = (parse_url($obj->fb_web, PHP_URL_HOST));
            $fb_cover[$c] = $obj->fb_cover;
            $fb_about[$c] = $obj->fb_about;
            $fb_culinary_team[$c] = $obj->fb_culinary_team;
            $fs_name[$c]=(stripslashes($obj->fs_name));
            $fs_phone[$c]=$obj->fs_phone;
            $fs_menu[$c]=$obj->fs_menu;    
            $fs_menu_parse[$c]=(parse_url($obj->fs_menu, PHP_URL_HOST));      
            $fs_mobile_menu[$c]=$obj->fs_mobile_menu;     
            $fs_mobile_menu_parse[$c]=(parse_url($obj->fs_mobile_menu, PHP_URL_HOST));   
            $fs_reservations[$c]=$obj->fs_reservations;    
            $fs_reservations_parse[$c]=(parse_url($obj->fs_reservations, PHP_URL_HOST));   
            $fs_checkins[$c]=(number_format($obj->fs_checkins, 0, null, ','));  
            $fs_users[$c]=(number_format($obj->fs_users, 0, null, ','));  
            $fs_tips[$c]=(number_format($obj->fs_tips, 0, null, ','));
            $heatery_score[$c]=($obj->heatery_score);
            ++$c;
    }
    
    $result->close();
}

$conn->close();

foreach($heatery_score as $x){
    $v[]= round(($x/max($heatery_score))*100) . '%';
}

for ($i = 0; $i < $c; $i++) {

$icons= array("number_1.png", "number_2.png", "number_3.png", "number_4.png" ,"number_5.png", "number_6.png", "number_7.png", "number_8.png", "number_9.png", "number_10.png");

    $arrlength=count($icons);
    
        for ($i = 0;$i<$arrlength;$i++) {

            $j = $i + 1; 
            echo "var bounds$i = new google.maps.LatLngBounds(); \n";

            echo "var point$i = new google.maps.LatLng(\"$fb_lat[$i]\",\"$fb_lng[$i]\"); \n";

            echo "var marker$i = new google.maps.Marker({
                position: point$i,   
                map: map,  
                icon: '//heatery.io/heaterymap/hm-assets/hm-media/hm-markers-colors-000000/$icons[$i]'
                });\n";
            
            echo "bounds$i.extend(marker$i.getPosition());\n";

            echo "var fb_date$i = \"$fb_date[$i]\"; \n";

            echo "var fb_name$i = \"$fb_name[$i]\"; \n";

            echo "var fb_street$i = \"$fb_street[$i]\";\n";
            
            echo "var fb_city$i = \"$fb_city[$i]\";\n";
            
            echo "var fb_state$i = \"$fb_state[$i]\";\n";
            
            echo "var fb_zip$i = \"$fb_zip[$i]\";\n";

            echo "var fb_talking_about$i = \"$fb_talking_about[$i]\";\n";

            echo "var fb_likes$i = \"$fb_likes[$i]\";\n";

            echo "var fb_were_here$i = \"$fb_were_here[$i]\";\n";

            echo "var fb_description$i = \"{$fb_description[$i]}\";\n";

            echo "var fb_web$i = \"$fb_web[$i]\";\n";
            
            echo "var fb_web_parse$i = \"$fb_web_parse[$i]\";\n";
            
            echo "var fb_cover$i = \"$fb_cover[$i]\";\n";
            
            echo "var fb_about$i = \"$fb_about[$i]\";\n";
            
            echo "var fb_culinary_team$i = \"{$fb_culinary_team[$i]}\";\n";
            
            echo "var fs_name$i = \"$fs_name[$i]\"; \n";
            
            echo "var fs_phone$i = \"$fs_phone[$i]\"; \n";
            
            echo "var fs_menu$i = \"$fs_menu[$i]\";\n";
            
            echo "var fs_mobile_menu$i = \"$fs_mobile_menu[$i]\";\n";
            
            echo "var fs_reservations$i = \"$fs_reservations[$i]\";\n";
            
            echo "var fs_checkins$i = \"$fs_checkins[$i]\";\n";
            
            echo "var fs_users$i = \"$fs_users[$i]\";\n";
            
            echo "var fs_tips$i = \"$fs_tips[$i]\";\n";
            
            echo "var heatery_score$i = \"$heatery_score[$i]\";\n";
            
            echo "var v$i= \"$v[$i]\";\n";

/*Begin Facebook Data*/            

echo "var html$i= 

'<div id=\"iw_container\" class=\"container-fluid\">' +

'<div class=\"row\"><div class=\"col-xs-12\">' + 

'<div id=\"iw_title\">' + 

\"$fb_name[$i]\" +  '&nbsp;ranks higher than&nbsp;' + \"$v[$i]\" + '&nbsp;of qualifying restaurants within the search area.' +

'<br>' +

'</div></div></div><br>' + 

'<div class=\"row\"><div class=\"col-xs-12\">' + 

'</div></div><hr>' + 

'<div class=\"row\"><div class=\"col-xs-12\">' + 

'<div id=\"iw_content\" class=\"container-fluid\">' +

'<a id=\"sb_link\" href=$fs_menu[$i]>The Menu @' + \"&nbsp;$fs_name[$i]\" + '</a>' +

'<br>' +
'<a id=\"sb_link\" href=$fs_mobile_menu[$i]>Mobile Friendly Menu @' + \"&nbsp;$fs_name[$i]\" +
'</a>' + 

'<br>' + 
'<a id=\"sb_link\" href=$fs_reservations[$i]>Reservations&nbsp;@' + \"&nbsp;$fs_name[$i]\" + '</a><hr></div></div>' + 

'</div></div></div></div>'\n";  


echo  "var infoCard$i = 

'<div class=\"container-fluid\"><div class=\"row\">' + 

'<div id=\"sb-title\" class=\"col-xs-12\">' + 

\"$j.&nbsp;$fb_name[$i]\" + 

'<br>' +  
\"$fb_street[$i]\" + 

'<br>' + 
\"$fs_phone[$i]\" + 

'</div><hr>' + 
'<a id=\"sb_link\" href=' + \"$fb_web[$i]\" + '>' + \"$fb_web_parse[$i]\" +  '</a>' + 

'<br>' + 
\"$fb_culinary_team[$i]\" + 

'<br>' + 

'<div class=\"row\"><div class=\"col-xs-12\">' + 

'<img id=\"fb_cover\" src=\"$fb_cover[$i]\"/>' + 

'</div></div>' + '<hr>' + 

'<div class=\"row\"><div class=\"col-xs-12\"><div id=\"sb-content\">' + 

'<p>' + \"$fb_about[$i]\" + '<hr>' + \"$fb_description[$i]\" + '</p>' + 

'</div></div></div>'; \n";


echo "$('#info_card').append(infoCard$i); \n";


echo "var infowindow$i = new google.maps.InfoWindow({
    content: html$i,
    maxWidth:350
}); \n";

echo "google.maps.event.addListener(marker$i, 'click', function (){
            infowindow$i.setContent(html$i);
            infowindow$i.open(map, marker$i);
             });\n";

echo "google.maps.event.addListener(map, 'click', function (){
            infowindow$i.close();
             });\n";

echo "google.maps.event.addListener(infowindow$i, 'domready', function (){

var iwOuter = $('.gm-style-iw');

var iwBackground = iwOuter.prev();

    iwBackground.children(':nth-child(2)').css({
        'display' : 'none'
        });

    iwBackground.children(':nth-child(4)').css({
        'display' : 'none'
        });

    iwBackground.children(':nth-child(3)').find('div').children().css({
        'box-shadow': 'rgba(82, 66, 4, 0.5); 0px 1px 6px', 
        'z-index' : '1'
        });

var iwCloseBtn = iwOuter.next();

    iwCloseBtn.css({
        opacity: '1', 
        right: '38px', 
        top: '3px',
        'border-radius': '13px', 
        'box-shadow': '0 0 5px rgb(82, 66, 4)'
    });

    if($('.iw-content').height() < 140){

        $('.iw-bottom-gradient').css({
        display: 'none'
        });

    }

    iwCloseBtn.mouseout(function(){

        $(this).css({
        opacity: '1'
        });

    });

});\n";
            
}

    echo "map.fitBounds(bounds$i); \n";
    
}
   
?>