@include('home.header')
    <!-- Hero Section -->
    <section class="hero-section" id="home">
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
                    Smart Investing<br>
                    for a Secure Future
                </h1>
                <p class="hero-subtitle">
                    Your Future, Our Priority. Achieve financial freedom with our expert guidance 
                    and tailored investment solutions.
                </p>
                <div class="hero-buttons">
                    <a href="{{ route('register') }}" class="btn btn-hero-primary">Get Started</a>
                    <a href="{{ route('login') }}" class="btn btn-hero-secondary"><i class="bi bi-arrow-right me-2"></i>Sign In</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted By Section -->
    <section class="trusted-section section" id="trusted">
        <div class="container text-center">
            <span class="section-badge">TRUSTED BY</span>
            <h2 class="section-title">Join thousands of satisfied investors</h2>
            
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="trusted-image-container">
                        <img src="https://images.unsplash.com/photo-1606857521015-7f9fcf423740?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                             alt="Professional investor using mobile app" 
                             class="trusted-image">
                        <div class="approach-indicator">
                            <div class="approach-dot"></div>
                            <p class="approach-text">Our Approach</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section section" id="features">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-badge">OUR FEATURES</span>
                <h2 class="section-title">Why Choose Elite Mutual Fund</h2>
                <p class="section-subtitle">
                    We combine cutting-edge technology with financial expertise to help you achieve your goals.
                </p>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: var(--primary-blue);">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <h3 class="feature-title">Bank-Grade Security</h3>
                        <p class="feature-description">
                            Your investments are protected with 256-bit encryption and multi-factor authentication.
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
                            Our mutual funds have delivered 18% average annual returns over the past 5 years.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: #8B5CF6;">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h3 class="feature-title">Expert Advisory</h3>
                        <p class="feature-description">
                            Get personalized advice from our team of certified financial advisors.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Investment Options Section -->
    <section class="investment-options section" id="investment-options">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-badge">INVESTMENT OPTIONS</span>
                <h2 class="section-title">Tailored solutions for every investor</h2>
            </div>
            
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="investment-card">
                        <div class="investment-header" style="background: var(--primary-blue);">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <div class="investment-body">
                            <h3 class="investment-title">Mutual Funds</h3>
                            <p class="investment-description">
                                Diversify your portfolio with our expertly managed mutual funds offering competitive returns.
                            </p>
                            <a href="#" class="investment-cta">
                                Explore <i class="bi bi-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 mb-4">
                    <div class="investment-card">
                        <div class="investment-header" style="background: #10B981;">
                            <i class="bi bi-piggy-bank"></i>
                        </div>
                        <div class="investment-body">
                            <h3 class="investment-title">Fixed Deposits</h3>
                            <p class="investment-description">
                                Secure your savings with guaranteed returns and flexible tenure options.
                            </p>
                            <a href="#" class="investment-cta">
                                Explore <i class="bi bi-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section section" id="testimonials">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-badge">TESTIMONIALS</span>
                <h2 class="section-title">What our customers say</h2>
            </div>
            
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card">
                        <div class="mb-3">
                            <i class="bi bi-star-fill text-yellow-400"></i>
                            <i class="bi bi-star-fill text-yellow-400"></i>
                            <i class="bi bi-star-fill text-yellow-400"></i>
                            <i class="bi bi-star-fill text-yellow-400"></i>
                            <i class="bi bi-star-fill text-yellow-400"></i>
                        </div>
                        <p class="testimonial-text">
                            "Elite Mutual Fund has completely transformed how I manage my investments. The platform is intuitive, and the returns have exceeded my expectations."
                        </p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Robert Thompson" class="testimonial-author-avatar">
                            <div>
                                <h4 class="testimonial-author-name">Robert Thompson</h4>
                                <p class="testimonial-author-title">Marketing Director</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card">
                        <div class="mb-3">
                            <i class="bi bi-star-fill text-yellow-400"></i>
                            <i class="bi bi-star-fill text-yellow-400"></i>
                            <i class="bi bi-star-fill text-yellow-400"></i>
                            <i class="bi bi-star-fill text-yellow-400"></i>
                            <i class="bi bi-star-fill text-yellow-400"></i>
                        </div>
                        <p class="testimonial-text">
                            "As a first-time investor, I was nervous. Elite Mutual Fund's advisors guided me through the entire process. I couldn't be happier with my decision!"
                        </p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Jennifer Martinez" class="testimonial-author-avatar">
                            <div>
                                <h4 class="testimonial-author-name">Jennifer Martinez</h4>
                                <p class="testimonial-author-title">Software Engineer</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card">
                        <div class="mb-3">
                            <i class="bi bi-star-fill text-yellow-400"></i>
                            <i class="bi bi-star-fill text-yellow-400"></i>
                            <i class="bi bi-star-fill text-yellow-400"></i>
                            <i class="bi bi-star-fill text-yellow-400"></i>
                            <i class="bi bi-star-fill text-yellow-400"></i>
                        </div>
                        <p class="testimonial-text">
                            "The fixed deposit options at Elite Mutual Fund offer significantly better returns than my bank. The mobile app is fantastic for managing everything on the go."
                        </p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="David Wilson" class="testimonial-author-avatar">
                            <div>
                                <h4 class="testimonial-author-name">David Wilson</h4>
                                <p class="testimonial-author-title">Small Business Owner</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section section" id="cta">
        <div class="container">
            <div class="text-center">
                <h2 class="cta-title">Ready to start your investment journey?</h2>
                <p class="cta-description">
                    Join thousands of investors who trust Elite Mutual Fund with their financial future.
                </p>
                <div class="cta-buttons">
                  <a href="{{ route('register') }}" class="btn btn-hero-primary">Get Started</a>
                    <button class="btn btn-hero-secondary">
                        <i class="bi bi-headset me-2"></i>Contact Us
                    </button>
                </div>
            </div>
        </div>
    </section>

   @include('home.footer')