<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoBench - Contact Us</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfccb 50%, #fef9c3 100%);
        }
        
        .sidebar {
            background: linear-gradient(180deg, #166534 0%, #15803d 100%);
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
        }
        
        .nav-item {
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
            color: rgba(255, 255, 255, 0.7);
        }
        
        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left-color: #fbbf24;
            color: white;
        }
        
        .nav-item.active {
            background: rgba(251, 191, 36, 0.2);
            border-left-color: #fbbf24;
            color: white;
        }
        
        .contact-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 32px;
            transition: all 0.3s ease;
            border: 2px solid rgba(34, 197, 94, 0.1);
        }
        
        .contact-card:hover {
            box-shadow: 0 15px 40px rgba(34, 197, 94, 0.15);
            transform: translateY(-4px);
        }
        
        .form-control {
            width: 100%;
            padding: 14px 20px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #22c55e;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1);
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #374151;
            font-size: 14px;
        }
        
        textarea.form-control {
            resize: vertical;
            min-height: 150px;
        }
        
        .submit-btn {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
            padding: 14px 40px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(34, 197, 94, 0.4);
        }
        
        .info-badge {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 700;
            display: inline-block;
        }
        
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .map-container {
            width: 100%;
            height: 450px;
            border-radius: 16px;
            overflow: hidden;
            border: 3px solid #e5e7eb;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
            border-radius: 12px;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .social-link:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(34, 197, 94, 0.4);
        }
    </style>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#22c55e',
                        secondary: '#fbbf24',
                    }
                }
            }
        }
    </script>
</head>
<body class="text-gray-800">

