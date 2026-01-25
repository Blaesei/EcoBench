<?php
session_start();
// Protect the page - redirect to signin if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: signin.php');
    exit();
}

// Database connection
$host = 'localhost';
$dbname = 'ecobench';
$username = 'root';
$password = '@April192005';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle Delete User
if (isset($_GET['delete'])) {
    $userId = $_GET['delete'];
    try {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $_SESSION['success_message'] = "User deleted successfully!";
        header('Location: users.php');
        exit();
    } catch(PDOException $e) {
        $_SESSION['error_message'] = "Error deleting user: " . $e->getMessage();
    }
}

// Handle Edit User
if (isset($_POST['edit_user'])) {
    $userId = $_POST['user_id'];
    $newUsername = trim($_POST['username']);
    $newEmail = trim($_POST['email']);
    
    try {
        $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
        $stmt->execute([$newUsername, $newEmail, $userId]);
        $_SESSION['success_message'] = "User updated successfully!";
        header('Location: users.php');
        exit();
    } catch(PDOException $e) {
        $_SESSION['error_message'] = "Error updating user: " . $e->getMessage();
    }
}

// Handle Change Password
if (isset($_POST['change_password'])) {
    $userId = $_POST['user_id'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];
    
    if ($newPassword === $confirmPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        try {
            $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
            $stmt->execute([$hashedPassword, $userId]);
            $_SESSION['success_message'] = "Password changed successfully!";
            header('Location: users.php');
            exit();
        } catch(PDOException $e) {
            $_SESSION['error_message'] = "Error changing password: " . $e->getMessage();
        }
    } else {
        $_SESSION['error_message'] = "Passwords do not match!";
    }
}

// Fetch all users
try {
    $stmt = $pdo->query("SELECT id, username, email, created_at FROM users ORDER BY id DESC");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $users = [];
    $_SESSION['error_message'] = "Error fetching users: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoBench - User Management</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="users.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#22c55e',
                        secondary: '#fbbf24',
                    }
                }
            }
        }
    </script>
</head>

