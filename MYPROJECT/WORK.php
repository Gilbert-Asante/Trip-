<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>A Trip to Maldives</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background-image: url("gallery/best-all-inclusive-resorts-in-the-Maldives-2.jpg");
      color: #222;
      background-attachment:fixed;
      background-size:cover;
    }

    .header {
      background: linear-gradient(to right, #00bcd4, #1de9b6);
      text-align: center;
      padding: 2rem 1rem;
      color: #fff;
    }

    .header h1 {
      font-size: 2rem;
      margin-bottom: 0.5rem;
    }
    .header h1 a {
      color: #fff;
      text-decoration: none;
      
    }


   .trip-section{
    display:flex;
    justify-content:center;
    align-items:flex-start;
    gap: 50px;
    }

    .trip-image img {
      width: 100%;
      max-width: 750px;
      height: 140vh;
      border-radius: 10px;
      object-fit: cover;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .trip-form {
    width: 100%;
    max-width: 1200px;
    background-color: #007b8f;
    color: #fff;
    border-radius: 10px;
    padding: 2rem;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}

.trip-form h2 {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
    text-align: center;
}

.trip-form p {
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 1rem;
    text-align: center;
}

.register-title {
    text-align: center;
    color: #ffca28;
    margin-bottom: 1rem;
}

/* Two-column form */
.form{
    display: flex;
    justify-content: space-between;
    gap: 40px;
    align-items: flex-start;
}

/* Left side */
.left{
    flex: 1;
    padding: 20px;
    border-right: 3px solid rgba(255,255,255,0.3);
}

/* Right side */
.right{
    flex: 1;
    padding: 20px;
}

/* Labels */
.form label{
    display: block;
    margin-top: 12px;
    margin-bottom: 5px;
    font-weight: 500;
}

/* Inputs */
.form input,
.form select,
.form textarea{
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: none;
    margin-bottom: 15px;
}

/* Button */
.btn{
    width: 100%;
    margin-top: 70px;
}
    textarea {
      resize: none;
    }

    .btn {
      width: 100%;
      margin-top: 1rem;
      background-color: #00e676;
      color: #fff;
      padding: 0.7rem;
      font-size: 1rem;
      font-weight: bold;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #00c853;
    }

    footer {
      text-align: center;
      padding: 1rem;
      background: #0aa5b9ec;
      color: white;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    .message {
      text-align: center;
      margin-bottom: 1rem;
      padding: 10px;
      border-radius: 5px;
    }

    .success {
      background: #00e676;
      color: white;
    }

    .error {
      background: #e53935;
      color: white;
    }

    @media (max-width:768px){

    .form{
        flex-direction: column;
    }

    .left{
        border-right: none;
        border-bottom: 3px solid rgba(255,255,255,0.3);
        padding-bottom: 30px;
    }

    .right{
        padding-top: 30px;
    }
}
    }
  </style>
</head>
<body>
<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trip";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS trip_registrations (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(30) NOT NULL,
  age INT(3) NOT NULL,
  gender VARCHAR(20) NOT NULL,
  address VARCHAR(255) NOT NULL,
  trip_date VARCHAR(50) NOT NULL,
  travelers INT(3) NOT NULL,
  package VARCHAR(50) NOT NULL,
  message TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
mysqli_query($conn, $sql);
 
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $trip_date = mysqli_real_escape_string($conn, $_POST['trip']);
    $travelers = mysqli_real_escape_string($conn, $_POST['travelers']);
    $package = mysqli_real_escape_string($conn, $_POST['package']);
    $user_message = mysqli_real_escape_string($conn, $_POST['message']);

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($age) && !empty($gender) && !empty($address) && !empty($trip_date) && !empty($travelers) && !empty($package)) {
        $insert = "INSERT INTO trip_registrations (name, email, phone, age, gender, address, trip_date, travelers, package, message)
                   VALUES ('$name', '$email', '$phone', '$age', '$gender', '$address', '$trip_date', '$travelers', '$package', '$user_message')";

        if (mysqli_query($conn, $insert)) {
            $message = "<div class='message success'>Registration successful! Thank you, $name.</div>";
        } else {
            $message = "<div class='message error'>Database Error: " . mysqli_error($conn) . "</div>";
        }
    } else {
        $message = "<div class='message error'>Please fill in all required fields.</div>";
    }
}
?>

  <header class="header">
    <h1><a href="view.html">A Trip to Maldives</a></h1>
  </header>
  
  

  <section class="trip-section">
    <div class="trip-image">
      <!-- <img src="gallery/best-all-inclusive-resorts-in-the-Maldives-2.jpg" alt="Maldives beach" /> -->
    </div>

    <div class="trip-form">
      <h2>Join Our Maldives Getaway</h2>
      <p>Join our trip to the Maldives to experience some beautiful creatures that do not exist in our various countries. 
                    Maldives is a breathtaking tropical paradise made up of over 1000 coral islands scattered across the Indian Ocean.
                    Famous for its white sandy beaches, turquoise lagoons, and luxury overwater villas. </p>
      <h3 class="register-title">Register Now</h3>

      <?php echo $message; ?>

      <form action="" method="POST" class="form">
        <div class="left">

<label>Full Name:</label>
<input type="text" name="name" required>

<label>Email Address:</label>
<input type="email" name="email" required>

<label>Phone Number:</label>
<input type="tel" name="phone" required>

<label>Age:</label>
<input type="number" name="age" required>

<label>Gender:</label>
<select name="gender" required>
    <option value="">Select gender</option>
    <option>Male</option>
    <option>Female</option>
    <option>Other</option>
</select>

</div>

<div class="right">

<label>Location / Address:</label>
<input type="text" name="address" required>

<label>Preferred Trip Date:</label>
<select name="trip" required>
    <option value="">Select a date</option>
    <option>November 2025</option>
    <option>February 2026</option>
    <option>April 2026</option>
</select>

<label>Number of Travelers:</label>
<input type="number" name="travelers" min="1" required>

<label>Package Type:</label>
<select name="package" required>
    <option value="">Select Package</option>
    <option>Basic - $999</option>
    <option>Deluxe - $1499</option>
    <option>Luxury - $2499</option>
</select>

<label>Additional Requests:</label>
<textarea name="message"></textarea>



</div>

</form>
<button type="submit" class="btn">Register</button>
</section>

  <footer>
    <p>© 2025–2026 A Trip to Maldives. All rights reserved. <a href="dashboard.php">Admin</a></p>
    <p></p>
  </footer>
</body>
</html>
