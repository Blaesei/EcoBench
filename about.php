<?php
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

// Team members data
$team_members = [
    [
        'name' => 'Team Member 1',
        'role' => 'Project Lead & Hardware Engineer',
        'image' => 'img/team/member1.jpg',
        'bio' => 'Passionate about sustainable technology and renewable energy solutions. Leading the hardware development and system integration.',
        'expertise' => ['Solar Systems', 'Circuit Design', 'Project Management'],
        'social' => [
            'facebook' => '#',
            'linkedin' => '#',
            'github' => '#'
        ],
        'color' => 'green',
        'quote' => '"Innovation is turning ideas into sustainable reality."'
    ],
    [
        'name' => 'Team Member 2',
        'role' => 'Software Developer & UI/UX Designer',
        'image' => 'img/team/member2.jpg',
        'bio' => 'Specializing in creating intuitive interfaces and robust web applications for monitoring and control systems.',
        'expertise' => ['Web Development', 'UI/UX Design', 'Dashboard Systems'],
        'social' => [
            'facebook' => '#',
            'linkedin' => '#',
            'github' => '#'
        ],
        'color' => 'blue',
        'quote' => '"Design is not just what it looks like, it\'s how it works."'
    ],
    [
        'name' => 'Team Member 3',
        'role' => 'Electrical Engineer & Data Analyst',
        'image' => 'img/team/member3.jpg',
        'bio' => 'Expert in power management systems and energy monitoring. Analyzing data to optimize bench performance.',
        'expertise' => ['Power Systems', 'Data Analysis', 'IoT Integration'],
        'social' => [
            'facebook' => '#',
            'linkedin' => '#',
            'github' => '#'
        ],
        'color' => 'yellow',
        'quote' => '"Data drives decisions, efficiency drives change."'
    ],
    [
        'name' => 'Team Member 4',
        'role' => 'Mechanical Designer & Fabrication Specialist',
        'image' => 'img/team/member4.jpg',
        'bio' => 'Designing ergonomic and durable bench structures that withstand outdoor conditions while maintaining aesthetics.',
        'expertise' => ['CAD Design', 'Material Selection', 'Fabrication'],
        'social' => [
            'facebook' => '#',
            'linkedin' => '#',
            'github' => '#'
        ],
        'color' => 'purple',
        'quote' => '"Form follows function, but both embrace sustainability."'
    ],
    [
        'name' => 'Team Member 5',
        'role' => 'Sustainability Coordinator & Researcher',
        'image' => 'img/team/member5.jpg',
        'bio' => 'Ensuring our project meets environmental standards and researching innovative sustainable practices.',
        'expertise' => ['Environmental Impact', 'Research', 'Sustainability'],
        'social' => [
            'facebook' => '#',
            'linkedin' => '#',
            'github' => '#'
        ],
        'color' => 'teal',
        'quote' => '"The future is green, and it starts today."'
    ]
];

// Project stats
$project_stats = [
    ['icon' => '🎓', 'number' => '5', 'label' => 'Team Members', 'description' => 'Dedicated innovators'],
    ['icon' => '⚡', 'number' => '100%', 'label' => 'Solar Powered', 'description' => 'Clean energy'],
    ['icon' => '🌱', 'number' => '0', 'label' => 'Carbon Emissions', 'description' => 'Zero footprint'],
    ['icon' => '💡', 'number' => '1', 'label' => 'Innovative Solution', 'description' => 'Smart & sustainable']
];

// Timeline/milestones
$milestones = [
    [
        'year' => '2024',
        'month' => 'Jan',
        'title' => 'Project Inception',
        'description' => 'Team formed and initial concept developed. Brainstorming sessions led to the EcoBench vision.',
        'icon' => '🚀',
        'color' => 'green'
    ],
    [
        'year' => '2024',
        'month' => 'Mar',
        'title' => 'Prototype Design',
        'description' => 'Engineering designs and CAD models completed. First blueprints approved.',
        'icon' => '📐',
        'color' => 'blue'
    ],
    [
        'year' => '2025',
        'month' => 'Jan',
        'title' => 'Development Phase',
        'description' => 'Building and testing the first prototype. Hardware and software integration ongoing.',
        'icon' => '⚙️',
        'color' => 'yellow'
    ],
    [
        'year' => '2025',
        'month' => 'Jun',
        'title' => 'Campus Deployment',
        'description' => 'Installation at PUP Institute of Technology. Making sustainability accessible to all.',
        'icon' => '🎯',
        'color' => 'purple'
    ]
];

