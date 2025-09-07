<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'KYL Admin' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
        }

        .sidebar {
            background: #212529;
            min-height: 100vh;
            color: #fff;
            position: sticky;
            top: 0;
        }

        .sidebar .nav-link {
            color: #adb5bd;
            font-weight: 500;
            border-radius: 0.5rem;
            margin-bottom: 0.5rem;
            transition: background 0.2s;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background: #343a40;
            color: #fff;
        }

        .sidebar .nav-link i {
            width: 1.5rem;
            text-align: center;
        }

        .dashboard-card {
            border-radius: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
            position: relative;
            overflow: hidden;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
        }

        .table-responsive {
            border-radius: 1rem;
            overflow: auto;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        @media (max-width: 991px) {
            .sidebar {
                min-height: auto;
                position: static;
            }
        }

        @media (max-width: 767px) {
            .sidebar {
                padding: 1rem 0.5rem;
            }

            .main-content {
                padding: 1rem 0.5rem;
            }

            .dashboard-card,
            .card {
                margin-bottom: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Sidebar -->
            <nav class="col-auto col-md-3 col-lg-2 px-0 sidebar d-flex flex-column align-items-center">
                <div class="text-center py-4 w-100">
                    <img src="../img/logo.png" alt="KYL Logo" style="max-width: 120px;">
                </div>
                <div class="nav flex-column w-100">
                    <a href="dashboard.php" class="nav-link<?= $activePage === 'dashboard' ? ' active' : '' ?>">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="applications.php" class="nav-link<?= $activePage === 'applications' ? ' active' : '' ?>">
                        <i class="fas fa-file-alt"></i> Applications
                    </a>
                    <a href="batches.php" class="nav-link<?= $activePage === 'batches' ? ' active' : '' ?>">
                        <i class="fas fa-layer-group"></i> Batches
                    </a>
                    <a href="events.php" class="nav-link<?= $activePage === 'events' ? ' active' : '' ?>">
                        <i class="fas fa-calendar"></i> Events
                    </a>
                    <a href="admins.php" class="nav-link<?= $activePage === 'admins' ? ' active' : '' ?>">
                        <i class="fas fa-users-cog"></i> Admins
                    </a>
                    <a href="logout.php" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </nav>
            <!-- Main Content -->
            <main class="col main-content px-4 py-4">
                <?php if (!empty($pageHeader)): ?>
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                        <h2 class="mb-0"><?= $pageHeader ?></h2>
                        <?php if (!empty($pageActions)) echo $pageActions; ?>
                    </div>
                <?php endif; ?>
                <?= $mainContent ?>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>