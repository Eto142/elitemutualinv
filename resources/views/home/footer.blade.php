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
                        <li class="footer-links-item"><a href="#" class="footer-links-link">Home</a></li>
                        <li class="footer-links-item"><a href="#" class="footer-links-link">About Us</a></li>
                        <li class="footer-links-item"><a href="#" class="footer-links-link">Fixed Deposit</a></li>
                        <li class="footer-links-item"><a href="#" class="footer-links-link">Mutual Funds</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
                    <h3 class="footer-links-title">Calculators</h3>
                    <ul class="footer-links-list">
                        <li class="footer-links-item"><a href="#" class="footer-links-link">SIP Calculator</a></li>
                        <li class="footer-links-item"><a href="#" class="footer-links-link">FD Calculator</a></li>
                        <li class="footer-links-item"><a href="#" class="footer-links-link">Retirement Calculator</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
                    <h3 class="footer-links-title">Legal</h3>
                    <ul class="footer-links-list">
                        <li class="footer-links-item"><a href="#" class="footer-links-link">Privacy Policy</a></li>
                        <li class="footer-links-item"><a href="#" class="footer-links-link">Terms of Service</a></li>
                        <li class="footer-links-item"><a href="#" class="footer-links-link">Cookie Policy</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6">
                    <h3 class="footer-links-title">Contact</h3>
                    <ul class="footer-links-list">
                        <li class="footer-links-item"><a href="#" class="footer-links-link">Contact Us</a></li>
                        <li class="footer-links-item"><a href="#" class="footer-links-link">Support</a></li>
                        <li class="footer-links-item"><a href="#" class="footer-links-link">Careers</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p class="footer-copyright">© 2023 Elite Mutual Investment. All rights reserved.</p>
                <div class="footer-legal-links">
                    <a href="#" class="footer-legal-link">Privacy Policy</a>
                    <a href="#" class="footer-legal-link">Terms of Service</a>
                    <a href="#" class="footer-legal-link">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Chat Button -->
    <button class="chat-button">
        <i class="bi bi-chat-dots"></i>
    </button>

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

        // Smooth scrolling for navigation links
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

        // Chat button click handler
        document.querySelector('.chat-button').addEventListener('click', function() {
            alert('Our support team is available 24/7. Please call us at +1 (555) 123-4567 or email support@elitemf.com');
        });

        // Approach indicator click handler
        document.querySelector('.approach-indicator').addEventListener('click', function() {
            document.querySelector('#features').scrollIntoView({
                behavior: 'smooth'
            });
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