<?php
$servername = "justtmwa_address";
$username = "justtmwa_addapp";
$password = "NzOV[5B}(u&u";
$dbname = "addressapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>