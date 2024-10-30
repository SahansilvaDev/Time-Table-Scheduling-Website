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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT admin_id, username, password FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if email exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($admin_id, $username, $hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Set session variables
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;

            // Redirect to admin dashboard
            header("Location: ../../admin/dashbord.php");
            exit;
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "No account found with that email!";
    }

    // Close the statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
