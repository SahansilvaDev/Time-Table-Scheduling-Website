<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your database password
$dbname = "scheduler"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to generate a unique admin ID
function generateAdminID($conn) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $digits = mt_rand(10000, 99999); // Generate a 5-digit number
    $randomChar = $characters[rand(0, strlen($characters) - 1)]; // Pick a random character

    $adminID = $randomChar . $digits;

    // Check if the generated ID is unique
    $stmt = $conn->prepare("SELECT COUNT(*) FROM admins WHERE admin_id = ?");
    $stmt->bind_param("s", $adminID);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    // If not unique, recursively generate a new one
    if ($count > 0) {
        return generateAdminID($conn);
    }

    return $adminID;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

    // Generate a unique admin ID
    $adminID = generateAdminID($conn);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO admins (admin_id, username, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $adminID, $username, $email, $password);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: ../../Login/Admin.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
