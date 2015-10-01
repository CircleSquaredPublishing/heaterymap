<?php 
/* 
File Name: insert.php 
Description: Inserts Facebook Graph API data into social_data database. Used only for geocoding purposes. Data is sent to specific table that is not normalized. It is our thoughts that a non normalized table will be better for this specific application since the number of concurrent users could be many and will never be known. All other data wil be stored in normalized tables within the social_data database. These tables will be utilized for features that are unlkiely to see the high volume demand and expedited turnaround time. Of course all is subject to change once in production. 
Author: Circle Squared Data Labs 
Author URI: http://www.heatery.io 
*/ 

/*@NOTE When adding fields to the database update the following in this file:
*1. Database table columns
*2. Facebook query fields
*3. SQL insert statement
*   a.column name (ie fb_cover)
*   b.binding value (ie ?)
*   c.bound param type (ie s denoting it is a string)
*   d.variable to bind to (ie $fb_cover)
*   e.location to send variable data (ie $fb_cover=mysqli_real_escape_string($conn, $i['cover']['source']);
*4. Update the following in hm_add.php file:
*   a.SQL select statement
*   b.PHP while function
*   c.PHP echo javascript for loop
*   d.PHP echo javascript HTML display
*/

$table = basename(__FILE__ , '.php');
$name = ($table . '.json');
$fp = fopen($name, 'w' );
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v2.4/search?q=restaurant&type=place&distance=3200&center='. $latitude . ',' . $longitude . '&fields=location,name,likes,talking_about_count,were_here_count,description,website,cover,about,culinary_team&limit=250&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY');
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_exec($ch);
curl_close($ch);
$results=file_get_contents($name);
$fb_array=json_decode($results, true);

