<?php
$host = 'localhost'; // Your database host
$dbname = 'scheduler'; // Your database name
$username = 'root'; // Your database username
$password = ''; // Your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT id, title, start_date, end_date, link, description, background_color FROM t_events");
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $formattedEvents = [];
    foreach ($events as $event) {
        $formattedEvents[] = [
            'id' => $event['id'],
            'title' => $event['title'],
            'start' => $event['start_date'],
            'end' => $event['end_date'],
            'backgroundColor' => $event['background_color'],
            'description' => $event['description'],
            'link' => $event['link']
        ];
    }

    echo json_encode($formattedEvents);

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
