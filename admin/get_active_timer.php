<?php
header('Content-Type: application/json');
require_once('../config/database.php');

$stmt = $pdo->query("SELECT * FROM timers WHERE status = 'active' ORDER BY created_at DESC LIMIT 1");
$timer = $stmt->fetch(PDO::FETCH_ASSOC);

if ($timer) {
    echo json_encode([
        'success' => true,
        'data' => [
            'id' => $timer['id'],
            'title' => $timer['title'],
            'event_datetime' => $timer['event_datetime']
        ]
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'No active timer found'
    ]);
}
?>
