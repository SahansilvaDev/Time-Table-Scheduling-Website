<?php   

include '../../config.php';




if(isset($_POST['submit'])) {
    // Retrieve the form data
    $title = $_POST['sub_name']; // Subject Name
    $subject_id = $_POST['sub_id']; // Subject ID
    $lecture_id = $_POST['lec_id']; // Lecture ID
    $lecture_name = $_POST['lec_name']; // Lecture Name
    $core_student = $_POST['subj_students']; // Core Subject Students
    $elec_student = $_POST['elec_sub_students']; // Elective Subject Students
    $num_online_lec = $_POST['num_online_lec']; // Number of Online Lectures
    $time_to_avoid = $_POST['time_to_avoid']; // Times to Avoid
    $start_date = $_POST['time_duration']; // Assuming time_duration contains start date (adjust as necessary)
    $end_date = $_POST['end_date']; // Additional input for end date
    $link = $_POST['zoom']; // Zoom Link
    $description = $_POST['venue']; // Venue or description

    // Get the current date-time for created_at
    $created_at = date('Y-m-d H:i:s');

    // SQL query to insert data into t_events table, including new columns
    $sql = "INSERT INTO t_events (title, subject_id, lecture_id, lecture_name, core_student, elec_student, num_online_lec, time_to_avoid, start_date, end_date, link, description, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind the form data to the SQL statement
    $stmt->bind_param("sssssssssssss", $title, $subject_id, $lecture_id, $lecture_name, $core_student, $elec_student, $num_online_lec, $time_to_avoid, $start_date, $end_date, $link, $description, $created_at);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Event successfully saved!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
