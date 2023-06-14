<?php
$servername = "localhost";
$username = "justtmwa_addapp";
$password = "NzOV[5B}(u&u";
$dbname = "justtmwa_address";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>