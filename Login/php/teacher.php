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

// Variable initialization
$email = $password = $error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailOrUsername = trim($_POST["email"]); // Adjusted to match the input name
    $password = trim($_POST["password"]);

    // Prepare the SQL query to check if the user exists
    $sql = "SELECT user_id, username, email, password FROM teachers WHERE (email = ? OR username = ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $emailOrUsername, $emailOrUsername);
        $stmt->execute();
        $stmt->store_result();

        // Check if a user with the provided email/username exists
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($user_id, $username, $email, $hashed_password);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Store user information in session variables
                $_SESSION["user_id"] = $user_id;
                $_SESSION["username"] = $username;
                $_SESSION["email"] = $email;

                // Redirect to the dashboard or another page
                header("location: ../../teachers/index.php");
                exit();
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "No account found with that email/username.";
        }

        $stmt->close();
    }

    $conn->close();
}
?>
