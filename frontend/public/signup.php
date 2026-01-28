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
    <title>Sign Up - EcoBench</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --color-eco-green: #6fa83a;
            --color-eco-green-dark: #5a8a2f;
            --color-eco-green-light: #8bc34a;
            --color-bench-yellow: #f4c430;
            --color-white: #ffffff;
            --color-text: #2d3436;
            --color-text-light: #636e72;
            --color-off-white: #f8f9fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            position: relative;
            overflow-x: hidden;
            overflow-y: auto;
        }

        /* Animated Background Shapes */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .bg-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(120px);
            opacity: 0.12;
            animation: float 25s ease-in-out infinite;
        }

        .shape-1 {
            width: 600px;
            height: 600px;
            background: var(--color-eco-green);
            top: -150px;
            left: -150px;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 500px;
            height: 500px;
            background: var(--color-bench-yellow);
            bottom: -100px;
            right: -100px;
            animation-delay: 8s;
        }

        .shape-3 {
            width: 450px;
            height: 450px;
            background: var(--color-eco-green-light);
            top: 50%;
            right: 10%;
            animation-delay: 16s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
            33% { transform: translate(60px, -60px) rotate(120deg) scale(1.1); }
            66% { transform: translate(-40px, 40px) rotate(240deg) scale(0.9); }
        }

        /* Floating Particles */
        .particles {
            position: fixed;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 6px;
            height: 6px;
            background: rgba(111, 168, 58, 0.3);
            border-radius: 50%;
            animation: particleFloat 18s ease-in-out infinite;
            box-shadow: 0 0 15px rgba(111, 168, 58, 0.4);
        }

        .particle:nth-child(1) { left: 15%; animation-delay: 0s; animation-duration: 14s; }
        .particle:nth-child(2) { left: 35%; animation-delay: 3s; animation-duration: 17s; }
        .particle:nth-child(3) { left: 55%; animation-delay: 6s; animation-duration: 20s; }
        .particle:nth-child(4) { left: 75%; animation-delay: 9s; animation-duration: 16s; }
        .particle:nth-child(5) { left: 90%; animation-delay: 12s; animation-duration: 19s; }
        .particle:nth-child(6) { left: 25%; animation-delay: 4s; animation-duration: 15s; }
        .particle:nth-child(7) { left: 65%; animation-delay: 7s; animation-duration: 21s; }

        @keyframes particleFloat {
            0% { transform: translateY(100vh) scale(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-150px) scale(1.2); opacity: 0; }
        }

        /* Pattern Dots */
        .pattern-dots {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .pattern-dot {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(111, 168, 58, 0.3);
            border-radius: 50%;
            animation: dotFloat 22s ease-in-out infinite;
        }

        .pattern-dot:nth-child(1) { top: 15%; left: 12%; animation-delay: 0s; }
        .pattern-dot:nth-child(2) { top: 25%; right: 18%; animation-delay: 4s; }
        .pattern-dot:nth-child(3) { bottom: 35%; left: 22%; animation-delay: 8s; }
        .pattern-dot:nth-child(4) { bottom: 20%; right: 28%; animation-delay: 12s; }
        .pattern-dot:nth-child(5) { top: 60%; left: 55%; animation-delay: 16s; }

        @keyframes dotFloat {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.3; }
            25% { transform: translate(25px, -25px) scale(1.8); opacity: 0.6; }
            50% { transform: translate(-20px, 20px) scale(1.2); opacity: 0.4; }
            75% { transform: translate(30px, 15px) scale(1.5); opacity: 0.7; }
        }

        .signup-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 520px;
            animation: fadeInUp 0.9s cubic-bezier(0.16, 1, 0.3, 1);
            margin: auto;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo-wrapper {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .logo-img {
            width: 300px;
            max-width: 90%;
            filter: drop-shadow(0 15px 40px rgba(111, 168, 58, 0.4));
            animation: logoFloat 4s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%, 100% { 
                transform: translateY(0) scale(1);
                filter: drop-shadow(0 15px 40px rgba(111, 168, 58, 0.4));
            }
            50% { 
                transform: translateY(-15px) scale(1.03);
                filter: drop-shadow(0 20px 50px rgba(111, 168, 58, 0.6));
            }
        }

        .signup-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(30px);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 
                0 25px 70px rgba(0, 0, 0, 0.12),
                0 0 1px rgba(0, 0, 0, 0.05) inset;
            border: 1px solid rgba(111, 168, 58, 0.15);
            position: relative;
            overflow: hidden;
        }

        .signup-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--color-eco-green), var(--color-bench-yellow), var(--color-eco-green-light));
            background-size: 200% 100%;
            animation: gradientShift 3s ease infinite;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .card-glow {
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(111, 168, 58, 0.1) 0%, transparent 70%);
            animation: glowRotate 8s linear infinite;
            pointer-events: none;
        }

        @keyframes glowRotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .signup-title {
            font-size: 2.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--color-eco-green), var(--color-bench-yellow));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
            font-family: 'Space Grotesk', sans-serif;
            letter-spacing: -1px;
        }

        .error-container {
            background: linear-gradient(135deg, #fff5f5, #ffe8e8);
            border-left: 5px solid #d32f2f;
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
            margin-bottom: 2rem;
            animation: shake 0.6s cubic-bezier(0.36, 0.07, 0.19, 0.97);
            box-shadow: 0 8px 20px rgba(211, 47, 47, 0.15);
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-8px); }
            20%, 40%, 60%, 80% { transform: translateX(8px); }
        }

        .error-container ul {
            list-style: none;
            margin: 0;
        }

        .error-container li {
            color: #d32f2f;
            font-size: 0.95rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .error-container li::before {
            content: '⚠';
            font-size: 1.25rem;
        }

        .form-group {
            margin-bottom: 1.75rem;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 10px;
            color: var(--color-text);
            font-weight: 700;
            font-size: 0.95rem;
            transition: color 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.85rem;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--color-text-light);
            transition: all 0.3s ease;
            width: 22px;
            height: 22px;
            z-index: 1;
        }

        .form-input {
            width: 100%;
            padding: 18px 18px 18px 54px;
            border: 2.5px solid #e9ecef;
            border-radius: 14px;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            background: #fafbfc;
            font-weight: 500;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--color-eco-green);
            background: var(--color-white);
            box-shadow: 
                0 0 0 5px rgba(111, 168, 58, 0.1),
                0 8px 20px rgba(111, 168, 58, 0.15);
            transform: translateY(-2px);
        }

        .form-input:focus ~ .input-icon {
            color: var(--color-eco-green);
            transform: translateY(-50%) scale(1.1);
        }

        .signin-text {
            color: var(--color-text-light);
            font-size: 0.95rem;
            font-weight: 500;
            text-align: center;
            margin-bottom: 2rem;
        }

        .signin-link {
            color: var(--color-eco-green);
            text-decoration: none;
            font-weight: 800;
            transition: all 0.3s ease;
            position: relative;
        }

        .signin-link::after {
            content: '→';
            margin-left: 6px;
            display: inline-block;
            transition: transform 0.3s ease;
        }

        .signin-link:hover::after {
            transform: translateX(4px);
        }

        .signin-link:hover {
            color: var(--color-eco-green-dark);
        }

        .signup-button {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, var(--color-eco-green), var(--color-eco-green-light));
            color: var(--color-white);
            border: none;
            border-radius: 50px;
            font-size: 1.15rem;
            font-weight: 800;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 
                0 10px 25px rgba(111, 168, 58, 0.35),
                0 0 0 0 rgba(111, 168, 58, 0);
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .signup-button::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            transform: translate(-50%, -50%);
            transition: width 0.8s, height 0.8s;
        }

        .signup-button:hover::before {
            width: 500px;
            height: 500px;
        }

        .signup-button:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 
                0 15px 35px rgba(111, 168, 58, 0.45),
                0 0 0 8px rgba(111, 168, 58, 0.1);
        }

        .signup-button:active {
            transform: translateY(-1px) scale(0.98);
        }

        /* Security Badge */
        .security-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 1.5rem;
            padding: 12px;
            background: linear-gradient(135deg, rgba(111, 168, 58, 0.05), rgba(244, 196, 48, 0.05));
            border-radius: 12px;
            font-size: 0.85rem;
            color: var(--color-text-light);
            font-weight: 600;
        }

        .security-badge svg {
            width: 18px;
            height: 18px;
            color: var(--color-eco-green);
        }

        @media (max-width: 768px) {
            .signup-card {
                padding: 2rem;
            }

            .signup-title {
                font-size: 2rem;
            }

            .logo-img {
                width: 220px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }

            .signup-card {
                padding: 1.75rem;
            }

            .logo-img {
                width: 180px;
            }

            .signup-title {
                font-size: 1.75rem;
            }

            .signup-button {
                font-size: 1rem;
                padding: 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="bg-shape shape-1"></div>
        <div class="bg-shape shape-2"></div>
        <div class="bg-shape shape-3"></div>
    </div>

    <!-- Floating Particles -->
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Pattern Dots -->
    <div class="pattern-dots">
        <div class="pattern-dot"></div>
        <div class="pattern-dot"></div>
        <div class="pattern-dot"></div>
        <div class="pattern-dot"></div>
        <div class="pattern-dot"></div>
    </div>

    <div class="signup-container">
        <div class="logo-wrapper">
            <img src="img/EcoBench Logo.png" alt="EcoBench Logo" class="logo-img">
        </div>

        <div class="signup-card">
            <div class="card-glow"></div>
            <h1 class="signup-title">Sign Up</h1>
            
            <?php if (!empty($errors)): ?>
                <div class="error-container">
                    <ul>
                        <?php foreach ($errors as $err): ?>
                            <li><?= htmlspecialchars($err) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="signup.php" method="POST">
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-wrapper">
                        <input 
                            type="text" 
                            id="username" 
                            name="username" 
                            class="form-input"
                            placeholder="Choose a username" 
                            value="<?= htmlspecialchars($username) ?>" 
                            required
                        >
                        <svg class="input-icon" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                            <path d="M10 11C12.2091 11 14 9.20914 14 7C14 4.79086 12.2091 3 10 3C7.79086 3 6 4.79086 6 7C6 9.20914 7.79086 11 10 11Z" stroke-width="2"/>
                            <path d="M3 18C3 14.134 6.13401 11 10 11C13.866 11 17 14.134 17 18" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-wrapper">
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="form-input"
                            placeholder="Enter your email" 
                            value="<?= htmlspecialchars($email) ?>" 
                            required
                        >
                        <svg class="input-icon" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                            <path d="M3 6L10 11L17 6M3 6V14C3 14.5304 3.21071 15.0391 3.58579 15.4142C3.96086 15.7893 4.46957 16 5 16H15C15.5304 16 16.0391 15.7893 16.4142 15.4142C16.7893 15.0391 17 14.5304 17 14V6M3 6C3 5.46957 3.21071 4.96086 3.58579 4.58579C3.96086 4.21071 4.46957 4 5 4H15C15.5304 4 16.0391 4.21071 16.4142 4.58579C16.7893 4.96086 17 5.46957 17 6" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-wrapper">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="form-input"
                            placeholder="Create a password" 
                            required
                        >
                        <svg class="input-icon" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                            <path d="M5 10H15M5 10C3.89543 10 3 10.8954 3 12V15C3 16.1046 3.89543 17 5 17H15C16.1046 17 17 16.1046 17 15V12C17 10.8954 16.1046 10 15 10M5 10V7C5 4.79086 6.79086 3 9 3H11C13.2091 3 15 4.79086 15 7V10" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>

                <p class="signin-text">
                    Already have an account? <a href="signin.php" class="signin-link">Sign In</a>
                </p>

                <button type="submit" class="signup-button">Create Account</button>

                <div class="security-badge">
                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor">
                        <path d="M10 1L3 4V9C3 13.5 6 17.5 10 19C14 17.5 17 13.5 17 9V4L10 1Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7 10L9 12L13 8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Secure encrypted connection
                </div>
            </form>
        </div>
    </div>
</body>
</html>