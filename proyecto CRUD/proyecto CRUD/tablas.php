<?php
session_start();
include 'dbcone.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$selquery = "SELECT * FROM actividades" ;
$result = mysqli_query($conn, $selquery);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
</head>
<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <a href="index.php?logout=true">Cerrar Sesión</a>

    <h3>Actividades Existentes</h3>
    <table>
        <tr>
            <th>Titulo</th>
            <th>Tipo</th>
            <th>Departamento</th>
            <th>Profesor</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de finalizacion</th>
            <th>Hora de Inicio</th>
            <th>Hora de finalizacion</th>
            <th>Organizador</th>
            <th>Ubicacion</th>
            <th>Precio</th>
            <th>Objetivo</th>
            <th>Total Alumnos</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['tilte']) . "</td>";
            echo "<td>" . htmlspecialchars($row['type']) . "</td>";
            echo "<td>" . htmlspecialchars($row['dep']) . "</td>";
            echo "<td>" . htmlspecialchars($row['prof']) . "</td>";
            echo "<td>" . htmlspecialchars($row['start_date']) . "</td>";
            echo "<td>" . htmlspecialchars($row['fin_date']) . "</td>";
            echo "<td>" . htmlspecialchars($row['start_time']) . "</td>";
            echo "<td>" . htmlspecialchars($row['fin_time']) . "</td>";
            echo "<td>" . htmlspecialchars($row['org']) . "</td>";
            echo "<td>" . htmlspecialchars($row['ubi']) . "</td>";
            echo "<td>" . htmlspecialchars($row['coste']) . "</td>";
            echo "<td>" . htmlspecialchars($row['objetivo']) . "</td>";
            echo "<td>" . htmlspecialchars($row['alumn']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
