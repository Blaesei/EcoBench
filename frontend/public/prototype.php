<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoBench - Prototype</title>
    
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
        
        .prototype-frame {
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            padding: 40px;
            position: relative;
            overflow: hidden;
        }
        
        .prototype-frame::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, #22c55e, #fbbf24, #22c55e);
            background-size: 200% 100%;
            animation: gradient-shift 3s ease infinite;
        }
        
        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .image-placeholder {
            width: 100%;
            aspect-ratio: 16/9;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border: 3px dashed #22c55e;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        .image-placeholder::after {
            content: 'PLACE YOUR PROTOTYPE IMAGE HERE';
            position: absolute;
            font-size: 1.5rem;
            font-weight: 700;
            color: rgba(34, 197, 94, 0.3);
            letter-spacing: 2px;
        }
        
        .feature-badge {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 700;
            display: inline-block;
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        }
        
        .spec-card {
            background: white;
            border: 2px solid #e5e7eb;
            border-radius: 16px;
            padding: 24px;
            transition: all 0.3s ease;
        }
        
        .spec-card:hover {
            border-color: #22c55e;
            box-shadow: 0 8px 24px rgba(34, 197, 94, 0.15);
            transform: translateY(-4px);
        }
        
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .glow-green {
            box-shadow: 0 0 30px rgba(34, 197, 94, 0.4);
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
                <a href="/public/index.php" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-home w-5"></i>
                    <span>Home</span>
                </a>
                <a href="/public/faqs.php" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-question-circle w-5"></i>
                    <span>FAQs</span>
                </a>
                <a href="/admin/dashboard.php" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-chart-line w-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="nav-item active flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                    <i class="fas fa-cube w-5"></i>
                    <span>Prototype</span>
                </a>
                <a href="/public/contact.php" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
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
                <span class="feature-badge">
                    <i class="fas fa-cube mr-2"></i>INNOVATION
                </span>
            </div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent mb-2">EcoBench Prototype</h1>
            <p class="text-gray-600 text-sm font-medium">Sustainable Smart Bench for PUP Institute of Technology</p>
        </div>

        <!-- MAIN PROTOTYPE SHOWCASE -->
        <div class="prototype-frame mb-12">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">Physical Prototype</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Our working prototype combines renewable energy sources with comfortable seating and modern charging capabilities
                </p>
            </div>

            <!-- IMAGE PLACEHOLDER - REPLACE WITH YOUR PROTOTYPE IMAGE -->
            <div class="image-placeholder mb-8">
                <div class="absolute inset-0 flex items-center justify-center">
                    <i class="fas fa-image text-green-300 text-8xl opacity-30"></i>
                </div>
                <!-- 
                    TO ADD YOUR IMAGE:
                    Replace the content inside this div with:
                    <img src="path/to/your/prototype-image.jpg" alt="EcoBench Prototype" class="w-full h-full object-cover rounded-xl">
                -->
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                        <i class="fas fa-solar-panel text-white text-2xl"></i>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-1">Solar Powered</h4>
                    <p class="text-sm text-gray-600">Integrated solar panels for renewable energy</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                        <i class="fas fa-cog text-white text-2xl"></i>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-1">Manual Crank</h4>
                    <p class="text-sm text-gray-600">Backup hand-crank power generation</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                        <i class="fas fa-usb text-white text-2xl"></i>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-1">Dual USB Ports</h4>
                    <p class="text-sm text-gray-600">Two charging stations on each end</p>
                </div>
            </div>
        </div>

        <!-- TECHNICAL SPECIFICATIONS -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Technical Specifications</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Power Generation -->
                <div class="spec-card">
                    <div class="flex items-center gap-3 mb-4">
                        <i class="fas fa-bolt text-green-600 text-2xl"></i>
                        <h3 class="text-xl font-bold text-gray-800">Power Generation</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Solar Panel Output:</span>
                            <span class="font-semibold">150W</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Manual Crank Output:</span>
                            <span class="font-semibold">40-50W</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Peak Generation:</span>
                            <span class="font-semibold">200W</span>
                        </div>
                    </div>
                </div>

                <!-- Battery Storage -->
                <div class="spec-card">
                    <div class="flex items-center gap-3 mb-4">
                        <i class="fas fa-battery-three-quarters text-blue-600 text-2xl"></i>
                        <h3 class="text-xl font-bold text-gray-800">Battery Storage</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Capacity:</span>
                            <span class="font-semibold">12V 100Ah</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Type:</span>
                            <span class="font-semibold">Lithium-Ion</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Runtime:</span>
                            <span class="font-semibold">6-8 hours</span>
                        </div>
                    </div>
                </div>

                <!-- Charging Capabilities -->
                <div class="spec-card">
                    <div class="flex items-center gap-3 mb-4">
                        <i class="fas fa-plug text-yellow-600 text-2xl"></i>
                        <h3 class="text-xl font-bold text-gray-800">Charging Ports</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Port Type:</span>
                            <span class="font-semibold">USB-A</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Output per Port:</span>
                            <span class="font-semibold">5V / 2.1A</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Ports:</span>
                            <span class="font-semibold">2</span>
                        </div>
                    </div>
                </div>

                <!-- Physical Dimensions -->
                <div class="spec-card">
                    <div class="flex items-center gap-3 mb-4">
                        <i class="fas fa-ruler-combined text-purple-600 text-2xl"></i>
                        <h3 class="text-xl font-bold text-gray-800">Dimensions</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Length:</span>
                            <span class="font-semibold">180 cm</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Width:</span>
                            <span class="font-semibold">60 cm</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Height:</span>
                            <span class="font-semibold">85 cm</span>
                        </div>
                    </div>
                </div>

                <!-- Materials -->
                <div class="spec-card">
                    <div class="flex items-center gap-3 mb-4">
                        <i class="fas fa-cube text-orange-600 text-2xl"></i>
                        <h3 class="text-xl font-bold text-gray-800">Materials</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Frame:</span>
                            <span class="font-semibold">Steel</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Seating:</span>
                            <span class="font-semibold">Wood/Composite</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Coating:</span>
                            <span class="font-semibold">Weather-resistant</span>
                        </div>
                    </div>
                </div>

                <!-- Environmental Impact -->
                <div class="spec-card">
                    <div class="flex items-center gap-3 mb-4">
                        <i class="fas fa-leaf text-green-600 text-2xl"></i>
                        <h3 class="text-xl font-bold text-gray-800">Sustainability</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">CO₂ Saved/Day:</span>
                            <span class="font-semibold">~2.5 kg</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Energy Source:</span>
                            <span class="font-semibold">100% Renewable</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Recyclable:</span>
                            <span class="font-semibold">85%+</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- KEY FEATURES -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Key Features</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-green-200 hover:border-green-400 transition-all">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-sun text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-2">Solar Panel Integration</h4>
                            <p class="text-gray-600">High-efficiency solar panels mounted on the backrest capture sunlight throughout the day, providing consistent renewable energy for device charging.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-yellow-200 hover:border-yellow-400 transition-all">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-hand-rock text-yellow-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-2">Manual Hand-Crank System</h4>
                            <p class="text-gray-600">Emergency backup power generation through a manual crank mechanism, ensuring charging capability even during cloudy days or power outages.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-blue-200 hover:border-blue-400 transition-all">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-users text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-2">Dual Charging Ports</h4>
                            <p class="text-gray-600">Two USB-A charging ports positioned on both ends of the bench allow multiple users to charge their devices simultaneously with convenience.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-purple-200 hover:border-purple-400 transition-all">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-couch text-purple-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-2">Ergonomic Design</h4>
                            <p class="text-gray-600">Comfortable seating with ergonomic backrest design provides a relaxing space for students while their devices charge.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-red-200 hover:border-red-400 transition-all">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-shield-alt text-red-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-2">Weather Resistant</h4>
                            <p class="text-gray-600">Durable construction with weather-resistant materials and protective coatings ensures long-lasting outdoor performance in all conditions.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-teal-200 hover:border-teal-400 transition-all">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-teal-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-chart-line text-teal-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-2">Smart Monitoring</h4>
                            <p class="text-gray-600">Integrated monitoring system tracks power generation, battery status, and charging port availability through our web-based management platform.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- CALL TO ACTION -->
        <div class="bg-gradient-to-br from-green-600 to-green-700 rounded-3xl p-12 text-white text-center shadow-2xl glow-green">
            <i class="fas fa-lightbulb text-6xl mb-6 opacity-90"></i>
            <h2 class="text-3xl font-bold mb-4">Experience Sustainable Innovation</h2>
            <p class="text-lg mb-8 text-green-50 max-w-2xl mx-auto">
                Visit our campus to see the EcoBench prototype in action and experience the future of sustainable public infrastructure.
            </p>
            <div class="flex gap-4 justify-center flex-wrap">
                <a href="/admin/dashboard.php" class="inline-block px-8 py-4 bg-white text-green-700 font-bold rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                    <i class="fas fa-chart-line mr-2"></i>View Dashboard
                </a>
                <a href="/public/contact.php" class="inline-block px-8 py-4 bg-yellow-400 text-gray-900 font-bold rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                    <i class="fas fa-envelope mr-2"></i>Contact Us
                </a>
            </div>
        </div>

    </main>

</div>

</body>
</html>