<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: WORK.php"); exit; }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trip";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $delete = "DELETE FROM trip_registrations WHERE id = $id";
    if (mysqli_query($conn, $delete)) {
        echo "<script>alert('Record deleted successfully'); window.location='admin.php';</script>";
    } else {
        echo "<script>alert('Error deleting record'); window.location='admin.php';</script>";
    }
}

mysqli_close($conn);
?>
