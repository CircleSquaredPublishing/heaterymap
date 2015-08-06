<!DOCTYPE html>
<html lang=en itemscope itemtype="http://schema.org/Map">

<head>
    <title>Top Ten Table</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!----------EXTERNAL LIBRARIES---------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>

<!----------BEGIN CONTENT---------->

<body>

    <nav class="navbar navbar-inverse">

        <div class="container-fluid">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>
                <!--@end .navbar-toggle-->

                <a class="navbar-brand" href="http://www.heatery.io">heatery.io</a>

            </div>
            <!--@end .navbar-header-->

            <div class="collapse navbar-collapse" id="myNavbar">

                <ul class="nav navbar-nav">

                    <li><a href="http://www.heatery.io">Home</a></li>

                </ul>
                <!--@end .nav navbar-nav-->

                <ul class="nav navbar-nav navbar-right">

                    <li><a href="#"><span class="glyphicon glyphicon-user"></span>Client Portal</a></li>

                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>The Speak Easy</a></li>

                </ul>
                <!--@end .nav navbar-nav navbar-right-->

            </div>
            <!--@end .collapse navbar-collapse-->

        </div>
        <!--@end .container-fluid-->

    </nav>
    <!--@end .navbar navbar-inverse-->

    <div id="banner" class="container">

        <div class="page-header">

            <h3 class="text-center">The DAC @ heatery.io<br />
                    
                <small>{data analysis center}</small>
                
                </h3>

        </div>
        <!--@end .page-header-->

        <h5 class="text-center">Want To See Your Restaurant's Data?
                <br />
                <br />
                <code><a href= "mailto:info@heatery.io?Subject=Data%20Request" target="_top"><span class="glyphicon glyphicon-envelope"></span>info@heatery.io</a></code>
                <br />
                <br />
    <small>&copy; 2015 Circle Squared Data Labs, LLC</small>
            </h5>
        <!--@end .text-center-->

    </div>
    <!--@end #banner-->

    <br />
    <!--@end .row text-center-->

    <div class="form-group">

        <form role="form" id="tt_form" name="myForm" method="post">

            <div class="input-group">

                <span class="input-group-addon">See What's Cooking-></span>
                <input type="text" class="form-control" name="address" placeholder="Enter a Destination and..." />

                <span class="input-group-btn">

            <input class="btn btn-primary" type="submit" value="Find Your Hot Spot." /></span>

            </div>
            <!--@end .input-group-->

            <br />
            <div id="table-container" class="container">
                <div class="row" id="ajaxDiv">
                    <div class="col-12-xs">


                        <?php require_once("../DB/connections/connectLocal.php");?>

                            <?php

date_default_timezone_set("America/New_York");

echo 
    'The Top 10 Restaurants being talked about for ' . date('l') .' ' . date('F,jS Y');

echo  
"<div class='container'>
    <div class='table-responsive'> 
        <table class='table table-bordered table-hover'>";
echo 
"<thead>
        <tr>
            <th>Restaurant Name</th>
            <th>Likes</th>
            <th>Talking About</th>
            <th>Were Here</th>
            <th>Heatery Score</th>
            <th>Date</th>
        </tr>

</thead>";

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
    
echo "</tr></tbody>" . "\n";
    
} 
    
}  

try {
 
$conn= new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("SELECT DISTINCT top10_markers.`fb_name`, top10_markers.`fb_likes`, top10_markers.`fb_talking_about`, top10_markers.`fb_were_here`, top10_markers.`fb_heatery_score`, top10_markers.`fb_date` FROM top10_markers WHERE 
top10_markers.`fb_date` = CURDATE() AND top10_markers.`fb_city` = '$city' ORDER BY top10_markers.`fb_talking_about` DESC LIMIT 10;"); 
    
$stmt->execute();
    
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll()))as $k=>$v){
    
        echo stripslashes($v);
    
    }
    
}

catch(PDOException $e) {
    
        echo "Error: " .$e->getMessage();
    
}

$conn = null;
echo "</table>
        </div>
            </div>";?>

                    </div>
                    <!--@end .col-12-xs-->

                </div>
                <!--@end .row-->

            </div>
            <!--@end #table-container-->

        </form>
        <!--@end #tt_form-->

    </div>
    <!--@end .form-group-->


</body>

</html>