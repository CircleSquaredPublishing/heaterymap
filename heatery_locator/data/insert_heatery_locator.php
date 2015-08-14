<?php 
/* File Name: insert.php Description: Inserts Facebook Graph API data into social_data database. Used only for geocoding purposes. Data is sent to specific table that is not normalized. It is our thoughts that a non normalized table will be better for this specific application since the number of concurrent users could be many and will never be known. All other data wil be stored in normalized tables within the social_data database. These tables will be utilized for features that are unlkiely to see the high volume demand and expedited turnaround time. Of course all is subject to change once in production. Author: Circle Squared Data Labs Author URI: http://www.heatery.io */ 
/*'. $latitude . ',' . $longitude . '*/
require_once '../../geocodedmap-master/functions/conn.php';
$table = basename(__FILE__, '.php');
$name = ($table . '.json');
$fp = fopen( $name, 'w' );
$curl=curl_init('https://graph.facebook.com/v2.4/search?q=restaurant&type=place&distance=3200&center=26.46,-80.07&zip=33444,33445,33446,33448,33482,33483,33484&fields=location,name,likes,talking_about_count,were_here_count,description,general_manager,hours,price_range,parking,picture,cover,restaurant_services,restaurant_specialties,website&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY');
curl_setopt($curl, CURLOPT_URL);
curl_setopt($curl, CURLOPT_FILE, $fp);
curl_exec($curl);
curl_close($curl);
$results=file_get_contents($name);
$fb_array=json_decode($results, true);
foreach ($fb_array[data] as $i) {
json_decode($i, true);
echo PHP_EOL; 
//BEGIN QUERY
$stmt1=$conn->prepare("INSERT INTO `locations` (`FID`,`name`,`lat`,`lng`,`address`,`city`,`state`,`postal`,`web`,`likes`,
`were_here`,`talking_about`,`price`,`pk_street`,`pk_lot`,`pk_valet`,`description`,`breakfast`,`lunch`,`dinner`,`coffee`,`drinks`,`reserve`,`walkins`,`groups`,`kids`,`takeout`,`delivery`,`catering`,`waiter`,`outdoor`)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"); 
$stmt1->bind_param("dsddsssisiiisiiisiiiiiiiiiiiiii",$FID,$name,$lat,$lng,$address,$city,$state,$postal,$web,$likes, $were_here,$talking_about,$price,$pk_street,$pk_lot,$pk_valet,$description,$breakfast,$lunch,$dinner,$coffee,$drinks,$reserve,$walkins, $groups,$kids,$takeout,$delivery,$catering,$waiter,$outdoor); 
$FID=mysqli_real_escape_string( $conn, $i[id] );   
$name=mysqli_real_escape_string($conn, $i[name]);    
$lat=mysqli_real_escape_string($conn, $i[location][latitude]);    
$lng=mysqli_real_escape_string($conn, $i[location][longitude]);   
$address=mysqli_real_escape_string($conn, $i[location][street]);    
$city=mysqli_real_escape_string($conn, $i[location][city]);    
$state=mysqli_real_escape_string($conn, $i[location][state]);   
$postal=mysqli_real_escape_string($conn, $i[location][zip]); 
$web=mysqli_real_escape_string( $conn, $i[website]); 
$likes=mysqli_real_escape_string($conn, $i[likes]);  
$were_here=mysqli_real_escape_string($conn, $i[were_here_count]); 
$talking_about=mysqli_real_escape_string($conn, $i[talking_about_count]);
$price=mysqli_real_escape_string($conn, $i[price_range]);    
$pk_street=mysqli_real_escape_string($conn, $i[parking][street]); 
$pk_lot=mysqli_real_escape_string($conn, $i[parking][lot] ); 
$pk_valet=mysqli_real_escape_string($conn, $i[parking][valet]); 
$description=mysqli_real_escape_string($conn, $i[description]);    
$breakfast=mysqli_real_escape_string($conn, $i[restaurant_specialties][breakfast]);    
$lunch=mysqli_real_escape_string($conn, $i[restaurant_specialties][lunch]);     
$dinner=mysqli_real_escape_string($conn, $i[restaurant_specialties][dinner]);
$coffee=mysqli_real_escape_string($conn, $i[restaurant_specialties][coffee]);    
$drinks=mysqli_real_escape_string($conn, $i[restaurant_specialties][drinks]);  
$reserve=mysqli_real_escape_string($conn, $i[restaurant_services][reserve]); 
$walkins=mysqli_real_escape_string($conn, $i[restaurant_services][walkins]);
$groups=mysqli_real_escape_string($conn, $i[restaurant_services][groups]);
$kids=mysqli_real_escape_string($conn, $i[restaurant_services][kids]);
$takeout=mysqli_real_escape_string($conn, $i[restaurant_services][takeout]);
$delivery=mysqli_real_escape_string($conn, $i[restaurant_services][delivery]);
$catering=mysqli_real_escape_string($conn, $i[restaurant_services][catering]);
$waiter=mysqli_real_escape_string($conn, $i[restaurant_services][waiter]);
$outdoor=mysqli_real_escape_string($conn, $i[restaurant_services][outdoor]);         
$stmt1->execute();   
}
$stmt1->close();  
require_once 'output_json.php';
?>