<body class="text-gray-800">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="sidebar w-64 fixed h-full left-0 top-0 z-50 hidden lg:block">
            <div class="p-6 flex flex-col h-full">
                <!-- Logo Section -->
                <div class="logo-container mb-8">
                    <div class="logo-wrapper">
                        <img src="img/EcoBench Logo.png" alt="EcoBench Logo" class="ecobench-logo">
                        <div class="logo-glow"></div>
                        <div class="logo-particles">
                            <span class="particle"></span>
                            <span class="particle"></span>
                            <span class="particle"></span>
                            <span class="particle"></span>
                        </div>
                    </div>
                    <p class="logo-tagline">Sustainable Energy Solutions</p>
                </div>

                <nav class="space-y-2 flex-1">
                    <a href="dashboard.php" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                        <i class="fas fa-chart-line w-5"></i>
                        <span>Dashboard</span>
                    </a>                    
                    <a href="users.php" class="nav-item active flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                        <i class="fas fa-users-cog w-5"></i>
                        <span>User Management</span>
                    </a>
                </nav>

                <div class="mt-auto pt-6 border-t border-white/20">
                    <a href="logout.php" class="nav-item logout flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span>Logout</span>
                        <i class="fas fa-arrow-right ml-auto logout-arrow"></i>
                    </a>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 lg:ml-64 p-6 md:p-8">

            <!-- HEADER -->
            <div class="mb-8 header-section">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h1 class="text-4xl font-bold gradient-text mb-2">User Management</h1>
                        <p class="text-gray-600 text-sm font-medium">Manage system users and permissions</p>
                    </div>
                    <div class="user-count-badge">
                        <i class="fas fa-users"></i>
                        <span><?php echo count($users); ?> Users</span>
                    </div>
                </div>
            </div>

            <!-- SUCCESS/ERROR MESSAGES -->
            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span><?php echo $_SESSION['success_message']; ?></span>
                    <button onclick="this.parentElement.remove()" class="alert-close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span><?php echo $_SESSION['error_message']; ?></span>
                    <button onclick="this.parentElement.remove()" class="alert-close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>

            <!-- USERS TABLE -->
            <div class="table-container">
                <div class="table-header">
                    <h2 class="table-title">
                        <i class="fas fa-table"></i>
                        Registered Users
                    </h2>
                </div>

                <div class="table-responsive">
                    <table class="users-table">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($users)): ?>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <div class="empty-state">
                                            <i class="fas fa-users-slash"></i>
                                            <p>No users found</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td>
                                            <span class="user-id-badge">#<?php echo htmlspecialchars($user['id']); ?></span>
                                        </td>
                                        <td>
                                            <div class="user-info">
                                                <i class="fas fa-user-circle"></i>
                                                <span><?php echo htmlspecialchars($user['username']); ?></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="email-info">
                                                <i class="fas fa-envelope"></i>
                                                <span><?php echo htmlspecialchars($user['email']); ?></span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="date-badge">
                                                <i class="fas fa-calendar-alt"></i>
                                                <?php echo date('M d, Y', strtotime($user['created_at'])); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <button onclick="openEditModal(<?php echo $user['id']; ?>, '<?php echo htmlspecialchars($user['username'], ENT_QUOTES); ?>', '<?php echo htmlspecialchars($user['email'], ENT_QUOTES); ?>')" 
                                                        class="btn-edit" title="Edit User">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button onclick="openPasswordModal(<?php echo $user['id']; ?>, '<?php echo htmlspecialchars($user['username'], ENT_QUOTES); ?>')" 
                                                        class="btn-password" title="Change Password">
                                                    <i class="fas fa-key"></i>
                                                </button>
                                                <button onclick="confirmDelete(<?php echo $user['id']; ?>, '<?php echo htmlspecialchars($user['username'], ENT_QUOTES); ?>')" 
                                                        class="btn-delete" title="Delete User">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>

    </div>

    <!-- EDIT USER MODAL -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-edit"></i> Edit User</h3>
                <button onclick="closeEditModal()" class="modal-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form method="POST" action="users.php">
                <input type="hidden" name="user_id" id="edit_user_id">
                <div class="form-group">
                    <label for="edit_username">
                        <i class="fas fa-user"></i> Username
                    </label>
                    <input type="text" name="username" id="edit_username" required>
                </div>
                <div class="form-group">
                    <label for="edit_email">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <input type="email" name="email" id="edit_email" required>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="closeEditModal()" class="btn-cancel">Cancel</button>
                    <button type="submit" name="edit_user" class="btn-save">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- CHANGE PASSWORD MODAL -->
    <div id="passwordModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-key"></i> Change Password</h3>
                <button onclick="closePasswordModal()" class="modal-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form method="POST" action="users.php">
                <input type="hidden" name="user_id" id="password_user_id">
                <div class="form-group">
                    <label>
                        <i class="fas fa-user"></i> Username
                    </label>
                    <input type="text" id="password_username" disabled>
                </div>
                <div class="form-group">
                    <label for="new_password">
                        <i class="fas fa-lock"></i> New Password
                    </label>
                    <input type="password" name="new_password" id="new_password" required minlength="6">
                </div>
                <div class="form-group">
                    <label for="confirm_password">
                        <i class="fas fa-lock"></i> Confirm Password
                    </label>
                    <input type="password" name="confirm_password" id="confirm_password" required minlength="6">
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="closePasswordModal()" class="btn-cancel">Cancel</button>
                    <button type="submit" name="change_password" class="btn-save">
                        <i class="fas fa-key"></i> Change Password
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- DELETE CONFIRMATION MODAL -->
    <div id="deleteModal" class="modal">
        <div class="modal-content modal-danger">
            <div class="modal-header">
                <h3><i class="fas fa-exclamation-triangle"></i> Confirm Delete</h3>
                <button onclick="closeDeleteModal()" class="modal-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete user <strong id="delete_username"></strong>?</p>
                <p class="text-warning">This action cannot be undone!</p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="closeDeleteModal()" class="btn-cancel">Cancel</button>
                <a id="confirmDeleteBtn" href="#" class="btn-delete-confirm">
                    <i class="fas fa-trash"></i> Delete User
                </a>
            </div>
        </div>
    </div>

    <script src="users.js"></script>

</body>

</html>