// Core values
$core_values = [
    [
        'icon' => '🌍',
        'title' => 'Sustainability',
        'description' => 'Committed to environmental stewardship and renewable energy solutions'
    ],
    [
        'icon' => '💡',
        'title' => 'Innovation',
        'description' => 'Pushing boundaries with creative technology and smart design'
    ],
    [
        'icon' => '🤝',
        'title' => 'Collaboration',
        'description' => 'Working together to create meaningful impact for our community'
    ],
    [
        'icon' => '🎯',
        'title' => 'Excellence',
        'description' => 'Striving for the highest quality in every aspect of our project'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Meet the EcoBench team - Students creating sustainable smart bench technology for PUP Institute of Technology">
    <meta name="keywords" content="EcoBench team, sustainable technology, PUP, student project">
    <meta name="author" content="EcoBench Team">

    <title>About Us - <?php echo $site_name; ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="styles.css">

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
                    <img class="logo-icon" src="img/EcoBench Logo.png" alt="EcoBench Logo">
                </a>

                <nav class="nav-menu" id="navMenu">
                    <ul>
                        <?php foreach ($nav_items as $name => $link): ?>
                            <li><a href="<?php echo $link; ?>" class="nav-link <?php echo ($name === 'About Us') ? 'active' : ''; ?>"><?php echo $name; ?></a></li>
                        <?php endforeach; ?>
                        <li><a href="signin.php" class="nav-link sign-in-btn">Sign in</a></li>
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

    <!-- About Hero Section -->
    <section class="about-hero">
        <div class="about-hero-decoration">
            <div class="hero-circle hero-circle-1"></div>
            <div class="hero-circle hero-circle-2"></div>
            <div class="hero-circle hero-circle-3"></div>
            <div class="grid-pattern"></div>

            <!-- Floating Icons -->
            <div class="floating-elements">
                <div class="float-element" style="--x: 10%; --y: 20%; --delay: 0s;">🌱</div>
                <div class="float-element" style="--x: 85%; --y: 15%; --delay: 1s;">⚡</div>
                <div class="float-element" style="--x: 15%; --y: 70%; --delay: 2s;">💡</div>
                <div class="float-element" style="--x: 80%; --y: 75%; --delay: 3s;">🔋</div>
                <div class="float-element" style="--x: 50%; --y: 50%; --delay: 1.5s;">♻️</div>
            </div>
        </div>

        <div class="container">
            <div class="about-hero-content">
                <div class="hero-badge">
                    <span class="badge-pulse"></span>
                    Our Story
                </div>
                <h1 class="glitch-text" data-text="Meet the Team Behind EcoBench">Meet the Team Behind EcoBench</h1>
                <div class="typewriter-wrapper">
                    <p class="typewriter-text">Five passionate students united by a vision to create a greener campus</p>
                </div>
                <!-- Animated Scroll Arrow -->
                <div class="scroll-arrow-container">
                    <div class="scroll-arrow">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Banner -->
    <section class="stats-banner">
        <div class="container">
            <div class="stats-grid">
                <?php foreach ($project_stats as $index => $stat): ?>
                    <div class="stat-item" style="--delay: <?php echo $index * 0.1; ?>s;">
                        <div class="stat-icon-large"><?php echo $stat['icon']; ?></div>
                        <div class="stat-details">
                            <div class="stat-number" data-target="<?php echo $stat['number']; ?>"><?php echo $stat['number']; ?></div>
                            <div class="stat-label"><?php echo $stat['label']; ?></div>
                            <div class="stat-description"><?php echo $stat['description']; ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="mission-vision-section">
        <div class="container">
            <div class="section-header">
                <span class="section-label">What Drives Us</span>
                <h2>Mission & Vision</h2>
            </div>

            <div class="mission-vision-grid">
                <div class="mission-card" data-aos="fade-right">
                    <div class="card-corner-decoration"></div>
                    <div class="card-icon-wrapper">
                        <div class="card-icon-bg"></div>
                        <div class="card-icon">🎯</div>
                    </div>
                    <h2>Our Mission</h2>
                    <p>To revolutionize campus infrastructure by integrating renewable energy solutions that provide both functionality and sustainability. We aim to create smart benches that serve as charging stations while promoting environmental awareness.</p>
                    <div class="mission-highlights">
                        <div class="highlight-item">✓ Clean Energy Integration</div>
                        <div class="highlight-item">✓ Smart Campus Solutions</div>
                        <div class="highlight-item">✓ Environmental Advocacy</div>
                    </div>
                </div>

                <div class="mission-card" data-aos="fade-left">
                    <div class="card-corner-decoration"></div>
                    <div class="card-icon-wrapper">
                        <div class="card-icon-bg"></div>
                        <div class="card-icon">🔭</div>
                    </div>
                    <h2>Our Vision</h2>
                    <p>A future where every campus facility harnesses clean energy, reducing carbon footprints while enhancing student experience. EcoBench is our step toward making sustainability accessible and practical.</p>
                    <div class="mission-highlights">
                        <div class="highlight-item">✓ Zero-Carbon Campus</div>
                        <div class="highlight-item">✓ Enhanced Student Life</div>
                        <div class="highlight-item">✓ Accessible Sustainability</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="core-values-section">
        <div class="values-bg-pattern"></div>
        <div class="container">
            <div class="section-header">
                <span class="section-label light">Foundation</span>
                <h2 style="color: white;">Our Core Values</h2>
                <p style="color: rgba(255, 255, 255, 0.8);">The principles that guide everything we do</p>
            </div>

            <div class="values-grid">
                <?php foreach ($core_values as $index => $value): ?>
                    <div class="value-card" style="--delay: <?php echo $index * 0.15; ?>s;">
                        <div class="value-icon-wrapper">
                            <div class="value-icon"><?php echo $value['icon']; ?></div>
                        </div>
                        <h3><?php echo $value['title']; ?></h3>
                        <p><?php echo $value['description']; ?></p>
                        <div class="value-shine"></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Team Members Section -->
    <section class="team-section">
        <div class="team-bg-decoration">
            <div class="bg-circle bg-circle-1"></div>
            <div class="bg-circle bg-circle-2"></div>
            <div class="bg-dots"></div>
        </div>

        <div class="container">
            <div class="section-header">
                <span class="section-label">The Innovators</span>
                <h2>Meet Our Team</h2>
                <p>The minds behind EcoBench's sustainable technology</p>
            </div>

            <div class="team-grid">
                <?php foreach ($team_members as $index => $member): ?>
                    <div class="team-card" data-color="<?php echo $member['color']; ?>" style="--delay: <?php echo $index * 0.15; ?>s">
                        <div class="team-card-inner">
                            <!-- Front of card -->
                            <div class="team-card-front">
                                <div class="team-image-wrapper">
                                    <div class="team-image-bg"></div>
                                    <img src="<?php echo $member['image']; ?>" alt="<?php echo $member['name']; ?>" class="team-image">
                                    <div class="team-overlay">
                                        <div class="flip-hint">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span>Flip to learn more</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-info">
                                    <h3><?php echo $member['name']; ?></h3>
                                    <p class="team-role"><?php echo $member['role']; ?></p>
                                    <div class="team-quote-front"><?php echo $member['quote']; ?></div>
                                </div>
                            </div>

                            <!-- Back of card -->
                            <div class="team-card-back">
                                <div class="team-back-content">
                                    <div class="team-member-number"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></div>
                                    <h3><?php echo $member['name']; ?></h3>
                                    <p class="team-bio"><?php echo $member['bio']; ?></p>

                                    <div class="team-expertise">
                                        <h4>Expertise</h4>
                                        <div class="expertise-tags">
                                            <?php foreach ($member['expertise'] as $skill): ?>
                                                <span class="expertise-tag"><?php echo $skill; ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <div class="team-social">
                                        <?php foreach ($member['social'] as $platform => $link): ?>
                                            <a href="<?php echo $link; ?>" class="social-icon" aria-label="<?php echo ucfirst($platform); ?>">
                                                <?php if ($platform === 'facebook'): ?>
                                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />
                                                    </svg>
                                                <?php elseif ($platform === 'linkedin'): ?>
                                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z" />
                                                        <circle cx="4" cy="4" r="2" />
                                                    </svg>
                                                <?php elseif ($platform === 'github'): ?>
                                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0020 4.77 5.07 5.07 0 0019.91 1S18.73.65 16 2.48a13.38 13.38 0 00-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 005 4.77a5.44 5.44 0 00-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 009 18.13V22" />
                                                    </svg>
                                                <?php endif; ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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
                        <img class="logo-icon" src="img/EcoBench Logo.png" alt="EcoBench Logo">
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
    <script src="script.js"></script>
</body>

</html>