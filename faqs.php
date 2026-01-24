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
    <style>
        /* ===================================
   FAQ PAGE STYLES
   =================================== */

        /* FAQ Hero Section */
        .faq-hero {
            position: relative;
            padding: 180px 0 100px;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f0f1e 100%);
            overflow: hidden;
        }

        .faq-hero-decoration {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .hero-circle {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.25;
            animation: heroFloat 25s ease-in-out infinite;
        }

        .hero-circle-1 {
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, var(--color-eco-green) 0%, transparent 70%);
            top: -200px;
            right: -200px;
            animation-delay: 0s;
        }

        .hero-circle-2 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, var(--color-bench-yellow) 0%, transparent 70%);
            bottom: -150px;
            left: -150px;
            animation-delay: 12s;
        }

        .hero-circle-3 {
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, var(--color-eco-green-light) 0%, transparent 70%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation-delay: 6s;
        }

        /* Animated Grid Pattern */
        .grid-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(rgba(111, 168, 58, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(111, 168, 58, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 20s linear infinite;
            pointer-events: none;
        }

        @keyframes gridMove {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(50px, 50px);
            }
        }

        /* Floating Question Marks and Icons */
        .floating-icons {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .float-icon {
            position: absolute;
            font-size: 2.5rem;
            font-weight: 900;
            color: rgba(111, 168, 58, 0.15);
            animation: floatUpDown 15s ease-in-out infinite;
            font-family: 'Space Grotesk', sans-serif;
        }

        .float-icon:nth-child(1) {
            top: 15%;
            left: 10%;
            animation-delay: 0s;
            animation-duration: 12s;
        }

        .float-icon:nth-child(2) {
            top: 25%;
            right: 15%;
            animation-delay: 2s;
            animation-duration: 14s;
            font-size: 2rem;
        }

        .float-icon:nth-child(3) {
            top: 60%;
            left: 20%;
            animation-delay: 4s;
            animation-duration: 16s;
        }

        .float-icon:nth-child(4) {
            bottom: 20%;
            right: 25%;
            animation-delay: 6s;
            animation-duration: 13s;
            font-size: 1.8rem;
        }

        .float-icon:nth-child(5) {
            top: 40%;
            left: 70%;
            animation-delay: 3s;
            animation-duration: 15s;
        }

        .float-icon:nth-child(6) {
            bottom: 30%;
            left: 50%;
            animation-delay: 5s;
            animation-duration: 17s;
            font-size: 2.2rem;
        }

        @keyframes floatUpDown {

            0%,
            100% {
                transform: translateY(0) rotate(0deg) scale(1);
                opacity: 0.15;
            }

            25% {
                transform: translateY(-30px) rotate(5deg) scale(1.1);
                opacity: 0.25;
            }

            50% {
                transform: translateY(-60px) rotate(-5deg) scale(1);
                opacity: 0.15;
            }

            75% {
                transform: translateY(-30px) rotate(3deg) scale(0.9);
                opacity: 0.2;
            }
        }

        @keyframes heroFloat {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            33% {
                transform: translate(50px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-30px, 30px) scale(0.9);
            }
        }

        .faq-hero-content {
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .faq-hero-content .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-sm);
            padding: var(--spacing-xs) var(--spacing-lg);
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-full);
            color: var(--color-white);
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: var(--spacing-lg);
        }

        .faq-hero-content h1 {
            font-size: clamp(3rem, 7vw, 5rem);
            font-weight: 900;
            color: var(--color-white);
            margin-bottom: var(--spacing-md);
            font-family: 'Space Grotesk', sans-serif;
            line-height: 1.1;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .faq-hero-content>p {
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: var(--spacing-xxl);
            font-weight: 400;
        }

        /* Enhanced Search Wrapper */
        .faq-search-wrapper {
            position: relative;
            max-width: 700px;
            margin: 0 auto;
        }

        .search-icon-left {
            position: absolute;
            left: 30px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--color-gray);
            font-size: 1.25rem;
            z-index: 2;
            transition: color var(--transition-normal);
        }

        .faq-search-input {
            width: 100%;
            padding: 24px 30px 24px 70px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-full);
            font-size: 1.125rem;
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            color: var(--color-white);
            transition: all var(--transition-normal);
            position: relative;
            z-index: 1;
        }

        .faq-search-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .faq-search-input:focus {
            outline: none;
            border-color: var(--color-eco-green);
            background-color: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 4px rgba(111, 168, 58, 0.2);
        }

        .faq-search-input:focus~.search-glow {
            opacity: 1;
        }

        .faq-search-input:focus+.search-icon-left {
            color: var(--color-eco-green);
        }

        .search-glow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: var(--radius-full);
            background: linear-gradient(135deg, rgba(111, 168, 58, 0.3), rgba(244, 196, 48, 0.3));
            filter: blur(20px);
            opacity: 0;
            transition: opacity var(--transition-normal);
            pointer-events: none;
            z-index: 0;
        }

        /* FAQ Categories Section */
        .faq-categories-section {
            background: linear-gradient(180deg, var(--color-white) 0%, #f0f9ff 100%);
            padding: var(--spacing-xxl) 0;
            position: relative;
            overflow: hidden;
        }

        /* Wave Decoration */
        .wave-decoration {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 80px;
            overflow: hidden;
            line-height: 0;
            transform: translateY(-1px);
        }

        .wave-decoration svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 80px;
        }

        .wave-path {
            fill: #1a1a2e;
            animation: waveAnimation 8s ease-in-out infinite;
        }

        @keyframes waveAnimation {

            0%,
            100% {
                d: path("M0,0 C150,100 350,0 600,50 C850,100 1050,0 1200,50 L1200,120 L0,120 Z");
            }

            50% {
                d: path("M0,30 C150,0 350,100 600,30 C850,0 1050,100 1200,40 L1200,120 L0,120 Z");
            }
        }

        .faq-categories {
            display: flex;
            gap: var(--spacing-md);
            flex-wrap: wrap;
            justify-content: center;
        }

        .category-filter {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-xs);
            padding: var(--spacing-md) var(--spacing-lg);
            border: 2px solid var(--color-light-gray);
            border-radius: var(--radius-full);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition-normal);
            background: var(--color-white);
            color: var(--color-text);
            box-shadow: var(--shadow-sm);
            position: relative;
            overflow: hidden;
        }

        .category-filter::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--color-eco-green), var(--color-eco-green-light));
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
            z-index: 0;
        }

        .category-filter:hover::before,
        .category-filter.active::before {
            width: 400px;
            height: 400px;
        }

        .category-filter:hover,
        .category-filter.active {
            color: var(--color-white);
            border-color: var(--color-eco-green);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(111, 168, 58, 0.3);
        }

        .category-icon,
        .category-filter span {
            position: relative;
            z-index: 1;
        }

        .category-icon {
            font-size: 1.25rem;
            transition: transform var(--transition-normal);
        }

        .category-filter:hover .category-icon,
        .category-filter.active .category-icon {
            transform: scale(1.2) rotate(10deg);
        }

        /* FAQ Content Section */
        .faq-content-section {
            padding: var(--spacing-xxl) 0;
            background: linear-gradient(180deg, #f0f9ff 0%, var(--color-off-white) 50%, #fffef7 100%);
            position: relative;
            overflow: hidden;
        }

        /* Decorative Background Elements */
        .faq-bg-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
            z-index: 0;
        }

        .bg-circle {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(111, 168, 58, 0.08) 0%, transparent 70%);
            animation: bgCircleFloat 30s ease-in-out infinite;
        }

        .bg-circle-1 {
            width: 500px;
            height: 500px;
            top: 10%;
            right: -100px;
            animation-delay: 0s;
        }

        .bg-circle-2 {
            width: 400px;
            height: 400px;
            bottom: 20%;
            left: -80px;
            background: radial-gradient(circle, rgba(244, 196, 48, 0.08) 0%, transparent 70%);
            animation-delay: 10s;
        }

        .bg-circle-3 {
            width: 350px;
            height: 350px;
            top: 50%;
            left: 60%;
            background: radial-gradient(circle, rgba(139, 195, 74, 0.06) 0%, transparent 70%);
            animation-delay: 5s;
        }

        @keyframes bgCircleFloat {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
                opacity: 1;
            }

            33% {
                transform: translate(40px, -40px) scale(1.15);
                opacity: 0.8;
            }

            66% {
                transform: translate(-30px, 30px) scale(0.9);
                opacity: 0.6;
            }
        }

        /* Animated Dots Pattern */
        .bg-dots {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(circle, rgba(111, 168, 58, 0.08) 2px, transparent 2px);
            background-size: 40px 40px;
            animation: dotsPulse 4s ease-in-out infinite;
        }

        @keyframes dotsPulse {

            0%,
            100% {
                opacity: 0.3;
            }

            50% {
                opacity: 0.6;
            }
        }

        .faq-list {
            max-width: 1000px;
            margin: 0 auto var(--spacing-xxl);
            position: relative;
            z-index: 1;
        }

        .faq-card {
            background: var(--color-white);
            border-radius: var(--radius-xl);
            margin-bottom: var(--spacing-lg);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            transition: all var(--transition-normal);
            border: 2px solid transparent;
            opacity: 1;
            transform: translateY(0);
        }

        .faq-card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-5px);
            border-color: var(--color-eco-green-light);
        }

        .faq-question {
            padding: var(--spacing-xl);
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: var(--spacing-lg);
            position: relative;
            overflow: hidden;
        }

        .faq-question::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(111, 168, 58, 0.05), transparent);
            transition: left 0.6s ease;
        }

        .faq-card:hover .faq-question::before {
            left: 100%;
        }

        .faq-question-content {
            flex: 1;
        }

        .category-badge {
            display: inline-block;
            padding: 6px 16px;
            border-radius: var(--radius-full);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: var(--spacing-sm);
        }

        .badge-general {
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            color: #1976d2;
        }

        .badge-technical {
            background: linear-gradient(135deg, #f3e5f5, #e1bee7);
            color: #7b1fa2;
        }

        .badge-charging {
            background: linear-gradient(135deg, #fff3e0, #ffe0b2);
            color: #f57c00;
        }

        .badge-maintenance {
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            color: #388e3c;
        }

        .badge-dashboard {
            background: linear-gradient(135deg, #fce4ec, #f8bbd0);
            color: #c2185b;
        }

        .faq-question h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--color-text);
            margin: 0;
            line-height: 1.4;
            font-family: 'Space Grotesk', sans-serif;
            transition: color var(--transition-normal);
        }

        .faq-card:hover .faq-question h3 {
            color: var(--color-eco-green);
        }

        .faq-icon-wrapper {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(111, 168, 58, 0.1), rgba(244, 196, 48, 0.1));
            border-radius: var(--radius-md);
            flex-shrink: 0;
            transition: all var(--transition-normal);
        }

        .faq-card:hover .faq-icon-wrapper {
            background: linear-gradient(135deg, rgba(111, 168, 58, 0.2), rgba(244, 196, 48, 0.2));
            transform: rotate(10deg);
        }

        .faq-icon {
            color: var(--color-eco-green);
            font-size: 1.25rem;
            transition: transform var(--transition-normal);
        }

        .faq-card.active .faq-icon {
            transform: rotate(180deg);
        }

        .faq-card.active .faq-icon-wrapper {
            background: linear-gradient(135deg, var(--color-eco-green), var(--color-eco-green-light));
        }

        .faq-card.active .faq-icon {
            color: var(--color-white);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s cubic-bezier(0.4, 0, 0.2, 1),
                padding 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .faq-card.active .faq-answer {
            max-height: 800px;
            padding: 0 var(--spacing-xl) var(--spacing-xl);
        }

        .answer-content {
            padding: var(--spacing-lg);
            background: linear-gradient(135deg, rgba(111, 168, 58, 0.03), rgba(244, 196, 48, 0.03));
            border-radius: var(--radius-md);
            border-left: 4px solid var(--color-eco-green);
        }

        .answer-content p {
            color: var(--color-text-light);
            line-height: 1.8;
            margin: 0;
            font-size: 1.0625rem;
        }

        /* FAQ Stats */
        .faq-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: var(--spacing-xl);
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .stat-card {
            background: var(--color-white);
            border-radius: var(--radius-xl);
            padding: var(--spacing-xl);
            text-align: center;
            box-shadow: var(--shadow-md);
            transition: all var(--transition-normal);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(111, 168, 58, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .stat-card:hover::before {
            left: 100%;
        }

        .stat-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: var(--shadow-xl);
            border-color: var(--color-eco-green);
        }

        .stat-icon {
            font-size: 3rem;
            margin-bottom: var(--spacing-md);
            display: inline-block;
            transition: transform var(--transition-normal);
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.2) rotate(10deg);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 900;
            font-family: 'Space Grotesk', sans-serif;
            background: linear-gradient(135deg, var(--color-eco-green), var(--color-bench-yellow));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: var(--spacing-xs);
            line-height: 1;
        }

        .stat-label {
            color: var(--color-text-light);
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* CTA Buttons Group */
        .cta-buttons-group {
            display: flex;
            gap: var(--spacing-md);
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: var(--spacing-lg);
        }

        /* ===================================
   RESPONSIVE DESIGN - FAQ
   =================================== */

        @media (max-width: 768px) {
            .faq-hero {
                padding: 140px 0 60px;
            }

            .faq-hero-content h1 {
                font-size: 2.5rem;
            }

            .faq-hero-content>p {
                font-size: 1.125rem;
            }

            .faq-search-input {
                padding: 20px 24px 20px 60px;
                font-size: 1rem;
            }

            .search-icon-left {
                left: 24px;
                font-size: 1.125rem;
            }

            .faq-categories {
                gap: var(--spacing-sm);
            }

            .category-filter {
                padding: var(--spacing-sm) var(--spacing-md);
                font-size: 0.875rem;
            }

            .faq-question {
                padding: var(--spacing-lg);
                gap: var(--spacing-md);
            }

            .faq-question h3 {
                font-size: 1.125rem;
            }

            .faq-icon-wrapper {
                width: 40px;
                height: 40px;
            }

            .faq-stats {
                grid-template-columns: 1fr;
            }

            .cta-buttons-group {
                flex-direction: column;
            }

            .cta-buttons-group .btn {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .faq-hero {
                padding: 120px 0 40px;
            }

            .faq-hero-content h1 {
                font-size: 2rem;
            }

            .category-badge {
                font-size: 0.65rem;
                padding: 4px 12px;
            }

            .faq-question h3 {
                font-size: 1rem;
            }

            .stat-number {
                font-size: 2.5rem;
            }

            .stat-icon {
                font-size: 2.5rem;
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
                            <path d="M7 10L9 12L13 8M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                        <span>Real-time Monitoring</span>
                    </div>
                    <div class="cta-mini-item">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M7 10L9 12L13 8M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                        <span>Interactive Dashboard</span>
                    </div>
                    <div class="cta-mini-item">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M7 10L9 12L13 8M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
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
                        <path d="M8 14C11.3137 14 14 11.3137 14 8C14 4.68629 11.3137 2 8 2C4.68629 2 2 4.68629 2 8C2 11.3137 4.68629 14 8 14Z" stroke="currentColor" stroke-width="1.5" />
                        <path d="M8 5V8L10 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
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