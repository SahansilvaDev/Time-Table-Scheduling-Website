<?php
include '../config.php'; // Include your database connection file

if (isset($_POST['submit'])) {
    // Sanitize input
    $faculty_name = mysqli_real_escape_string($conn, $_POST['faculty_name']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $joined_date = mysqli_real_escape_string($conn, $_POST['joined_date']); // Keep the date as is

    // Prepare the SQL statement to prevent SQL injection
    $query = "INSERT INTO faculty (faculty_name, department, joined_date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $faculty_name, $department, $joined_date);

    // Execute the query and check for success
    if ($stmt->execute()) {
        header("Location:../create_faculty.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
