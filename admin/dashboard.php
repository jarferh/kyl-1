<?php
session_start();
require_once('../config/database.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: index.php');
    exit();
}

// Fetch statistics
$stmt = $pdo->query("SELECT COUNT(*) FROM fellowship_applications");
$applicationsCount = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT COUNT(*) FROM events WHERE event_date > CURRENT_DATE");
$upcomingEventsCount = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT COUNT(*) FROM admins");
$adminsCount = $stmt->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KYL Admin Dashboard</title>
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
                <div class="nav flex-column">
                    <a href="dashboard.php" class="nav-link active">
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
                    <a href="logout.php" class="nav-link">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 px-4 py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Dashboard</h2>
                    <div>
                        Welcome, <?php echo htmlspecialchars($_SESSION['admin_name']); ?>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="dashboard-card bg-primary text-white p-4">
                            <h3><?php echo $applicationsCount; ?></h3>
                            <p class="mb-0">New Applications</p>
                            <i class="fas fa-file-alt position-absolute top-50 end-0 translate-middle-y me-4" style="font-size: 2rem; opacity: 0.3;"></i>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="dashboard-card bg-success text-white p-4">
                            <h3><?php echo $upcomingEventsCount; ?></h3>
                            <p class="mb-0">Upcoming Events</p>
                            <i class="fas fa-calendar position-absolute top-50 end-0 translate-middle-y me-4" style="font-size: 2rem; opacity: 0.3;"></i>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="dashboard-card bg-info text-white p-4">
                            <h3><?php echo $adminsCount; ?></h3>
                            <p class="mb-0">Total Admins</p>
                            <i class="fas fa-users-cog position-absolute top-50 end-0 translate-middle-y me-4" style="font-size: 2rem; opacity: 0.3;"></i>
                        </div>
                    </div>
                </div>

                <!-- Recent Applications -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Recent Applications</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Interest</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stmt = $pdo->query("SELECT * FROM fellowship_applications ORDER BY created_at DESC LIMIT 5");
                                    while ($row = $stmt->fetch()): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                                            <td><?php echo htmlspecialchars($row['interest']); ?></td>
                                            <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                                            <td>
                                                <a href="view_application.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>