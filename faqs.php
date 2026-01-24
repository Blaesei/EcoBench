<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoBench - Frequently Asked Questions</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                        <li><a href="index.php" class="nav-link">Home</a></li>
                        <li><a href="faqs.php" class="nav-link active">FAQs</a></li>
                        <li><a href="about.php" class="nav-link">About Us</a></li>
                        <li><a href="contact.php" class="nav-link">Contact</a></li>
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

    <!-- FAQ Hero Section -->
    <section class="faq-hero">
        <div class="faq-hero-decoration">
            <div class="hero-circle hero-circle-1"></div>
            <div class="hero-circle hero-circle-2"></div>
            <div class="hero-circle hero-circle-3"></div>
        </div>
        
        <!-- Animated Grid Pattern -->
        <div class="grid-pattern"></div>
        
        <!-- Floating Question Marks -->
        <div class="floating-icons">
            <div class="float-icon">?</div>
            <div class="float-icon">💡</div>
            <div class="float-icon">?</div>
            <div class="float-icon">⚡</div>
            <div class="float-icon">?</div>
            <div class="float-icon">✨</div>
        </div>
        
        <div class="container">
            <div class="faq-hero-content">
                <div class="hero-badge">
                    <span class="badge-pulse"></span>
                    Help Center
                </div>
                <h1>Frequently Asked Questions</h1>
                <p>Everything you need to know about EcoBench</p>
                
                <div class="faq-search-wrapper">
                    <div class="search-icon-left">
                        <i class="fas fa-search"></i>
                    </div>
                    <input type="text" id="faqSearch" placeholder="Search for answers..." class="faq-search-input">
                    <div class="search-glow"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Categories -->
    <section class="faq-categories-section">
        <!-- Wave Decoration -->
        <div class="wave-decoration">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0 C150,100 350,0 600,50 C850,100 1050,0 1200,50 L1200,120 L0,120 Z" class="wave-path"></path>
            </svg>
        </div>
        
        <div class="container">
            <div class="faq-categories">
                <button class="category-filter active" data-category="all">
                    <span class="category-icon">🌟</span>
                    <span>All Questions</span>
                </button>
                <button class="category-filter" data-category="general">
                    <span class="category-icon">📋</span>
                    <span>General</span>
                </button>
                <button class="category-filter" data-category="technical">
                    <span class="category-icon">⚙️</span>
                    <span>Technical</span>
                </button>
                <button class="category-filter" data-category="charging">
                    <span class="category-icon">⚡</span>
                    <span>Charging</span>
                </button>
                <button class="category-filter" data-category="maintenance">
                    <span class="category-icon">🔧</span>
                    <span>Maintenance</span>
                </button>
                <button class="category-filter" data-category="dashboard">
                    <span class="category-icon">📊</span>
                    <span>Dashboard</span>
                </button>
            </div>
        </div>
    </section>

    <!-- FAQ Content -->
    <section class="faq-content-section">
        <!-- Decorative Background Elements -->
        <div class="faq-bg-elements">
            <div class="bg-circle bg-circle-1"></div>
            <div class="bg-circle bg-circle-2"></div>
            <div class="bg-circle bg-circle-3"></div>
            <div class="bg-dots"></div>
        </div>
        
        <div class="container">
            <div class="faq-list">
                
                <!-- General Questions -->
                <div class="faq-card" data-category="general">
                    <div class="faq-question">
                        <div class="faq-question-content">
                            <span class="category-badge badge-general">General</span>
                            <h3>What is EcoBench?</h3>
                        </div>
                        <div class="faq-icon-wrapper">
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="answer-content">
                            <p>EcoBench is a sustainable smart bench designed specifically for the Polytechnic University of the Philippines Institute of Technology. It provides phone charging in public spaces using renewable and human-powered energy sources. The bench combines solar panels for harnessing solar energy with a manual hand-crank system as an alternative power source during low sunlight conditions.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-card" data-category="general">
                    <div class="faq-question">
                        <div class="faq-question-content">
                            <span class="category-badge badge-general">General</span>
                            <h3>Where are EcoBenches located?</h3>
                        </div>
                        <div class="faq-icon-wrapper">
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="answer-content">
                            <p>EcoBenches are strategically placed throughout the Polytechnic University of the Philippines Institute of Technology campus. You can view all bench locations and their real-time status by signing in to our management system.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-card" data-category="general">
                    <div class="faq-question">
                        <div class="faq-question-content">
                            <span class="category-badge badge-general">General</span>
                            <h3>Is EcoBench free to use?</h3>
                        </div>
                        <div class="faq-icon-wrapper">
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="answer-content">
                            <p>Yes! EcoBench is completely free for all students, faculty, and visitors of PUP Institute of Technology. Our mission is to provide accessible, sustainable charging solutions to the campus community.</p>
                        </div>
                    </div>
                </div>

                <!-- Charging Questions -->
                <div class="faq-card" data-category="charging">
                    <div class="faq-question">
                        <div class="faq-question-content">
                            <span class="category-badge badge-charging">Charging</span>
                            <h3>How many devices can charge simultaneously?</h3>
                        </div>
                        <div class="faq-icon-wrapper">
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="answer-content">
                            <p>Each EcoBench features two USB charging ports located on both ends of the bench, allowing two users to charge their devices simultaneously. This design improves accessibility and convenience for multiple users.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-card" data-category="charging">
                    <div class="faq-question">
                        <div class="faq-question-content">
                            <span class="category-badge badge-charging">Charging</span>
                            <h3>What devices are compatible with EcoBench?</h3>
                        </div>
                        <div class="faq-icon-wrapper">
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="answer-content">
                            <p>EcoBench supports any device that can charge via USB. This includes smartphones, tablets, portable batteries, and other USB-compatible devices. You'll need to bring your own USB charging cable.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-card" data-category="charging">
                    <div class="faq-question">
                        <div class="faq-question-content">
                            <span class="category-badge badge-charging">Charging</span>
                            <h3>How fast does EcoBench charge devices?</h3>
                        </div>
                        <div class="faq-icon-wrapper">
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="answer-content">
                            <p>Charging speed depends on the current power source. Solar charging provides consistent power during daylight hours, comparable to standard wall chargers. Manual hand-crank charging is slower but provides emergency power when needed.</p>
                        </div>
                    </div>
                </div>

                <!-- Technical Questions -->
                <div class="faq-card" data-category="technical">
                    <div class="faq-question">
                        <div class="faq-question-content">
                            <span class="category-badge badge-technical">Technical</span>
                            <h3>How does the solar panel system work?</h3>
                        </div>
                        <div class="faq-icon-wrapper">
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="answer-content">
                            <p>EcoBench uses integrated solar panels to convert sunlight into electrical energy. This energy is stored in batteries and can be used to charge devices even during cloudy conditions or at night, ensuring reliable power availability throughout the day.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-card" data-category="technical">
                    <div class="faq-question">
                        <div class="faq-question-content">
                            <span class="category-badge badge-technical">Technical</span>
                            <h3>What is the manual hand-crank system?</h3>
                        </div>
                        <div class="faq-icon-wrapper">
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="answer-content">
                            <p>The manual hand-crank is an alternative power source that converts human kinetic energy into electrical energy. During low sunlight conditions or emergencies, users can manually generate power by turning the crank, ensuring charging capability is always available.</p>
                        </div>
                    </div>
                </div>

                <!-- Dashboard Questions -->
                <div class="faq-card" data-category="dashboard">
                    <div class="faq-question">
                        <div class="faq-question-content">
                            <span class="category-badge badge-dashboard">Dashboard</span>
                            <h3>What is the EcoBench Dashboard?</h3>
                        </div>
                        <div class="faq-icon-wrapper">
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="answer-content">
                            <p>The EcoBench Dashboard is an interactive management system that provides real-time monitoring of all benches. Sign in to view battery levels, power source status, charging port availability, bench locations, and more. The dashboard demonstrates full CRUD functionality for managing bench data.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-card" data-category="dashboard">
                    <div class="faq-question">
                        <div class="faq-question-content">
                            <span class="category-badge badge-dashboard">Dashboard</span>
                            <h3>How do I access the Dashboard?</h3>
                        </div>
                        <div class="faq-icon-wrapper">
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="answer-content">
                            <p>To access the full Dashboard with real-time monitoring, prototype information, and management features, you need to sign in. Click the "Sign In" button at the top of the page to create an account or log in. Once signed in, you'll have access to the complete EcoBench management system.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-card" data-category="dashboard">
                    <div class="faq-question">
                        <div class="faq-question-content">
                            <span class="category-badge badge-dashboard">Dashboard</span>
                            <h3>What can I see in the Dashboard?</h3>
                        </div>
                        <div class="faq-icon-wrapper">
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="answer-content">
                            <p>The Dashboard provides comprehensive monitoring including battery status, power generation metrics, charging port availability, energy consumption data, environmental impact statistics, and detailed prototype specifications. You can also view bench locations and receive maintenance notifications.</p>
                        </div>
                    </div>
                </div>

                <!-- Maintenance Questions -->
                <div class="faq-card" data-category="maintenance">
                    <div class="faq-question">
                        <div class="faq-question-content">
                            <span class="category-badge badge-maintenance">Maintenance</span>
                            <h3>How do I report a malfunctioning bench?</h3>
                        </div>
                        <div class="faq-icon-wrapper">
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="answer-content">
                            <p>If you encounter a malfunctioning EcoBench, please report it through our contact page or notify the campus facilities management. Include the bench location and a description of the issue. Our maintenance team will address it promptly.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-card" data-category="maintenance">
                    <div class="faq-question">
                        <div class="faq-question-content">
                            <span class="category-badge badge-maintenance">Maintenance</span>
                            <h3>How often are the benches maintained?</h3>
                        </div>
                        <div class="faq-icon-wrapper">
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="answer-content">
                            <p>EcoBenches undergo regular maintenance checks to ensure optimal performance. Solar panels are cleaned periodically, batteries are tested, and all charging ports are inspected. Maintenance schedules and status can be viewed through the management system.</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Quick Stats -->
            <div class="faq-stats">
                <div class="stat-card">
                    <div class="stat-icon">💡</div>
                    <div class="stat-number">15+</div>
                    <div class="stat-label">Questions Answered</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">⚡</div>
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Support Available</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">🎯</div>
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Satisfaction Goal</div>
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
                    <div class="cta-icon">🚀</div>
                </div>
                
                <div class="cta-badge">Get Started</div>
                <h2>Still Have Questions?</h2>
                <p>Sign in to access our interactive dashboard and explore real-time data, or reach out to our support team for personalized assistance</p>
                
                <div class="cta-features-mini">
                    <div class="cta-mini-item">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M7 10L9 12L13 8M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <span>Real-time Monitoring</span>
                    </div>
                    <div class="cta-mini-item">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M7 10L9 12L13 8M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <span>Interactive Dashboard</span>
                    </div>
                    <div class="cta-mini-item">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M7 10L9 12L13 8M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <span>Priority Support</span>
                    </div>
                </div>
                
                <div class="cta-buttons-group">
                    <a href="signin.php" class="btn btn-primary btn-large cta-btn">
                        <span>Sign In to Dashboard</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M4 10H16M16 10L10 4M16 10L10 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </a>
                    <a href="contact.php" class="btn btn-secondary btn-large">
                        <span>Contact Support</span>
                    </a>
                </div>
                
                <div class="cta-note">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M8 14C11.3137 14 14 11.3137 14 8C14 4.68629 11.3137 2 8 2C4.68629 2 2 4.68629 2 8C2 11.3137 4.68629 14 8 14Z" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M8 5V8L10 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                    No credit card required • Instant access
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

    <script src="script.js"></script>
    <script>
        // FAQ Toggle
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const card = question.closest('.faq-card');
                const wasActive = card.classList.contains('active');
                
                // Close all other FAQs
                document.querySelectorAll('.faq-card').forEach(c => {
                    c.classList.remove('active');
                });
                
                // Toggle current FAQ
                if (!wasActive) {
                    card.classList.add('active');
                }
            });
        });

        // Category Filter
        document.querySelectorAll('.category-filter').forEach(button => {
            button.addEventListener('click', () => {
                const category = button.dataset.category;
                
                // Update active button
                document.querySelectorAll('.category-filter').forEach(btn => {
                    btn.classList.remove('active');
                });
                button.classList.add('active');
                
                // Filter FAQs with animation
                document.querySelectorAll('.faq-card').forEach((card, index) => {
                    if (category === 'all' || card.dataset.category === category) {
                        setTimeout(() => {
                            card.style.display = 'block';
                            setTimeout(() => {
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0)';
                            }, 50);
                        }, index * 50);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });

        // Search Functionality
        document.getElementById('faqSearch').addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            
            document.querySelectorAll('.faq-card').forEach((card, index) => {
                const question = card.querySelector('h3').textContent.toLowerCase();
                const answer = card.querySelector('.faq-answer p').textContent.toLowerCase();
                
                if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                    setTimeout(() => {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 50);
                    }, index * 30);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
            
            // Reset category filter when searching
            if (searchTerm) {
                document.querySelectorAll('.category-filter').forEach(btn => {
                    btn.classList.remove('active');
                });
            }
        });
    </script>
</body>
</html>