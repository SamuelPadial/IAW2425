<?php
$servername = "sql308.thsite.top";
$username = "thsi_38097495";
$password = "?X1!KS8e";
$dbname = "thsi_38097495_bdejemplo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?> 