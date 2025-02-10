<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

include 'dbcone.php';

$query = "DELETE FROM actividades WHERE id='$id'";
mysqli_query($conn, $query);
$conn->close();

header("Location: view_activities.php");
?>