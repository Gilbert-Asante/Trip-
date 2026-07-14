<?php
session_start();


if (isset($_SESSION['admin'])) {
    header("Location: dashboard.php");
    exit;
}

$message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    
    if ($username === "STELLA" && $password === "12345") {
        $_SESSION["admin"] = $username;
        header("Location: admin.php");
        exit;
    } else {
        $message = "<p style='color:red; text-align:center;'>Invalid username or password.</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(to right, #00bcd4, #1de9b6);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            width: 350px;
            text-align: center;
        }

        h2 {
            color: #007b8f;
            margin-bottom: 1rem;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #00bcd4;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0097a7;
        }

        a {
            display: block;
            margin-top: 10px;
            color: #007b8f;
            text-decoration: none;
        }

        a:hover {
            color: #00c853;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Admin Login</h2>
        <?php echo $message; ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit"><a href="admin.php">Login</a></button>
        </form>
        <a href="view.html">← Back to Main Site</a>
    </div>
</body>
</html>
