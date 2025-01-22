<?php
// Conexion BD
$servername =  "sql308.thsite.top";
$username = "thsi_38097495";
$password = "?X1!KS8e";
$dbname = "thsi_38097495_bdejemplo";

$conexbd = mysqli_connect($servername,$username,$password,$dbname);

if (!$conexbd) {
    die("Connection failed: " . mysqli_connect_error());
  };

  $sql = "INSERT INTO usuario (username, password) VALUES ('Ale','garmun812')";
  
  if (mysqli_query($conexbd, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conexbd);
?> 