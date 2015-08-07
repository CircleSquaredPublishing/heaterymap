<?php
echo 
    "<tr>
    <th>Restaurant Name</th>
    <th>Heatery Score</th>
    <th>Talking About</th>
    <th>Were Here</th>
    <th>Date</th>
    <th>Distance</th>
    </tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }
    function current() {
        return "<td>" . parent::current(). "</td>";
    }
    function beginChildren() { 
        echo "<tr>"; 
    } 
    function endChildren() { 
        echo "</tr>" . "\n";
    } }  
try {
    
require_once '/Users/admin/Documents/credentials/db_login.php';
date_default_timezone_set("America/New_York");
    
$stmt = $conn->prepare("SELECT 
fb_name, 
fb_heatery_score, 
fb_talking_about, 
fb_likes, 
fb_date,
SQRT ( POW ( 69.1 * ( fb_lat - $latitude ), 2 ) + POW ( 69.1 * ( $longitude - fb_lng ) * COS ( fb_lat/ 57.3 ), 2 ) ) 
AS distance 
FROM top10_markers 
WHERE fb_date = CURDATE() 
HAVING distance < 3 
ORDER BY fb_talking_about DESC 
LIMIT 10;"); 
    
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll()))as $k=>$v) {
        echo stripslashes($v);
    }
}
catch(PDOException $e) {
echo "Error: " .$e->getMessage();
}
echo "</table></div></body></html>";
?>