<?php
function checkApplicationStatus() {
    global $pdo;
    
    $now = date('Y-m-d H:i:s');
    $stmt = $pdo->prepare(
        "SELECT * FROM batches 
         WHERE application_start <= ? 
         AND application_end >= ? 
         AND status = 'open' 
         LIMIT 1"
    );
    $stmt->execute([$now, $now]);
    return $stmt->fetch();
}

// Get active batch
$currentBatch = checkApplicationStatus();

// If there's a form submission and applications are open
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $currentBatch) {
    try {
        // Your existing form validation code here
        
        // Add the batch_id to the insertion
        $sql = "INSERT INTO fellowship_applications (
            batch_id, full_name, email, phone, birth_date, gender,
            education_level, field_of_study, institution_name, graduation_year,
            local_government, ward, current_address, current_occupation,
            organization, previous_volunteer, volunteer_experience,
            leadership_experience, community_service, why_fellowship,
            project_idea, expectations, reference_name, reference_phone,
            reference_relationship, status
        ) VALUES (
            ?, ?, ?, ?, ?, ?, 
            ?, ?, ?, ?, 
            ?, ?, ?, ?, 
            ?, ?, ?,
            ?, ?, ?,
            ?, ?, ?, ?,
            ?, 'pending'
        )";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $currentBatch['id'],  // Add batch_id as first parameter
            $_POST['full_name'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['birth_date'],
            $_POST['gender'],
            $_POST['education_level'],
            $_POST['field_of_study'],
            $_POST['institution_name'],
            $_POST['graduation_year'],
            $_POST['local_government'],
            $_POST['ward'],
            $_POST['current_address'],
            $_POST['current_occupation'],
            $_POST['organization'],
            isset($_POST['previous_volunteer']) ? 1 : 0,
            $_POST['volunteer_experience'] ?? '',
            $_POST['leadership_experience'],
            $_POST['community_service'],
            $_POST['why_fellowship'],
            $_POST['project_idea'],
            $_POST['expectations'],
            $_POST['reference_name'],
            $_POST['reference_phone'],
            $_POST['reference_relationship']
        ]);
        
        // Success message
        $success = true;
        $message = "Your application has been submitted successfully!";
        
    } catch (PDOException $e) {
        // Error handling
        $success = false;
        $message = "An error occurred. Please try again later.";
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = false;
    $message = "Applications are currently closed.";
}
?>
