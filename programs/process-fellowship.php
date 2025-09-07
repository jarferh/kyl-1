<?php
session_start();
require_once('../config/database.php');

// Enable PDO exceptions for debugging
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Helper: sanitize input
function clean($str) {
    return htmlspecialchars(trim($str), ENT_QUOTES, 'UTF-8');
}

// Check for active batch
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Debug: Print received POST data (remove in production)
    error_log("POST data received: " . print_r($_POST, true));
    error_log("FILES data received: " . print_r($_FILES, true));

    // Validate required fields
    $required = [
        'full_name', 'birth_date', 'gender', 'state', 'local_government', 'ward',
        'phone', 'email', 'residential_address', 'education_level', 'institution_name',
        'course_of_study', 'volunteer_experience', 'skills_competencies', 'leadership_roles',
        'why_fellowship', 'challenge_description', 'fellowship_goals', 'skills_application', 'can_accommodate'
    ];
    
    $missing_fields = [];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            $missing_fields[] = $field;
        }
    }
    
    if (!empty($missing_fields)) {
        die("<h2 style='color:red'>Missing required fields: " . implode(', ', $missing_fields) . "</h2>");
    }

    // Validate files
    if (!isset($_FILES['video']) || $_FILES['video']['error'] !== UPLOAD_ERR_OK) {
        die("<h2 style='color:red'>Video file is required. Error: " . 
            (isset($_FILES['video']) ? $_FILES['video']['error'] : 'File not uploaded') . "</h2>");
    }
    
    if (!isset($_FILES['passport_photo']) || $_FILES['passport_photo']['error'] !== UPLOAD_ERR_OK) {
        die("<h2 style='color:red'>Passport photo is required. Error: " . 
            (isset($_FILES['passport_photo']) ? $_FILES['passport_photo']['error'] : 'File not uploaded') . "</h2>");
    }

    // Video: max 10MB, must be video/*
    if ($_FILES['video']['size'] > 10 * 1024 * 1024) {
        die("<h2 style='color:red'>Video file too large. Maximum 10MB allowed.</h2>");
    }
    
    if (strpos($_FILES['video']['type'], 'video/') !== 0) {
        die("<h2 style='color:red'>Invalid video file type: " . $_FILES['video']['type'] . "</h2>");
    }

    // Photo: max 1MB, must be image/*
    if ($_FILES['passport_photo']['size'] > 1 * 1024 * 1024) {
        die("<h2 style='color:red'>Photo file too large. Maximum 1MB allowed.</h2>");
    }
    
    if (strpos($_FILES['passport_photo']['type'], 'image/') !== 0) {
        die("<h2 style='color:red'>Invalid image file type: " . $_FILES['passport_photo']['type'] . "</h2>");
    }

    // Create uploads directory if it doesn't exist
    $uploadsDir = __DIR__ . '/../uploads/';
    if (!is_dir($uploadsDir)) {
        if (!mkdir($uploadsDir, 0755, true)) {
            die("<h2 style='color:red'>Failed to create uploads directory.</h2>");
        }
    }

    // Generate unique filenames
    $videoExtension = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
    $photoExtension = pathinfo($_FILES['passport_photo']['name'], PATHINFO_EXTENSION);
    
    $videoFilename = uniqid('video_') . '.' . $videoExtension;
    $photoFilename = uniqid('photo_') . '.' . $photoExtension;
    
    $videoPath = $uploadsDir . $videoFilename;
    $photoPath = $uploadsDir . $photoFilename;

    // Move uploaded files
    if (!move_uploaded_file($_FILES['video']['tmp_name'], $videoPath)) {
        die("<h2 style='color:red'>Failed to save video file. Check directory permissions.</h2>");
    }
    
    if (!move_uploaded_file($_FILES['passport_photo']['tmp_name'], $photoPath)) {
        // Clean up video file if photo upload fails
        unlink($videoPath);
        die("<h2 style='color:red'>Failed to save passport photo. Check directory permissions.</h2>");
    }

    // Check if email already exists
    try {
        $checkEmail = $pdo->prepare("SELECT id FROM fellowship_applications WHERE email = ?");
        $checkEmail->execute([clean($_POST['email'])]);
        if ($checkEmail->fetch()) {
            // Clean up uploaded files
            unlink($videoPath);
            unlink($photoPath);
            die("<h2 style='color:red'>An application with this email address already exists.</h2>");
        }
    } catch (PDOException $e) {
        error_log("Email check error: " . $e->getMessage());
    }

    // Prepare insert statement
    try {
        $sql = "INSERT INTO fellowship_applications (
            batch_id, -- added batch_id
            full_name, birth_date, gender, state, local_government, ward,
            phone, email, residential_address, education_level, institution_name,
            course_of_study, graduation_year, current_occupation, employer_name, work_experience,
            volunteer_experience, skills_competencies, leadership_roles,
            why_fellowship, challenge_description, fellowship_goals, skills_application, can_accommodate,
            video_path, passport_photo_path, created_at
        ) VALUES (
            :batch_id,
            :full_name, :birth_date, :gender, :state, :local_government, :ward,
            :phone, :email, :residential_address, :education_level, :institution_name,
            :course_of_study, :graduation_year, :current_occupation, :employer_name, :work_experience,
            :volunteer_experience, :skills_competencies, :leadership_roles,
            :why_fellowship, :challenge_description, :fellowship_goals, :skills_application, :can_accommodate,
            :video_path, :passport_photo_path, NOW()
        )";
        
        $stmt = $pdo->prepare($sql);

        $params = [
            ':batch_id' => $currentBatch['id'], // set batch_id from current batch
            ':full_name' => clean($_POST['full_name']),
            ':birth_date' => $_POST['birth_date'],
            ':gender' => clean($_POST['gender']),
            ':state' => clean($_POST['state']),
            ':local_government' => clean($_POST['local_government']),
            ':ward' => clean($_POST['ward']),
            ':phone' => clean($_POST['phone']),
            ':email' => clean($_POST['email']),
            ':residential_address' => clean($_POST['residential_address']),
            ':education_level' => clean($_POST['education_level']),
            ':institution_name' => clean($_POST['institution_name']),
            ':course_of_study' => clean($_POST['course_of_study']),
            ':graduation_year' => !empty($_POST['graduation_year']) ? intval($_POST['graduation_year']) : null,
            ':current_occupation' => !empty($_POST['current_occupation']) ? clean($_POST['current_occupation']) : null,
            ':employer_name' => !empty($_POST['employer_name']) ? clean($_POST['employer_name']) : null,
            ':work_experience' => !empty($_POST['work_experience']) ? clean($_POST['work_experience']) : null,
            ':volunteer_experience' => clean($_POST['volunteer_experience']),
            ':skills_competencies' => clean($_POST['skills_competencies']),
            ':leadership_roles' => clean($_POST['leadership_roles']),
            ':why_fellowship' => clean($_POST['why_fellowship']),
            ':challenge_description' => clean($_POST['challenge_description']),
            ':fellowship_goals' => clean($_POST['fellowship_goals']),
            ':skills_application' => clean($_POST['skills_application']),
            ':can_accommodate' => clean($_POST['can_accommodate']),
            ':video_path' => $videoFilename,
            ':passport_photo_path' => $photoFilename
        ];

        // Debug: Log the parameters (remove in production)
        error_log("SQL Parameters: " . print_r($params, true));

        $result = $stmt->execute($params);
        
        if ($result && $stmt->rowCount() > 0) {
            $applicationId = $pdo->lastInsertId();
            // Redirect to prevent resubmission
            header('Location: apply-fellowship.php?success=1');
            exit();
        } else {
            // Clean up uploaded files
            unlink($videoPath);
            unlink($photoPath);
            
            error_log("Insert failed - no rows affected");
            die("<h2 style='color:red'>Failed to insert application. No rows were affected.</h2>");
        }
        
    } catch (PDOException $e) {
        // Clean up uploaded files on database error
        if (file_exists($videoPath)) unlink($videoPath);
        if (file_exists($photoPath)) unlink($photoPath);
        
        error_log("Database error: " . $e->getMessage());
        die("<h2 style='color:red'>Database error: " . htmlspecialchars($e->getMessage()) . "</h2>");
    }
} else {
    // Not a POST request
    header('Location: apply-fellowship.php');
    exit();
}
?>