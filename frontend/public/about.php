<?php

include("../includes/auth.php");

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
        'name' => 'Jigs C. Lactao',
        'role' => 'Backend Developer & Electrical Engineer',
        'image' => '../assets/img/member1.png',
        'bio' => 'Developed the backend logic of the prototype website and contributed to the manual power generation system.',
        'expertise' => ['Backend Web Development', 'Database Logic', 'Manual Power Generation'],
        'social' => [
            'facebook' => 'https://web.facebook.com/jigsuyaaaaaa',
            'linkedin' => 'https://www.linkedin.com/in/jigs-lactao-122894387/',
            'github' => 'https://github.com/jigsuyaaa'
        ],
        'color' => 'green',
    ],
    [
        'name' => 'Mariem O. Manato',
        'role' => 'System Architect & Electrical Engineer',
        'image' => '../assets/img/member2.png',
        'bio' => 'Designed the overall system architecture and was responsible for the manual power generation mechanism.',
        'expertise' => ['System Architecture Design', 'Manual Power Generation', 'Energy Conversion'],
        'social' => [
            'facebook' => 'https://web.facebook.com/yemakeki',
            'linkedin' => 'https://www.linkedin.com/in/mariem-manato-97628b360/',
            'github' => 'https://github.com/yemakeki'
        ],
        'color' => 'blue',
    ],
    [
        'name' => 'Audrey Nicole Q. Mesa',
        'role' => 'Project Lead & UI/UX Designer',
        'image' => '../assets/img/member3.png',
        'bio' => 'Led the team, designed the UI/UX for both the monitoring system and the prototype website, and handled the solar component of the EcoBench.',
        'expertise' => ['UI/UX Design', 'Web Interface Design', 'Solar Systems Integration'],
        'social' => [
            'facebook' => 'https://web.facebook.com/audreynicole.19',
            'linkedin' => 'https://www.linkedin.com/in/audrey-nicole-mesa-b8895732a/',
            'github' => 'https://github.com/msaudreyncl'
        ],
        'color' => 'yellow',
    ],
    [
        'name' => 'Marcus Cedric S. Pedrosa',
        'role' => 'Monitoring System Developer & Hardware Engineer',
        'image' => '../assets/img/member4.png',
        'bio' => 'Managed both the backend development and hardware implementation of the EcoBench monitoring system.',
        'expertise' => ['IoT Systems', 'Hardware Integration', 'Monitoring & Data Systems'],
        'social' => [
            'facebook' => 'https://web.facebook.com/marcuscedric.pedrosa',
            'linkedin' => 'https://www.linkedin.com/in/marcus-cedric-pedrosa-1b58b0269/',
            'github' => 'https://github.com/CedZzzzzzzzz'
        ],
        'color' => 'purple',
    ],
    [
        'name' => 'Quinn harvey G. Pineda',
        'role' => 'Project Coordinator & Technical Specialist',
        'image' => '../assets/img/member5.png',
        'bio' => 'Coordinated project tasks and progress while providing technical support and implementation for the solar power component and overall system of the EcoBench.',
        'expertise' => ['Hardware Integration', 'Solar Power Systems', 'System Support & Integration'],
        'social' => [
            'facebook' => 'https://web.facebook.com/Yevrah.pineda.7',
            'linkedin' => 'https://www.linkedin.com/in/quinn-pineda/',
            'github' => 'https://github.com/Blaesei'
        ],
        'color' => 'teal',
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
    <link rel="stylesheet" href="../assets/css/styles.css">

    <!-- Favicon -->
    <link rel="icon" type="../assets/image/png" href="favicon.png">
    <style>
        /* ===================================
   ENHANCED ABOUT PAGE STYLES
   =================================== */

        /* About Hero Section */
        .about-hero {
            position: relative;
            padding: 180px 0 120px;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f0f1e 100%);
            overflow: hidden;
            min-height: 600px;
            display: flex;
            align-items: center;
        }

        .about-hero-decoration {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        /* Floating Elements Animation */
        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .float-element {
            position: absolute;
            font-size: 3rem;
            opacity: 0.15;
            animation: floatElement 15s ease-in-out infinite;
            animation-delay: var(--delay);
            left: var(--x);
            top: var(--y);
        }

        @keyframes floatElement {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg) scale(1);
                opacity: 0.15;
            }

            25% {
                transform: translate(30px, -40px) rotate(15deg) scale(1.2);
                opacity: 0.3;
            }

            50% {
                transform: translate(-20px, -80px) rotate(-10deg) scale(0.9);
                opacity: 0.2;
            }

            75% {
                transform: translate(40px, -40px) rotate(20deg) scale(1.1);
                opacity: 0.25;
            }
        }

        .about-hero-content {
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        /* Glitch Text Effect */
        .glitch-text {
            font-size: clamp(3rem, 7vw, 5rem);
            font-weight: 900;
            color: var(--color-white);
            margin-bottom: var(--spacing-md);
            font-family: 'Space Grotesk', sans-serif;
            line-height: 1.1;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            position: relative;
            animation: glitchFadeIn 1s ease-out;
        }

        @keyframes glitchFadeIn {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .glitch-text::before,
        .glitch-text::after {
            content: attr(data-text);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
        }

        .glitch-text:hover::before {
            animation: glitch1 0.3s infinite;
            color: var(--color-eco-green-light);
            z-index: -1;
        }

        .glitch-text:hover::after {
            animation: glitch2 0.3s infinite;
            color: var(--color-bench-yellow);
            z-index: -2;
        }

        @keyframes glitch1 {

            0%,
            100% {
                transform: translate(0);
                opacity: 0;
            }

            20% {
                transform: translate(-2px, 2px);
                opacity: 0.7;
            }

            40% {
                transform: translate(-2px, -2px);
                opacity: 0.7;
            }

            60% {
                transform: translate(2px, 2px);
                opacity: 0.7;
            }

            80% {
                transform: translate(2px, -2px);
                opacity: 0.7;
            }
        }

        @keyframes glitch2 {

            0%,
            100% {
                transform: translate(0);
                opacity: 0;
            }

            20% {
                transform: translate(2px, -2px);
                opacity: 0.5;
            }

            40% {
                transform: translate(2px, 2px);
                opacity: 0.5;
            }

            60% {
                transform: translate(-2px, -2px);
                opacity: 0.5;
            }

            80% {
                transform: translate(-2px, 2px);
                opacity: 0.5;
            }
        }

        /* Typewriter Text */
        .typewriter-wrapper {
            display: flex;
            justify-content: center;
            margin-bottom: var(--spacing-xl);
        }

        .typewriter-text {
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 400;
            overflow: hidden;
            border-right: 3px solid var(--color-eco-green);
            white-space: nowrap;
            margin: 0;
            animation: typing 4s steps(80, end), blink 0.75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes blink {

            from,
            to {
                border-color: transparent;
            }

            50% {
                border-color: var(--color-eco-green);
            }
        }

        /* Responsive fix for typewriter */
        @media (max-width: 768px) {
            .typewriter-text {
                font-size: 1.125rem;
                animation: none;
                border-right: none;
                white-space: normal;
            }
        }

        @media (max-width: 480px) {
            .typewriter-text {
                font-size: 1rem;
            }
        }

        /* Scroll Arrow Animation */
        .scroll-arrow-container {
            margin-top: var(--spacing-xxl);
            display: flex;
            justify-content: center;
        }

        .scroll-arrow {
            width: 30px;
            height: 50px;
            position: relative;
        }

        .scroll-arrow span {
            display: block;
            width: 20px;
            height: 20px;
            border-bottom: 3px solid rgba(255, 255, 255, 0.8);
            border-right: 3px solid rgba(255, 255, 255, 0.8);
            transform: rotate(45deg);
            margin: -10px;
            animation: scrollAnimation 2s infinite;
        }

        .scroll-arrow span:nth-child(2) {
            animation-delay: -0.2s;
        }

        .scroll-arrow span:nth-child(3) {
            animation-delay: -0.4s;
        }

        @keyframes scrollAnimation {
            0% {
                opacity: 0;
                transform: rotate(45deg) translate(-10px, -10px);
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                transform: rotate(45deg) translate(10px, 10px);
            }
        }

        /* Stats Banner */
        .stats-banner {
            background: linear-gradient(135deg, var(--color-eco-green) 0%, var(--color-eco-green-light) 100%);
            padding: var(--spacing-xxl) 0;
            margin-top: -50px;
            position: relative;
            z-index: 10;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: var(--spacing-xl);
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: var(--spacing-lg);
            padding: var(--spacing-lg);
            background: rgba(255, 255, 255, 0.1);
            border-radius: var(--radius-lg);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all var(--transition-normal);
            animation: fadeInUp 0.6s ease-out both;
            animation-delay: var(--delay);
        }

        .stat-item:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .stat-icon-large {
            font-size: 3.5rem;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-lg);
            transition: all var(--transition-normal);
        }

        .stat-item:hover .stat-icon-large {
            transform: rotate(10deg) scale(1.1);
        }

        .stat-details {
            flex: 1;
        }

        .stat-details .stat-number {
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--color-white);
            font-family: 'Space Grotesk', sans-serif;
            line-height: 1;
            margin-bottom: 0.25rem;
        }

        .stat-details .stat-label {
            font-size: 1rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.25rem;
        }

        .stat-details .stat-description {
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Mission & Vision Section */
        .mission-vision-section {
            padding: calc(var(--spacing-xxl) * 1.5) 0;
            background: linear-gradient(180deg, var(--color-white) 0%, var(--color-off-white) 100%);
            position: relative;
        }

        .mission-vision-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: var(--spacing-xl);
            max-width: 1200px;
            margin: 0 auto;
        }

        .mission-card {
            background: var(--color-white);
            border-radius: var(--radius-xl);
            padding: var(--spacing-xxl);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-normal);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        /* Corner Decoration */
        .card-corner-decoration {
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, transparent 50%, rgba(111, 168, 58, 0.1) 50%);
            transition: all var(--transition-normal);
        }

        .mission-card:hover .card-corner-decoration {
            width: 150px;
            height: 150px;
            background: linear-gradient(135deg, transparent 50%, rgba(111, 168, 58, 0.2) 50%);
        }

        .mission-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(111, 168, 58, 0.05), rgba(244, 196, 48, 0.05));
            opacity: 0;
            transition: opacity var(--transition-normal);
        }

        .mission-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
            border-color: var(--color-eco-green);
        }

        .mission-card:hover::before {
            opacity: 1;
        }

        /* Mission Highlights */
        .mission-highlights {
            display: flex;
            flex-direction: column;
            gap: var(--spacing-sm);
            margin-top: var(--spacing-lg);
        }

        .highlight-item {
            display: flex;
            align-items: center;
            padding: var(--spacing-sm) var(--spacing-md);
            background: linear-gradient(135deg, rgba(111, 168, 58, 0.05), rgba(244, 196, 48, 0.05));
            border-radius: var(--radius-md);
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--color-eco-green-dark);
            transition: all var(--transition-fast);
        }

        .highlight-item:hover {
            background: linear-gradient(135deg, rgba(111, 168, 58, 0.1), rgba(244, 196, 48, 0.1));
            transform: translateX(5px);
        }

        /* Core Values Section */
        .core-values-section {
            padding: calc(var(--spacing-xxl) * 1.5) 0;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            position: relative;
            overflow: hidden;
        }

        .values-bg-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(rgba(111, 168, 58, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(111, 168, 58, 0.05) 1px, transparent 1px);
            background-size: 60px 60px;
            animation: patternMove 30s linear infinite;
        }

        @keyframes patternMove {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(60px, 60px);
            }
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: var(--spacing-xl);
            position: relative;
            z-index: 1;
        }

        .value-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--radius-xl);
            padding: var(--spacing-xxl) var(--spacing-xl);
            text-align: center;
            transition: all var(--transition-normal);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.6s ease-out both;
            animation-delay: var(--delay);
        }

        /* Value Shine Effect */
        .value-shine {
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg,
                    transparent 30%,
                    rgba(255, 255, 255, 0.1) 50%,
                    transparent 70%);
            transform: rotate(45deg);
            transition: all 0.6s;
        }

        .value-card:hover .value-shine {
            left: 100%;
        }

        .value-card:hover {
            border-color: var(--color-eco-green);
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(111, 168, 58, 0.3);
        }

        .value-icon-wrapper {
            margin-bottom: var(--spacing-lg);
        }

        .value-icon {
            font-size: 4rem;
            display: inline-block;
            transition: all var(--transition-normal);
            filter: drop-shadow(0 0 20px rgba(111, 168, 58, 0.5));
        }

        .value-card:hover .value-icon {
            transform: scale(1.2) rotateY(360deg);
        }

        .value-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--color-white);
            margin-bottom: var(--spacing-md);
            font-family: 'Space Grotesk', sans-serif;
        }

        .value-card p {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.8;
        }

        /* Team Section Enhancements */
        .team-section {
            padding: calc(var(--spacing-xxl) * 1.5) 0;
            background: linear-gradient(180deg, var(--color-off-white) 0%, #f0f9ff 100%);
            position: relative;
            overflow: hidden;
        }

        .team-bg-decoration {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
            z-index: 0;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: var(--spacing-xl);
            position: relative;
            z-index: 1;
        }

        .team-card {
            perspective: 1000px;
            height: 520px;
            animation: fadeInUp 0.6s ease-out both;
            animation-delay: var(--delay);
        }

        .team-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            transform-style: preserve-3d;
            cursor: pointer;
        }

        .team-card:hover .team-card-inner {
            transform: rotateY(180deg);
        }

        .team-card-front,
        .team-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: var(--radius-xl);
            overflow: hidden;
        }

        .team-card-front {
            background: var(--color-white);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-normal);
            border: 2px solid transparent;
        }

        .team-card:hover .team-card-front {
            box-shadow: var(--shadow-xl);
        }

        .team-card[data-color="green"]:hover .team-card-front {
            border-color: var(--color-eco-green);
        }

        .team-card[data-color="blue"]:hover .team-card-front {
            border-color: #4a90e2;
        }

        .team-card[data-color="yellow"]:hover .team-card-front {
            border-color: var(--color-bench-yellow);
        }

        .team-card[data-color="purple"]:hover .team-card-front {
            border-color: #9b59b6;
        }

        .team-card[data-color="teal"]:hover .team-card-front {
            border-color: #16a085;
        }

        .team-image-wrapper {
            position: relative;
            width: 100%;
            height: 340px;
            overflow: hidden;
        }

        .team-image-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(111, 168, 58, 0.2), rgba(244, 196, 48, 0.2));
            z-index: 1;
        }

        .team-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform var(--transition-slow);
        }

        .team-card:hover .team-image {
            transform: scale(1.1);
        }

        .team-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding: var(--spacing-lg);
            opacity: 0;
            transition: opacity var(--transition-normal);
            z-index: 2;
        }

        .team-card:hover .team-overlay {
            opacity: 1;
        }

        .flip-hint {
            display: flex;
            align-items: center;
            gap: var(--spacing-xs);
            color: var(--color-white);
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .flip-hint svg {
            animation: flipAnimation 2s ease-in-out infinite;
        }

        @keyframes flipAnimation {

            0%,
            100% {
                transform: rotateY(0deg);
            }

            50% {
                transform: rotateY(180deg);
            }
        }

        .team-info {
            padding: var(--spacing-lg) var(--spacing-xl);
            text-align: center;
        }

        .team-info h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--color-text);
            margin-bottom: var(--spacing-xs);
            font-family: 'Space Grotesk', sans-serif;
        }

        .team-role {
            color: var(--color-text-light);
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: var(--spacing-sm);
        }

        /* Team Card Back */
        .team-card-back {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            transform: rotateY(180deg);
            display: flex;
            align-items: center;
            padding: var(--spacing-xl);
            box-shadow: var(--shadow-xl);
        }

        .team-back-content {
            color: var(--color-white);
            text-align: center;
            position: relative;
        }

        /* Team Member Number */
        .team-member-number {
            position: absolute;
            top: -15px;
            right: -15px;
            font-size: 6rem;
            font-weight: 900;
            font-family: 'Space Grotesk', sans-serif;
            color: rgba(255, 255, 255, 0.05);
            line-height: 1;
        }

        .team-back-content h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: var(--spacing-md);
            font-family: 'Space Grotesk', sans-serif;
            background: linear-gradient(135deg, var(--color-eco-green-light), var(--color-bench-yellow));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .team-bio {
            font-size: 0.95rem;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: var(--spacing-lg);
        }

        .team-expertise {
            margin-bottom: var(--spacing-lg);
        }

        .team-expertise h4 {
            font-size: 0.875rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--color-eco-green-light);
            margin-bottom: var(--spacing-sm);
        }

        .expertise-tags {
            display: flex;
            flex-wrap: wrap;
            gap: var(--spacing-xs);
            justify-content: center;
        }

        .expertise-tag {
            display: inline-block;
            padding: 6px 14px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-full);
            font-size: 0.75rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
            transition: all var(--transition-fast);
        }

        .expertise-tag:hover {
            background: rgba(111, 168, 58, 0.3);
            border-color: var(--color-eco-green-light);
            transform: translateY(-2px);
        }

        .team-social {
            display: flex;
            gap: var(--spacing-md);
            justify-content: center;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-md);
            color: rgba(255, 255, 255, 0.8);
            transition: all var(--transition-normal);
        }

        .social-icon:hover {
            background: var(--color-eco-green);
            border-color: var(--color-eco-green);
            color: var(--color-white);
            transform: translateY(-3px);
        }

        /* ===================================
   RESPONSIVE DESIGN - ABOUT PAGE
   =================================== */

        @media (max-width: 1024px) {
            .timeline-container::before {
                left: 30px;
            }

            .timeline-item,
            .timeline-item:nth-child(odd) {
                flex-direction: column !important;
                align-items: flex-start;
            }

            .timeline-marker {
                left: 30px;
                transform: none;
            }

            .timeline-content,
            .timeline-item:nth-child(odd) .timeline-content {
                width: calc(100% - 100px);
                margin-left: 100px !important;
                margin-right: 0 !important;
            }

            .timeline-date {
                margin-bottom: var(--spacing-md);
                margin-left: 0;
            }
        }

        @media (max-width: 768px) {
            .about-hero {
                padding: 140px 0 80px;
                min-height: 500px;
            }

            .glitch-text {
                font-size: 2.5rem;
            }

            .typewriter-text {
                font-size: 1.125rem;
                animation: none;
                border-right: none;
                white-space: normal;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-item {
                justify-content: center;
            }

            .mission-vision-grid {
                grid-template-columns: 1fr;
            }

            .values-grid {
                grid-template-columns: 1fr;
            }

            .team-grid {
                grid-template-columns: 1fr;
            }

            .timeline-content,
            .timeline-item:nth-child(odd) .timeline-content {
                width: calc(100% - 80px);
                margin-left: 80px !important;
            }

            .marker-dot {
                width: 50px;
                height: 50px;
            }

            .marker-icon {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .about-hero {
                padding: 120px 0 60px;
            }

            .glitch-text {
                font-size: 2rem;
            }

            .float-element {
                font-size: 2rem;
            }

            .stat-icon-large {
                width: 60px;
                height: 60px;
                font-size: 2.5rem;
            }

            .stat-details .stat-number {
                font-size: 2rem;
            }

            .mission-card {
                padding: var(--spacing-lg);
            }

            .card-icon-wrapper {
                width: 80px;
                height: 80px;
            }

            .card-icon {
                font-size: 3rem;
            }

            .value-icon {
                font-size: 3rem;
            }

            .team-card {
                height: 480px;
            }

            .team-image-wrapper {
                height: 300px;
            }

            .timeline-container::before {
                left: 20px;
            }

            .timeline-marker {
                left: 20px;
            }

            .timeline-content,
            .timeline-item:nth-child(odd) .timeline-content {
                width: calc(100% - 60px);
                margin-left: 60px !important;
            }

            .marker-dot {
                width: 40px;
                height: 40px;
            }

            .marker-icon {
                font-size: 1.25rem;
            }

            .timeline-card {
                padding: var(--spacing-lg);
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
                    <img class="logo-icon" src="../assets/img/EcoBench Logo.png" alt="EcoBench Logo">
                </a>

                <nav class="nav-menu" id="navMenu">
                    <ul>
                        <?php foreach ($nav_items as $name => $link): ?>
                            <li><a href="<?php echo $link; ?>" class="nav-link <?php echo ($name === 'About Us') ? 'active' : ''; ?>"><?php echo $name; ?></a></li>
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