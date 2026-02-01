<?php

include("../includes/auth.php");

// Configuration
$site_name = "EcoBench";
$site_tagline = "Sustainable Smart Bench Technology";

// Navigation items
$nav_items = [
    'Home' => 'index.php',
    'FAQs' => 'faqs.php',
    'About Us' => 'about.php',
    'Contact' => 'contact.php'
];

// Contact information
$contact_info = [
    'gcash' => '09398428449',
    'email' => 'ecobench.studio@pup.edu.ph',
    'location' => [
        'name' => 'Polytechnic University of the Philippines',
        'department' => 'Institute of Technology',
        'address' => 'Sta. Mesa, Manila 1016',
        'country' => 'Philippines'
    ]
];

// Social media links
$social_links = [
    'facebook' => '#',
    'instagram' => '#',
    'twitter' => '#'
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contact EcoBench - Get in touch with our sustainable smart bench technology team">
    <title><?php echo $site_name; ?> - Contact Us</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/contact.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="favicon.png">

    <style>
        /* ===================================
   CONTACT PAGE STYLES
   =================================== */

        /* Contact Hero Section */
        .contact-hero {
            position: relative;
            padding: 180px 0 120px;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            overflow: hidden;
        }

        .contact-hero-particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .hero-particle {
            position: absolute;
            width: 6px;
            height: 6px;
            background: rgba(111, 168, 58, 0.6);
            border-radius: 50%;
            animation: heroParticleFloat 20s ease-in-out infinite;
            box-shadow: 0 0 20px rgba(111, 168, 58, 0.8);
        }

        .hero-particle:nth-child(1) {
            left: 15%;
            top: 20%;
            animation-delay: 0s;
            animation-duration: 15s;
        }

        .hero-particle:nth-child(2) {
            left: 65%;
            top: 30%;
            animation-delay: 5s;
            animation-duration: 18s;
            background: rgba(244, 196, 48, 0.6);
            box-shadow: 0 0 20px rgba(244, 196, 48, 0.8);
        }

        .hero-particle:nth-child(3) {
            left: 35%;
            top: 60%;
            animation-delay: 10s;
            animation-duration: 20s;
        }

        .hero-particle:nth-child(4) {
            left: 85%;
            top: 50%;
            animation-delay: 15s;
            animation-duration: 16s;
            background: rgba(139, 195, 74, 0.6);
            box-shadow: 0 0 20px rgba(139, 195, 74, 0.8);
        }

        @keyframes heroParticleFloat {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
                opacity: 0.6;
            }

            25% {
                transform: translate(30px, -40px) scale(1.5);
                opacity: 1;
            }

            50% {
                transform: translate(-20px, -80px) scale(1);
                opacity: 0.7;
            }

            75% {
                transform: translate(40px, -120px) scale(1.3);
                opacity: 0.9;
            }
        }

        .contact-hero-content {
            text-align: center;
            position: relative;
            z-index: 2;
            animation: heroContentAppear 1s ease-out;
        }

        @keyframes heroContentAppear {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .contact-badge {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-sm);
            padding: var(--spacing-xs) var(--spacing-lg);
            background-color: rgba(111, 168, 58, 0.15);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(111, 168, 58, 0.3);
            border-radius: var(--radius-full);
            color: var(--color-bench-yellow);
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: var(--spacing-lg);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        .contact-hero-title {
            font-size: clamp(3rem, 8vw, 5.5rem);
            font-weight: 900;
            color: var(--color-white);
            margin-bottom: var(--spacing-md);
            font-family: 'Space Grotesk', sans-serif;
            background: linear-gradient(135deg, #ffffff 0%, var(--color-bench-yellow) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 4px 30px rgba(244, 196, 48, 0.3);
        }

        .contact-hero-subtitle {
            font-size: clamp(1.125rem, 2vw, 1.5rem);
            color: rgba(255, 255, 255, 0.85);
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.7;
        }

        .hero-wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            color: var(--color-background);
            transform: translateY(1px);
        }

        .hero-wave svg {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Contact Main Section */
        .contact-main {
            padding: calc(var(--spacing-xxl) * 1.5) 0;
            background: var(--color-background);
        }

        /* Quick Contact Cards */
        .quick-contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: var(--spacing-xl);
            margin-bottom: calc(var(--spacing-xxl) * 1.5);
        }

        .quick-contact-card {
            background: var(--color-white);
            border-radius: var(--radius-xl);
            padding: var(--spacing-xl);
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all var(--transition-normal);
            border: 2px solid transparent;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .quick-contact-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--color-eco-green), var(--color-bench-yellow));
            transform: scaleX(0);
            transition: transform var(--transition-normal);
        }

        .quick-contact-card:hover::before {
            transform: scaleX(1);
        }

        .quick-contact-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .quick-contact-card[data-color="green"]:hover {
            border-color: var(--color-eco-green);
        }

        .quick-contact-card[data-color="blue"]:hover {
            border-color: #3b82f6;
        }

        .quick-contact-card[data-color="yellow"]:hover {
            border-color: var(--color-bench-yellow);
        }

        .quick-contact-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto var(--spacing-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(111, 168, 58, 0.1), rgba(244, 196, 48, 0.1));
            border-radius: var(--radius-lg);
            color: var(--color-eco-green);
            transition: all var(--transition-normal);
        }

        .quick-contact-card:hover .quick-contact-icon {
            transform: scale(1.1) rotate(5deg);
            background: linear-gradient(135deg, rgba(111, 168, 58, 0.2), rgba(244, 196, 48, 0.2));
        }

        .quick-contact-card[data-color="blue"] .quick-contact-icon {
            color: #3b82f6;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(100, 181, 246, 0.1));
        }

        .quick-contact-card[data-color="blue"]:hover .quick-contact-icon {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(100, 181, 246, 0.2));
        }

        .quick-contact-card[data-color="yellow"] .quick-contact-icon {
            color: var(--color-bench-yellow-dark);
            background: linear-gradient(135deg, rgba(244, 196, 48, 0.1), rgba(255, 213, 79, 0.1));
        }

        .quick-contact-card[data-color="yellow"]:hover .quick-contact-icon {
            background: linear-gradient(135deg, rgba(244, 196, 48, 0.2), rgba(255, 213, 79, 0.2));
        }

        .quick-contact-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--color-text);
            margin-bottom: var(--spacing-sm);
            font-family: 'Space Grotesk', sans-serif;
        }

        .quick-contact-card a {
            display: block;
            color: var(--color-eco-green);
            text-decoration: none;
            font-weight: 600;
            font-size: 1.125rem;
            margin-bottom: var(--spacing-xs);
            transition: color var(--transition-fast);
        }

        .quick-contact-card a:hover {
            color: var(--color-eco-green-dark);
        }

        .quick-contact-card p {
            color: var(--color-text-light);
            line-height: 1.6;
            margin: 0;
        }

        .card-note {
            font-size: 0.875rem;
            font-style: italic;
            color: var(--color-gray) !important;
            margin-top: var(--spacing-xs) !important;
        }

        /* Contact Content Grid */
        .contact-content-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: var(--spacing-xxl);
            margin-bottom: calc(var(--spacing-xxl) * 1.5);
        }

        /* Contact Form */
        .contact-form-wrapper {
            background: var(--color-white);
            border-radius: var(--radius-xl);
            padding: var(--spacing-xxl);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .contact-form-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, var(--color-eco-green), var(--color-bench-yellow));
        }

        .form-header {
            text-align: center;
            margin-bottom: var(--spacing-xxl);
        }

        .form-icon {
            font-size: 3.5rem;
            margin-bottom: var(--spacing-md);
            animation: formIconFloat 3s ease-in-out infinite;
        }

        @keyframes formIconFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .form-header h2 {
            font-size: clamp(1.75rem, 4vw, 2.5rem);
            font-weight: 800;
            color: var(--color-text);
            margin-bottom: var(--spacing-sm);
            font-family: 'Space Grotesk', sans-serif;
            background: linear-gradient(135deg, var(--color-eco-green), var(--color-bench-yellow));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .form-header p {
            color: var(--color-text-light);
            font-size: 1rem;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: var(--spacing-lg);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--spacing-lg);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: var(--spacing-xs);
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: var(--spacing-xs);
            font-weight: 600;
            color: var(--color-text);
            font-size: 0.95rem;
        }

        .form-label svg {
            color: var(--color-eco-green);
        }

        .form-control {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid var(--color-light-gray);
            border-radius: var(--radius-lg);
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            color: var(--color-text);
            background: var(--color-white);
            transition: all var(--transition-normal);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--color-eco-green);
            box-shadow: 0 0 0 4px rgba(111, 168, 58, 0.1);
            background: var(--color-white);
        }

        .form-control::placeholder {
            color: var(--color-gray);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 150px;
            font-family: 'Poppins', sans-serif;
        }

        .submit-btn {
            width: 100%;
            padding: 18px 32px;
            background: linear-gradient(135deg, var(--color-eco-green), var(--color-eco-green-light));
            color: var(--color-white);
            border: none;
            border-radius: var(--radius-lg);
            font-size: 1.125rem;
            font-weight: 700;
            cursor: pointer;
            transition: all var(--transition-normal);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--spacing-sm);
            box-shadow: 0 6px 20px rgba(111, 168, 58, 0.3);
            position: relative;
            overflow: hidden;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .submit-btn:hover::before {
            width: 400px;
            height: 400px;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(111, 168, 58, 0.4);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .submit-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .submit-btn svg {
            transition: transform var(--transition-normal);
        }

        .submit-btn:hover svg {
            transform: translateX(5px);
        }

        .form-success {
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
            padding: var(--spacing-md) var(--spacing-lg);
            background: linear-gradient(135deg, rgba(111, 168, 58, 0.1), rgba(139, 195, 74, 0.1));
            border: 2px solid var(--color-eco-green);
            border-radius: var(--radius-lg);
            color: var(--color-eco-green-dark);
            font-weight: 600;
            animation: successSlideIn 0.5s ease-out;
        }

        @keyframes successSlideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-success svg {
            flex-shrink: 0;
        }

        /* Contact Info Sidebar */
        .contact-info-sidebar {
            display: flex;
            flex-direction: column;
            gap: var(--spacing-xl);
        }

        .info-card {
            background: var(--color-white);
            border-radius: var(--radius-xl);
            padding: var(--spacing-xl);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all var(--transition-normal);
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        .info-card-icon {
            font-size: 2.5rem;
            margin-bottom: var(--spacing-md);
        }

        .info-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--color-text);
            margin-bottom: var(--spacing-sm);
            font-family: 'Space Grotesk', sans-serif;
        }

        .info-card p {
            color: var(--color-text-light);
            line-height: 1.6;
            margin-bottom: var(--spacing-md);
        }

        /* Hours Card */
        .hours-list {
            display: flex;
            flex-direction: column;
            gap: var(--spacing-sm);
        }

        .hours-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--spacing-sm) var(--spacing-md);
            background: var(--color-off-white);
            border-radius: var(--radius-md);
            transition: all var(--transition-fast);
        }

        .hours-item:hover {
            background: linear-gradient(135deg, rgba(111, 168, 58, 0.05), rgba(244, 196, 48, 0.05));
        }

        .hours-item.inactive {
            opacity: 0.5;
        }

        .hours-item .day {
            font-weight: 600;
            color: var(--color-text);
        }

        .hours-item .time {
            color: var(--color-eco-green);
            font-weight: 500;
        }

        /* Social Links Grid */
        .social-links-grid {
            display: flex;
            flex-direction: column;
            gap: var(--spacing-sm);
        }

        .social-link-btn {
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
            padding: var(--spacing-md);
            border-radius: var(--radius-md);
            text-decoration: none;
            font-weight: 600;
            transition: all var(--transition-normal);
            color: var(--color-white);
        }

        .social-link-btn.facebook {
            background: linear-gradient(135deg, #3b5998, #4c70ba);
        }

        .social-link-btn.instagram {
            background: linear-gradient(135deg, #f09433, #dc2743, #bc1888);
        }

        .social-link-btn.twitter {
            background: linear-gradient(135deg, #1DA1F2, #0d8bd9);
        }

        .social-link-btn:hover {
            transform: translateX(5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .social-link-btn svg {
            flex-shrink: 0;
        }

        /* FAQ Link */
        .faq-link {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-xs);
            padding: var(--spacing-sm) var(--spacing-lg);
            background: linear-gradient(135deg, var(--color-eco-green), var(--color-eco-green-light));
            color: var(--color-white);
            text-decoration: none;
            border-radius: var(--radius-full);
            font-weight: 600;
            transition: all var(--transition-normal);
            box-shadow: 0 4px 15px rgba(111, 168, 58, 0.3);
        }

        .faq-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(111, 168, 58, 0.4);
        }

        .faq-link svg {
            transition: transform var(--transition-normal);
        }

        .faq-link:hover svg {
            transform: translateX(5px);
        }

        /* Map Section */
        .map-section {
            background: var(--color-white);
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .map-header {
            display: flex;
            align-items: center;
            gap: var(--spacing-lg);
            padding: var(--spacing-xl);
            background: linear-gradient(135deg, rgba(111, 168, 58, 0.05), rgba(244, 196, 48, 0.05));
            border-bottom: 2px solid var(--color-light-gray);
        }

        .map-icon {
            font-size: 3rem;
            flex-shrink: 0;
        }

        .map-text h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--color-text);
            margin-bottom: 0.25rem;
            font-family: 'Space Grotesk', sans-serif;
        }

        .map-text p {
            color: var(--color-text-light);
            margin: 0;
        }

        .map-container {
            height: 500px;
            position: relative;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
            display: block;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .contact-content-grid {
                grid-template-columns: 1fr;
            }

            .quick-contact-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .contact-hero {
                padding: 140px 0 80px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .contact-form-wrapper {
                padding: var(--spacing-xl);
            }

            .quick-contact-grid {
                grid-template-columns: 1fr;
            }

            .map-container {
                height: 350px;
            }

            .map-header {
                flex-direction: column;
                text-align: center;
                gap: var(--spacing-md);
            }
        }

        @media (max-width: 480px) {
            .contact-hero {
                padding: 120px 0 60px;
            }

            .contact-hero-title {
                font-size: 2.5rem;
            }

            .form-header h2 {
                font-size: 1.75rem;
            }

            .quick-contact-icon {
                width: 70px;
                height: 70px;
            }

            .info-card {
                padding: var(--spacing-lg);
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

    <!-- Scroll Progress Bar -->
    <div class="scroll-progress" id="scrollProgress"></div>

    <!-- Header -->
    <header id="header">
        <div class="container">
            <div class="header-content">
                <a href="index.php" class="logo">
                    <img class="logo-icon" src="../assets/img/EcoBench Logo.png" alt="EcoBench Logo">
                </a>

                <nav class="nav-menu" id="navMenu">
                    <ul>
                        <?php foreach ($nav_items as $name => $link): ?>
                            <li><a href="<?php echo $link; ?>" class="nav-link <?php echo ($name === 'Contact') ? 'active' : ''; ?>"><?php echo $name; ?></a></li>
                        <?php endforeach; ?>
                        <li><a href="signin.php" class="nav-link sign-in-btn">Logout</a></li>
                    </ul>
                </nav>

                <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>

    <!-- Contact Hero Section -->
    <section class="contact-hero">
        <div class="contact-hero-particles">
            <div class="hero-particle"></div>
            <div class="hero-particle"></div>
            <div class="hero-particle"></div>
            <div class="hero-particle"></div>
        </div>

        <div class="container">
            <div class="contact-hero-content">
                <div class="contact-badge">
                    <span class="badge-pulse"></span>
                    Let's Connect
                </div>
                <h1 class="contact-hero-title">Get in Touch</h1>
                <p class="contact-hero-subtitle">We'd love to hear from you. Whether you have a question, feedback, or just want to say hello.</p>
            </div>
        </div>

        <div class="hero-wave">
            <svg viewBox="0 0 1440 120" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z" fill="currentColor" />
            </svg>
        </div>
    </section>

    <!-- Main Contact Section -->
    <section class="contact-main">
        <div class="container">
            <!-- Quick Contact Cards -->
            <div class="quick-contact-grid">
                <div class="quick-contact-card" data-color="green">
                    <div class="quick-contact-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z" />
                        </svg>
                    </div>
                    <h3>Phone / GCash</h3>
                    <a href="tel:<?php echo $contact_info['gcash']; ?>"><?php echo $contact_info['gcash']; ?></a>
                    <p class="card-note">Available for donations</p>
                </div>

                <div class="quick-contact-card" data-color="blue">
                    <div class="quick-contact-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                            <polyline points="22,6 12,13 2,6" />
                        </svg>
                    </div>
                    <h3>Email Us</h3>
                    <a href="mailto:<?php echo $contact_info['email']; ?>"><?php echo $contact_info['email']; ?></a>
                    <p class="card-note">We reply within 24 hours</p>
                </div>

                <div class="quick-contact-card" data-color="yellow">
                    <div class="quick-contact-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" />
                            <circle cx="12" cy="10" r="3" />
                        </svg>
                    </div>
                    <h3>Visit Us</h3>
                    <p><?php echo $contact_info['location']['name']; ?><br><?php echo $contact_info['location']['department']; ?></p>
                    <p class="card-note"><?php echo $contact_info['location']['address']; ?></p>
                </div>
            </div>

            <!-- Contact Form & Info Grid -->
            <div class="contact-content-grid">
                <!-- Contact Form -->
                <div class="contact-form-wrapper">
                    <div class="form-header">
                        <div class="form-icon">✉️</div>
                        <h2>Send us a Message</h2>
                        <p>Fill out the form below and we'll get back to you as soon as possible</p>
                    </div>

                    <form id="contactForm" class="contact-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
                                        <circle cx="12" cy="7" r="4" />
                                    </svg>
                                    Full Name
                                </label>
                                <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                        <polyline points="22,6 12,13 2,6" />
                                    </svg>
                                    Email Address
                                </label>
                                <input type="email" name="email" class="form-control" placeholder="john@example.com" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z" />
                                </svg>
                                Phone Number (Optional)
                            </label>
                            <input type="tel" name="phone" class="form-control" placeholder="+63 912 345 6789">
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" />
                                </svg>
                                Subject
                            </label>
                            <input type="text" name="subject" class="form-control" placeholder="What is this regarding?" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" />
                                </svg>
                                Message
                            </label>
                            <textarea name="message" class="form-control" rows="6" placeholder="Share your thoughts, questions, or feedback..." required></textarea>
                        </div>

                        <button type="submit" class="submit-btn">
                            <span>Send Message</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="22" y1="2" x2="11" y2="13" />
                                <polygon points="22 2 15 22 11 13 2 9 22 2" />
                            </svg>
                        </button>

                        <div class="form-success" id="formSuccess" style="display: none;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span>Thank you! Your message has been sent successfully.</span>
                        </div>
                    </form>
                </div>

                <!-- Contact Information Sidebar -->
                <div class="contact-info-sidebar">
                    <!-- Office Hours -->
                    <div class="info-card hours-card">
                        <div class="info-card-icon">🕐</div>
                        <h3>Office Hours</h3>
                        <div class="hours-list">
                            <div class="hours-item">
                                <span class="day">Monday - Friday</span>
                                <span class="time">8:00 AM - 5:00 PM</span>
                            </div>
                            <div class="hours-item">
                                <span class="day">Saturday</span>
                                <span class="time">9:00 AM - 12:00 PM</span>
                            </div>
                            <div class="hours-item inactive">
                                <span class="day">Sunday</span>
                                <span class="time">Closed</span>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="info-card social-card">
                        <div class="info-card-icon">🌐</div>
                        <h3>Follow Us</h3>
                        <p>Stay connected on social media</p>
                        <div class="social-links-grid">
                            <a href="<?php echo $social_links['facebook']; ?>" class="social-link-btn facebook">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />
                                </svg>
                                <span>Facebook</span>
                            </a>
                            <a href="<?php echo $social_links['instagram']; ?>" class="social-link-btn instagram">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" fill="none" stroke="#000" stroke-width="2" />
                                    <circle cx="17.5" cy="6.5" r="1.5" fill="#000" />
                                </svg>
                                <span>Instagram</span>
                            </a>
                            <a href="<?php echo $social_links['twitter']; ?>" class="social-link-btn twitter">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" />
                                </svg>
                                <span>Twitter</span>
                            </a>
                        </div>
                    </div>

                    <!-- FAQ Link -->
                    <div class="info-card faq-card">
                        <div class="info-card-icon">❓</div>
                        <h3>Have Questions?</h3>
                        <p>Check out our frequently asked questions for quick answers</p>
                        <a href="faqs.php" class="faq-link">
                            <span>Visit FAQ Page</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Map Section -->
            <div class="map-section">
                <div class="map-header">
                    <div class="map-icon">📍</div>
                    <div class="map-text">
                        <h2>Find Us Here</h2>
                        <p><?php echo $contact_info['location']['name']; ?> - <?php echo $contact_info['location']['department']; ?></p>
                    </div>
                </div>
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.356842735937!2d121.00849131483457!3d14.599578889796948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b7c3c5a9e905%3A0xe8d7f166c088784!2sPolytechnic%20University%20of%20the%20Philippines!5e0!3m2!1sen!2sph!4v1705892775188!5m2!1sen!2sph"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-bg-pattern">
            <div class="pattern-dot"></div>
            <div class="pattern-dot"></div>
            <div class="pattern-dot"></div>
            <div class="pattern-dot"></div>
            <div class="pattern-dot"></div>
            <div class="pattern-dot"></div>
        </div>

        <div class="cta-shape cta-shape-1"></div>
        <div class="cta-shape cta-shape-2"></div>

        <div class="container">
            <div class="cta-content">
                <div class="cta-icon-wrapper">
                    <div class="cta-icon-circle"></div>
                    <div class="cta-icon">💬</div>
                </div>

                <div class="cta-badge">Get In Touch</div>
                <h2>Want to Learn More?</h2>
                <p>We'd love to hear from you! Whether you have questions about our project, suggestions for improvement, or opportunities for collaboration, feel free to reach out.</p>

                <div class="cta-buttons-group">
                    <a href="faqs.php" class="btn btn-secondary btn-large">
                        <span>View FAQs</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <div class="logo">
                        <img class="logo-icon" src="../assets/img/EcoBench Logo.png" alt="EcoBench Logo">
                    </div>
                    <div class="social-links">
                        <a href="<?php echo $social_links['facebook']; ?>" aria-label="Facebook">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />
                            </svg>
                        </a>
                        <a href="<?php echo $social_links['twitter']; ?>" aria-label="Twitter">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" />
                            </svg>
                        </a>
                        <a href="<?php echo $social_links['instagram']; ?>" aria-label="Instagram">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" fill="none" stroke="#000" stroke-width="2" />
                                <circle cx="17.5" cy="6.5" r="1.5" fill="#000" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="footer-links">
                    <div class="footer-column">
                        <h4>Quick Links</h4>
                        <ul>
                            <?php foreach ($nav_items as $name => $link): ?>
                                <li><a href="<?php echo $link; ?>"><?php echo $name; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4>For Users</h4>
                        <ul>
                            <li><a href="signin.php">Sign In</a></li>
                            <li><a href="faqs.php">Help Center</a></li>
                            <li><a href="contact.php">Feedback</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4>Connect</h4>
                        <ul>
                            <li><a href="<?php echo $social_links['facebook']; ?>">Facebook</a></li>
                            <li><a href="<?php echo $social_links['twitter']; ?>">Twitter</a></li>
                            <li><a href="<?php echo $social_links['instagram']; ?>">Instagram</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> EcoBench. All rights reserved. | Polytechnic University of the Philippines - Institute of Technology</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="../assets/js/script.js"></script>
    <script>
        // Contact form handling
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const submitBtn = this.querySelector('.submit-btn');
            const successMsg = document.getElementById('formSuccess');

            // Disable button and show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span>Sending...</span>';

            // Simulate form submission
            setTimeout(() => {
                // Show success message
                successMsg.style.display = 'flex';

                // Reset form
                this.reset();

                // Reset button
                submitBtn.disabled = false;
                submitBtn.innerHTML = `
                    <span>Send Message</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="22" y1="2" x2="11" y2="13"/>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                    </svg>
                `;

                // Hide success message after 5 seconds
                setTimeout(() => {
                    successMsg.style.display = 'none';
                }, 5000);
            }, 1500);
        });
    </script>
</body>

</html>