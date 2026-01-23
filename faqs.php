<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoBench - Frequently Asked Questions</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .faq-page {
            padding-top: 100px;
            min-height: 100vh;
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfccb 50%, #fef9c3 100%);
        }
        
        .faq-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .faq-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .faq-header h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            color: #2d3436;
            margin-bottom: 16px;
        }
        
        .faq-header p {
            font-size: 1.25rem;
            color: #636e72;
        }
        
        .faq-search {
            max-width: 600px;
            margin: 0 auto 50px;
            position: relative;
        }
        
        .faq-search input {
            width: 100%;
            padding: 18px 24px;
            padding-right: 50px;
            border: 2px solid #e9ecef;
            border-radius: 50px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .faq-search input:focus {
            outline: none;
            border-color: #6fa83a;
            box-shadow: 0 0 0 4px rgba(111, 168, 58, 0.1);
        }
        
        .faq-search i {
            position: absolute;
            right: 24px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        
        .faq-categories {
            display: flex;
            gap: 12px;
            margin-bottom: 40px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .category-filter {
            padding: 12px 24px;
            border: none;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
            color: #2d3436;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .category-filter:hover {
            background: #6fa83a;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(111, 168, 58, 0.3);
        }
        
        .category-filter.active {
            background: #6fa83a;
            color: white;
        }
        
        .faq-list {
            max-width: 900px;
            margin: 0 auto;
        }
        
        .faq-card {
            background: white;
            border-radius: 16px;
            margin-bottom: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .faq-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }
        
        .faq-question {
            padding: 24px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }
        
        .faq-question h3 {
            font-size: 1.125rem;
            font-weight: 600;
            color: #2d3436;
            margin: 0;
            flex: 1;
        }
        
        .faq-icon {
            color: #6fa83a;
            font-size: 1.25rem;
            transition: transform 0.3s ease;
            flex-shrink: 0;
        }
        
        .faq-card.active .faq-icon {
            transform: rotate(180deg);
        }
        
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, padding 0.4s ease;
        }
        
        .faq-card.active .faq-answer {
            max-height: 500px;
            padding: 0 24px 24px;
        }
        
        .faq-answer p {
            color: #636e72;
            line-height: 1.8;
            margin: 0;
        }
        
        .category-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .badge-general { background: #e3f2fd; color: #1976d2; }
        .badge-technical { background: #f3e5f5; color: #7b1fa2; }
        .badge-charging { background: #fff3e0; color: #f57c00; }
        .badge-maintenance { background: #e8f5e9; color: #388e3c; }
        .badge-dashboard { background: #fce4ec; color: #c2185b; }
        
        .signin-cta {
            background: linear-gradient(135deg, #6fa83a 0%, #5a8a2f 100%);
            border-radius: 20px;
            padding: 48px;
            text-align: center;
            color: white;
            margin-top: 60px;
            box-shadow: 0 10px 30px rgba(111, 168, 58, 0.3);
        }
        
        .signin-cta h2 {
            font-size: 2rem;
            margin-bottom: 16px;
        }
        
        .signin-cta p {
            font-size: 1.125rem;
            margin-bottom: 32px;
            opacity: 0.95;
        }
        
        .signin-cta .btn {
            display: inline-block;
            padding: 16px 48px;
            background: white;
            color: #6fa83a;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.125rem;
            transition: all 0.3s ease;
        }
        
        .signin-cta .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
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
                        <li><a href="about.php" class="nav-link active">About Us</a></li>
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

    <!-- FAQ Content -->
    <div class="faq-page">
        <div class="faq-container">
            
            <div class="faq-header">
                <h1>Frequently Asked Questions</h1>
                <p>Everything you need to know about EcoBench</p>
            </div>

            <div class="faq-search">
                <input type="text" id="faqSearch" placeholder="Search for answers...">
                <i class="fas fa-search"></i>
            </div>

            <div class="faq-categories">
                <button class="category-filter active" data-category="all">All Questions</button>
                <button class="category-filter" data-category="general">General</button>
                <button class="category-filter" data-category="technical">Technical</button>
                <button class="category-filter" data-category="charging">Charging</button>
                <button class="category-filter" data-category="maintenance">Maintenance</button>
                <button class="category-filter" data-category="dashboard">Dashboard</button>
            </div>

            <div class="faq-list">
                
                <!-- General Questions -->
                <div class="faq-card" data-category="general">
                    <div class="faq-question">
                        <div>
                            <span class="category-badge badge-general">General</span>
                            <h3>What is EcoBench?</h3>
                        </div>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>EcoBench is a sustainable smart bench designed specifically for the Polytechnic University of the Philippines Institute of Technology. It provides phone charging in public spaces using renewable and human-powered energy sources. The bench combines solar panels for harnessing solar energy with a manual hand-crank system as an alternative power source during low sunlight conditions.</p>
                    </div>
                </div>

                <div class="faq-card" data-category="general">
                    <div class="faq-question">
                        <div>
                            <span class="category-badge badge-general">General</span>
                            <h3>Where are EcoBenches located?</h3>
                        </div>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>EcoBenches are strategically placed throughout the Polytechnic University of the Philippines Institute of Technology campus. You can view all bench locations and their real-time status by signing in to our management system.</p>
                    </div>
                </div>

                <div class="faq-card" data-category="general">
                    <div class="faq-question">
                        <div>
                            <span class="category-badge badge-general">General</span>
                            <h3>Is EcoBench free to use?</h3>
                        </div>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! EcoBench is completely free for all students, faculty, and visitors of PUP Institute of Technology. Our mission is to provide accessible, sustainable charging solutions to the campus community.</p>
                    </div>
                </div>

                <!-- Charging Questions -->
                <div class="faq-card" data-category="charging">
                    <div class="faq-question">
                        <div>
                            <span class="category-badge badge-charging">Charging</span>
                            <h3>How many devices can charge simultaneously?</h3>
                        </div>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Each EcoBench features two USB charging ports located on both ends of the bench, allowing two users to charge their devices simultaneously. This design improves accessibility and convenience for multiple users.</p>
                    </div>
                </div>

                <div class="faq-card" data-category="charging">
                    <div class="faq-question">
                        <div>
                            <span class="category-badge badge-charging">Charging</span>
                            <h3>What devices are compatible with EcoBench?</h3>
                        </div>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>EcoBench supports any device that can charge via USB. This includes smartphones, tablets, portable batteries, and other USB-compatible devices. You'll need to bring your own USB charging cable.</p>
                    </div>
                </div>

                <div class="faq-card" data-category="charging">
                    <div class="faq-question">
                        <div>
                            <span class="category-badge badge-charging">Charging</span>
                            <h3>How fast does EcoBench charge devices?</h3>
                        </div>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Charging speed depends on the current power source. Solar charging provides consistent power during daylight hours, comparable to standard wall chargers. Manual hand-crank charging is slower but provides emergency power when needed.</p>
                    </div>
                </div>

                <!-- Technical Questions -->
                <div class="faq-card" data-category="technical">
                    <div class="faq-question">
                        <div>
                            <span class="category-badge badge-technical">Technical</span>
                            <h3>How does the solar panel system work?</h3>
                        </div>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>EcoBench uses integrated solar panels to convert sunlight into electrical energy. This energy is stored in batteries and can be used to charge devices even during cloudy conditions or at night, ensuring reliable power availability throughout the day.</p>
                    </div>
                </div>

                <div class="faq-card" data-category="technical">
                    <div class="faq-question">
                        <div>
                            <span class="category-badge badge-technical">Technical</span>
                            <h3>What is the manual hand-crank system?</h3>
                        </div>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>The manual hand-crank is an alternative power source that converts human kinetic energy into electrical energy. During low sunlight conditions or emergencies, users can manually generate power by turning the crank, ensuring charging capability is always available.</p>
                    </div>
                </div>

                <!-- Dashboard Questions -->
                <div class="faq-card" data-category="dashboard">
                    <div class="faq-question">
                        <div>
                            <span class="category-badge badge-dashboard">Dashboard</span>
                            <h3>What is the EcoBench Dashboard?</h3>
                        </div>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>The EcoBench Dashboard is an interactive management system that provides real-time monitoring of all benches. Sign in to view battery levels, power source status, charging port availability, bench locations, and more. The dashboard demonstrates full CRUD functionality for managing bench data.</p>
                    </div>
                </div>

                <div class="faq-card" data-category="dashboard">
                    <div class="faq-question">
                        <div>
                            <span class="category-badge badge-dashboard">Dashboard</span>
                            <h3>How do I access the Dashboard?</h3>
                        </div>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>To access the full Dashboard with real-time monitoring, prototype information, and management features, you need to sign in. Click the "Sign In" button at the top of the page to create an account or log in. Once signed in, you'll have access to the complete EcoBench management system.</p>
                    </div>
                </div>

                <div class="faq-card" data-category="dashboard">
                    <div class="faq-question">
                        <div>
                            <span class="category-badge badge-dashboard">Dashboard</span>
                            <h3>What can I see in the Dashboard?</h3>
                        </div>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>The Dashboard provides comprehensive monitoring including battery status, power generation metrics, charging port availability, energy consumption data, environmental impact statistics, and detailed prototype specifications. You can also view bench locations and receive maintenance notifications.</p>
                    </div>
                </div>

                <!-- Maintenance Questions -->
                <div class="faq-card" data-category="maintenance">
                    <div class="faq-question">
                        <div>
                            <span class="category-badge badge-maintenance">Maintenance</span>
                            <h3>How do I report a malfunctioning bench?</h3>
                        </div>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>If you encounter a malfunctioning EcoBench, please report it through our contact page or notify the campus facilities management. Include the bench location and a description of the issue. Our maintenance team will address it promptly.</p>
                    </div>
                </div>

                <div class="faq-card" data-category="maintenance">
                    <div class="faq-question">
                        <div>
                            <span class="category-badge badge-maintenance">Maintenance</span>
                            <h3>How often are the benches maintained?</h3>
                        </div>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>EcoBenches undergo regular maintenance checks to ensure optimal performance. Solar panels are cleaned periodically, batteries are tested, and all charging ports are inspected. Maintenance schedules and status can be viewed through the management system.</p>
                    </div>
                </div>

            </div>

            <!-- Sign In CTA -->
            <div class="signin-cta">
                <h2>Want to See Real-Time Data?</h2>
                <p>Sign in to access the interactive dashboard with live monitoring, detailed analytics, and prototype information</p>
                <a href="signin.php" class="btn">Sign In to Dashboard</a>
            </div>

        </div>
    </div>

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
                
                // Filter FAQs
                document.querySelectorAll('.faq-card').forEach(card => {
                    if (category === 'all' || card.dataset.category === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Search Functionality
        document.getElementById('faqSearch').addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            
            document.querySelectorAll('.faq-card').forEach(card => {
                const question = card.querySelector('h3').textContent.toLowerCase();
                const answer = card.querySelector('.faq-answer p').textContent.toLowerCase();
                
                if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>