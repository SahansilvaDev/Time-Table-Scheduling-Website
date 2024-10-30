<?php
include '../config.php'; // Ensure this file contains the database connection logic

if (isset($_POST['submit'])) {
    $course_name = $_POST['course_name'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];

    $query = "INSERT INTO courses (course_name, description, start_date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $course_name, $description, $start_date);

    if ($stmt->execute()) {
        header("Location: ../create_cource.php"); // Redirect to your PHP file to refresh the course list
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
