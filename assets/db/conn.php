<?php
/*
File Name: conn.php
Description: Database connection script.
Author: Circle Squared Data Labs
Author URI: http://www.heatery.io
*/
require '/Users/admin/Documents/credentials/connect.php';
$conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
            die("Connection failed:" . $conn->connect_error);
     exit();
        
}