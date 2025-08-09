<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elite Mutual Investment - Login</title>
  <script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <!-- Include Toastr & jQuery -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
      --radius: 0.5rem;
      --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      --shadow-dark: 0 4px 6px -1px rgba(0, 0, 0, 0.25);
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
      min-height: 100vh;
    }
    
    .dark {
      background-color: var(--bg-dark);
      color: var(--text-dark);
    }
    
    /* ===== LAYOUT STRUCTURE ===== */
    .login-container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 1.5rem;
    }
    
    .login-card {
      width: 100%;
      max-width: 28rem;
      background: var(--card-light);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 2rem;
      display: grid;
      gap: 1.75rem;
    }
    
    .dark .login-card {
      background: var(--card-dark);
      box-shadow: var(--shadow-dark);
    }
    
    .logo-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 1.25rem;
      text-align: center;
    }
    
    .logo {
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }
    
    .logo-badge {
      width: 2.75rem;
      height: 2.75rem;
      background: var(--primary);
      border-radius: 0.375rem;
      display: grid;
      place-items: center;
      color: white;
      font-weight: bold;
      font-size: 1.25rem;
    }
    
    .logo-text {
      font-weight: bold;
      font-size: 1.25rem;
      color: var(--text-light);
    }
    
    .dark .logo-text {
      color: var(--text-dark);
    }
    
    /* ===== FORM COMPONENTS ===== */
    .form-header {
      text-align: center;
    }
    
    .form-header h2 {
      font-size: 1.25rem;
      font-weight: bold;
      margin-bottom: 0.25rem;
    }
    
    .login-form {
      display: grid;
      gap: 1.25rem;
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
      padding: 0.75rem 1rem 0.75rem 2.5rem;
      border: 1px solid var(--border-light);
      border-radius: var(--radius);
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
    
    .input-icon {
      position: absolute;
      left: 0.75rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--gray-light);
      width: 1.25rem;
      height: 1.25rem;
    }
    
    .dark .input-icon {
      color: var(--gray-dark);
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
    .form-controls {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 0.5rem;
    }
    
    .remember-me {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    
    .remember-checkbox {
      width: 1rem;
      height: 1rem;
    }
    
    .forgot-link {
      font-size: 0.875rem;
      color: var(--primary);
      text-decoration: none;
    }
    
    .forgot-link:hover {
      text-decoration: underline;
    }
    
    /* ===== BUTTONS ===== */
    .submit-btn {
      width: 100%;
      background: var(--primary);
      color: white;
      padding: 0.75rem;
      border: none;
      border-radius: var(--radius);
      font-size: 0.875rem;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.2s;
    }
    
    .submit-btn:hover {
      background: var(--primary-hover);
    }
    
    /* ===== FOOTER ELEMENTS ===== */
    .signup-link {
      text-align: center;
      font-size: 0.875rem;
      color: var(--gray-light);
    }
    
    .dark .signup-link {
      color: var(--gray-dark);
    }
    
    .signup-link a {
      color: var(--primary);
      text-decoration: none;
      font-weight: 500;
    }
    
    .signup-link a:hover {
      text-decoration: underline;
    }
    
    .footer {
      text-align: center;
      font-size: 0.75rem;
      color: var(--gray-light);
      margin-top: 0.5rem;
    }
    
    .dark .footer {
      color: var(--gray-dark);
    }
    
    /* ===== DARK MODE TOGGLE ===== */
    .dark-mode-toggle {
      position: fixed;
      top: 1rem;
      right: 1rem;
      z-index: 10;
    }
    
    /* Responsive adjustments */
    @media (max-width: 640px) {
      .login-container {
        padding: 1rem;
      }
      
      .login-card {
        padding: 1.5rem;
      }
      
      .logo {
        flex-direction: column;
        gap: 0.5rem;
      }
      
      .logo-text {
        font-size: 1.1rem;
      }
      
      .form-header h2 {
        font-size: 1.1rem;
      }
    }
    
    @media (max-width: 400px) {
      .login-card {
        padding: 1.25rem;
      }
      
      .form-controls {
        flex-direction: column;
        align-items: flex-start;
      }
      
      .forgot-link {
        margin-top: 0.25rem;
      }
    }
  </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
  <div class="login-container">
    <div class="login-card">
      <!-- Logo Section -->
      <div class="logo-container">
        <div class="logo">
          <div class="logo-badge">E</div>
          <span class="logo-text">Elite Mutual Investment</span>
        </div>
        
        <!-- Form Header -->
        <div class="form-header">
          <h2>Welcome Back</h2>
          <p class="text-sm text-gray-500 dark:text-gray-400">Please enter your credentials to login</p>
        </div>
      </div>
      
      <!-- Login Form -->
      <form id="loginForm"> 
        @csrf
        <!-- Email Field -->
        <div class="form-group">
          <label for="email" class="form-label">Email Address</label>
          <div class="input-wrapper">
            <i data-lucide="mail" class="input-icon"></i>
            <input type="email" id="email" class="form-input" name="email" placeholder="Enter your email" required>
          </div>
        </div>
        
        <!-- Password Field -->
        <div class="form-group">
          <label for="password" class="form-label">Password</label>
          <div class="input-wrapper">
            <i data-lucide="lock" class="input-icon"></i>
            <input type="password" id="password" class="form-input" name="password" placeholder="Enter your password" required>
            <i data-lucide="eye" class="password-toggle" id="toggle-password"></i>
          </div>
        </div>
        
        <!-- Form Controls -->
        <div class="form-controls">
          <div class="remember-me">
            <input type="checkbox" id="remember-me" class="remember-checkbox">
            <label for="remember-me" class="form-label">Remember me</label>
          </div>
          <a href="#" class="forgot-link">Forgot Password?</a>
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="submit-btn">Sign In</button>
      </form>
      
      <!-- Sign Up Link -->
      <div class="signup-link">
        Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
      </div>
      
      <!-- Footer -->
      <div class="footer">
        &copy; 2024 Elite Mutual Investment. All rights reserved.
      </div>
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
    if (localStorage.getItem('darkMode') === 'enabled' || 
        (window.matchMedia('(prefers-color-scheme: dark)').matches && !localStorage.getItem('darkMode'))) {
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
    const passwordToggle = document.getElementById('toggle-password');
    const passwordInput = document.getElementById('password');
    
    passwordToggle.addEventListener('click', function() {
      const isPassword = passwordInput.type === 'password';
      passwordInput.type = isPassword ? 'text' : 'password';
      passwordToggle.setAttribute('data-lucide', isPassword ? 'eye-off' : 'eye');
      lucide.createIcons();
    });
    
    // Configure toastr
    toastr.options = {
      closeButton: true,
      progressBar: true,
      positionClass: 'toast-top-right',
      timeOut: 5000,
      extendedTimeOut: 2000,
    };
  </script>

  <script>
    document.getElementById('loginForm').addEventListener('submit', async function(e) {
      e.preventDefault();

      const form = e.target;
      const formData = new FormData(form);
      const token = document.querySelector('input[name="_token"]').value;

      try {
        const response = await fetch("{{ route('login') }}", {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': token,
            'Accept': 'application/json',
          },
          body: formData
        });

        const data = await response.json();

        if (response.ok && data.success) {
          toastr.success(data.message || 'Login successful! Redirecting...');
          setTimeout(() => {
            window.location.href = data.redirect || "{{ route('user.home') }}";
          }, 1500);
        } else {
          let errorMsg = data.message || 'Login failed.';
          if (data.errors) {
            for (const key in data.errors) {
              if (data.errors.hasOwnProperty(key)) {
                toastr.error(data.errors[key][0]);
              }
            }
          } else {
            toastr.error(errorMsg);
          }
        }

      } catch (error) {
        toastr.error("Something went wrong. Please try again.");
        console.error("Login error:", error);
      }
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