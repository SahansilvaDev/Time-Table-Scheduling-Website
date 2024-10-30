<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scheduler";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Prepare and execute a query to check the credentials
    $stmt = $conn->prepare("SELECT user_id, username, email, password FROM students WHERE email = ? OR username = ? OR user_id = ?");
    $stmt->bind_param("sss", $login, $login, $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Set session variables
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];

            // Redirect to user dashboard
            header("Location: ../../users/index.php");
            exit;
        } else {
            // Invalid credentials
            echo "Invalid password.";
        }
    } else {
        // Invalid credentials
        echo "Invalid email, username, or user ID.";
    }

    $stmt->close();
    $conn->close();
}
?>
