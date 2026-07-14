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
  $result = mysqli_query($conn, "SELECT * FROM trip_registrations WHERE id=$id");
  $data = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = intval($_POST['id']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $package = mysqli_real_escape_string($conn, $_POST['package']);

  $update = "UPDATE trip_registrations SET 
    name='$name', email='$email', phone='$phone', package='$package' 
    WHERE id=$id";

  if (mysqli_query($conn, $update)) {
    echo "<script>alert('Record updated successfully'); window.location='admin.php';</script>";
  } else {
    echo "<script>alert('Error updating record');</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Registration</title>
  <style>
    body { font-family: Poppins; background: #f4f4f4; }
    form { width: 400px; margin: 100px auto; background: #fff; padding: 20px; border-radius: 8px; }
    label { display: block; margin-top: 10px; }
    input, select { width: 100%; padding: 8px; margin-top: 5px; }
    button { margin-top: 15px; padding: 10px; width: 100%; background: #00bcd4; color: white; border: none; border-radius: 5px; }
  </style>
</head>
<body>
<form method="POST">
  <input type="hidden" name="id" value="<?= $data['id'] ?>">
  <label>Full Name</label>
  <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>">

  <label>Email</label>
  <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>">

  <label>Phone</label>
  <input type="text" name="phone" value="<?= htmlspecialchars($data['phone']) ?>">

  <label>Package</label>
  <select name="package">
    <option value="<?= $data['package'] ?>"><?= $data['package'] ?></option>
    <option value="Basic - $999">Basic - $999</option>
    <option value="Deluxe - $1,499">Deluxe - $1,499</option>
    <option value="Luxury - $2,499">Luxury - $2,499</option>
  </select>

  <button type="submit">Save Changes</button>
</form>
</body>
</html>

<?php mysqli_close($conn); ?>
