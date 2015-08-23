<?php 

echo 
    "<div class='container'>
	   <div class='row'>
    	   <div class='table-responsive'>
                <table class='table-bordered table-hover'>";

echo 
    "<thead>
    <tr>
    <th>Establishment</th>
    <th>Talking About</th>
    <th>Were Here</th>
    <th>Likes</th>
    <th>Miles from City Center</th>
    </tr>
    </thead>
    <tbody>";

class TableRows extends RecursiveIteratorIterator {
    
    function __construct($it) {
        
        parent::__construct($it, self::LEAVES_ONLY);
        
    }
 
    function current() {
        
        return 
            
    "<td style='padding:10px; margin:5px;'>" . parent::current(). "</td>";
        
    }
  
    function beginChildren() {
        
        echo "<tr>";
        
    }
 
    function endChildren() {
        
        echo "</tr>" . "\n";
        
    }
    
}

try {

    
$conn= new PDO("mysql:host=$servername; dbname=$dbname",$username,$password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    date_default_timezone_set("America/New_York");
    
    require_once ('../assets/db/q_dist_geo_table.php');
    
    $stmt->execute();
    
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll()))as $k=>$v) {
        
        echo stripslashes($v);
    }
    
}

catch(PDOException $e) {
    
    //echo "Error: " .$e->getMessage();
    
}

echo "</tbody></table></div></div></div></div>";

$conn=null;

?>