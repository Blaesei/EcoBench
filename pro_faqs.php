<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoBench - Frequently Asked Questions</title>
    
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
        
        .faq-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(34, 197, 94, 0.1);
            overflow: hidden;
        }
        
        .faq-question {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .faq-question:hover {
            background: rgba(34, 197, 94, 0.05);
        }
        
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
        }
        
        .faq-card.active .faq-answer {
            max-height: 500px;
        }
        
        .faq-card.active .faq-icon {
            transform: rotate(180deg);
        }
        
        .faq-icon {
            transition: transform 0.3s ease;
        }
        
        .category-badge {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
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
                <a href="#" class="nav-item active flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
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
                <a href="contact.php" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
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
            <h1 class="text-4xl font-bold bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent mb-2">Frequently Asked Questions</h1>
            <p class="text-gray-600 text-sm font-medium">Everything you need to know about EcoBench</p>
        </div>

        <!-- SEARCH BAR -->
        <div class="mb-8">
            <div class="relative max-w-2xl">
                <input type="text" id="faqSearch" placeholder="Search for answers..." 
                    class="w-full px-6 py-4 pr-12 rounded-2xl border-2 border-green-200 focus:border-green-500 focus:outline-none text-gray-700 shadow-sm">
                <i class="fas fa-search absolute right-5 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
        </div>

        <!-- CATEGORIES -->
        <div class="flex gap-3 mb-8 flex-wrap">
            <button class="category-filter px-5 py-2 rounded-full bg-green-600 text-white font-semibold text-sm shadow-md" data-category="all">
                All Questions
            </button>
            <button class="category-filter px-5 py-2 rounded-full bg-white text-gray-700 font-semibold text-sm shadow-md hover:bg-green-50 transition-colors" data-category="general">
                General
            </button>
            <button class="category-filter px-5 py-2 rounded-full bg-white text-gray-700 font-semibold text-sm shadow-md hover:bg-green-50 transition-colors" data-category="technical">
                Technical
            </button>
            <button class="category-filter px-5 py-2 rounded-full bg-white text-gray-700 font-semibold text-sm shadow-md hover:bg-green-50 transition-colors" data-category="charging">
                Charging
            </button>
            <button class="category-filter px-5 py-2 rounded-full bg-white text-gray-700 font-semibold text-sm shadow-md hover:bg-green-50 transition-colors" data-category="maintenance">
                Maintenance
            </button>
        </div>

        <!-- FAQ ITEMS -->
        <div class="space-y-4" id="faqContainer">
            
            <!-- General Questions -->
            <div class="faq-card" data-category="general">
                <div class="faq-question p-6 flex justify-between items-start gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="category-badge">General</span>
                            <h3 class="text-lg font-bold text-gray-800">What is EcoBench?</h3>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 mt-4 leading-relaxed">
                                EcoBench is a sustainable smart bench designed specifically for the Polytechnic University of the Philippines Institute of Technology. It provides phone charging in public spaces using renewable and human-powered energy sources. The bench combines solar panels for harnessing solar energy with a manual hand-crank system as an alternative power source during low sunlight conditions.
                            </p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-down text-green-600 faq-icon text-xl"></i>
                </div>
            </div>

            <div class="faq-card" data-category="general">
                <div class="faq-question p-6 flex justify-between items-start gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="category-badge">General</span>
                            <h3 class="text-lg font-bold text-gray-800">Where are EcoBenches located?</h3>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 mt-4 leading-relaxed">
                                EcoBenches are strategically placed throughout the Polytechnic University of the Philippines Institute of Technology campus. You can view all bench locations through our web-based management system, which provides real-time information about each bench's location and availability.
                            </p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-down text-green-600 faq-icon text-xl"></i>
                </div>
            </div>

            <div class="faq-card" data-category="general">
                <div class="faq-question p-6 flex justify-between items-start gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="category-badge">General</span>
                            <h3 class="text-lg font-bold text-gray-800">Is EcoBench free to use?</h3>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 mt-4 leading-relaxed">
                                Yes! EcoBench is completely free for all students, faculty, and visitors of PUP Institute of Technology. Our mission is to provide accessible, sustainable charging solutions to the campus community.
                            </p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-down text-green-600 faq-icon text-xl"></i>
                </div>
            </div>

            <!-- Charging Questions -->
            <div class="faq-card" data-category="charging">
                <div class="faq-question p-6 flex justify-between items-start gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="category-badge" style="background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);">Charging</span>
                            <h3 class="text-lg font-bold text-gray-800">How many devices can charge simultaneously?</h3>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 mt-4 leading-relaxed">
                                Each EcoBench features two USB charging ports located on both ends of the bench, allowing two users to charge their devices simultaneously. This design improves accessibility and convenience for multiple users.
                            </p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-down text-green-600 faq-icon text-xl"></i>
                </div>
            </div>

            <div class="faq-card" data-category="charging">
                <div class="faq-question p-6 flex justify-between items-start gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="category-badge" style="background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);">Charging</span>
                            <h3 class="text-lg font-bold text-gray-800">What devices are compatible with EcoBench?</h3>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 mt-4 leading-relaxed">
                                EcoBench supports any device that can charge via USB. This includes smartphones, tablets, portable batteries, and other USB-compatible devices. You'll need to bring your own USB charging cable.
                            </p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-down text-green-600 faq-icon text-xl"></i>
                </div>
            </div>

            <div class="faq-card" data-category="charging">
                <div class="faq-question p-6 flex justify-between items-start gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="category-badge" style="background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);">Charging</span>
                            <h3 class="text-lg font-bold text-gray-800">How fast does EcoBench charge devices?</h3>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 mt-4 leading-relaxed">
                                Charging speed depends on the current power source. Solar charging provides consistent power during daylight hours, comparable to standard wall chargers. Manual hand-crank charging is slower but provides emergency power when needed.
                            </p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-down text-green-600 faq-icon text-xl"></i>
                </div>
            </div>

            <!-- Technical Questions -->
            <div class="faq-card" data-category="technical">
                <div class="faq-question p-6 flex justify-between items-start gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="category-badge" style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);">Technical</span>
                            <h3 class="text-lg font-bold text-gray-800">How does the solar panel system work?</h3>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 mt-4 leading-relaxed">
                                EcoBench uses integrated solar panels to convert sunlight into electrical energy. This energy is stored in batteries and can be used to charge devices even during cloudy conditions or at night, ensuring reliable power availability throughout the day.
                            </p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-down text-green-600 faq-icon text-xl"></i>
                </div>
            </div>

            <div class="faq-card" data-category="technical">
                <div class="faq-question p-6 flex justify-between items-start gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="category-badge" style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);">Technical</span>
                            <h3 class="text-lg font-bold text-gray-800">What is the manual hand-crank system?</h3>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 mt-4 leading-relaxed">
                                The manual hand-crank is an alternative power source that converts human kinetic energy into electrical energy. During low sunlight conditions or emergencies, users can manually generate power by turning the crank, ensuring charging capability is always available.
                            </p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-down text-green-600 faq-icon text-xl"></i>
                </div>
            </div>

            <div class="faq-card" data-category="technical">
                <div class="faq-question p-6 flex justify-between items-start gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="category-badge" style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);">Technical</span>
                            <h3 class="text-lg font-bold text-gray-800">How can I monitor EcoBench status?</h3>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 mt-4 leading-relaxed">
                                The EcoBench management website provides real-time monitoring of all benches. You can view battery levels, power source status (solar or hand-crank), charging port availability, and maintenance information. The system demonstrates full CRUD functionality for managing bench data.
                            </p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-down text-green-600 faq-icon text-xl"></i>
                </div>
            </div>

            <!-- Maintenance Questions -->
            <div class="faq-card" data-category="maintenance">
                <div class="faq-question p-6 flex justify-between items-start gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="category-badge" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">Maintenance</span>
                            <h3 class="text-lg font-bold text-gray-800">How do I report a malfunctioning bench?</h3>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 mt-4 leading-relaxed">
                                If you encounter a malfunctioning EcoBench, please report it through our website's contact page or notify the campus facilities management. Include the bench location and a description of the issue. Our maintenance team will address it promptly.
                            </p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-down text-green-600 faq-icon text-xl"></i>
                </div>
            </div>

            <div class="faq-card" data-category="maintenance">
                <div class="faq-question p-6 flex justify-between items-start gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="category-badge" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">Maintenance</span>
                            <h3 class="text-lg font-bold text-gray-800">How often are the benches maintained?</h3>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 mt-4 leading-relaxed">
                                EcoBenches undergo regular maintenance checks to ensure optimal performance. Solar panels are cleaned periodically, batteries are tested, and all charging ports are inspected. Maintenance schedules and status can be viewed through the management system.
                            </p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-down text-green-600 faq-icon text-xl"></i>
                </div>
            </div>

            <div class="faq-card" data-category="maintenance">
                <div class="faq-question p-6 flex justify-between items-start gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="category-badge" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">Maintenance</span>
                            <h3 class="text-lg font-bold text-gray-800">Is the bench weather-resistant?</h3>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 mt-4 leading-relaxed">
                                Yes, EcoBench is designed with weather-resistant materials to withstand outdoor conditions. The electronic components are protected from rain and humidity, while the solar panels are durable and built to last through various weather conditions.
                            </p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-down text-green-600 faq-icon text-xl"></i>
                </div>
            </div>

        </div>

        <!-- STILL HAVE QUESTIONS -->
        <div class="mt-12 bg-gradient-to-br from-green-600 to-green-700 rounded-3xl p-8 md:p-12 text-white text-center shadow-xl">
            <div class="max-w-2xl mx-auto">
                <i class="fas fa-question-circle text-6xl mb-6 opacity-90"></i>
                <h2 class="text-3xl font-bold mb-4">Still have questions?</h2>
                <p class="text-lg mb-8 text-green-50">
                    Can't find the answer you're looking for? Our team is here to help you.
                </p>
                <a href="contact.php" class="inline-block px-8 py-4 bg-white text-green-700 font-bold rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                    Contact Us
                </a>
            </div>
        </div>

    </main>

</div>

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
            btn.classList.remove('bg-green-600', 'text-white');
            btn.classList.add('bg-white', 'text-gray-700');
        });
        button.classList.remove('bg-white', 'text-gray-700');
        button.classList.add('bg-green-600', 'text-white');
        
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