<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include 'dbcone.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $dep = mysqli_real_escape_string($conn, $_POST['dep']);
    $prof = mysqli_real_escape_string($conn, $_POST['prof']);
    $fecha_inicio = mysqli_real_escape_string($conn, $_POST['fecha_inicio']);
    $hora_inicio = mysqli_real_escape_string($conn, $_POST['hora_inicio']);
    $fecha_fin = mysqli_real_escape_string($conn, $_POST['fecha_fin']);
    $hora_fin = mysqli_real_escape_string($conn, $_POST['hora_fin']);
    $org = mysqli_real_escape_string($conn, $_POST['org']);
    $ubi = mysqli_real_escape_string($conn, $_POST['ubi']);
    $coste = mysqli_real_escape_string($conn, $_POST['coste']);
    $objetivo = mysqli_real_escape_string($conn, $_POST['objetivo']);
    $alu = mysqli_real_escape_string($conn, $_POST['alu']);

    $query = "INSERT INTO actividades (title, type, dep, prof, start_date, fin_date , start_time, fin_time, org, ubi, coste, objetivo, alumn) VALUES ('$title', '$type', '$dep', $prof, $start_date, $fin_date , $start_time, $fin_time, '$org', '$ubi', '$coste', '$objetivo','$alumn' )";

    if (mysqli_query($conn, $query)) {
        header("Location: tablas.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Añadir Actividad</title>
</head>
<body>
    <h1>Añadir Actividad</h1>
    <form method="POST" action="add_activity.php">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required><br>
        <label for="type">Tipo:</label>
        <select id="type" name="tipo" required>
            <option value="extraescolar">Extraescolar</option>
            <option value="complementaria">Complementaria</option>
        </select><br>
        <label for="dep">Departamento:</label>
        <input type="text" id="dep" name="dep" required><br>
        <label for="prof">Profesor Responsable:</label>
        <input type="text" id="prof" name="prof" required><br>
        <label for="fecha_inicio">Fecha Inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" required><br>
        <label for="fecha_fin">Fecha Fin:</label>
        <input type="date" id="fecha_fin" name="fecha_fin" required><br>
        <label for="hora_inicio">Hora Inicio:</label>
        <input type="time" id="hora_inicio" name="hora_inicio" required><br>
        <label for="hora_fin">Hora Fin:</label>
        <input type="time" id="hora_fin" name="hora_fin" required><br>
        <label for="org">Organizador:</label>
        <input type="text" id="org" name="org" required><br>
        <label for="ubi">Ubicación:</label>
        <input type="text" id="ubi" name="ubi" required><br>
        <label for="coste">Coste:</label>
        <input type="number" step="0.01" id="coste" name="coste" required><br>
        <label for="objetivo">Objetivo:</label>
        <textarea id="objetivo" name="objetivo" required></textarea><br>
        <label for="total_alumnos">Total Alumnos:</label>
        <input type="number" id="total_alumnos" name="total_alumnos" required><br>
        <button type="submit">Añadir Actividad</button>
    </form>
    <a href="tablas">Volver al las actividades</a>
</body>
</html>
