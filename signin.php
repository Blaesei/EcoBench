<?php
// signin.php - Updated: Admin vs Normal user redirect + login with username only
require('db.php');
session_start();

$errors = [];
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($errors)) {
        $hashed_password = md5($password);

        $stmt = $con->prepare("SELECT * FROM `users` WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $hashed_password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['username'];

            // Check if this is the admin user
            if (strtolower($row['username']) === 'admin') {
                header("Location: dashboard.php"); // Admin goes to dashboard
            } else {
                header("Location: index.php"); // Normal users go to index.php
            }
            exit();
        } else {
            $errors[] = "Username/password is incorrect.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - EcoBench</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #dcecd8, #f0e6d0);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            text-align: center;
        }
        .badge {
            background: rgba(255, 255, 255, 0.9);
            color: #ff8f00;
            font-weight: bold;
            font-size: 14px;
            padding: 10px 25px;
            border-radius: 50px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        .badge::before {
            content: "•";
            color: #ff8f00;
            font-size: 20px;
        }
        .big-logo {
            width: 380px;
            max-width: 90%;
            margin-bottom: 50px;
        }
        .form-container {
            background: white;
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            width: 420px;
            max-width: 90%;
        }
        .form-title {
            font-size: 28px;
            color: #2e7d32;
            margin-bottom: 30px;
        }
        .error {
            color: #d32f2f;
            margin-bottom: 20px;
            font-size: 14px;
            background: #ffebee;
            padding: 10px;
            border-radius: 8px;
        }
        .error ul { list-style: none; text-align: left; }
        .form-group { margin-bottom: 20px; text-align: left; }
        label { display: block; margin-bottom: 8px; color: #555; font-weight: 600; }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 10px; font-size: 16px;
        }
        .remember {
            display: flex; align-items: center; gap: 8px; margin: 20px 0; font-size: 14px; color: #555;
        }
        .signin-button {
            background: #4caf50; color: white; border: none; padding: 15px;
            border-radius: 50px; width: 100%; font-size: 18px; font-weight: bold;
            cursor: pointer; margin-top: 10px; transition: background 0.3s;
        }
        .signin-button:hover { background: #388e3c; }
        .links { margin-top: 25px; font-size: 14px; color: #666; }
        .links a { color: #4caf50; text-decoration: none; }
        .links a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="main">
        <div class="badge">SUSTAINABLE INNOVATION</div>

        <img src="img/EcoBench Logo.png" alt="EcoBench Logo" class="big-logo">

        <div class="form-container">
            <h2 class="form-title">Sign In</h2>

            <?php if (!empty($errors)): ?>
                <div class="error">
                    <ul>
                        <?php foreach ($errors as $err): ?>
                            <li><?= htmlspecialchars($err) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="signin.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" value="<?= htmlspecialchars($username) ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="remember">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <button type="submit" class="signin-button">Sign In</button>
            </form>

            <div class="links">
                Don't have an account? <a href="signup.php">Sign Up</a><br>
                <a href="#">Forgot password?</a>
            </div>
        </div>
    </div>
</body>
</html>