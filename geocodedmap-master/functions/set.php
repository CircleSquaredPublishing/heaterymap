<?php 
echo "<table style='border: solid 1px #fff;
color: #fff;
margin-left:20%;
margin-top: 10%;
'>";
echo "<tr><th>Restaurant Name</th><th>Heatery Score</th><th>Talking About</th><th>Were Here</th><th>Date</th><th>km from center</th></tr>";
class TableRows extends RecursiveIteratorIterator {
    /************************************************************\
    *
    \************************************************************/
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }
    /************************************************************\
    *
    \************************************************************/
    function current() {
        return "<td style='width:150px;
        border:1px solid #fff;
        margin:20px;
        padding:10px;
        '>" . parent::current(). "</td>";
    }
    /************************************************************\
    *
    \************************************************************/
    function beginChildren() {
        echo "<tr>";
    }
    /************************************************************\
    *
    \************************************************************/
    function endChildren() {
        echo "</tr>" . "n";
    }
}
try {
    $conn= new PDO("mysql:host=$servername;
    dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    date_default_timezone_set("America/New_York");
    require_once ('../geocodedmap-master/functions/queries/query_distance.php');
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll()))as $k=>$v) {
        echo stripslashes($v);
    }
}
catch(PDOException $e) {
    echo "Error: " .$e->getMessage();
}
echo "</table>";
$conn->close();
?>