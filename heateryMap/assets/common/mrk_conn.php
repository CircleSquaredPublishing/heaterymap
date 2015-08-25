<?php
/*
File Name: conn.php
Description: Database connection script.
Author: Circle Squared Data Labs
Author URI: http://www.heatery.io
*/
require $_SERVER['DOCUMENT_ROOT'] . '/credentials/connect.php';
$conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
            die("Connection failed:" . $conn->connect_error);
     exit();
    } else { 
        echo ('Connected to ' . $servername .','. $dbname .'.');
}
?>