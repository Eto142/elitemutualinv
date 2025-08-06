@include('home.header')


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
        .fd-hero-section {
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            min-height: 70vh;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            color: white;
            padding-top: 80px;
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

        /* FD Features Section */
        .fd-features-section {
            background: var(--light-bg);
            transition: background-color 0.3s;
        }

        .dark .fd-features-section {
            background: #1e293b;
        }

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

        /* FD Rates Section */
        .fd-rates-section {
            background: white;
            transition: background-color 0.3s;
        }

        .dark .fd-rates-section {
            background: var(--dark-bg);
        }

        .rates-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .dark .rates-table {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .rates-table th {
            background: var(--primary-blue);
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
        }

        .rates-table td {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .dark .rates-table td {
            border-bottom: 1px solid #334155;
        }

        .rates-table tr:last-child td {
            border-bottom: none;
        }

        .rates-table tr:hover td {
            background-color: #f3f4f6;
        }

        .dark .rates-table tr:hover td {
            background-color: #1e293b;
        }

        .highlight-rate {
            color: var(--primary-blue);
            font-weight: 600;
        }

        /* FD Calculator Section */
        .calculator-section {
            background: var(--light-bg);
            transition: background-color 0.3s;
        }

        .dark .calculator-section {
            background: #1e293b;
        }

        .calculator-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .dark .calculator-card {
            background: #1e293b;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #1f2937;
            transition: color 0.3s;
        }

        .dark .form-label {
            color: white;
        }

        .form-control {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            transition: all 0.3s;
        }

        .dark .form-control {
            background-color: #1e293b;
            border-color: #334155;
            color: white;
        }

        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.25rem rgba(79, 124, 255, 0.25);
        }

        .result-card {
            background: var(--primary-blue);
            color: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 2rem;
        }

        .result-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .result-value {
            font-size: 1.75rem;
            font-weight: 700;
        }

        /* FAQ Section */
        .faq-section {
            background: white;
            transition: background-color 0.3s;
        }

        .dark .faq-section {
            background: var(--dark-bg);
        }

        .accordion-button {
            font-weight: 600;
            padding: 1.25rem 1.5rem;
            color: #1f2937;
            background-color: #f9fafb;
            transition: all 0.3s;
        }

        .dark .accordion-button {
            color: white;
            background-color: #1e293b;
        }

        .accordion-button:not(.collapsed) {
            color: var(--primary-blue);
            background-color: #f3f4f6;
        }

        .dark .accordion-button:not(.collapsed) {
            background-color: #1e293b;
        }

        .accordion-button:focus {
            box-shadow: 0 0 0 0.25rem rgba(79, 124, 255, 0.25);
        }

        .accordion-body {
            padding: 1.5rem;
            color: #6b7280;
            transition: color 0.3s;
        }

        .dark .accordion-body {
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
            .fd-hero-section {
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
            
            .footer-links-title {
                margin-top: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .fd-hero-section {
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
            
            .feature-card {
                padding: 1.25rem;
            }
            
            .feature-title {
                font-size: 1.1rem;
            }
            
            .feature-description {
                font-size: 0.9rem;
            }
        }
    </style>
    <!-- Hero Section -->
    <section class="fd-hero-section" id="home">
        <!-- Decorative Sparkles -->
        <div class="sparkle sparkle-1"><i class="bi bi-stars"></i></div>
        <div class="sparkle sparkle-2"><i class="bi bi-star-fill"></i></div>
        <div class="sparkle sparkle-3"><i class="bi bi-stars"></i></div>
        <div class="sparkle sparkle-4"><i class="bi bi-star-fill"></i></div>
        <div class="sparkle sparkle-5"><i class="bi bi-stars"></i></div>
        <div class="sparkle sparkle-6"><i class="bi bi-star-fill"></i></div>
        <div class="sparkle sparkle-7"><i class="bi bi-stars"></i></div>
        <div class="sparkle sparkle-8"><i class="bi bi-star-fill"></i></div>
        
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    Fixed Deposits<br>
                    Secure Growth, Guaranteed Returns
                </h1>
                <p class="hero-subtitle">
                    Lock in high interest rates with our fixed deposit options. Enjoy guaranteed returns and flexible tenure options tailored to your financial goals.
                </p>
                <div class="hero-buttons">
                    <a href="#fd-rates" class="btn btn-hero-primary">View FD Rates</a>
                    <a href="#calculator" class="btn btn-hero-secondary">
                        <i class="bi bi-calculator me-2"></i>Calculate Returns
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FD Features Section -->
    <section class="fd-features-section section" id="features">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-badge">WHY CHOOSE US</span>
                <h2 class="section-title">Benefits of Fixed Deposits</h2>
                <p class="section-subtitle">
                    Discover why fixed deposits are a cornerstone of smart financial planning
                </p>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: var(--primary-blue);">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <h3 class="feature-title">Safety & Security</h3>
                        <p class="feature-description">
                            Your investment is protected with guaranteed returns, unaffected by market fluctuations.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: #10B981;">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h3 class="feature-title">Higher Returns</h3>
                        <p class="feature-description">
                            Earn up to 12.5% interest, significantly more than regular savings accounts.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: #8B5CF6;">
                            <i class="bi bi-calendar-range"></i>
                        </div>
                        <h3 class="feature-title">Flexible Tenure</h3>
                        <p class="feature-description">
                            Choose from 7 days to 10 years to match your financial goals.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: #F59E0B;">
                            <i class="bi bi-cash-coin"></i>
                        </div>
                        <h3 class="feature-title">Regular Income</h3>
                        <p class="feature-description">
                            Option for monthly, quarterly or annual interest payouts.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: #EC4899;">
                            <i class="bi bi-person-heart"></i>
                        </div>
                        <h3 class="feature-title">Senior Benefits</h3>
                        <p class="feature-description">
                            Additional 0.5% interest for investors aged 60+.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: #14B8A6;">
                            <i class="bi bi-bank"></i>
                        </div>
                        <h3 class="feature-title">Loan Facility</h3>
                        <p class="feature-description">
                            Avail loans up to 90% of your FD amount without breaking it.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FD Rates Section -->
    <section class="fd-rates-section section" id="fd-rates">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-badge">CURRENT OFFERINGS</span>
                <h2 class="section-title">Our Fixed Deposit Rates</h2>
                <p class="section-subtitle">
                    Competitive interest rates to maximize your returns
                </p>
            </div>
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="rates-table">
                            <thead>
                                <tr>
                                    <th>Tenure</th>
                                    <th>Regular Rate</th>
                                    <th>Senior Citizen Rate</th>
                                    <th>Minimum Deposit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>3 Months</td>
                                    <td class="highlight-rate">13.5%</td>
                                    <td class="highlight-rate">14%</td>
                                    <td>$1,000</td>
                                </tr>
                                <tr>
                                    <td>6 Months</td>
                                    <td class="highlight-rate">12.5%</td>
                                    <td class="highlight-rate">13%</td>
                                    <td>$1,000</td>
                                </tr>
                                <tr>
                                    <td>1 Year</td>
                                    <td class="highlight-rate">10.00%</td>
                                    <td class="highlight-rate">10.50%</td>
                                    <td>$1,000</td>
                                </tr>
                                <tr>
                                    <td>2 Years</td>
                                    <td class="highlight-rate">8.5%</td>
                                    <td class="highlight-rate">9%</td>
                                    <td>$1000</td>
                                </tr>
                                <tr>
                                    <td>5 Years</td>
                                    <td class="highlight-rate">8%</td>
                                    <td class="highlight-rate">8.5%</td>
                                    <td>$1,000</td>
                                </tr>
                                <tr>
                                    <td>10 Years</td>
                                    <td class="highlight-rate">7.5%</td>
                                    <td class="highlight-rate">8.0%</td>
                                    <td>$1,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 text-start">
                        <p class="small text-muted">* Rates are subject to change without prior notice. Please check the latest rates before investing.</p>
                        <p class="small text-muted">* Senior citizen rates apply to individuals aged 60 years and above.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="feature-card h-100">
                        <div class="feature-icon" style="background: var(--primary-blue);">
                            <i class="bi bi-info-circle"></i>
                        </div>
                        <h3 class="feature-title">About Our Rates</h3>
                        <p class="feature-description">
                            Our fixed deposit rates are among the most competitive in the market. The interest is calculated quarterly and compounded annually for maximum returns.
                        </p>
                        <p class="feature-description">
                            For cumulative FDs (where interest is paid at maturity), the power of compounding helps your money grow faster.
                        </p>
                        <a href="#calculator" class="btn btn-get-started mt-3 w-100">Calculate Your Returns</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FD Calculator Section -->
    <section class="calculator-section section" id="calculator">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="calculator-card">
                        <h2 class="section-title mb-4">Fixed Deposit Calculator</h2>
                        <p class="section-subtitle mb-4">
                            Estimate your maturity amount based on our current interest rates
                        </p>
                        
                        <form id="fdCalculatorForm">
                            <div class="mb-3">
                                <label for="investmentAmount" class="form-label">Investment Amount ($)</label>
                                <input type="number" class="form-control" id="investmentAmount" value="1000" min="1000" step="100">
                            </div>
                            
                            <div class="mb-3">
                                <label for="tenure" class="form-label">Tenure</label>
                                <select class="form-select" id="tenure">
                                    <option value="3">3 Months</option>
                                    <option value="6">6 Months</option>
                                    <option value="12" selected>1 Year</option>
                                    <option value="24">2 Years</option>
                                    <option value="60">5 Years</option>
                                    <option value="120">10 Years</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="interestType" class="form-label">Interest Payout</label>
                                <select class="form-select" id="interestType">
                                    <option value="monthly">Monthly</option>
                                    <option value="quarterly">Quarterly</option>
                                    <option value="annually">Annually</option>
                                    <option value="cumulative" selected>Cumulative (at maturity)</option>
                                </select>
                            </div>
                            
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="seniorCitizen">
                                <label class="form-check-label" for="seniorCitizen">
                                    Senior Citizen (60+ years)
                                </label>
                            </div>
                            
                            <button type="button" class="btn btn-get-started w-100" onclick="calculateFD()">Calculate</button>
                        </form>
                    </div>
                </div>
                
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="calculator-card h-100">
                        <h3 class="section-title mb-4">Your FD Returns</h3>
                        
                        <div id="calculatorResults">
                            <div class="text-center py-5">
                                <i class="bi bi-calculator" style="font-size: 3rem; color: #6b7280;"></i>
                                <p class="mt-3">Enter your details to calculate your returns</p>
                            </div>
                        </div>
                        
                        <div class="result-card" id="resultCard" style="display: none;">
                            <h4 class="result-title">Estimated Maturity Amount</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mb-1">Principal Amount</p>
                                    <p class="mb-1">Interest Earned</p>
                                    <p class="mb-0">Total Value</p>
                                </div>
                                <div class="text-end">
                                    <p class="mb-1" id="principalAmount">$1,000</p>
                                    <p class="mb-1" id="interestEarned">$100</p>
                                    <p class="result-value mb-0" id="totalValue">$1,100</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <h5 class="mb-3">How is FD interest calculated?</h5>
                            <p class="small text-muted">
                                For monthly/quarterly/annual payouts: Simple interest is calculated on the principal amount.
                            </p>
                            <p class="small text-muted">
                                For cumulative FDs: Interest is compounded quarterly, which means you earn interest on both your principal and previously earned interest.
                            </p>
                            <a href="fixed-deposit-calculator.html" class="btn btn-outline-primary w-100 mt-3">
                                <i class="bi bi-arrow-right me-2"></i>Advanced FD Calculator
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section section" id="faq">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-badge">COMMON QUESTIONS</span>
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">
                    Everything you need to know about our fixed deposit offerings
                </p>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <!-- FAQ Item 1 -->
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    What is the minimum amount required to open a fixed deposit?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    The minimum amount required to open a fixed deposit at Elite Mutual Investment is $1,000 for regular FDs. This low entry barrier makes it accessible for most investors to start their journey towards financial security.
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ Item 2 -->
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    Can I withdraw my fixed deposit before maturity?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, you can withdraw your fixed deposit before maturity, subject to a nominal penalty. The premature withdrawal penalty is typically 1% of the applicable interest rate. However, certain special FDs may have specific lock-in periods.
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ Item 3 -->
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    How is the interest on fixed deposits taxed?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    The interest earned on fixed deposits is taxable as per your income tax slab rate. TDS (Tax Deducted at Source) is applicable if the interest earned in a financial year exceeds $40. You can submit Form 15G/15H to avoid TDS if your total income is below the taxable limit.
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ Item 4 -->
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                    What are the different interest payout options available?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Elite Mutual Investment offers multiple interest payout options to suit your financial needs:
                                    <ul>
                                        <li>Monthly Interest Payout: Ideal for regular income needs</li>
                                        <li>Quarterly Interest Payout: For periodic income requirements</li>
                                        <li>Annual Interest Payout: For yearly income planning</li>
                                        <li>Cumulative (at maturity): For maximum returns through compounding</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ Item 5 -->
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                                    Can I get a loan against my fixed deposit?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, you can avail a loan of up to 90% of your fixed deposit amount. This is a great option when you need funds but don't want to break your FD and lose out on the interest. The loan interest rate is typically 2% higher than your FD interest rate, making it more cost-effective than many other loan options.
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-5">
                        <p>Still have questions? Our experts are happy to help!</p>
                        <a href="contact-us.html" class="btn btn-get-started">
                            <i class="bi bi-headset me-2"></i>Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section section">
        <div class="container">
            <div class="text-center">
                <h2 class="cta-title">Ready to invest in a fixed deposit?</h2>
                <p class="cta-description">
                    Open your FD account in just 5 minutes and start earning guaranteed returns today.
                </p>
                <div class="cta-buttons">
                    <a href="https://app.elitemf.net/register" class="btn btn-hero-primary">Open FD Now</a>
                    <a href="contact-us.html" class="btn btn-hero-secondary">
                        <i class="bi bi-headset me-2"></i>Talk to an Expert
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="footer-logo">
                        <div class="footer-logo-icon">E</div>
                        <span class="footer-logo-text">Elite Mutual Investment</span>
                    </div>
                    <p class="footer-description">
                        Smart financial solutions for a secure future. Invest wisely, grow steadily.
                    </p>
                    <div class="footer-social">
                        <a href="#" class="footer-social-link"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="footer-social-link"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="footer-social-link"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="footer-social-link"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
                    <h3 class="footer-links-title">Quick Links</h3>
                    <ul class="footer-links-list">
                        <li class="footer-links-item"><a href="index.html" class="footer-links-link">Home</a></li>
                        <li class="footer-links-item"><a href="fixed-deposit.html" class="footer-links-link">Fixed Deposit</a></li>
                        <li class="footer-links-item"><a href="mutual-funds.html" class="footer-links-link">Mutual Funds</a></li>
                        <li class="footer-links-item"><a href="about-us.html" class="footer-links-link">About Us</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
                    <h3 class="footer-links-title">Calculators</h3>
                    <ul class="footer-links-list">
                        <li class="footer-links-item"><a href="fixed-deposit-calculator.html" class="footer-links-link">FD Calculator</a></li>
                        <li class="footer-links-item"><a href="mutual-funds-calculator.html" class="footer-links-link">Mutual Fund Calculator</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
                    <h3 class="footer-links-title">Legal</h3>
                    <ul class="footer-links-list">
                        <li class="footer-links-item"><a href="privacy-policy.html" class="footer-links-link">Privacy Policy</a></li>
                        <li class="footer-links-item"><a href="terms-of-service.html" class="footer-links-link">Terms of Service</a></li>
                        <li class="footer-links-item"><a href="cookie-policy.html" class="footer-links-link">Cookie Policy</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6">
                    <h3 class="footer-links-title">Contact</h3>
                    <ul class="footer-links-list">
                        <li class="footer-links-item"><a href="contact-us.html" class="footer-links-link">Contact Us</a></li>
                        <li class="footer-links-item"><a href="contact-us.html" class="footer-links-link">Support</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p class="footer-copyright">© 2024 Elite Mutual Investment. All rights reserved.</p>
                <div class="footer-legal-links">
                    <a href="privacy-policy.html" class="footer-legal-link">Privacy Policy</a>
                    <a href="terms-of-service.html" class="footer-legal-link">Terms of Service</a>
                    <a href="cookie-policy.html" class="footer-legal-link">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

   

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Theme toggle functionality
        const themeToggle = document.getElementById('themeToggle');
        const body = document.body;
        
        // Check for saved user preference or use system preference
        const savedTheme = localStorage.getItem('theme') || 
                         (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        
        // Apply the saved theme
        if (savedTheme === 'dark') {
            body.classList.add('dark');
            themeToggle.innerHTML = '<i class="bi bi-moon-fill"></i>';
        } else {
            body.classList.remove('dark');
            themeToggle.innerHTML = '<i class="bi bi-sun-fill"></i>';
        }
        
        // Toggle theme on button click
        themeToggle.addEventListener('click', function() {
            if (body.classList.contains('dark')) {
                body.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                themeToggle.innerHTML = '<i class="bi bi-sun-fill"></i>';
            } else {
                body.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                themeToggle.innerHTML = '<i class="bi bi-moon-fill"></i>';
            }
        });

        // FD Calculator Function
        function calculateFD() {
            // Get input values
            const principal = parseFloat(document.getElementById('investmentAmount').value);
            const tenure = parseInt(document.getElementById('tenure').value);
            const interestType = document.getElementById('interestType').value;
            const isSeniorCitizen = document.getElementById('seniorCitizen').checked;
            
            // Validate input
            if (isNaN(principal) {
                alert('Please enter a valid investment amount');
                return;
            }
            
            // Determine interest rate based on tenure and senior citizen status
            let rate;
            switch(tenure) {
                case 3: rate = isSeniorCitizen ? 14 : 13.5; break;
                case 6: rate = isSeniorCitizen ? 13 : 12.5; break;
                case 12: rate = isSeniorCitizen ? 10.5 : 10; break;
                case 24: rate = isSeniorCitizen ? 9 : 8.5; break;
                case 60: rate = isSeniorCitizen ? 8.5 : 8; break;
                case 120: rate = isSeniorCitizen ? 8 : 7.5; break;
                default: rate = 10;
            }
            
            // Calculate returns based on interest type
            let interest, total;
            const years = tenure / 12;
            
            if (interestType === 'cumulative') {
                // Quarterly compounding for cumulative FDs
                const quarterlyRate = rate / 4;
                const quarters = years * 4;
                total = principal * Math.pow(1 + (quarterlyRate / 100), quarters);
                interest = total - principal;
            } else {
                // Simple interest for other payout options
                interest = principal * (rate / 100) * years;
                total = principal + interest;
            }
            
            // Display results
            document.getElementById('principalAmount').textContent = '$' + principal.toFixed(2);
            document.getElementById('interestEarned').textContent = '$' + interest.toFixed(2);
            document.getElementById('totalValue').textContent = '$' + total.toFixed(2);
            
            // Show results
            document.getElementById('calculatorResults').style.display = 'none';
            document.getElementById('resultCard').style.display = 'block';
        }

        // Chat button click handler
        document.querySelector('.chat-button').addEventListener('click', function() {
            alert('Our support team is available 24/7. Please call us at +1 (555) 123-4567 or email support@elitemf.com');
        });

        // Close mobile menu when clicking a link
        const navLinks = document.querySelectorAll('.nav-link, .dropdown-item');
        const navbarCollapse = document.querySelector('.navbar-collapse');
        
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                    bsCollapse.hide();
                }
            });
        });
    </script>
</body>
</html>