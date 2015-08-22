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
    $j = $i + 1;
    echo "var bounds$i = new google.maps.LatLngBounds(); \n";

    echo "var point$i = new google.maps.LatLng(\"$lat[$i]\",\"$lng[$i]\"); \n";
    
        echo "var marker$i = new google.maps.Marker({
    position: point$i,   
    map: map,  
    icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=$icons[$i]'
    });\n";
    
    echo "bounds$i.extend(marker$i.getPosition());\n";
    
    echo "var date$i = \"$date[$i]\"; \n";

    echo "var fbname$i = \"$fbname[$i]\"; \n";

    echo "var streetText$i = \"$street[$i]\";\n";

    echo "var talking_about$i = \"$talking_about[$i]\";\n";
    
    echo "var likes$i = \"$likes[$i]\";\n";
    
    echo "var were_here$i = \"$were_here[$i]\";\n";
    
    echo "var fb_description$i = \"$fb_description[$i]\";\n";
    
    echo "var fb_web$i = \"$fb_web[$i]\";\n";

    echo "var html$i= '<div id=\"iw-container\">' +

				'<div class=\"iw-title\">' + \"$j.&nbsp;$fbname[$i]\" + '</div>' +

				'<div class=\"iw-content\">' +

				'<table class=\"table-striped table-bordered table-condensed\" id= \"inf_table\">' +
				'<tr>' +
				'<th>Likes</th>' +
				'<th>Were Here</th>' +
				'<th>Talking About</th>' +
				'</tr>' +
				'<td>' + \"$likes[$i]\" + '</td>' +
				'<td>' +\"$were_here[$i]\" + '</td>' +
				'<td>' + \"$talking_about[$i]\" + '</td>' +
				'</table></div></div><hr>';\n";     
       
echo  "var infoCard$i = '<div class=\"iw-subTitle\">' + '</div>' + '<br>' + '<a style=\"color:#b2d0db; letter-spacing: 1.5px;\" href=' + fb_web$i + '>' + \"$fb_web[$i]\" + '</a>' + '<hr>' + '<br>' + '<div class=\"iw-title\">' +  \"$j.&nbsp;$fbname[$i]\" + '</div>' + '<br />' + \"$street[$i]\" + '<br />' + '<b>Description:</b>' + '<hr>' + '<br>' + '<p>' + \"$fb_description[$i]\" + '</p>'; \n";



    
    echo "$('#info_card').append(infoCard$i); \n";
    
    echo "infoWindow$i = new google.maps.InfoWindow({
            content: html$i,
            maxWidth:250
    }); \n";  
    
    
    echo "google.maps.event.addListener(marker$i, 'click', function (){
                    infoWindow$i.setContent(html$i);
                    infoWindow$i.open(map, marker$i);
                     });\n";

    echo "google.maps.event.addListener(map, 'click', function (){
                    infoWindow$i.close();
                     });\n";

    echo "google.maps.event.addListener(infoWindow$i, 'load', function () {
                    });\n";

    }
    
    echo "map.fitBounds(bounds$i); \n";
    }
    

    ?>