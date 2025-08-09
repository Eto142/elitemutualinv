<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elite Mutual Investment - Register</title>
  <script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
      <!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <style>
    /* ===== BASE STYLES ===== */
    :root {
      --primary: #2563eb;
      --primary-hover: #1d4ed8;
      --text-light: #1e293b;
      --text-dark: #f1f5f9;
      --bg-light: #f8fafc;
      --bg-dark: #0f172a;
      --card-light: #ffffff;
      --card-dark: #1e293b;
      --border-light: #cbd5e1;
      --border-dark: #475569;
      --gray-light: #64748b;
      --gray-dark: #94a3b8;
      --step-active: #2563eb;
      --step-inactive: #e2e8f0;
      --step-text-active: white;
      --step-text-inactive: #64748b;
    }
    
    @font-face {
      font-family: 'BaselBook';
      src: url('/assets/BaselBook.woff2') format('woff2');
      font-weight: 400;
      font-display: swap;
      -webkit-font-smoothing: antialiased;
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'BaselBook', sans-serif;
      background-color: var(--bg-light);
      color: var(--text-light);
      -webkit-font-smoothing: antialiased;
      line-height: 1.5;
    }
    
    .dark {
      background-color: var(--bg-dark);
      color: var(--text-dark);
    }
    
    .dark .step-inactive {
      background: #334155;
      color: var(--gray-dark);
    }
    
    /* ===== LAYOUT STRUCTURE ===== */
    .register-container {
      display: grid;
      place-items: center;
      min-height: 100vh;
      padding: 1rem;
    }
    
    .register-card {
      width: 100%;
      max-width: 32rem;
      background: var(--card-light);
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      display: grid;
      gap: 2rem;
    }
    
    .dark .register-card {
      background: var(--card-dark);
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.25);
    }
    
    /* ===== LOGO STYLES ===== */
    .logo-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 1.5rem;
    }
    
    .logo {
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }
    
    .logo-badge {
      width: 3rem;
      height: 3rem;
      background: var(--primary);
      border-radius: 0.375rem;
      display: grid;
      place-items: center;
      color: white;
      font-weight: bold;
      font-size: 1.5rem;
    }
    
    .logo-text {
      font-weight: bold;
      font-size: 1.5rem;
      color: var(--text-light);
    }
    
    .dark .logo-text {
      color: var(--text-dark);
    }
    
    /* ===== PROGRESS STEPS ===== */
    .progress-steps {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
    }
    
    .step {
      display: flex;
      flex-direction: column;
      align-items: center;
      position: relative;
      flex: 1;
    }
    
    .step-number {
      width: 2rem;
      height: 2rem;
      border-radius: 9999px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.875rem;
      font-weight: 500;
      z-index: 1;
    }
    
    .step-active {
      background: var(--step-active);
      color: var(--step-text-active);
    }
    
    .step-inactive {
      background: var(--step-inactive);
      color: var(--step-text-inactive);
    }
    
    .step-connector {
      position: absolute;
      height: 2px;
      width: 100%;
      top: 1rem;
      left: 50%;
      background: var(--step-inactive);
      z-index: 0;
    }
    
    .step-label {
      font-size: 0.75rem;
      margin-top: 0.5rem;
      font-weight: 500;
    }
    
    .step-label-active {
      color: var(--step-active);
    }
    
    .step-label-inactive {
      color: var(--step-text-inactive);
    }
    
    /* ===== FORM COMPONENTS ===== */
    .form-header {
      text-align: center;
    }
    
    .form-header h2 {
      font-size: 1.25rem;
      font-weight: bold;
    }
    
    .register-form {
      display: grid;
      gap: 1.5rem;
    }
    
    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
    }
    
    .form-group {
      display: grid;
      gap: 0.5rem;
    }
    
    .form-label {
      font-size: 0.875rem;
      font-weight: 500;
      color: var(--text-light);
    }
    
    .dark .form-label {
      color: var(--text-dark);
    }
    
    .input-wrapper {
      position: relative;
    }
    
    .form-input {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 1px solid var(--border-light);
      border-radius: 0.375rem;
      font-size: 0.875rem;
      transition: all 0.2s;
    }
    
    .dark .form-input {
      background: var(--card-dark);
      border-color: var(--border-dark);
      color: var(--text-dark);
    }
    
    .form-input:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
    }
    
    .password-toggle {
      position: absolute;
      right: 0.75rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--gray-light);
      cursor: pointer;
    }
    
    .dark .password-toggle {
      color: var(--gray-dark);
    }
    
    .password-toggle:hover {
      color: var(--text-light);
    }
    
    .dark .password-toggle:hover {
      color: var(--text-dark);
    }
    
    /* ===== FORM CONTROLS ===== */
    .form-note {
      font-size: 0.75rem;
      color: var(--gray-light);
      margin-top: 0.25rem;
    }
    
    .dark .form-note {
      color: var(--gray-dark);
    }
    
    .terms-agreement {
      display: flex;
      align-items: flex-start;
      gap: 0.5rem;
      margin: 1rem 0;
    }
    
    .terms-checkbox {
      margin-top: 0.25rem;
    }
    
    .terms-text {
      font-size: 0.875rem;
    }
    
    .terms-link {
      color: var(--primary);
      text-decoration: none;
    }
    
    .terms-link:hover {
      text-decoration: underline;
    }
    
    /* ===== BUTTONS ===== */
    .submit-btn {
      width: 100%;
      background: var(--primary);
      color: white;
      padding: 0.75rem;
      border: none;
      border-radius: 0.375rem;
      font-size: 0.875rem;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.2s;
    }
    
    .submit-btn:hover {
      background: var(--primary-hover);
    }
    
    /* ===== DARK MODE TOGGLE ===== */
    .dark-mode-toggle {
      position: fixed;
      top: 1rem;
      right: 1rem;
    }
  </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
  <div class="register-container">
    <div class="register-card">
      <!-- Logo Section -->
      <div class="logo-container">
        <div class="logo">
          <div class="logo-badge">E</div>
          <span class="logo-text">Elite Mutual Investment</span>
        </div>
        
        <!-- Form Header -->
        <div class="form-header">
          <h2>Create Your Account</h2>
        </div>
      </div>
      
      <!-- Progress Steps -->
      <div class="progress-steps">
        <div class="step">
          <div class="step-number step-active">1</div>
          <div class="step-connector"></div>
          <span class="step-label step-label-active">Details</span>
        </div>
        <div class="step">
          <div class="step-number step-inactive">2</div>
          <div class="step-connector"></div>
          <span class="step-label step-label-inactive">Verify</span>
        </div>
        <div class="step">
          <div class="step-number step-inactive">3</div>
          <span class="step-label step-label-inactive">Complete</span>
        </div>
      </div>

      <!-- Include Toastr & jQuery (make sure these are above the script block below) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

      
      <!-- Registration Form -->
      <form class="register-form" id="registerForm">
         @csrf
        <!-- Name Fields -->
        <div class="form-grid">
          <div class="form-group">
            <label class="form-label">First Name</label>
            <input type="text" class="form-input" name="first_name" placeholder="Enter your first name" required>
          </div>
          <div class="form-group">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-input" name="last_name" placeholder="Enter your last name" required>
          </div>
        </div>
        
        <!-- Contact Fields -->
        <div class="form-group">
          <label class="form-label">Email Address</label>
          <input type="email" class="form-input" name="email" placeholder="Enter your email" required>
        </div>
        
        <div class="form-group">
          <label class="form-label">Phone Number</label>
          <input type="tel" class="form-input" name="phone" placeholder="Enter your phone number" required>
        </div>
        
        <!-- Password Fields -->
        <div class="form-group">
          <label class="form-label">Password</label>
          <div class="input-wrapper">
            <input type="password" id="password" class="form-input"  name="password" placeholder="Create a password" required>
            <i data-lucide="eye" class="password-toggle" id="toggle-password"></i>
          </div>
          <p class="form-note">Must be at least 8 characters with 1 uppercase, 1 number, and 1 special character</p>
        </div>
        
        <div class="form-group">
          <label class="form-label">Confirm Password</label>
          <div class="input-wrapper">
            <input type="password" id="confirm-password" class="form-input"  name="password_confirmation"placeholder="Confirm your password" required>
            <i data-lucide="eye" class="password-toggle" id="toggle-confirm-password"></i>
          </div>
        </div>
        
        <!-- Terms Agreement -->
        <div class="terms-agreement">
          <input type="checkbox" id="terms" class="terms-checkbox" required>
          <label for="terms" class="terms-text">
            I agree to the <a href="#" class="terms-link">Terms of Service</a> and <a href="#" class="terms-link">Privacy Policy</a>
          </label>
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="submit-btn">Continue</button>
      </form>
    </div>
  </div>
  
  <!-- Dark Mode Toggle -->
  <div class="dark-mode-toggle">
    <label class="relative inline-flex items-center cursor-pointer">
      <input type="checkbox" id="dark-mode-toggle" class="sr-only peer">
      <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
    </label>
  </div>

  <script>
    // Initialize icons
    lucide.createIcons();
    
    // Dark mode toggle functionality
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    
    // Check for saved dark mode preference
    if (localStorage.getItem('darkMode') === 'enabled') {
      document.documentElement.classList.add('dark');
      darkModeToggle.checked = true;
    }
    
    // Toggle dark mode
    darkModeToggle.addEventListener('change', function() {
      if (this.checked) {
        document.documentElement.classList.add('dark');
        localStorage.setItem('darkMode', 'enabled');
      } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('darkMode', 'disabled');
      }
    });
    
    // Password visibility toggle
    function setupPasswordToggle(passwordId, toggleId) {
      const toggle = document.getElementById(toggleId);
      const passwordInput = document.getElementById(passwordId);
      
      toggle.addEventListener('click', function() {
        const isPassword = passwordInput.type === 'password';
        passwordInput.type = isPassword ? 'text' : 'password';
        toggle.setAttribute('data-lucide', isPassword ? 'eye-off' : 'eye');
        lucide.createIcons();
      });
    }
    
    setupPasswordToggle('password', 'toggle-password');
    setupPasswordToggle('confirm-password', 'toggle-confirm-password');
  </script>



<script>
    $(document).ready(function () {
        $('#registerForm').on('submit', function (e) {
            e.preventDefault();

            let formData = $(this).serialize();

            $.ajax({
                url: "{{ route('register') }}",
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (response) {
                    toastr.success(response.message || 'Registration successful! Redirecting...');
                    setTimeout(function () {
                        window.location.href = response.redirect || "{{ route('login') }}";
                    }, 2000);
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        toastr.error(xhr.responseJSON?.error || 'Something went wrong.');
                        console.error(xhr.responseJSON?.details);
                    }
                }
            });
        });
    });
</script>

</body>
</html>

<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '5574729be7c1edf96e04e6088424ba90cade0bbd';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>