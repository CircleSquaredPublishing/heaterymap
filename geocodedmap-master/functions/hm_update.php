<?php
/*@NOTE This script queries the db and retrieves the info needed for placing the markers and adding content to the infowindows.*/
$servername="localhost"; 
$username="root"; 
$password="root"; 
$dbname = "social_data";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
    exit();
}

include_once("functions/hm_update.php");

/* @TODO Need to integrate dynamic location into the DB query here. */
$res = $conn->query("SELECT DISTINCT fb_loc.`fb_lat`, fb_loc.`fb_lng`, fb_loc.`fb_date`, SQRT(
    POW(69.1 * (fb_loc.`fb_lat` - 26.4), 2) +
    POW(69.1 * (-80.07 - fb_loc.`fb_lng`) * COS(fb_loc.`fb_lat`/ 57.3), 2)) AS distance
FROM `fb_loc` WHERE fb_loc.`fb_date`=CURDATE() HAVING distance < 3 ORDER BY distance LIMIT 10;");
/*    
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
fb_soc.fb_date >=CURDATE() AND fb_loc.fb_city = 'Delray Beach'
ORDER BY fb_soc.fb_talking_about + fb_soc.fb_heatery_score DESC LIMIT 10;");
*/
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
?>
<?php
for ($i = 0; $i < $mrk_cnt; $i++) {
echo "var point$i = new google.maps.LatLng($lat[$i], $lng[$i]); \n";
echo "var date$i = \"$date[$i]\"; \n";
echo "var fbname$i = \"$fbname[$i]\"; \n";
echo "var streetText$i = \"$street[$i]\";\n";
echo "var heateryScore$i = \"$heateryScore[$i]\";\n";
echo "var infowindow$i = new google.maps.InfoWindow({
content:  'Reporting Date:'+' '+ date$i + '<br />' + fbname$i + '<br />' + streetText$i + '<br />' + 'Heatery Score:'+' '+ heateryScore$i
});";
echo "var marker$i = new google.maps.Marker({
position: point$i, 
map: map,
icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=$i|FFFF00|000'
});\n";
echo "google.maps.event.addListener(marker$i, 
'click', function() {
infowindow$i.open(map,marker$i);
});\n";
}
?>