foreach ($fb_array[data] as $i) {
require_once('hm_conn.php');      
$stmt1=$conn->prepare("INSERT INTO top10_markers(FID, fb_web,fb_cover,fb_about,fb_culinary_team,fb_description,fb_name, fb_likes, fb_were_here, fb_talking_about, fb_street, fb_city, fb_state, fb_zip, fb_lat, fb_lng)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt1-> bind_param("dssssssiiisssidd", $FID, $fb_web, $fb_cover, $fb_about, $fb_culinary_team, $fb_description, $fb_name, $fb_likes, $fb_were_here, $fb_talking_about, $fb_street, $fb_city, $fb_state, $fb_zip, $fb_lat, $fb_lng);
$FID=mysqli_real_escape_string($conn, $i['id']);
$fb_web=mysqli_real_escape_string($conn, $i['website']);
$fb_cover=mysqli_real_escape_string($conn, $i['cover']['source']);
$fb_about=mysqli_real_escape_string($conn, $i['about']);
$fb_culinary_team=mysqli_real_escape_string($conn, $i['culinary_team']);
$fb_description=mysqli_real_escape_string($conn, $i['description']);
$fb_name=mysqli_real_escape_string($conn, $i['name']);
$fb_likes=mysqli_real_escape_string($conn, $i['likes']);
$fb_were_here=mysqli_real_escape_string($conn, $i['were_here_count']);
$fb_talking_about=mysqli_real_escape_string($conn, $i['talking_about_count']);
$fb_street=mysqli_real_escape_string($conn, $i['location']['street']);
$fb_city=mysqli_real_escape_string($conn, $i['location']['city']);
$fb_state=mysqli_real_escape_string($conn, $i['location']['state']);
$fb_zip=mysqli_real_escape_string($conn, $i['location']['zip']);
$fb_lat=mysqli_real_escape_string($conn, $i['location']['latitude']);
$fb_lng=mysqli_real_escape_string($conn, $i['location']['longitude']);
$stmt1->execute();
}
$stmt1->close();


$table_fs=basename(__FILE__,'.php');
$name_fs=($table_fs .'foursquare'.'.json');
$fp_fs=fopen($name_fs,'w');


$fs_url="https://api.foursquare.com/v2/venues/explore?v=$version&ll=".$latitude.",".$longitude."&radius=3200&section=food&limit=50&novelty=new&client_id=$client_id&client_secret=$client_secret";


$ch_fs=curl_init();
curl_setopt($ch_fs,CURLOPT_URL,$fs_url);
curl_setopt($ch_fs,CURLOPT_FILE,$fp_fs);
curl_exec($ch_fs);
curl_close($ch_fs);
$results_fs=file_get_contents($name_fs);
$response_fs=json_decode($results_fs,true);

foreach($response_fs['response']['groups'] as $v){    
foreach($v['items'] as $v2){
foreach($v2['venue']['categories'] as $v3){      
foreach($v2['tips'] as $v4){ 

$stmt_fs= $conn->prepare(
    "INSERT INTO foursquare_explore(
    `fsid`,                  
    `fs_name`,               
    `fs_phone`,              
    `fs_address`,            
    `fs_lat`,                
    `fs_lng`,                
    `fs_postalCode`,         
    `fs_cc`,                 
    `fs_city`,               
    `fs_state`,              
    `fs_country`,            
    `formattedAddress1`,     
    `formattedAddress2`,     
    `formattedAddress3`,     
    `fs_checkins`,           
    `fs_users`,              
    `fs_tips`,               
    `fs_url`,               
    `fs_price_msg`,         
    `fs_price_sym`,          
    `fs_rating`,             
    `fs_rating_signals`,     
    `fs_hours`,              
    `fs_hereNow`,            
    `fs_category`,           
    `fs_tips_created`,       
    `fs_tips_text`,          
    `fs_tips_url`,           
    `fs_tips_likes`,         
    `fs_tips_userId`,        
    `fs_tips_userFirst`,     
    `fs_tips_userLast`,      
    `fs_tips_userPicPre`,    
    `fs_tips_userPicSuff`)
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    
$stmt_fs->bind_param("ssssddisssssssiiisssdisissssiissss",
                  
    $fsid,                  
    $fs_name,               
    $fs_phone,              
    $fs_address,            
    $fs_lat,                
    $fs_lng,                
    $fs_postalCode,         
    $fs_cc,                 
    $fs_city,               
    $fs_state,              
    $fs_country,            
    $formattedAddress1,     
    $formattedAddress2,     
    $formattedAddress3,     
    $fs_checkins,           
    $fs_users,              
    $fs_tips,               
    $fs_url,                
    $fs_price_msg,         
    $fs_price_sym,          
    $fs_rating,             
    $fs_rating_signals,     
    $fs_hours,              
    $fs_hereNow,            
    $fs_category,           
    $fs_tips_created,       
    $fs_tips_text,          
    $fs_tips_url,           
    $fs_tips_likes,         
    $fs_tips_userId,        
    $fs_tips_userFirst,     
    $fs_tips_userLast,      
    $fs_tips_userPicPre,    
    $fs_tips_userPicSuff);
               
    
    $fsid=                  mysqli_real_escape_string($conn,$v2['venue']['id']);                 
    $fs_name=               mysqli_real_escape_string($conn,$v2['venue']['name']);               
    $fs_phone=              mysqli_real_escape_string($conn,$v2['venue']['contact']['formattedPhone']);              
    $fs_address=            mysqli_real_escape_string($conn,$v2['venue']['location']['address']);            
    $fs_lat=                mysqli_real_escape_string($conn,$v2['venue']['location']['lat']);                
    $fs_lng=                mysqli_real_escape_string($conn,$v2['venue']['location']['lng']);                
    $fs_postalCode=         mysqli_real_escape_string($conn,$v2['venue']['location']['postalCode']);         
    $fs_cc=                 mysqli_real_escape_string($conn,$v2['venue']['location']['cc']);                 
    $fs_city=               mysqli_real_escape_string($conn,$v2['venue']['location']['city']);               
    $fs_state=              mysqli_real_escape_string($conn,$v2['venue']['location']['state']);              
    $fs_country=            mysqli_real_escape_string($conn,$v2['venue']['location']['country']);            
    $formattedAddress1=     mysqli_real_escape_string($conn,$v2['venue']['location']['formattedAddress'][0]);     
    $formattedAddress2=     mysqli_real_escape_string($conn,$v2['venue']['location']['formattedAddress'][1]);     
    $formattedAddress3=     mysqli_real_escape_string($conn,$v2['venue']['location']['formattedAddress'][2]);     
    $fs_checkins=           mysqli_real_escape_string($conn,$v2['venue']['stats']['checkinsCount']);           
    $fs_users=              mysqli_real_escape_string($conn,$v2['venue']['stats']['usersCount']);              
    $fs_tips=               mysqli_real_escape_string($conn,$v2['venue']['stats']['tipCount']);               
    $fs_url=                mysqli_real_escape_string($conn,$v2['venue']['url']);                
    $fs_price_msg=          mysqli_real_escape_string($conn,$v2['venue']['price']['message']);         
    $fs_price_sym=          mysqli_real_escape_string($conn,$v2['venue']['price']['currency']);          
    $fs_rating=             mysqli_real_escape_string($conn,$v2['venue']['rating']);             
    $fs_rating_signals=     mysqli_real_escape_string($conn,$v2['venue']['ratingSignals']);     
    $fs_hours=              mysqli_real_escape_string($conn,$v2['venue']['hours']['isOpen']);              
    $fs_hereNow=            mysqli_real_escape_string($conn,$v2['venue']['hereNow']['count']);            
    $fs_category=           mysqli_real_escape_string($conn,$v3['shortName']);           
    $fs_tips_created=       mysqli_real_escape_string($conn,$v4['createdAt']);       
    $fs_tips_text=          mysqli_real_escape_string($conn,$v4['text']);          
    $fs_tips_url=           mysqli_real_escape_string($conn,$v4['canonicalUrl']);           
    $fs_tips_likes=         mysqli_real_escape_string($conn,$v4['likes']['count']);         
    $fs_tips_userId=        mysqli_real_escape_string($conn,$v4['user']['id']);        
    $fs_tips_userFirst=     mysqli_real_escape_string($conn,$v4['user']['firstName']);     
    $fs_tips_userLast=      mysqli_real_escape_string($conn,$v4['user']['lastName']);      
    $fs_tips_userPicPre=    mysqli_real_escape_string($conn,$v4['user']['photo']['prefix']);    
    $fs_tips_userPicSuff=   mysqli_real_escape_string($conn,$v4['user']['photo']['suffix']);
          
    $stmt_fs->execute();
            }
        
        }

    }

}
    
$stmt_fs->close();
?>