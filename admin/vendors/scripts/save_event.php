<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xeduler_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve POST data
$title = $_POST['title'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$description = $_POST['description'];
$label = $_POST['label'];
$link = isset($_POST['link']) ? $_POST['link'] : '';
$location = $_POST['location'];
$all_day = isset($_POST['all_day']) ? $_POST['all_day'] : 0;
$user_id = $_POST['user_id'];
$created_at = $_POST['created_at'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO events (title, start_date, end_date, description, label, link, location, all_day, user_id, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssss", $title, $start_date, $end_date, $description, $label, $link, $location, $all_day, $user_id, $created_at);

// Execute the statement
if ($stmt->execute()) {
    echo "New event created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
