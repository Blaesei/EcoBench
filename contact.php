<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoBench - Contact Us</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .contact-page {
            padding-top: 100px;
            min-height: 100vh;
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfccb 50%, #fef9c3 100%);
        }
        
        .contact-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .contact-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .contact-header h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            color: #2d3436;
            margin-bottom: 16px;
        }
        
        .contact-header p {
            font-size: 1.25rem;
            color: #636e72;
        }
        
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 60px;
        }
        
        .contact-form-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .contact-form-card h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3436;
            margin-bottom: 32px;
        }
        
        .form-group {
            margin-bottom: 24px;
        }
        
        .form-label {
            display: block;
            font-weight: 600;
            color: #2d3436;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .form-control {
            width: 100%;
            padding: 14px 20px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #6fa83a;
            box-shadow: 0 0 0 4px rgba(111, 168, 58, 0.1);
        }
        
        textarea.form-control {
            resize: vertical;
            min-height: 150px;
        }
        
        .submit-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #6fa83a 0%, #5a8a2f 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(111, 168, 58, 0.3);
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(111, 168, 58, 0.4);
        }
        
        .contact-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }
        
        .info-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border-left: 4px solid;
            transition: all 0.3s ease;
        }
        
        .info-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        
        .info-card.green { border-color: #6fa83a; }
        .info-card.blue { border-color: #3b82f6; }
        .info-card.yellow { border-color: #f4c430; }
        .info-card.purple { border-color: #8b5cf6; }
        
        .info-card h4 {
            font-size: 1rem;
            font-weight: 700;
            color: #2d3436;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .info-card p, .info-card a {
            color: #636e72;
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 0;
        }
        
        .info-card a {
            color: #6fa83a;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .info-card a:hover {
            color: #5a8a2f;
        }
        
        .social-links {
            display: flex;
            gap: 12px;
            margin-top: 12px;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        
        .social-link.facebook { background: #3b5998; }
        .social-link.instagram { background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); }
        .social-link.twitter { background: #1DA1F2; }
        
        .map-container {
            background: white;
            border-radius: 20px;
            padding: 0;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            height: 450px;
        }
        
        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        
        .quick-info {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-bottom: 60px;
        }
        
        .quick-info-card {
            background: linear-gradient(135deg, var(--color1), var(--color2));
            border-radius: 20px;
            padding: 32px;
            color: white;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        .quick-info-card i {
            font-size: 3rem;
            margin-bottom: 16px;
            opacity: 0.9;
        }
        
        .quick-info-card h4 {
            font-size: 1.125rem;
            font-weight: 700;
            margin-bottom: 8px;
        }
        
        .quick-info-card p {
            margin-bottom: 12px;
            opacity: 0.9;
        }
        
        .quick-info-card strong {
            font-size: 1.5rem;
        }
        
        .cta-section {
            background: linear-gradient(135deg, #6fa83a 0%, #5a8a2f 100%);
            border-radius: 24px;
            padding: 48px;
            text-align: center;
            color: white;
            margin-top: 60px;
            box-shadow: 0 10px 30px rgba(111, 168, 58, 0.3);
        }
        
        .cta-section h2 {
            font-size: 2rem;
            margin-bottom: 16px;
        }
        
        .cta-section p {
            font-size: 1.125rem;
            margin-bottom: 32px;
            opacity: 0.95;
        }
        
        .cta-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .cta-btn {
            padding: 16px 32px;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .cta-btn.primary {
            background: white;
            color: #6fa83a;
        }
        
        .cta-btn.secondary {
            background: #f4c430;
            color: #2d3436;
        }
        
        .cta-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        
        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
            
            .contact-info-grid {
                grid-template-columns: 1fr;
            }
            
            .quick-info {
                grid-template-columns: 1fr;
            }
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
                        <li><a href="faqs.php" class="nav-link">FAQs</a></li>
                        <li><a href="about.php" class="nav-link">About Us</a></li>
                        <li><a href="contact.php" class="nav-link active">Contact</a></li>
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

    <!-- Contact Content -->
    <div class="contact-page">
        <div class="contact-container">
            
            <div class="contact-header">
                <h1>Get in Touch</h1>
                <p>We'd love to hear from you</p>
            </div>

            <!-- Main Contact Section -->
            <div class="contact-grid">
                
                <!-- Contact Form -->
                <div class="contact-form-card">
                    <h2>Send us a Message</h2>
                    <form id="contactForm">
                        <div class="form-group">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter your full name" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" placeholder="your.email@example.com" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Subject</label>
                            <input type="text" class="form-control" placeholder="What is this regarding?" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" placeholder="Share your thoughts, questions, or feedback..." required></textarea>
                        </div>

                        <button type="submit" class="submit-btn">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div>
                    <div class="contact-info-grid">
                        <div class="info-card green">
                            <h4>
                                <i class="fas fa-briefcase"></i>
                                Please Donate
                            </h4>
                            <a href="09398428449">Gcash: 09398428449</a>
                        </div>

                        <div class="info-card blue">
                            <h4>
                                <i class="fas fa-building"></i>
                                Email
                            </h4>
                            <a href="mailto:ecobench.studio@pup.edu.ph">ecobench.studio@pup.edu.ph</a>
                        </div>

                        <div class="info-card yellow">
                            <h4>
                                <i class="fas fa-map-marker-alt"></i>
                                Location
                            </h4>
                            <p>
                                Polytechnic University of the Philippines<br>
                                Institute of Technology<br>
                                Sta. Mesa, Manila 1016<br>
                                Philippines
                            </p>
                        </div>

                        <div class="info-card purple">
                            <h4>
                                <i class="fas fa-share-alt"></i>
                                Our Socials
                            </h4>
                            <div class="social-links">
                                <a href="#" class="social-link facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-link instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-link twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Map -->
                    <div class="map-container" style="margin-top: 24px;">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.356842735937!2d121.00849131483457!3d14.599578889796948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b7c3c5a9e905%3A0xe8d7f166c088784!2sPolytechnic%20University%20of%20the%20Philippines!5e0!3m2!1sen!2sph!4v1705892775188!5m2!1sen!2sph" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>

            </div>

            <!-- Quick Info -->


            <!-- CTA Section -->
            <div class="cta-section">
                <i class="fas fa-map-marked-alt" style="font-size: 4rem; margin-bottom: 24px; opacity: 0.9;"></i>
                <h2>Visit Our Campus</h2>
                <p>
                    Come see EcoBench in action at the Polytechnic University of the Philippines Institute of Technology. 
                    Sign in to view bench locations and access the interactive dashboard.
                </p>
                <div class="cta-buttons">
                    <a href="signin.php" class="cta-btn primary">
                        <i class="fas fa-sign-in-alt"></i> Sign In to Dashboard
                    </a>
                    <a href="faqs.php" class="cta-btn secondary">
                        <i class="fas fa-question-circle"></i> View FAQs
                    </a>
                </div>
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
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for your message! We will get back to you soon.');
            this.reset();
        });
    </script>
</body>
</html>