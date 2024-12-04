<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
</head>
<body>

    <h1>La gente necesita mas tiempo, mas dias, mas horas. Yo solo necesito un par de segundos</h1>

    <?php
    date_default_timezone_set("Europe/Madrid");
    setlocale(LC_ALL, "es_ES");
    $dias = array("Monday"=>"lunes", "Tuesday"=>"martes","Wednesday"=>"miercoles","Thursday"=>"jueves","Friday"=>"viernes","Saturday"=>"sabado","Sunday"=>"domingas");
    $meses = array("01"=>"enero","02"=>"febrero","03"=>"marzo","04"=>"abril","05"=>"mayo","06"=>"junio","07"=>"julio","08"=>"agosto","09"=>"septiembre","10"=>"octubre","11"=>"noviembre","12"=>"diciembre");

    $diaactual = date("l");
    $diaesp = $dias[$diaactual];
    $mesactual = date("m");
    $mesesp = $meses[$mesactual];

    $fecha = ("Hoy es: " . $diaesp . " " . date("d") . " de " . $mesesp);
    echo($fecha);
    ?>

</body>
</html>