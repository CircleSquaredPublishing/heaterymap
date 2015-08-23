<?php 
/* 
File Name: add_markers.php 
Description: Uses stored variable data from top 10 query to place markers and infowindows on the map. 
Author: Circle Squared Data Labs 
Author URI: http://www.heatery.io 
*/ 

$stmt = "SELECT fb_web,fb_description,fb_name,fb_date,fb_lat,fb_lng,fb_city,fb_state,fb_street,fb_zip,fb_talking_about,fb_were_here,fb_likes,
TRUNCATE((SQRT(POW(69.1 * (fb_lat - $latitude),2) + POW(69.1 *( $longitude - fb_lng) * COS(fb_lat/57.3), 2)) * 0.621371),2)
AS distance FROM top10_markers WHERE fb_date = CURDATE() HAVING distance < 1 ORDER BY fb_talking_about DESC LIMIT 10";

if ($result = $conn->query($stmt)) {
    
$fb_web=$fb_description=$fb_name=$fb_date=$fb_lat=$fb_lng=$fb_city=$fb_state=$fb_zip=$fb_street=$fb_talking_about=$fb_were_here=$fb_likes=array();

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
            ++$c;
            } 
        $result->close();
    }
$conn->close();

for ($i = 0; $i < $c; $i++) {

$icons = array ("number_1.png","number_2.png","number_3.png","number_4.png","number_5.png","number_6.png","number_7.png","number_8.png","number_9.png","number_10.png");

    $arrlength=count($icons);
    
        for ($i = 0;$i<$arrlength;$i++) {

            $j = $i + 1; //Rank number beside restaurant name.

            echo "var bounds$i = new google.maps.LatLngBounds(); \n";

            echo "var point$i = new google.maps.LatLng(\"$fb_lat[$i]\",\"$fb_lng[$i]\"); \n";

            echo "var marker$i = new google.maps.Marker({
                position: point$i,   
                map: map,  
                icon: 'http://localhost/github/markers/assets/media/mrk_B2D0DB/$icons[$i]'
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

            echo "var html$i= '<div id=\"iw-container\">' +

                    '<div class=\"iw-title\">' + \"$j.&nbsp;$fb_name[$i]\" +  '<p></p>' + \"$fb_street[$i]\" + ',&nbsp;' + \"$fb_zip[$i]\" + '<hr></div>' + 
                    '<div class=\"iw-content\">' +
                    '<table class=\"table-striped table-bordered table-condensed\" id= \"inf_table\">' +
                    '<tr>' +
                    '<th>Likes</th>' +
                    '<th>Were' + '<br>' + 'Here</th>' +
                    '<th>Talking' + '<br>' + 'About</th>' +
                    '</tr>' +
                    '<td>' + \"$fb_likes[$i]\" + '</td>' +
                    '<td>' +\"$fb_were_here[$i]\" + '</td>' +
                    '<td>' + \"$fb_talking_about[$i]\" + '</td>' +
                    '</table></div></div><hr>';\n";     

            echo  "var infoCard$i = '<div id=\"sb-title\">' +  \"$j.&nbsp;$fb_name[$i]\" + '</div>'  + '<p></p>'+ '<a id=\"sb_link\" href=' + 'http:\/\/'+\"$fb_web[$i]\" + '>' + \"$fb_web_parse[$i]\" +  '</a>'  + '<hr>' + '<div id=\"sb-content\">' + '<p>' + \"$fb_description[$i]\" + '</p>' + '</div>'; \n";

            echo "$('#info_card').append(infoCard$i); \n";

            
            echo "infowindow$i = new google.maps.InfoWindow({
                content: html$i,
                maxWidth:250
            }); \n";
            
            echo "google.maps.event.addListener(marker$i, 'click', function (){
                        infowindow$i.setContent(html$i);
                        infowindow$i.open(map, marker$i);
                         });\n";

            echo "google.maps.event.addListener(map, 'click', function (){
                        infowindow$i.close();
                         });\n";

            echo "google.maps.event.addListener(infowindow$i, 'load', function () {
                        });\n";

        }

    echo "map.fitBounds(bounds$i); \n";
    
}
?>