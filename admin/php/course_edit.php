<?php
include '../config.php'; // Ensure this file contains the database connection logic

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $course_name = $_POST['course_name'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];

    $query = "UPDATE courses SET course_name=?, description=?, start_date=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $course_name, $description, $start_date, $id);

    if ($stmt->execute()) {
        header("Location: ../create_cource.php"); // Redirect to your PHP file to refresh the course list
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
