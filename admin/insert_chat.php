<?php
// Database connection (adjust based on your setup)
include './config.php';
// Get data from the AJAX request
?>

<?php


// Get data from the AJAX request
$name = $_POST['name'];
$a_id = $_POST['a_id'];
$description = $_POST['description'];
$title = $_POST['title'];
$date = date('Y-m-d H:i:s');  // Current timestamp

// Insert message into the database
$sql = "INSERT INTO a_chat (a_id, name, title, description, date) 
        VALUES ('$a_id', '$name', '$title', '$description', '$date')";

if ($conn->query($sql) === TRUE) {
    // Simulate a bot reply or perform actual bot logic
    echo "Thanks for your message!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
