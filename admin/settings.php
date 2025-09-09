<?php
session_start();
require_once('../config/database.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: index.php');
    exit();
}

$settingsFile = __DIR__ . '/../config/admin_settings.json';
// Default settings
$defaults = [
    'site_name' => 'KYL',
    'contact_email' => '',
    'items_per_page' => 10
];

// Load existing settings or create defaults
if (file_exists($settingsFile)) {
    $json = file_get_contents($settingsFile);
    $settings = json_decode($json, true) ?: $defaults;
} else {
    $settings = $defaults;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $site_name = trim($_POST['site_name'] ?? '');
    $contact_email = trim($_POST['contact_email'] ?? '');
    $items_per_page = (int)($_POST['items_per_page'] ?? 10);

    // Basic validation
    if ($site_name === '') {
        $message = 'Site name is required.';
    } elseif ($contact_email !== '' && !filter_var($contact_email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Contact email is invalid.';
    } else {
        $settings = [
            'site_name' => $site_name,
            'contact_email' => $contact_email,
            'items_per_page' => $items_per_page > 0 ? $items_per_page : 10
        ];
        // Save to file
        if (!is_dir(dirname($settingsFile))) {
            mkdir(dirname($settingsFile), 0755, true);
        }
        file_put_contents($settingsFile, json_encode($settings, JSON_PRETTY_PRINT));
        $message = 'Settings saved successfully.';
    }
}

// Simple page using the admin layout style
// Render page using same layout/colors as dashboard.php so settings matches
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - KYL Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0 sidebar">
                <div class="text-center py-4">
                    <img src="../img/logo.png" alt="KYL Logo" style="max-width: 120px;">
                </div>
                <div class="d-flex flex-column flex-grow-1">
                    <div class="nav flex-column">
                        <a href="dashboard.php" class="nav-link">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                        <a href="applications.php" class="nav-link">
                            <i class="fas fa-file-alt me-2"></i> Applications
                        </a>
                        <a href="events.php" class="nav-link">
                            <i class="fas fa-calendar me-2"></i> Events
                        </a>
                        <a href="admins.php" class="nav-link">
                            <i class="fas fa-users-cog me-2"></i> Admins
                        </a>
                        <a href="settings.php" class="nav-link active">
                            <i class="fas fa-cog me-2"></i> Settings
                        </a>
                    </div>

                    <div class="mt-auto">
                        <a href="logout.php" class="nav-link">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 px-4 py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Settings</h2>
                    <div>
                        Welcome, <?php echo htmlspecialchars($_SESSION['admin_name']); ?>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <?php if ($message): ?>
                            <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
                        <?php endif; ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Site Name</label>
                                <input type="text" name="site_name" class="form-control" required value="<?= htmlspecialchars($settings['site_name'] ?? '') ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contact Email</label>
                                <input type="email" name="contact_email" class="form-control" value="<?= htmlspecialchars($settings['contact_email'] ?? '') ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Items Per Page</label>
                                <input type="number" name="items_per_page" class="form-control" min="1" value="<?= htmlspecialchars($settings['items_per_page'] ?? 10) ?>">
                            </div>
                            <button class="btn btn-primary">Save Settings</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>