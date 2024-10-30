<?php
$host = 'localhost'; // Your database host
$dbname = 'scheduler'; // Your database name
$username = 'root'; // Your database username
$password = ''; // Your database password

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['event_id'] ?? null;
$title = $_POST['title'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$link = $_POST['link'];
$description = $_POST['description'];
$background_color = $_POST['background_color'] ?? '#378006'; // Default color green

if ($id) {
    // Update existing event
    $stmt = $pdo->prepare("UPDATE t_events SET title = ?, start_date = ?, end_date = ?, link = ?, description = ?, background_color = ? WHERE id = ?");
    $stmt->execute([$title, $start_date, $end_date, $link, $description, $background_color, $id]);
} else {
    // Insert new event
    $stmt = $pdo->prepare("INSERT INTO t_events (title, start_date, end_date, link, description, background_color) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title, $start_date, $end_date, $link, $description, $background_color]);
}

echo json_encode(['status' => 'success']);

// In php/events.php
echo json_encode($formattedEvents);
exit(); // Temporarily stop the script here

?>
