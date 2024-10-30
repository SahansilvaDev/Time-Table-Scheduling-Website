<?php
include '../config.php'; // Ensure this file contains the database connection logic

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Prepare the SQL query
    $query = "UPDATE students SET username=?, email=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $username, $email, $id);

    // Execute the query
    if ($stmt->execute()) {
        header("Location: ../create_student.php"); // Redirect to your PHP file to refresh the student list
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
