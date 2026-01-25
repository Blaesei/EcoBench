<?php
// signup.php - Updated: Prevents 'admin' username + checks for duplicate username
require('db.php');
session_start();

$errors = [];
$username = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validation
    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    if (strtolower($username) === 'admin') {
        $errors[] = "This username is reserved for the administrator.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($errors)) {
        // Check for duplicate username
        $stmt = $con->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $errors[] = "Username already taken.";
        }
        $stmt->close();
    }

    if (empty($errors)) {
        // Register user with MD5
        $hashed_password = md5($password);
        $trn_date = date("Y-m-d H:i:s");

        $stmt = $con->prepare("INSERT INTO users (username, password, email, trn_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $hashed_password, $email, $trn_date);

        if ($stmt->execute()) {
            // Success - redirect to signin (or show message if you prefer)
            header("Location: signin.php");
            exit();
        } else {
            $errors[] = "Registration failed. Please try again.";
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
    <title>Registration - EcoBench</title>
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
        .success {
            color: #2e7d32;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: bold;
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
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 10px; font-size: 16px;
        }
        .register-button {
            background: #4caf50; color: white; border: none; padding: 15px;
            border-radius: 50px; width: 100%; font-size: 18px; font-weight: bold;
            cursor: pointer; margin-top: 10px; transition: background 0.3s;
        }
        .register-button:hover { background: #388e3c; }
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
            <h2 class="form-title">Registration</h2>

            <?php if (isset($success)): ?>
                <div class="success">
                    You are registered successfully!<br><br>
                    Click here to <a href="signin.php">Sign In</a>
                </div>
            <?php else: ?>

                <?php if (!empty($errors)): ?>
                    <div class="error">
                        <ul>
                            <?php foreach ($errors as $err): ?>
                                <li><?= htmlspecialchars($err) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="signup.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Username" value="<?= htmlspecialchars($username) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="register-button">Register</button>
                </form>

                <div class="links">
                    Already have an account? <a href="signin.php">Sign In</a>
                </div>

            <?php endif; ?>
        </div>
    </div>
</body>
</html>