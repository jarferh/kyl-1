<?php
require_once 'config/database.php';

header('Content-Type: application/json');

try {
    // Get active timer
    $sql = "SELECT * FROM timers WHERE status = 'active' ORDER BY created_at DESC LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    $timer = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($timer) {
        echo json_encode([
            'success' => true,
            'data' => [
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
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Database error'
    ]);
}
?>