<div class="flex min-h-screen">
    
    <!-- SIDEBAR -->
    <aside class="sidebar w-64 fixed h-full left-0 top-0 z-50 hidden lg:block">
        <div class="p-6">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-12 h-12 bg-yellow-400 rounded-2xl flex items-center justify-center shadow-lg float-animation">
                    <i class="fas fa-leaf text-green-700 text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white">EcoBench</h1>
                    <span class="text-xs text-yellow-300 font-semibold tracking-wide">SMART ENERGY</span>
                </div>
            </div>
            
            <nav class="space-y-2">
                <a href="index.php" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-home w-5"></i>
                    <span>Home</span>
                </a>
                <a href="faqs.php" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-question-circle w-5"></i>
                    <span>FAQs</span>
                </a>
                <a href="dashboard.php" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-chart-line w-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="prototype.php" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-cube w-5"></i>
                    <span>Prototype</span>
                </a>
                <a href="#" class="nav-item active flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-envelope w-5"></i>
                    <span>Contact</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 lg:ml-64 p-6 md:p-8">
        
        <!-- HEADER -->
        <div class="mb-8">
            <div class="flex items-center gap-3 mb-3">
                <span class="info-badge">
                    <i class="fas fa-comments mr-2"></i>GET IN TOUCH
                </span>
            </div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent mb-2">
                <span class="block text-primary text-2xl mb-2">Say hello to us</span>
                <span class="block text-gray-800">We'd love to hear from you</span>
            </h1>
        </div>

        <!-- MAIN CONTACT SECTION -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            
            <!-- CONTACT FORM -->
            <div class="contact-card">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    Let's <span class="text-green-600">begin!</span>
                </h2>

                <form class="space-y-5" id="contactForm">
                    
                    <div>
                        <label for="fullName" class="form-label">Full name</label>
                        <input type="text" id="fullName" name="fullName" class="form-control" placeholder="Enter your full name" required>
                    </div>

                    <div>
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="your.email@example.com" required>
                    </div>

                    <div>
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="What is this regarding?" required>
                    </div>

                    <div>
                        <label for="message" class="form-label">Tell us about your inquiry</label>
                        <textarea id="message" name="message" class="form-control" placeholder="Share your thoughts, questions, or feedback..." required></textarea>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane mr-2"></i> Send Message
                    </button>

                </form>
            </div>

            <!-- CONTACT INFORMATION -->
            <div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    
                    <!-- New Business -->
                    <div class="contact-card border-l-4 border-green-600">
                        <h6 class="font-bold text-gray-800 mb-3 flex items-center gap-2">
                            <i class="fas fa-briefcase text-green-600"></i>
                            Please Donate
                        </h6>
                        <a href="09398428449" class="text-green-600 hover:text-green-700 font-semibold flex items-center gap-2 group">
                            Gcash: 09398428449
                            <i class="fas fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>

                    <!-- Main Studio -->
                    <div class="contact-card border-l-4 border-blue-600">
                        <h6 class="font-bold text-gray-800 mb-3 flex items-center gap-2">
                            <i class="fas fa-building text-blue-600"></i>
                            Email
                        </h6>
                        <a href="mailto:ecobench.studio@pup.edu.ph" class="text-blue-600 hover:text-blue-700 font-semibold flex items-center gap-2 group">
                            ecobench.studio@pup.edu.ph
                            <i class="fas fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>

                    <!-- Locatsyon -->
                    <div class="contact-card border-l-4 border-yellow-600">
                        <h6 class="font-bold text-gray-800 mb-3 flex items-center gap-2">
                            <i class="fas fa-map-marker-alt text-yellow-600"></i>
                            Location
                        </h6>
                        <p class="text-gray-600 font-medium">
                            Polytechnic University of the Philippines<br>
                            Institute of Technology<br>
                            Sta. Mesa, Manila 1016<br>
                            Philippines
                        </p>
                    </div>

                    <!-- Our Socials -->
                    <div class="contact-card border-l-4 border-purple-600">
                        <h6 class="font-bold text-gray-800 mb-3 flex items-center gap-2">
                            <i class="fas fa-share-alt text-purple-600"></i>
                            Our Socials
                        </h6>
                        <div class="flex gap-3">
                            <a href="https://www.facebook.com/ecobench" target="_blank" class="social-link" style="background: linear-gradient(135deg, #3b5998, #2d4373);">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/ecobench_official/" target="_blank" class="social-link" style="background: linear-gradient(135deg, #E1306C, #C13584);">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://twitter.com/ecobench" target="_blank" class="social-link" style="background: linear-gradient(135deg, #1DA1F2, #0d8bd9);">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>

                </div>

                <!-- MAP -->
                <div class="contact-card p-0 overflow-hidden">
                    <div class="map-container">
                        <!-- Google Maps Embed for PUP Sta. Mesa Manila -->
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.356842735937!2d121.00849131483457!3d14.599578889796948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b7c3c5a9e905%3A0xe8d7f166c088784!2sPolytechnic%20University%20of%20the%20Philippines!5e0!3m2!1sen!2sph!4v1705892775188!5m2!1sen!2sph" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

        </div>



        <!-- VISIT US -->
        <div class="bg-white rounded-3xl shadow-xl p-12 text-center border-4 border-green-200">
            <div class="max-w-3xl mx-auto">
                <i class="fas fa-map-marked-alt text-6xl text-green-600 mb-6"></i>
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Visit Our Campus</h2>
                <p class="text-lg text-gray-600 mb-8">
                    Come see EcoBench in action at the Polytechnic University of the Philippines Institute of Technology. Our sustainable smart benches are located throughout the campus, providing free charging to all students and visitors.
                </p>
                <div class="flex gap-4 justify-center flex-wrap">
                    <a href="prototype.php" class="inline-block px-8 py-4 bg-gradient-to-r from-green-600 to-green-700 text-white font-bold rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                        <i class="fas fa-cube mr-2"></i>View Prototype
                    </a>
                    <a href="dashboard.php" class="inline-block px-8 py-4 bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 font-bold rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                        <i class="fas fa-chart-line mr-2"></i>View Dashboard
                    </a>
                </div>
            </div>
        </div>

    </main>

</div>

<script>
// Form submission handler
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Get form values
    const formData = {
        fullName: document.getElementById('fullName').value,
        email: document.getElementById('email').value,
        subject: document.getElementById('subject').value,
        message: document.getElementById('message').value
    };
    
    // Show success message
    alert('Thank you for your message! We will get back to you soon.');
    
    // Reset form
    this.reset();
    
    // Here you would typically send the data to your backend
    console.log('Form submitted:', formData);
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
</script>

</body>
</html>