<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista PHP</title>
</head>
<body>

    <h1>Lista de elementos php</h1>
    <?php
    $dir = scandir(".");
    foreach ($dir as $docu){
        if ($docu === "." || $docu === "..") continue;

        $docuName = $docu;
        $docuType = is_dir($)
        $docuSize =
        $docuMod =
    }
    
    ?>
    
</body>
</html>