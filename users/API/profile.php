<?php
 
 include '../config.php';

if (isset($_POST['submit'])) {
    // Retrieve form data
    $fname = $_POST['fname'];
    $user_id = $_POST['user_id'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);  // Encrypting password
    $address = $_POST['address'];
    $city = $_POST['city'];
    $address_2 = $_POST['address_2'];
    $city2 = $_POST['city2'];
    $district = $_POST['district'];
    $province = $_POST['province'];
    $zip = $_POST['zip'];

    // Handle file upload
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $target_dir = "uploads/";  // Directory to save the file
        $file_name = basename($_FILES['file']['name']);
        $target_file = $target_dir . $file_name;
        
        // Check if the file is an actual image
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES['file']['tmp_name']);
        if ($check !== false) {
            // Save file to the server
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                echo "The file " . htmlspecialchars($file_name) . " has been uploaded.";
            } else {
                echo "Error uploading your file.";
            }
        } else {
            echo "File is not an image.";
        }
    }

    // SQL query to insert the data
    $sql = "INSERT INTO profile (user_id,first_name, last_name, email, password, address, city, address_2, city2, district, province, zip, image_path)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssss",$user_id, $fname, $lname, $email, $password, $address, $city, $address_2, $city2, $district, $province, $zip, $target_file);

    // Execute the query
    if ($stmt->execute()) {
        header("Location:../index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
