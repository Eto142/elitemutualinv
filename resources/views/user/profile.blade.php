@include('user.header')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elite Mutual Fund - Profile</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    @font-face {
      font-family: 'BaselBook';
      src: url('/assets/BaselBook-20Oyt1El.woff2') format('woff2');
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    body {
      font-family: 'BaselBook', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      background-color: #f8f9fa;
    }

    /* Sidebar Styles */
    .sidebar {
      width: 280px;
      position: fixed;
      left: 0;
      top: 0;
      bottom: 0;
      z-index: 1000;
      background-color: white;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }

    .main-content {
      margin-left: 280px;
      transition: margin-left 0.3s ease;
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.5);
      z-index: 999;
      display: none;
    }

    /* Header Styles */
    .main-header {
      padding: 1rem;
      background-color: white;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    /* Profile Card Styles */
    .profile-card {
      border-radius: 0.5rem;
      overflow: hidden;
      margin-bottom: 1.5rem;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    /* Avatar Styles */
    .avatar {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background-color: #f0f0f0;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      position: relative;
    }

    .avatar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .avatar-edit {
      position: absolute;
      bottom: 0;
      right: 0;
      background-color: #0d6efd;
      color: white;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
    }

    /* Tab Styles */
    .nav-tabs .nav-link {
      border: none;
      color: #6c757d;
      font-weight: 500;
      padding: 0.75rem 1.5rem;
    }

    .nav-tabs .nav-link.active {
      color: #0d6efd;
      border-bottom: 2px solid #0d6efd;
      background-color: transparent;
    }

    /* Status Badge */
    .badge-verified {
      background-color: #d1fae5;
      color: #065f46;
    }

    /* Responsive Adjustments */
    @media (max-width: 991.98px) {
      .sidebar {
        transform: translateX(-100%);
      }
      
      .sidebar.show {
        transform: translateX(0);
      }
      
      .main-content {
        margin-left: 0 !important;
      }
      
      .overlay.active {
        display: block;
      }
    }

    @media (max-width: 767.98px) {
      .profile-header {
        flex-direction: column;
        text-align: center;
      }
      
      .avatar {
        margin-bottom: 1rem;
      }
    }
  </style>
</head>
<body>
  <!-- Mobile Overlay -->
  @include('user.navbar')
    <!-- Main Content -->
    <div class="main-content flex-grow-1" id="mainContent">
      <!-- Header -->
      <header class="main-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <button class="btn btn-link sidebar-toggle me-2 d-lg-none" id="sidebarToggle">
            <i class="bi bi-list" style="font-size: 1.5rem;"></i>
          </button>
          <h1 class="h5 mb-0">My Profile</h1>
        </div>
        
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown">
            <div class="avatar me-2" style="width: 40px; height: 40px;">
              <span class="text-white">JS</span>
            </div>
            <span>John Smith</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </header>
      
      <!-- Content -->
      <div class="p-4">
        <!-- Profile Header -->
        <div class="card profile-card mb-4">
          <div class="card-body">
            <div class="d-flex flex-column flex-md-row align-items-center gap-4 profile-header">
              <div class="avatar">
                <img src="https://api.dicebear.com/7.x/pixel-art/svg?seed=JohnSmith&backgroundColor=b6e3f4" alt="Profile picture">
                <div class="avatar-edit">
                  <i class="bi bi-camera"></i>
                  <input type="file" id="avatar-upload" class="d-none" accept="image/*">
                </div>
              </div>
              
              <div class="text-center text-md-start">
                <h2 class="h4 mb-1">John Smith</h2>
                <p class="text-muted mb-2">john.smith@example.com</p>
                <span class="badge badge-verified rounded-pill">
                  <i class="bi bi-check-circle-fill me-1"></i> Verified
                </span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs mb-4" id="profileTabs">
          <li class="nav-item">
            <a class="nav-link active" id="personal-tab" data-bs-toggle="tab" href="#personal">Personal Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="security-tab" data-bs-toggle="tab" href="#security">Security</a>
          </li>
        </ul>
        
        <!-- Tab Content -->
        <div class="tab-content" id="profileTabsContent">
          <!-- Personal Information Tab -->
          <div class="tab-pane fade show active" id="personal">
            <div class="card profile-card">
              <div class="card-body">
                <form id="personalInfoForm">
                  <h3 class="h5 mb-4">Basic Information</h3>
                  
                  <div class="row g-3 mb-4">
                    <div class="col-md-6">
                      <label for="firstName" class="form-label">First Name</label>
                      <input type="text" class="form-control" id="firstName" value="John">
                    </div>
                    <div class="col-md-6">
                      <label for="lastName" class="form-label">Last Name</label>
                      <input type="text" class="form-control" id="lastName" value="Smith">
                    </div>
                    <div class="col-md-6">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" value="john.smith@example.com" readonly>
                    </div>
                    <div class="col-md-6">
                      <label for="phone" class="form-label">Phone</label>
                      <input type="tel" class="form-control" id="phone" value="+1 (555) 123-4567">
                    </div>
                    <div class="col-md-6">
                      <label for="dob" class="form-label">Date of Birth</label>
                      <input type="date" class="form-control" id="dob" value="1985-06-15">
                    </div>
                    <div class="col-md-6">
                      <label for="gender" class="form-label">Gender</label>
                      <select class="form-select" id="gender">
                        <option value="male" selected>Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                      </select>
                    </div>
                  </div>
                  
                  <h3 class="h5 mb-4">Address Information</h3>
                  
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label for="country" class="form-label">Country</label>
                      <select class="form-select" id="country">
                        <option value="us" selected>United States</option>
                        <option value="ca">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="au">Australia</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="state" class="form-label">State/Province</label>
                      <input type="text" class="form-control" id="state" value="California">
                    </div>
                  </div>
                  
                  <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary">
                      <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                      Save Changes
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          
          <!-- Security Tab -->
          <div class="tab-pane fade" id="security">
            <div class="card profile-card">
              <div class="card-body">
                <form id="securityForm">
                  <h3 class="h5 mb-4">Change Password</h3>
                  
                  <div class="mb-3">
                    <label for="currentPassword" class="form-label">Current Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" id="currentPassword">
                      <button class="btn btn-outline-secondary" type="button" id="toggleCurrentPassword">
                        <i class="bi bi-eye"></i>
                      </button>
                    </div>
                  </div>
                  
                  <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" id="newPassword">
                      <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">
                        <i class="bi bi-eye"></i>
                      </button>
                    </div>
                    <div class="form-text">Password must be at least 8 characters long and contain a number.</div>
                  </div>
                  
                  <div class="mb-4">
                    <label for="confirmPassword" class="form-label">Confirm New Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" id="confirmPassword">
                      <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                        <i class="bi bi-eye"></i>
                      </button>
                    </div>
                  </div>
                  
                  <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                      <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                      Update Password
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Sidebar toggle
      const sidebar = document.getElementById('sidebar');
      const overlay = document.querySelector('.overlay');
      const sidebarToggle = document.getElementById('sidebarToggle');
      
      sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('show');
        overlay.classList.toggle('active');
        document.body.style.overflow = sidebar.classList.contains('show') ? 'hidden' : '';
      });
      
      overlay.addEventListener('click', function() {
        sidebar.classList.remove('show');
        overlay.classList.remove('active');
        document.body.style.overflow = '';
      });
      
      // Dark mode toggle
      const darkModeSwitch = document.getElementById('darkModeSwitch');
      const savedDarkMode = localStorage.getItem('darkMode');
      
      if (savedDarkMode === 'enabled') {
        document.documentElement.setAttribute('data-bs-theme', 'dark');
        darkModeSwitch.checked = true;
      }
      
      darkModeSwitch.addEventListener('change', function() {
        if (this.checked) {
          document.documentElement.setAttribute('data-bs-theme', 'dark');
          localStorage.setItem('darkMode', 'enabled');
        } else {
          document.documentElement.removeAttribute('data-bs-theme');
          localStorage.setItem('darkMode', 'disabled');
        }
      });
      
      // Avatar upload
      const avatarEdit = document.querySelector('.avatar-edit');
      const avatarUpload = document.getElementById('avatar-upload');
      
      avatarEdit.addEventListener('click', function() {
        avatarUpload.click();
      });
      
      avatarUpload.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
          const file = e.target.files[0];
          const reader = new FileReader();
          
          reader.onload = function(event) {
            document.querySelector('.avatar img').src = event.target.result;
          };
          
          reader.readAsDataURL(file);
        }
      });
      
      // Password visibility toggle
      function setupPasswordToggle(buttonId, inputId) {
        const button = document.getElementById(buttonId);
        const input = document.getElementById(inputId);
        
        button.addEventListener('click', function() {
          const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
          input.setAttribute('type', type);
          button.querySelector('i').classList.toggle('bi-eye');
          button.querySelector('i').classList.toggle('bi-eye-slash');
        });
      }
      
      setupPasswordToggle('toggleCurrentPassword', 'currentPassword');
      setupPasswordToggle('toggleNewPassword', 'newPassword');
      setupPasswordToggle('toggleConfirmPassword', 'confirmPassword');
      
      // Form submissions
      document.getElementById('personalInfoForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const submitBtn = this.querySelector('button[type="submit"]');
        const spinner = submitBtn.querySelector('.spinner-border');
        
        spinner.classList.remove('d-none');
        submitBtn.disabled = true;
        
        // Simulate API call
        setTimeout(function() {
          spinner.classList.add('d-none');
          submitBtn.disabled = false;
          alert('Profile updated successfully!');
        }, 1500);
      });
      
      document.getElementById('securityForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const submitBtn = this.querySelector('button[type="submit"]');
        const spinner = submitBtn.querySelector('.spinner-border');
        
        spinner.classList.remove('d-none');
        submitBtn.disabled = true;
        
        // Simulate API call
        setTimeout(function() {
          spinner.classList.add('d-none');
          submitBtn.disabled = false;
          alert('Password updated successfully!');
          document.getElementById('securityForm').reset();
        }, 1500);
      });
    });
  </script>
</body>
</html>

@include('user.footer')