<?php
/*
File Name: conn.php
Description: Database connection script.s
Author: Circle Squared Data Labs
Author URI: http://www.heatery.io
*/
$servername="localhost"; 

$username="root"; 

$password="root"; 

$dbname = "social_data";

$conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {

            die("Connection failed:" . $conn->connect_error);

     exit();
        
}