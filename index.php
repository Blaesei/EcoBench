<?php
// Configuration
$site_name = "EcoBench";
$site_tagline = "Sustainable Smart Bench Technology";

// Navigation items
$nav_items = [
    'Home' => '#home',
    'FAQs' => '#faqs',
    'Dashboard' => '#dashboard',
    'Prototype' => '#prototype',
    'Contact' => '#contact'
];

// Slideshow images (add your image paths here)
$slideshow_images = [
    ['src' => 'images/slide1.jpg', 'alt' => 'EcoBench in campus environment'],
    ['src' => 'images/slide2.jpg', 'alt' => 'Solar-powered charging station'],
    ['src' => 'images/slide3.jpg', 'alt' => 'Students using EcoBench']
];

// Features data
$features = [
    [
        'icon' => '🌱',
        'title' => 'Eco-Friendly',
        'description' => 'Powered by renewable solar energy'
    ],
    [
        'icon' => '🔋',
        'title' => 'Smart Charging',
        'description' => 'USB ports for device charging'
    ],
    [
        'icon' => '📊',
        'title' => 'Energy Monitoring',
        'description' => 'Real-time energy consumption tracking'
    ],
    [
        'icon' => '💺',
        'title' => 'Comfortable Seating',
        'description' => 'Ergonomic design for student comfort'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $site_tagline; ?> - Renewable-powered device charging and energy monitoring for PUP Institute of Technology">
    <meta name="keywords" content="sustainable, smart bench, solar power, device charging, PUP">
    <meta name="author" content="EcoBench Team">

    <title><?php echo $site_name; ?> - <?php echo $site_tagline; ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="styles.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="favicon.png">
</head>

<body>
    <!-- Scroll Progress Bar -->
    <div class="scroll-progress" id="scrollProgress"></div>

    <!-- Header -->
    <header id="header">
        <div class="container">
            <div class="header-content">
                <a href="#home" class="logo">
                    <img class="logo-icon" src="img/EcoBench Logo.png" alt="EcoBench Logo">
                </a>

                <nav class="nav-menu" id="navMenu">
                    <ul>
                        <?php foreach ($nav_items as $name => $link): ?>
                            <li><a href="<?php echo $link; ?>" class="nav-link"><?php echo $name; ?></a></li>
                        <?php endforeach; ?>
                        <li><a href="#signin" class="nav-link sign-in-btn">Sign in</a></li>
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

    <!-- Hero Section with Slideshow -->
    <section class="hero" id="home">
        <div class="slideshow-container">
            <?php foreach ($slideshow_images as $index => $image): ?>
                <div class="slide fade">
                    <img src="<?php echo $image['src']; ?>" alt="<?php echo $image['alt']; ?>">
                    <div class="slide-overlay"></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="hero-content">
            <div class="hero-badge">Sustainable Innovation</div>
            <h1 class="hero-title">
                <span class="eco">Eco</span><span class="bench">Bench</span>
            </h1>
            <p class="hero-description">
                A sustainable smart bench that combines renewable-powered device charging, seating,
                and real-time energy monitoring for the use of Polytechnic University of the Philippines –
                Institute of Technology.
            </p>
            <div class="hero-buttons">
                <a href="#dashboard" class="btn btn-primary">View Dashboard</a>
                <a href="#prototype" class="btn btn-secondary">See Prototype</a>
            </div>

            <!-- Slideshow Controls -->
            <div class="slideshow-dots" id="slideshowDots">
                <?php foreach ($slideshow_images as $index => $image): ?>
                    <button class="dot <?php echo $index === 0 ? 'active' : ''; ?>"
                        onclick="currentSlide(<?php echo $index + 1; ?>)"
                        aria-label="Go to slide <?php echo $index + 1; ?>"></button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="scroll-indicator">
            <div class="mouse">
                <div class="wheel"></div>
            </div>
            <p>Scroll to explore</p>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-header">
                <h2>Key Features</h2>
                <p>Combining sustainability with smart technology</p>
            </div>

            <div class="features-grid">
                <?php foreach ($features as $feature): ?>
                    <div class="feature-card">
                        <div class="feature-icon"><?php echo $feature['icon']; ?></div>
                        <h3><?php echo $feature['title']; ?></h3>
                        <p><?php echo $feature['description']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number" data-target="100">0</div>
                    <div class="stat-label">% Solar Powered</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-target="500">0</div>
                    <div class="stat-label">Charges Per Month</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-target="75">0</div>
                    <div class="stat-label">kWh Energy Saved</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-target="95">0</div>
                    <div class="stat-label">% Satisfaction Rate</div>
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
                        <svg class="logo-icon" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <path class="leaf1" d="M20,60 Q20,20 50,20 Q45,40 50,60 Z" />
                            <path class="leaf2" d="M50,60 Q80,30 75,10 Q60,30 50,60 Z" />
                        </svg>
                        <span class="logo-text">
                            <span class="eco">eco</span><span class="bench">bench</span>
                        </span>
                    </div>
                    <p>Powering a sustainable future, one bench at a time.</p>
                </div>

                <div class="footer-links">
                    <div class="footer-column">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="#home">Home</a></li>
                            <li><a href="#dashboard">Dashboard</a></li>
                            <li><a href="#prototype">Prototype</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4>Support</h4>
                        <ul>
                            <li><a href="#faqs">FAQs</a></li>
                            <li><a href="#contact">Contact</a></li>
                            <li><a href="#feedback">Feedback</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4>Connect</h4>
                        <ul>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Instagram</a></li>
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
    <script src="script.js"></script>
</body>

</html>