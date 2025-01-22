<?php
$servername = "sql308.thsite.top";
$username = "thsi_38097495";
$password = "?X1!KS8e";
$dbname = "thsi_38097495_bdejemplo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?> 