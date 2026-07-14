<?php
session_start();


if (isset($_SESSION['admin'])) {
    header("Location: admin.php");
    die();
    
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trip";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

//Fetch data
$sql = "SELECT * FROM trip_registrations ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard - Trip Registrations</title>
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background-color: #f2f9fb;
      margin: 0;
      padding: 0;
    }

    h2 {
      background: #00bcd4;
      color: white;
      padding: 1rem;
      text-align: center;
      margin: 0;
    }

    .container {
      width: 90%;
      margin: 2rem auto;
      background: white;
      padding: 1rem;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: center;
    }

    th {
      background-color: #00bcd4;
      color: white;
    }

    a {
      text-decoration: none;
      color: #007b8f;
      font-weight: bold;
    }

    a:hover {
      color: #e91e63;
    }

    .btn {
      background-color: #00bcd4;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
    }

    .btn:hover {
      background-color: #0097a7;
    }

    .logout {
      float: right;
      margin-top: -3rem;
      margin-right: 2rem;
    }
  </style>
</head>
<body>

  <h2>Admin Dashboard - Trip Registrations</h2>

  <div class="container">
    <a href="WORK.php" class="btn"> Add New Registration</a>
    <a href="logout.php" class="btn logout">Logout</a>

    <table>
      <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Trip Date</th>
        <th>Travelers</th>
        <th>Package</th>
        <th>Message</th>
        <th>Actions</th>
      </tr>

      <?php 
      if (mysqli_num_rows($result) > 0): 
        while($row = mysqli_fetch_assoc($result)): 
      ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['phone']) ?></td>
        <td><?= htmlspecialchars($row['age']) ?></td>
        <td><?= htmlspecialchars($row['gender']) ?></td>
        <td><?= htmlspecialchars($row['address']) ?></td>
        <td><?= htmlspecialchars($row['trip_date']) ?></td>
        <td><?= htmlspecialchars($row['travelers']) ?></td>
        <td><?= htmlspecialchars($row['package']) ?></td>
        <td><?= htmlspecialchars($row['message']) ?></td>
        <td>
          <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
          <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
        </td>
      </tr>
      <?php 
        endwhile; 
      else: 
      ?>
      <tr><td colspan="12">No registrations found.</td></tr>
      <?php endif; ?>
    </table>
  </div>

</body>
</html>

<?php mysqli_close($conn); ?>
