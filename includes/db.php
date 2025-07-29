<?php
$host = 'localhost'; // Database host
$username = 'root'; // Database username
$password = ""; // Database password
$dbname = 'sipi-falls'; // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
// Check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
} else {
  //  echo "Connected successfully"; // Uncomment for debugging
}

?>