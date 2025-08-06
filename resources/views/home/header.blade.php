<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Elite Mutual Investment - Smart financial solutions for a secure future. Invest wisely, grow steadily.">
    <title>Elite Mutual Investment - Smart Investing for a Secure Future</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-blue: #4F7CFF;
            --gradient-start: #6366F1;
            --gradient-end: #3B82F6;
            --dark-bg: #0f172a;
            --light-bg: #f8fafc;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: white;
            color: #1f2937;
            transition: background-color 0.3s, color 0.3s;
        }

        body.dark {
            background-color: var(--dark-bg);
            color: #f8fafc;
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .dark .navbar {
            background: rgba(15, 23, 42, 0.95);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: var(--primary-blue);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.25rem;
        }

        .brand-name {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
            margin: 0;
            transition: color 0.3s;
        }

        .dark .brand-name {
            color: white;
        }

        .navbar-nav .nav-link {
            color: #6b7280;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: color 0.2s;
        }

        .dark .navbar-nav .nav-link {
            color: #94a3b8;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-blue);
        }

        .btn-get-started {
            background: var(--primary-blue);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-get-started:hover {
            background: #3B5BDB;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(79, 124, 255, 0.3);
        }

        .theme-toggle {
            background: none;
            border: none;
            color: #6b7280;
            font-size: 1.25rem;
            margin-left: 1rem;
            cursor: pointer;
            transition: color 0.3s;
        }

        .dark .theme-toggle {
            color: #94a3b8;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            color: white;
            padding-top: 80px; /* Account for fixed navbar */
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 2rem 0;
        }

        .hero-title {
            font-size: clamp(2rem, 5vw, 4rem);
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .hero-subtitle {
            font-size: clamp(1rem, 2vw, 1.25rem);
            opacity: 0.9;
            margin-bottom: 2.5rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            color: rgba(255, 255, 255, 0.9);
            padding: 0 1rem;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-hero-primary {
            background: white;
            color: var(--primary-blue);
            border: none;
            padding: 1rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.2s;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 200px;
        }

        .btn-hero-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .btn-hero-secondary {
            background: transparent;
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 1rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.2s;
            width: 100%;
            max-width: 200px;
        }

        .btn-hero-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.5);
        }

        /* Sparkle Animations */
        .sparkle {
            position: absolute;
            color: rgba(255, 255, 255, 0.6);
            animation: sparkle 3s ease-in-out infinite;
            pointer-events: none;
            font-size: clamp(1rem, 2vw, 1.5rem);
        }

        .sparkle-1 { top: 15%; left: 5%; animation-delay: 0s; }
        .sparkle-2 { top: 25%; right: 5%; animation-delay: 1s; }
        .sparkle-3 { top: 60%; left: 5%; animation-delay: 2s; }
        .sparkle-4 { bottom: 20%; right: 5%; animation-delay: 0.5s; }
        .sparkle-5 { top: 45%; left: 15%; animation-delay: 1.5s; }
        .sparkle-6 { top: 70%; right: 15%; animation-delay: 2.5s; }
        .sparkle-7 { bottom: 30%; left: 10%; animation-delay: 3s; }
        .sparkle-8 { top: 35%; right: 20%; animation-delay: 0.8s; }

        @keyframes sparkle {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.2); }
        }

        /* Section Common Styles */
        .section {
            padding: 4rem 0;
        }

        .section-title {
            font-size: clamp(1.75rem, 3vw, 3rem);
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #1f2937;
            transition: color 0.3s;
        }

        .dark .section-title {
            color: white;
        }

        .section-subtitle {
            font-size: clamp(1rem, 1.5vw, 1.25rem);
            color: #6b7280;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            transition: color 0.3s;
        }

        .dark .section-subtitle {
            color: #94a3b8;
        }

        .section-badge {
            display: inline-block;
            color: var(--primary-blue);
            font-size: 0.875rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        /* Trusted By Section */
        .trusted-section {
            background: var(--light-bg);
            position: relative;
            transition: background-color 0.3s;
        }

        .dark .trusted-section {
            background: #1e293b;
        }

        .trusted-image-container {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-top: 2rem;
        }

        .trusted-image-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        }

        .trusted-image {
            width: 100%;
            height: auto;
            min-height: 300px;
            object-fit: cover;
            display: block;
        }

        .approach-indicator {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .dark .approach-indicator {
            background: rgba(15, 23, 42, 0.95);
        }

        .approach-indicator:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
        }

        .approach-dot {
            width: 8px;
            height: 8px;
            background: var(--primary-blue);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        .approach-text {
            color: var(--primary-blue);
            font-weight: 600;
            font-size: 0.9rem;
            margin: 0;
        }

        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }

        /* Features Section */
        .feature-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
            margin-bottom: 1.5rem;
        }

        .dark .feature-card {
            background: #1e293b;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .dark .feature-card:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            color: white;
            font-size: 1.5rem;
        }

        .feature-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #1f2937;
            transition: color 0.3s;
        }

        .dark .feature-title {
            color: white;
        }

        .feature-description {
            color: #6b7280;
            transition: color 0.3s;
            font-size: 0.95rem;
        }

        .dark .feature-description {
            color: #94a3b8;
        }

        /* Investment Options */
        .investment-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .dark .investment-card {
            background: #1e293b;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .investment-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .dark .investment-card:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        .investment-header {
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
        }

        .investment-body {
            padding: 1.5rem;
        }

        .investment-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #1f2937;
            transition: color 0.3s;
        }

        .dark .investment-title {
            color: white;
        }

        .investment-description {
            color: #6b7280;
            margin-bottom: 1.5rem;
            transition: color 0.3s;
            font-size: 0.95rem;
        }

        .dark .investment-description {
            color: #94a3b8;
        }

        .investment-cta {
            display: inline-flex;
            align-items: center;
            color: var(--primary-blue);
            font-weight: 500;
            transition: color 0.3s;
            font-size: 0.95rem;
        }

        .investment-cta:hover {
            color: #3B5BDB;
            text-decoration: none;
        }

        /* Testimonials */
        .testimonial-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
            margin-bottom: 1.5rem;
        }

        .dark .testimonial-card {
            background: #1e293b;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .testimonial-text {
            font-size: 0.95rem;
            font-style: italic;
            color: #6b7280;
            margin-bottom: 1.5rem;
            transition: color 0.3s;
        }

        .dark .testimonial-text {
            color: #94a3b8;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .testimonial-author-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 1rem;
        }

        .testimonial-author-name {
            font-weight: 600;
            color: #1f2937;
            font-size: 1rem;
            transition: color 0.3s;
        }

        .dark .testimonial-author-name {
            color: white;
        }

        .testimonial-author-title {
            color: #6b7280;
            font-size: 0.875rem;
            transition: color 0.3s;
        }

        .dark .testimonial-author-title {
            color: #94a3b8;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .cta-title {
            font-size: clamp(1.75rem, 3vw, 2.5rem);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .cta-description {
            font-size: clamp(1rem, 1.5vw, 1.25rem);
            opacity: 0.9;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            padding: 0 1rem;
        }

        /* Footer */
        .footer {
            background: #1f2937;
            color: white;
            padding: 3rem 0 1.5rem;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .footer-logo-icon {
            width: 40px;
            height: 40px;
            background: var(--primary-blue);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.25rem;
        }

        .footer-logo-text {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .footer-description {
            color: #9ca3af;
            margin-bottom: 1.5rem;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .footer-links-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .footer-links-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links-item {
            margin-bottom: 0.5rem;
        }

        .footer-links-link {
            color: #9ca3af;
            text-decoration: none;
            transition: color 0.2s;
            font-size: 0.95rem;
        }

        .footer-links-link:hover {
            color: white;
        }

        .footer-social {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .footer-social-link {
            color: #9ca3af;
            font-size: 1.25rem;
            transition: color 0.2s;
        }

        .footer-social-link:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 1.5rem;
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .footer-copyright {
            color: #9ca3af;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }

        .footer-legal-links {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .footer-legal-link {
            color: #9ca3af;
            text-decoration: none;
            transition: color 0.2s;
            font-size: 0.875rem;
        }

        .footer-legal-link:hover {
            color: white;
        }

      

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .hero-section {
                min-height: auto;
                padding: 6rem 0;
            }
            
            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-hero-primary,
            .btn-hero-secondary {
                max-width: 250px;
            }
            
            .investment-header {
                height: 120px;
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .section {
                padding: 3rem 0;
            }
            
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .trusted-image {
                min-height: 250px;
            }
            
            .approach-indicator {
                padding: 0.4rem 0.8rem;
                font-size: 0.8rem;
            }
            
            .footer-links-title {
                margin-top: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                padding: 5rem 0;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .btn-hero-primary,
            .btn-hero-secondary {
                padding: 0.8rem 1.5rem;
                font-size: 0.9rem;
            }
            
            .section-title {
                font-size: 1.75rem;
            }
            
            .section-subtitle {
                font-size: 1rem;
            }
            
            .feature-card,
            .investment-card,
            .testimonial-card {
                padding: 1.25rem;
            }
            
            .feature-title,
            .investment-title {
                font-size: 1.1rem;
            }
            
            .feature-description,
            .investment-description,
            .testimonial-text {
                font-size: 0.9rem;
            }
            
            .chat-button {
                width: 48px;
                height: 48px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body class="dark-mode-transition">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <div class="logo-container">
                <div class="logo-icon">E</div>
                <h1 class="brand-name">Elite Mutual Investment</h1>
            </div>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('fixed-deposit') }}">Fixed Deposit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#mutual-funds">Mutual Funds</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Calculators
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#sip-calculator">SIP Calculator</a></li>
                            <li><a class="dropdown-item" href="#fd-calculator">FD Calculator</a></li>
                            <li><a class="dropdown-item" href="#retirement-calculator">Retirement Calculator</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            More
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#about">About Us</a></li>
                            <li><a class="dropdown-item" href="#contact">Contact</a></li>
                            <li><a class="dropdown-item" href="#blog">Blog</a></li>
                        </ul>
                    </li>
                </ul>
                
                <div class="d-flex align-items-center">
                    <a href="{{ route('register') }}" class="btn btn-get-started">Get Started</a>
                    <button class="theme-toggle" id="themeToggle">
                        <i class="bi bi-sun-fill"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>
