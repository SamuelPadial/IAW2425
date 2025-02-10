<?php
session_start();
include 'dbcone.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM usuario WHERE user = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (hash_equals($user['password'], hash('sha256', $password))) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_type'] = $user['tipo'];
            header("Location: tablas.php");
        } else {
            echo "Usuario o contraseña incorrecto.";
        }
    } else {
        echo "Usuario o contraseña incorrecto.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="POST" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
    <p>¿No tienes cuenta? Haz clcik<a href="register.php">aqui</a></p>
</body>
</html>
