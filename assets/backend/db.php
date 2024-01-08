<?php

$servername = "localhost";
$username = "root"; // Assuming the username is "root" for XAMPP
$password = ""; // No password for XAMPP by default
$dbname = "accounting";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>