<?php  

include '../config.php';



if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email already exists
    $checkEmail = $conn->prepare("SELECT * FROM teachers WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $result = $checkEmail->get_result();

    if ($result->num_rows > 0) {
        echo "Email already exists.";
    } else {
        // Generate unique user ID
        $prefix = "T_UG";
        do {
            $unique_id = $prefix . rand(1000, 9999);
            $checkUserId = $conn->prepare("SELECT * FROM teachers WHERE user_id = ?");
            $checkUserId->bind_param("s", $unique_id);
            $checkUserId->execute();
            $result = $checkUserId->get_result();
        } while ($result->num_rows > 0);

        // Encrypt the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO teachers (user_id, username, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $unique_id, $username, $email, $hashed_password);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header("Location:../create_teacher.php");
        } else {
            echo "Error: Could not register teacher.";
        }

        $stmt->close();
    }

    $conn->close();
}
?>