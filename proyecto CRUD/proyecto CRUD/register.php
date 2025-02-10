<?php
include 'dbcone.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = mysqli_real_escape_string($_POST['username']);
    $contra = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $tipo = mysqli_real_escape_string($_POST['tipo']);
    $dep = mysqli_real_escape_string($_POST['dep']);
    $mail = mysqli_real_escape_string($_POST['mail']);

    $selquery = "SELECT id FROM usuario WHERE user = '$usuario'";
    $result = mysqli_query($conn, $selquery);

    if (empty($usuario) || empty($_POST['pass'])) {
        die("Por favor, completa todos los campos.");
    } else if (mysqli_num_rows($result) > 0) {
        die("El usuario ya existe. Introduce otro usuario.");
    } else {
        $insertquery = "INSERT INTO usuario (user, pass, tipo, dep, mail) VALUES ('$usuario', '$contra','$tipo','$dep','$mail')";
        if (mysqli_query($conn, $insertquery)) {
            $scsflly = "Usuario " . $usuario . " registrado correctamente";
            echo "<p id='aproved'>$scsflly</p>";
        } else {
            echo "<p id='denied'>Error al registrar el usuario. Inténtalo de nuevo.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro CRUD</title>
</head>
<body>
    <form action="register.php" method="POST">
        Usuario: <input type="text" name="username" required><br>
        Contraseña: <input type="password" name="pass" required><br>
        Tipo: <select id="tipo" name="tipo" required>
                <option value="1">Administrador</option>
                <option value="2">Profesor</option>
            </select><br>
        Departamento: <input type="text" name="dep"><br>
        Correo: <input type="mail" name="mail"><br>
        <input type="submit" value="Registrar">
    </form>
    <p>¿Ya estas registrado? Inicia sesion <a href="index.php">aqui</a></p>
</body>
</html>
