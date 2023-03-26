<?php
include 'db-connection.php';

$servername = "localhost"; // Default user by xammp
$username = "root"; // default username via xammp
$password = ""; // default password by 
$dbname = "test"; // default

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
