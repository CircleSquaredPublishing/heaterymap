<?php 
/* 
File Name: hm_add.php 
Description: Uses stored variable data from top 10 query to place markers and infowindows on the map. 
Author: Circle Squared Data Labs 
Author URI: http://www.heatery.io 
*/ 

$stmt = "SELECT fb_web,fb_cover,fb_about,fb_culinary_team,fb_description,fb_name,fb_date,fb_lat,fb_lng,fb_city,fb_state,fb_street,fb_zip,fb_talking_about,fb_were_here,fb_likes,
TRUNCATE((SQRT(POW(69.1 * (fb_lat - $latitude),2) + POW(69.1 *( $longitude - fb_lng) * COS(fb_lat/57.3), 2)) * 0.621371),2)
AS distance FROM top10_markers WHERE fb_date = CURDATE() HAVING distance < 1 ORDER BY fb_talking_about DESC LIMIT 10";

if ($result = $conn->query($stmt)) {
    
$fb_web=$fb_cover=$fb_about=$fb_culinary_team=$fb_description=$fb_name=$fb_date=$fb_lat=$fb_lng=$fb_city=$fb_state=$fb_zip=$fb_street=$fb_talking_about=$fb_were_here=$fb_likes=array();

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
            ++$c;
            } 
        $result->close();
    }
$conn->close();

for ($i = 0; $i < $c; $i++) {

$icons = array ("number_1.png", "number_2.png", "number_3.png", "number_4.png" ,"number_5.png", "number_6.png", "number_7.png", "number_8.png", "number_9.png" ,"number_10.png");

    $arrlength=count($icons);
    
        for ($i = 0;$i<$arrlength;$i++) {

            $j = $i + 1; 
            echo "var bounds$i = new google.maps.LatLngBounds(); \n";

            echo "var point$i = new google.maps.LatLng(\"$fb_lat[$i]\",\"$fb_lng[$i]\"); \n";

            echo "var marker$i = new google.maps.Marker({
                position: point$i,   
                map: map,  
                icon: '//heatery.io/heaterymap/hm-assets/hm-media/hm-markers-colors-B2D0DB/$icons[$i]'
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

            echo "var html$i= 
            
            '<div id=\"iw_container\" class=\"container-fluid\">' +
            
            '<div class=\"row\"><div class=\"col-xs-12\">' + 
            
            '<div id=\"iw_title\">' + \"$j.&nbsp;$fb_name[$i]\" +  '</div></div></div>' +
            
            '<p></p>' + 
            
            '<div class=\"row\"><div class=\"col-xs-12\"><div class=\"iw-subTitle\">' + \"$fb_street[$i]\" + '</div></div></div><hr>' +
            
            '<div id=\"iw_content\" class=\"container-fluid\">' +
            
            '<table id= \"info_table\" class=\"table-striped table-hover table-bordered table-condensed table-responsive\">' +
            
            '<thead>' +
            
            '<tr>' +
            
            '<th>Likes</th>' +
            
            '<th>Were' + '<br>' + 'Here</th>' +
            
            '<th>Talking' + '<br>' + 'About</th>' +
            
            '</tr>' + '</thead>' + 
            
            '<tbody>' +
            
            '<td>' + \"$fb_likes[$i]\" + '</td>' +
            
            '<td>' +\"$fb_were_here[$i]\" + '</td>' +
            
            '<td>' + \"$fb_talking_about[$i]\" + '</td>' + 
            
            '</tbody>' +
            
            '</table></div>' + 
            '<div class=\"iw-bottom-gradient\"></div></div>';\n";  
            

            echo  "var infoCard$i = 
            
            '<div class=\"container-fluid\"><div class=\"row\">' + 
            
            '<div id=\"sb-title\" class=\"col-xs-12\">' +  \"$j.&nbsp;$fb_name[$i]\" + '</div></div>' +
            
            '<div class=\"row\"><div class=\"col-xs-12\">' + '<p></p>' + 
            
            '<a id=\"sb_link\" href=' + \"$fb_web[$i]\" + '>' + \"$fb_web_parse[$i]\" +  '</a>' + '<hr></div></div>' +
            
            '<div class=\"row\"><div class=\"col-xs-12\">' + \"$fb_culinary_team[$i]\" + 
            
            '<hr></div></div>' + 
            
            '<div class=\"row\"><div class=\"col-xs-12\">' + 
            
            '<img id=\"fb_cover\" src=\"$fb_cover[$i]\"/>' + 
            
            '</div></div>' + '<hr>' + 
            
            '<div class=\"row\"><div class=\"col-xs-12\"><div id=\"sb-content\">' + 
            
            '<p>' + \"$fb_about[$i]\" + '<hr>' + \"$fb_description[$i]\" + '</p>' + 
            
            '</div></div></div></div>'; \n";
            
            
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