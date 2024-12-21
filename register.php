<?php
session_start();
include('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        // Registration logic
        $new_username = $_POST['new_username'];
        $new_password = $_POST['new_password'];

        // Hash the password before storing it
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $new_username, $hashed_password);
        if ($stmt->execute()) {
            $success_message = "Registration successful! You can now log in.";
        } else {
            $error_message = "Error in registration. Please try again.";
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .error, .success {
            color: red;
            text-align: center;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Register</h2>

    <?php
    if (isset($error_message)) {
        echo "<p class='error'>$error_message</p>";
    }
    if (isset($success_message)) {
        echo "<p class='success'>$success_message</p>";
    }
    ?>

    <!-- Registration Form -->
    <form action="" method="POST">
        <label for="new_username">Username:</label>
        <input type="text" name="new_username" required>
        <label for="new_password">Password:</label>
        <input type="password" name="new_password" required>
        <button type="submit" name="register">Register</button>
    </form>


    <hr>

    <p>Have an account? <a href="index.php">Register here</a></p>


</div>

</body>
</html>
