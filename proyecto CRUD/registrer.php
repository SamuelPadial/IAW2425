<?php
include 'dbcone.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = mysqli_real_escape_string($conn, $_POST['user']);
    $contra = mysqli_real_escape_string($conn, password_hash($_POST['pass'], PASSWORD_DEFAULT));

    $selquery = 'SELECT id FROM usuario WHERE user = "$usuario"'
    $result = mysqli_query($conn,$selquery)
    
    if (empty($usuario) || empty($contra)) {
        die("Por favor, completa todos los campos.");
    }

    else if (mysqli_num_rows($result) > 0){
        die("Introduce otro usuario u otra contraseña");
    }
    else{
        $insertquery = 'INSERT INTO usuario (user,pass) VALUES ("$usuario","$contra")'
        if(){}
    }

}