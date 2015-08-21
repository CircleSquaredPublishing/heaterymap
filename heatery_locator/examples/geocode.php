<!DOCTYPE html>
<html>
<head>
<title>Geocode</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../assets/css/storelocator.css" />

<style type="text/css">
    
#geocode-result{
clear: left;
float: left;
margin-top: 30px;
width: 100%;
border: 1px solid #000;
width:400px;
height:50px;
}
    
</style>
</head>
  <body>
    
    <div class="bh-sl-container">
      <div id="page-header">
        <h1>Heatery Geocoding Form</h1>
        <p>For Latitude and Longitude just Enter an Address or Zip Code.</p>
      </div>
        
        
      <div class="bh-sl-form-container">
        <form id="bh-sl-user-location" method="post" action="#">
            
            <div class="form-input">
              <label for="bh-sl-address">Enter Address or Zip Code:</label>
              <input type="text" id="bh-sl-address" name="bh-sl-address" />
            </div>
            
            <button id="bh-sl-submit" type="submit">Submit</button>
            
        </form>
      </div>
        
      <div id="geocode-result"></div>
        
    </div>
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="../assets/js/geocode.js"></script>
      
      
<?php      
$stmt = $conn->query("SELECT 
fb_name,  
fb_date,
fb_lat,
fb_lng,
fb_city,
fb_street,
fb_talking_about, 
fb_were_here,
fb_likes,
TRUNCATE((SQRT ( POW ( 69.1 * ( fb_lat - $latitude ), 2 ) + POW ( 69.1 * ( $longitude - fb_lng ) * COS ( fb_lat/ 57.3 ), 2 ) ) * 0.621371),2)
AS distance 
FROM top10_markers 
WHERE fb_date = CURDATE() HAVING distance < 1
ORDER BY fb_talking_about DESC LIMIT 10");
?>
  </body>
</html>