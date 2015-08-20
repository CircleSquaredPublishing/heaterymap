    <?php 
    /* 
    File Name: add_markers.php 
    Description: Uses stored variable data from top 10 query to place markers and infowindows on the map. 
    Author: Circle Squared Data Labs 
    Author URI: http://www.heatery.io 
    */ 

    
    for ($i = 0;$i < $mrk_cnt;$i++) {

    $icons = array (
    "1|6f8ba2|fffff3",
    "2|c60000|fffff3",
    "3|8caba8|fffff3",
    "4|a2798f|fffff3",  
    "5|4a4444|fffff3",  
    "6|e09a3b|fffff3",  
    "7|e6ac39|000",  
    "8|009999|fffff3",  
    "9|dfdfde|000",  
    "10|d7c6cf|000");

    $arrlength=count($icons);

for ($i = 0;$i<$arrlength;$i++) {//variable data coming from mrk_select

    echo "var point$i = new google.maps.LatLng(\"$lat[$i]\",\"$lng[$i]\"); \n";

    //echo "var distance$i = \"$distance[$i]\"; \n";
    
    echo "var date$i = \"$date[$i]\"; \n";

    echo "var fbname$i = \"$fbname[$i]\"; \n";

    echo "var streetText$i = \"$street[$i]\";\n";

    echo "var talking_about$i = \"$talking_about[$i]\";\n";
    
    echo "var likes$i = \"$likes[$i]\";\n";
    
    echo "var were_here$i = \"$were_here[$i]\";\n";

    echo "var html$i = 'Reporting Date: ' + ' ' + \"$date[$i]\" + '<br />'  +  \"$fbname[$i]\" + '<br />' + \"$street[$i]\" + '<br />' + 'Talking About: ' + ' ' + \"$talking_about[$i]\"  + '<br />' + 'Likes: ' + '' + \"$likes[$i]\" + '<br />' + 'Were Here: ' + \"$were_here[$i]\";\n";

    echo "var marker$i = new google.maps.Marker({
    position: point$i,   
    map: map,  
    icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=$icons[$i]'
    });\n";


    echo  "bindInfoWindow(marker$i, map, null, html$i); \n";  


    echo "function bindInfoWindow(marker$i, map, infoWindow$i, html$i) {

    google.maps.event.addListener(marker$i, 'click', function() {

    document.getElementById('mrk_sidebar$i').innerHTML = html$i;
    });

    }\n";
    }
    }

    ?>