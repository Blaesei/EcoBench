<?php
require('db.php');
session_start();

// Protect the page
if (!isset($_SESSION['username'])) {
    header('Location: signin.php');
    exit();
}

// Only admin can access this page
if (strtolower($_SESSION['username']) !== 'admin') {
    header('Location: index.php');
    exit();
}

// Handle Add New User
if (isset($_POST['add_user'])) {
    $newUsername = trim($_POST['username'] ?? '');
    $newEmail = trim($_POST['email'] ?? '');
    $newPassword = trim($_POST['password'] ?? '');
    $confirmPassword = trim($_POST['confirm_password'] ?? '');

    $errors = [];

    if (empty($newUsername)) {
        $errors[] = "Username is required.";
    }
    if (strtolower($newUsername) === 'admin') {
        $errors[] = "Cannot create another admin account.";
    }
    if (empty($newEmail) || !filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }
    if (empty($newPassword)) {
        $errors[] = "Password is required.";
    }
    if ($newPassword !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        // Check duplicate username
        $check_stmt = $con->prepare("SELECT id FROM users WHERE username = ?");
        $check_stmt->bind_param("s", $newUsername);
        $check_stmt->execute();
        if ($check_stmt->get_result()->num_rows > 0) {
            $errors[] = "Username already taken.";
        }
        $check_stmt->close();
    }

    if (empty($errors)) {
        $hashedPassword = md5($newPassword);
        $trn_date = date("Y-m-d H:i:s");

        $insert_stmt = $con->prepare("INSERT INTO users (username, email, password, trn_date) VALUES (?, ?, ?, ?)");
        $insert_stmt->bind_param("ssss", $newUsername, $newEmail, $hashedPassword, $trn_date);

        if ($insert_stmt->execute()) {
            $_SESSION['success_message'] = "New user added successfully!";
        } else {
            $_SESSION['error_message'] = "Failed to add user.";
        }
        $insert_stmt->close();
    } else {
        $_SESSION['error_message'] = implode("<br>", $errors);
    }
    header('Location: users.php');
    exit();
}

