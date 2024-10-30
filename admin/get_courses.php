<?php
include '../config.php'; // Include your database connection file

if (isset($_GET['faculty_id'])) {
    $faculty_id = mysqli_real_escape_string($conn, $_GET['faculty_id']);

    $query = "SELECT * FROM courses WHERE faculty_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $faculty_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $courses = [];
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }

    echo json_encode($courses);
}
?>
