<?php
session_start();
require_once('../config/database.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: index.php');
    exit();
}

// Handle admin operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO admins (name, email, password) VALUES (?, ?, ?)");
                $stmt->execute([$_POST['name'], $_POST['email'], $password_hash]);
                break;

            case 'update':
                if (!empty($_POST['password'])) {
                    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $stmt = $pdo->prepare("UPDATE admins SET name = ?, email = ?, password = ? WHERE id = ?");
                    $stmt->execute([$_POST['name'], $_POST['email'], $password_hash, $_POST['admin_id']]);
                } else {
                    $stmt = $pdo->prepare("UPDATE admins SET name = ?, email = ? WHERE id = ?");
                    $stmt->execute([$_POST['name'], $_POST['email'], $_POST['admin_id']]);
                }
                break;

            case 'delete':
                if ($_POST['admin_id'] != $_SESSION['admin_id']) {
                    $stmt = $pdo->prepare("DELETE FROM admins WHERE id = ?");
                    $stmt->execute([$_POST['admin_id']]);
                }
                break;
        }
        header('Location: admins.php');
        exit();
    }
}

// Get all admins
$stmt = $pdo->query("SELECT * FROM admins ORDER BY created_at DESC");
$admins = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Management - KYL Admin</title>
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
                        <a href="admins.php" class="nav-link active">
                            <i class="fas fa-users-cog me-2"></i> Admins
                        </a>
                        <a href="settings.php" class="nav-link">
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
                    <h2>Admin Management</h2>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminModal">
                        <i class="fas fa-plus me-2"></i> Add New Admin
                    </button>
                </div>

                <!-- Admins Table -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($admins as $admin): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($admin['name']); ?></td>
                                            <td><?php echo htmlspecialchars($admin['email']); ?></td>
                                            <td><?php echo date('M d, Y', strtotime($admin['created_at'])); ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary edit-admin" data-bs-toggle="modal"
                                                    data-bs-target="#editAdminModal" data-admin='<?php echo json_encode($admin); ?>'>
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <?php if ($admin['id'] != $_SESSION['admin_id']): ?>
                                                    <button class="btn btn-sm btn-danger delete-admin" data-id="<?php echo $admin['id']; ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Admin Modal -->
    <div class="modal fade" id="addAdminModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="create">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Admin Modal -->
    <div class="modal fade" id="editAdminModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="admin_id" id="edit_admin_id">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="edit_name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="edit_email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password (leave blank to keep current)</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Handle Edit Admin
        document.querySelectorAll('.edit-admin').forEach(button => {
            button.addEventListener('click', function() {
                const admin = JSON.parse(this.dataset.admin);
                document.getElementById('edit_admin_id').value = admin.id;
                document.getElementById('edit_name').value = admin.name;
                document.getElementById('edit_email').value = admin.email;
            });
        });

        // Handle Delete Admin
        document.querySelectorAll('.delete-admin').forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('Are you sure you want to delete this admin?')) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.innerHTML = `
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="admin_id" value="${this.dataset.id}">
                    `;
                    document.body.append(form);
                    form.submit();
                }
            });
        });
    </script>
</body>

</html>