<?php
session_start();
require_once('../config/database.php');
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use TCPDF;

if (!isset($_SESSION['admin_id'])) {
    header('Location: index.php');
    exit();
}

// Get export parameters
$batch_id = $_POST['batch_id'] ?? '';
$status = $_POST['status'] ?? '';
$format = $_POST['format'] ?? 'csv';

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

// Prepare headers for export
$headers = [
    'Full Name', 'Email', 'Phone', 'Birth Date', 'Gender',
    'Local Government', 'Ward', 'Current Address',
    'Education Level', 'Field of Study', 'Institution',
    'Graduation Year', 'Current Occupation', 'Organization',
    'Previous Volunteer', 'Volunteer Experience',
    'Leadership Experience', 'Community Service',
    'Why Fellowship', 'Project Idea', 'Expectations',
    'Reference Name', 'Reference Phone', 'Reference Relationship',
    'Status', 'Batch', 'Application Date'
];

// Prepare the data rows
$data = [];
foreach ($applications as $row) {
    $data[] = [
        $row['full_name'], $row['email'], $row['phone'], 
        $row['birth_date'], $row['gender'],
        $row['local_government'], $row['ward'], 
        $row['current_address'], $row['education_level'],
        $row['field_of_study'], $row['institution_name'],
        $row['graduation_year'], $row['current_occupation'],
        $row['organization'], $row['previous_volunteer'] ? 'Yes' : 'No',
        $row['volunteer_experience'], $row['leadership_experience'],
        $row['community_service'], $row['why_fellowship'],
        $row['project_idea'], $row['expectations'],
        $row['reference_name'], $row['reference_phone'],
        $row['reference_relationship'], ucfirst($row['status']),
        $row['batch_name'], date('Y-m-d H:i:s', strtotime($row['created_at']))
    ];
}

switch ($format) {
    case 'csv':
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="applications_export.csv"');
        
        $output = fopen('php://output', 'w');
        fputcsv($output, $headers);
        
        foreach ($data as $row) {
            fputcsv($output, $row);
        }
        
        fclose($output);
        break;
        
    case 'excel':
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Add headers
        foreach ($headers as $idx => $header) {
            $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($idx + 1);
            $sheet->setCellValue($col . '1', $header);
        }
        
        // Add data
        $row = 2;
        foreach ($data as $rowData) {
            foreach ($rowData as $idx => $value) {
                $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($idx + 1);
                $sheet->setCellValue($col . $row, $value);
            }
            $row++;
        }
        
        // Auto-size columns
        for ($i = 1; $i <= count($headers); $i++) {
            $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($i);
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="applications_export.xlsx"');
        header('Cache-Control: max-age=0');
        
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        break;
        
    case 'pdf':
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        
        // Set document information
        $pdf->SetCreator('KYL Fellowship System');
        $pdf->SetTitle('Fellowship Applications Export');
        $pdf->SetAuthor('Katagum Youth League');
        
        // Remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        
        // Set margins
        $pdf->SetMargins(10, 10, 10);
        
        // Add a page in landscape orientation
        $pdf->AddPage('L');
        
        // Set font
        $pdf->SetFont('helvetica', '', 10);
        
        // Title
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'Fellowship Applications', 0, 1, 'C');
        $pdf->Ln(5);
        
        // Reset font
        $pdf->SetFont('helvetica', '', 8);
        
        // Calculate column widths (simplified headers for PDF)
        $columns = [
            'Name' => 40,
            'Email' => 50,
            'Phone' => 30,
            'Location' => 40,
            'Education' => 30,
            'Status' => 20,
            'Batch' => 35
        ];
        
        // Header
        $pdf->SetFillColor(230, 230, 230);
        $pdf->SetFont('helvetica', 'B', 8);
        foreach ($columns as $label => $width) {
            $pdf->Cell($width, 7, $label, 1, 0, 'C', true);
        }
        $pdf->Ln();
        
        // Data rows
        $pdf->SetFont('helvetica', '', 8);
        foreach ($data as $row) {
            $pdf->Cell($columns['Name'], 6, $row[0], 1); // Name
            $pdf->Cell($columns['Email'], 6, $row[1], 1); // Email
            $pdf->Cell($columns['Phone'], 6, $row[2], 1); // Phone
            $pdf->Cell($columns['Location'], 6, $row[5] . ', ' . $row[6], 1); // Location
            $pdf->Cell($columns['Education'], 6, $row[8], 1); // Education
            $pdf->Cell($columns['Status'], 6, $row[23], 1); // Status
            $pdf->Cell($columns['Batch'], 6, $row[24], 1); // Batch
            $pdf->Ln();
        }
        
        // Output PDF
        $pdf->Output('applications_export.pdf', 'D');
        break;
}

exit;
