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

  $sql = "SELECT username, password FROM usuario LIMIT 2";
  $resultado = mysqli_query($conexbd,$sql);

if (mysqli_num_rows($resultado) > 0){
        while($row = mysqli_fetch_assoc($resultado)) {
            echo "usuario: " . $row["username"] . " contraseña: " . $row["password"] . "<br>";
        };
};

mysqli_close($conexbd);
?> 