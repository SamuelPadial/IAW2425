<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba session</title>
</head>
<body>
    <?php
    session_start();
    $_SESSION["name"] = "Samu";
    print "<p></p>"
    ?>
</body>
</html>