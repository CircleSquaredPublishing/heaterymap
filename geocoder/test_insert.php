<?php
$table = basename(__FILE__, '.php');
$name = ($table . '.json');
$fp = fopen( $name, 'w' ); 
/*@NOTE If performance becomes an issue look into removing any parameters not necessary for placing markers.*/
$curl=curl_init('https://graph.facebook.com/v2.4/search?q=restaurant&type=place&distance=3200&center='. $latitude . ',' . $longitude . '&fields=location,name,likes,talking_about_count,were_here_count,description,general_manager,hours,price_range,parking,picture,cover,restaurant_services,restaurant_specialties,website&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY');
curl_setopt($curl, CURLOPT_URL);
curl_setopt($curl, CURLOPT_FILE, $fp);
curl_exec($curl); 
curl_close($curl); 
$results=file_get_contents($name); 
$fb_array=json_decode($results, true); 
foreach($fb_array[data] as $i){
json_decode($i);
echo PHP_EOL; 

//BEGIN QUERY10
$stmt10=$conn->prepare("INSERT INTO `top10_markers`(`FID`,`fb_name`,`fb_likes`,`fb_were_here`,`fb_talking_about`,`fb_street`,`fb_city`,`fb_state`,`fb_zip`,`fb_lat`,`fb_lng`)VALUES(?,?,?,?,?,?,?,?,?,?,?)"); 
$stmt10->bind_param("dsiiisssidd",$FID,$fb_name,$fb_likes,$fb_were_here,$fb_talking_about,$fb_street,$fb_city,$fb_state,$fb_zip,$fb_lat,$fb_lng); 
$FID=mysqli_real_escape_string($conn, $i[id]); 
$fb_name=mysqli_real_escape_string($conn, $i[name]);
$fb_likes=mysqli_real_escape_string($conn, $i[likes]);  
$fb_were_here=mysqli_real_escape_string($conn, $i[were_here_count]); 
$fb_talking_about=mysqli_real_escape_string($conn, $i[talking_about_count]);
$fb_street=mysqli_real_escape_string($conn, $i[location][street]);    
$fb_city=mysqli_real_escape_string($conn, $i[location][city]);    
$fb_state=mysqli_real_escape_string($conn, $i[location][state]);  
$fb_zip=mysqli_real_escape_string($conn, $i[location][zip]); 
$fb_lat=mysqli_real_escape_string($conn, $i[location][latitude]);    
$fb_lng=mysqli_real_escape_string($conn, $i[location][longitude]);   
$stmt10->execute();    
}
$stmt10->close();


?>