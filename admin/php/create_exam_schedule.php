<?php
include '../config.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $faculty_id = mysqli_real_escape_string($conn, $_POST['faculty_id']);
    $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
    $exam_date = mysqli_real_escape_string($conn, $_POST['exam_date']);
    $exam_time = mysqli_real_escape_string($conn, $_POST['exam_time']);

    // Prepare and execute the SQL statement
    $query = "INSERT INTO exam_schedule (faculty_id, course_id, exam_date, exam_time) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiss", $faculty_id, $course_id, $exam_date, $exam_time);

    if ($stmt->execute()) {
        echo "Exam schedule created successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
