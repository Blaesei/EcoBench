<?php

include("../includes/auth.php");

// Configuration
$site_name = "EcoBench";
$site_tagline = "Sustainable Smart Bench Technology";

// Navigation items - Public pages only
$nav_items = [
    'Home' => 'index.php',
    'FAQs' => 'faqs.php',
    'About Us' => 'about.php',
    'Contact' => 'contact.php'
];

// Slideshow images (add your image paths here)
$slideshow_images = [
    ['src' => '../assets/img/slide1.png', 'alt' => 'EcoBench in campus environment'],
    ['src' => '../assets/img/slide2.png', 'alt' => 'Solar-powered charging station'],
    ['src' => '../assets/img/slide3.png', 'alt' => 'Students using EcoBench']
];

// Features data
$features = [
    [
        'icon' => '🌱',
        'title' => 'Eco-Friendly',
        'description' => 'Harnesses renewable solar energy to reduce environmental impact.',
        'color' => 'green',
        'stat' => '100%',
        'stat_label' => 'Renewable'
    ],
    [
        'icon' => '🔋',
        'title' => 'Smart Charging',
        'description' => 'Provides reliable USB charging for mobile devices on campus.',
        'color' => 'blue',
        'stat' => '5V',
        'stat_label' => 'USB Output'
    ],
    [
        'icon' => '📊',
        'title' => 'Energy Monitoring',
        'description' => 'Displays real-time power generation and energy usage data.',
        'color' => 'yellow',
        'stat' => '24/7',
        'stat_label' => 'Tracking'
    ],
    [
        'icon' => '💺',
        'title' => 'Comfortable Seating',
        'description' => 'Designed with ergonomic seating for student comfort and usability.',
        'color' => 'purple',
        'stat' => '4+',
        'stat_label' => 'Seats'
    ]
];


// Impact metrics
$impact_items = [
    ['icon' => '🌍', 'title' => 'Carbon Neutral', 'description' => 'Zero emissions operation'],
    ['icon' => '♻️', 'title' => 'Recycled Materials', 'description' => 'Sustainable construction'],
    ['icon' => '💡', 'title' => 'Smart Sensors', 'description' => 'Intelligent power management']
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../assets/css/styles.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="favicon.png">
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
                            <li><a href="<?php echo $link; ?>" class="nav-link <?php echo ($name === 'Home') ? 'active' : ''; ?>"><?php echo $name; ?></a></li>
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

        <!-- Floating particles -->
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>

        <div class="hero-content">
            <div class="hero-badge">
                <span class="badge-pulse"></span>
                Sustainable Innovation
            </div>
            <div class="hero-logo-wrapper">
                <img src="../assets/img/EcoBench Logo.png" alt="EcoBench" class="hero-logo">
            </div>
            <p class="hero-description">
                A sustainable smart bench that combines renewable-powered device charging, seating,
                and real-time energy monitoring for the use of Polytechnic University of the Philippines —
                Institute of Technology.
            </p>
            <div class="hero-buttons">
                <a href="faqs.php" class="btn btn-primary">
                    <span>Learn More</span>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M4 10H16M16 10L10 4M16 10L10 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </a>
                <a href="contact.php" class="btn btn-secondary">
                    <span>Get in Touch</span>
                </a>
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
        <div class="features-bg-decoration">
            <div class="features-circle features-circle-1"></div>
            <div class="features-circle features-circle-2"></div>
            <div class="features-circle features-circle-3"></div>
        </div>
        
        <div class="container">
            <div class="section-header">
                <span class="section-label">What We Offer</span>
                <h2>Key Features</h2>
                <p>Combining sustainability with smart technology</p>
            </div>

            <div class="features-grid">
                <?php foreach ($features as $index => $feature): ?>
                    <div class="feature-card" data-color="<?php echo $feature['color']; ?>" style="--delay: <?php echo $index * 0.1; ?>s">
                        <div class="feature-glow"></div>
                        <div class="feature-number">0<?php echo $index + 1; ?></div>
                        
                        <div class="feature-icon-wrapper">
                            <div class="feature-icon-bg"></div>
                            <div class="feature-icon"><?php echo $feature['icon']; ?></div>
                        </div>
                        
                        <div class="feature-content">
                            <h3><?php echo $feature['title']; ?></h3>
                            <p><?php echo $feature['description']; ?></p>
                        </div>
                        
                        <div class="feature-stats">
                            <div class="feature-stat-value"><?php echo $feature['stat']; ?></div>
                            <div class="feature-stat-label"><?php echo $feature['stat_label']; ?></div>
                        </div>
                        
                        <div class="feature-hover-line"></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Additional Feature Highlights -->
            <div class="feature-highlights">
                <div class="highlight-card">
                    <div class="highlight-icon">⚡</div>
                    <div class="highlight-text">
                        <strong>Fast Charging</strong>
                        <span>Quick power delivery</span>
                    </div>
                </div>
                <div class="highlight-card">
                    <div class="highlight-icon">🔒</div>
                    <div class="highlight-text">
                        <strong>Secure Design</strong>
                        <span>Anti-theft protection</span>
                    </div>
                </div>
                <div class="highlight-card">
                    <div class="highlight-icon">🌤️</div>
                    <div class="highlight-text">
                        <strong>Weather Resistant</strong>
                        <span>All-season durability</span>
                    </div>
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
                    <a href="contact.php" class="btn btn-primary btn-large">
                        <span>Contact Us</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M4 10H16M16 10L10 4M16 10L10 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </a>
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
                        <a href="#" aria-label="Facebook"><svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />
                            </svg></a>
                        <a href="#" aria-label="Twitter"><svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" />
                            </svg></a>
                        <a href="#" aria-label="Instagram"><svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" fill="none" stroke="#000" stroke-width="2" />
                                <circle cx="17.5" cy="6.5" r="1.5" fill="#000" />
                            </svg></a>
                    </div>
                </div>

                <div class="footer-links">
                    <div class="footer-column">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="faqs.php">FAQs</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="contact.php">Contact</a></li>
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
    <script src="../assets/js/script.js"></script>
</body>

</html>