// Handle Edit User
if (isset($_POST['edit_user'])) {
    $userId = (int)$_POST['user_id'];
    $editUsername = trim($_POST['edit_username'] ?? '');
    $editEmail = trim($_POST['edit_email'] ?? '');
    $editPassword = trim($_POST['edit_password'] ?? '');
    $confirmPassword = trim($_POST['edit_confirm_password'] ?? '');

    $errors = [];

    if (empty($editUsername)) {
        $errors[] = "Username is required.";
    }
    if (empty($editEmail) || !filter_var($editEmail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }
    
    // Password is optional for edit, but if provided, must match confirmation
    if (!empty($editPassword) && $editPassword !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        // Check duplicate username (excluding current user)
        $check_stmt = $con->prepare("SELECT id FROM users WHERE username = ? AND id != ?");
        $check_stmt->bind_param("si", $editUsername, $userId);
        $check_stmt->execute();
        if ($check_stmt->get_result()->num_rows > 0) {
            $errors[] = "Username already taken.";
        }
        $check_stmt->close();
    }

    if (empty($errors)) {
        if (!empty($editPassword)) {
            // Update with new password
            $hashedPassword = md5($editPassword);
            $update_stmt = $con->prepare("UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?");
            $update_stmt->bind_param("sssi", $editUsername, $editEmail, $hashedPassword, $userId);
        } else {
            // Update without changing password
            $update_stmt = $con->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
            $update_stmt->bind_param("ssi", $editUsername, $editEmail, $userId);
        }

        if ($update_stmt->execute()) {
            $_SESSION['success_message'] = "User updated successfully!";
        } else {
            $_SESSION['error_message'] = "Failed to update user.";
        }
        $update_stmt->close();
    } else {
        $_SESSION['error_message'] = implode("<br>", $errors);
    }
    header('Location: users.php');
    exit();
}

// Handle Delete
if (isset($_GET['delete'])) {
    $userId = (int)$_GET['delete'];

    if ($userId == 1) {
        $_SESSION['error_message'] = "Cannot delete the admin account!";
    } else {
        $delete_query = "DELETE FROM users WHERE id = $userId";
        if (mysqli_query($con, $delete_query)) {
            $_SESSION['success_message'] = "User deleted successfully!";
        } else {
            $_SESSION['error_message'] = "Error deleting user.";
        }
    }
    header('Location: users.php');
    exit();
}

// Fetch all users
$sel_query = "SELECT id, username, email, trn_date FROM users ORDER BY id DESC";
$result = mysqli_query($con, $sel_query) or die(mysqli_error($con));
$user_count = mysqli_num_rows($result);
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

    <style>
        /* Modal Styles - Simplified (no logo/badge) */
        .modal-overlay {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        .modal-content {
            background: white;
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            width: 460px;
            max-width: 95%;
            text-align: center;
            position: relative;
        }
        .modal-close {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 24px;
            color: #999;
            cursor: pointer;
        }
        .modal-close:hover {
            color: #333;
        }
    </style>

    <script>
        function openEditModal(userId, username, email) {
            document.getElementById('edit_user_id').value = userId;
            document.getElementById('edit_username').value = username;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_password').value = '';
            document.getElementById('edit_confirm_password').value = '';
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>
</head>

<body class="text-gray-800">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="sidebar w-64 fixed h-full left-0 top-0 z-50 hidden lg:block">
            <div class="p-6 flex flex-col h-full">
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
                    </a>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 lg:ml-64 p-6 md:p-8">

            <!-- HEADER with Add Button -->
            <div class="mb-8">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h1 class="text-4xl font-bold bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent mb-2">User Management</h1>
                        <p class="text-gray-600 text-sm font-medium">View and manage registered users</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="bg-green-100 text-green-800 px-4 py-2 rounded-full font-bold">
                            <i class="fas fa-users mr-2"></i>
                            <?php echo $user_count; ?> Users
                        </div>
                        <button onclick="closeModal('editModal'); document.getElementById('addModal').classList.remove('hidden')" 
                                class="bg-gradient-to-r from-green-600 to-green-700 text-white font-bold py-3 px-6 rounded-full shadow-lg hover:shadow-xl transition">
                            <i class="fas fa-user-plus mr-2"></i> Add New User
                        </button>
                    </div>
                </div>
            </div>

            <!-- Messages -->
            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    <?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
                </div>
            <?php endif; ?>

            <!-- TABLE -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-4">
                    <h2 class="text-xl font-bold">Registered Users</h2>
                </div>
                <table class="w-full border-collapse">
                    <thead class="bg-green-50 text-green-800">
                        <tr>
                            <th class="px-6 py-4 text-left">User ID</th>
                            <th class="px-6 py-4 text-left">Username</th>
                            <th class="px-6 py-4 text-left">Email</th>
                            <th class="px-6 py-4 text-left">Registered Date</th>
                            <th class="px-6 py-4 text-center">Edit</th>
                            <th class="px-6 py-4 text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php if (mysqli_num_rows($result) == 0): ?>
                            <tr>
                                <td colspan="6" class="text-center py-12 text-gray-500">
                                    <i class="fas fa-users-slash text-4xl mb-4 block"></i>
                                    No users found
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium">#<?php echo $row['id']; ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($row['username']); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td class="px-6 py-4"><?php echo date('M d, Y h:i A', strtotime($row['trn_date'])); ?></td>
                                    <td class="px-6 py-4 text-center">
                                        <?php if ($row['id'] != 1): ?>
                                            <button onclick="openEditModal(<?php echo $row['id']; ?>, '<?php echo htmlspecialchars($row['username'], ENT_QUOTES); ?>', '<?php echo htmlspecialchars($row['email'], ENT_QUOTES); ?>')" 
                                                    class="text-blue-600 hover:text-blue-800 font-medium cursor-pointer">
                                                Edit
                                            </button>
                                        <?php else: ?>
                                            <span class="text-gray-400">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <?php if ($row['id'] != 1): ?>
                                            <a href="users.php?delete=<?php echo $row['id']; ?>" 
                                               onclick="return confirm('Are you sure you want to delete this user?')"
                                               class="text-red-600 hover:text-red-800 font-medium">
                                                Delete
                                            </a>
                                        <?php else: ?>
                                            <span class="text-gray-400">-</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </main>

    </div>

    <!-- ADD USER MODAL -->
    <div id="addModal" class="hidden modal-overlay">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal('addModal')">&times;</span>
            
            <h2 class="text-3xl font-bold text-green-800 mb-10">Add New User</h2>

            <form action="users.php" method="POST">
                <div class="text-left mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Username</label>
                    <input type="text" name="username" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600" required>
                </div>
                <div class="text-left mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600" required>
                </div>
                <div class="text-left mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input type="password" name="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600" required>
                </div>
                <div class="text-left mb-8">
                    <label class="block text-gray-700 font-semibold mb-2">Confirm Password</label>
                    <input type="password" name="confirm_password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600" required>
                </div>

                <button type="submit" name="add_user" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-4 rounded-full transition">
                    Add User
                </button>
            </form>
        </div>
    </div>

    <!-- EDIT USER MODAL -->
    <div id="editModal" class="hidden modal-overlay">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal('editModal')">&times;</span>
            
            <h2 class="text-3xl font-bold text-green-800 mb-10">Edit User</h2>

            <form action="users.php" method="POST">
                <input type="hidden" name="user_id" id="edit_user_id">
                
                <div class="text-left mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Username</label>
                    <input type="text" name="edit_username" id="edit_username" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600" required>
                </div>
                <div class="text-left mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" name="edit_email" id="edit_email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600" required>
                </div>
                <div class="text-left mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">New Password <span class="text-gray-500 text-sm">(leave blank to keep current)</span></label>
                    <input type="password" name="edit_password" id="edit_password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600">
                </div>
                <div class="text-left mb-8">
                    <label class="block text-gray-700 font-semibold mb-2">Confirm New Password</label>
                    <input type="password" name="edit_confirm_password" id="edit_confirm_password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600">
                </div>

                <button type="submit" name="edit_user" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-4 rounded-full transition">
                    Update User
                </button>
            </form>
        </div>
    </div>

</body>
</html>