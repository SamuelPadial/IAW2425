<?php
session_start();
if (!isset($_SESSION['user_id'])){
    header('Location: index.php');
    exit();
}
include "dbcone.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $dep = mysqli_real_escape_string($conn, $_POST['dep']);
    $prof = mysqli_real_escape_string($conn, $_POST['prof']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $fin_date = mysqli_real_escape_string($conn, $_POST['fin_date']);
    $start_time = mysqli_real_escape_string($conn, $_POST['start_time']);
    $fin_time = mysqli_real_escape_string($conn, $_POST['fin_time']);
    $org = mysqli_real_escape_string($conn, $_POST['org']);
    $ubi = mysqli_real_escape_string($conn, $_POST['ubi']);
    $coste = mysqli_real_escape_string($conn, $_POST['coste']);
    $objetivo = mysqli_real_escape_string($conn, $_POST['objetivo']);
    $alumn = mysqli_real_escape_string($conn, $_POST['alumn']);

    $query = "UPDATE actividades SET title='$title', type='$type', dep='$dep', prof='$prof', trimestre='$trimestre', start_date='$start_date', start_time='$start_time', fin_date='$fin_date', fin_time='$fin_time', org='$org', acompañantes='$acompañantes', ubi='$ubi', coste='$coste', alumn='$alumn', objetivo='$objetivo' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: tablas.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    $conn->close();
} else {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $result = $conn->query("SELECT * FROM actividades WHERE id='$id'");
    $activity = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Actividad</title>
</head>
<body>
    <h1>Editar Actividad</h1>
    <form method="POST" action="edit_activity.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($activity['id']); ?>">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($activity['title']); ?>" required><br>
        <label for="type">Tipo:</label>
        <select id="type" name="type" required>
            <option value="extraescolar" <?php if ($activity['type'] == 'extraescolar') echo 'selected'; ?>>Extraescolar</option>
            <option value="complementaria" <?php if ($activity['type'] == 'complementaria') echo 'selected'; ?>>Complementaria</option>
        </select><br>
        <label for="dep">Departamento:</label>
        <input type="text" id="dep" name="dep" value="<?php echo htmlspecialchars($activity['dep']); ?>" required><br>
        <label for="prof">Profesor Responsable:</label>
        <input type="text" id="prof" name="prof" value="<?php echo htmlspecialchars($activity['prof']); ?>" required><br>
        <label for="start_date">Fecha Inicio:</label>
        <input type="date" id="start_date" name="start_date" value="<?php echo htmlspecialchars($activity['start_date']); ?>" required><br>
        <label for="start_time">Hora Inicio:</label>
        <input type="time" id="start_time" name="start_time" value="<?php echo htmlspecialchars($activity['start_time']); ?>" required><br>
        <label for="fin_date">Fecha Fin:</label>
        <input type="date" id="fin_date" name="fin_date" value="<?php echo htmlspecialchars($activity['fin_date']); ?>" required><br>
        <label for="fin_time">Hora Fin:</label>
        <input type="time" id="fin_time" name="fin_time" value="<?php echo htmlspecialchars($activity['fin_time']); ?>" required><br>
        <label for="org">Organizador:</label>
        <input type="text" id="org" name="org" value="<?php echo htmlspecialchars($activity['org']); ?>" required><br>
        <label for="ubi">Ubicación:</label>
        <input type="text" id="ubi" name="ubi" value="<?php echo htmlspecialchars($activity['ubi']); ?>" required><br>
        <label for="coste">Coste:</label>
        <input type="number" step="0.01" id="coste" name="coste" value="<?php echo htmlspecialchars($activity['coste']); ?>" required><br>
        <label for="alumn">Total Alumnos:</label>
        <input type="number" id="alumn" name="alumn" value="<?php echo htmlspecialchars($activity['alumn']); ?>" required><br>
        <label for="objetivo">Objetivo:</label>
        <textarea id="objetivo" name="objetivo" required><?php echo htmlspecialchars($activity['objetivo']); ?></textarea><br>
        <button type="submit">Guardar Cambios</button>
    </form>
    <a href="tablas.php">Volver al Dashboard</a>
</body>
</html>
