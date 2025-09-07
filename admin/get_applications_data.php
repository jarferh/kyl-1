<?php
header('Content-Type: application/json');
session_start();
require_once('../config/database.php');

if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit();
}

// Get filter parameters
$batch_id = $_GET['batch_id'] ?? '';
$status = $_GET['status'] ?? '';

// Build query
$query = "SELECT 
    fa.full_name, fa.email, fa.phone, fa.birth_date, fa.gender,
    fa.local_government, fa.ward, fa.current_address,
    fa.education_level, fa.field_of_study, fa.institution_name,
    fa.graduation_year, fa.current_occupation, fa.organization,
    fa.previous_volunteer, fa.volunteer_experience,
    fa.leadership_experience, fa.community_service,
    fa.why_fellowship, fa.project_idea, fa.expectations,
    fa.reference_name, fa.reference_phone, fa.reference_relationship,
    fa.status, b.name as batch_name,
    fa.created_at
FROM fellowship_applications fa
LEFT JOIN batches b ON fa.batch_id = b.id
WHERE 1=1";

$params = [];

if (!empty($batch_id)) {
    $query .= " AND fa.batch_id = ?";
    $params[] = $batch_id;
}

if (!empty($status)) {
    $query .= " AND fa.status = ?";
    $params[] = $status;
}

$query .= " ORDER BY fa.created_at DESC";

$stmt = $pdo->prepare($query);
$stmt->execute($params);
$applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($applications);
?>
