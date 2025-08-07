@include('user.header')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Mutual Investment - Fixed Deposit</title>
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
            text-rendering: optimizeLegibility;
        }

        :root {
            --primary-color: #0d6efd;
            --primary-hover: #0b5ed7;
            --sidebar-bg: #ffffff;
            --sidebar-border: #e9ecef;
            --sidebar-text: #6c757d;
            --sidebar-active-bg: #e0f2fe;
            --sidebar-active-text: #0d6efd;
            --sidebar-hover-bg: #f0f2f5;
            --main-bg: #f8f9fa;
            --card-bg: #ffffff;
            --card-border: #e9ecef;
            --text-color: #212529;
            --text-muted: #6c757d;
            --header-bg: #ffffff;
            --header-border: #e9ecef;
            --table-header: #6c757d;
            --table-row: #212529;
            --success-bg: #d4edda;
            --success-text: #155724;
            --success-dot: #28a745;
            --warning-bg: #fff3cd;
            --warning-text: #856404;
            --danger-bg: #f8d7da;
            --danger-text: #721c24;
        }

        [data-theme="dark"] {
            --primary-color: #0d6efd;
            --primary-hover: #0b5ed7;
            --sidebar-bg: #1e1e1e;
            --sidebar-border: #2d2d2d;
            --sidebar-text: #adb5bd;
            --sidebar-active-bg: rgba(13, 110, 253, 0.2);
            --sidebar-active-text: #0d6efd;
            --sidebar-hover-bg: #2d2d2d;
            --main-bg: #121212;
            --card-bg: #1e1e1e;
            --card-border: #2d2d2d;
            --text-color: #f8f9fa;
            --text-muted: #adb5bd;
            --header-bg: #1e1e1e;
            --header-border: #2d2d2d;
            --table-header: #adb5bd;
            --table-row: #f8f9fa;
            --success-bg: rgba(40, 167, 69, 0.2);
            --success-text: #28a745;
            --success-dot: #28a745;
            --warning-bg: rgba(255, 193, 7, 0.2);
            --warning-text: #ffc107;
            --danger-bg: rgba(220, 53, 69, 0.2);
            --danger-text: #dc3545;
        }

        body {
            font-family: 'BaselBook', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            background-color: var(--main-bg);
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .sidebar {
            width: 250px;
            background-color: var(--sidebar-bg);
            border-right: 1px solid var(--sidebar-border);
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: transform 0.3s ease, background-color 0.3s ease, border-color 0.3s ease;
        }

        .main-content {
            margin-left: 250px;
            transition: margin 0.3s ease;
        }

        .main-header {
            background-color: var(--header-bg);
            border-bottom: 1px solid var(--header-border);
            padding: 1.5rem;
            position: sticky;
            top: 0;
            z-index: 100;
            height: 72px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .content-area {
            padding: 1.5rem;
        }

        .card {
            background-color: var(--card-bg);
            border: 1px solid var(--card-border);
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .fd-summary-card {
            border-left: 4px solid var(--primary-color);
        }

        .fd-active {
            border-left: 4px solid var(--success-dot);
        }

        .fd-matured {
            border-left: 4px solid var(--warning-text);
        }

        .fd-closed {
            border-left: 4px solid var(--danger-text);
        }

        .badge-active {
            background-color: var(--success-bg);
            color: var(--success-text);
        }

        .badge-matured {
            background-color: var(--warning-bg);
            color: var(--warning-text);
        }

        .badge-closed {
            background-color: var(--danger-bg);
            color: var(--danger-text);
        }

        .tenure-option {
            border: 1px solid var(--card-border);
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .tenure-option:hover {
            border-color: var(--primary-color);
        }

        .tenure-option.selected {
            border-color: var(--primary-color);
            background-color: rgba(13, 110, 253, 0.05);
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Overlay for mobile sidebar -->
    <div class="overlay"></div>
        <!-- Main Content -->
        <div class="main-content" id="mainContent">
            <div class="main-header">
                <button class="sidebar-toggle d-lg-none" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <h1 class="h4 fw-semibold mb-0">Fixed Deposits</h1>
                <div class="avatar-sy bg-primary text-white rounded-circle d-flex align-items-center justify-content-center">
                    {{ Auth::user()->first_name }}
                </div>
            </div>

            <div class="content-area">
                <!-- Fixed Deposit Summary -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="h4 mb-0">Fixed Deposit Portfolio</h2>
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#newFdModal">
                                <i class="bi bi-plus"></i> New Fixed Deposit
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                    <div class="col">
                        <div class="card fd-summary-card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-wallet2 text-primary"></i>
                                        <span class="card-title">Total Principal</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="card-text">$0.00</div>
                                    <div class="text-muted small">Across all deposits</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card fd-summary-card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-graph-up-arrow text-success"></i>
                                        <span class="card-title">Interest Earned</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="card-text">$0.00</div>
                                    <div class="text-muted small">Total accrued interest</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card fd-summary-card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-clock-history text-warning"></i>
                                        <span class="card-title">Active Deposits</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="card-text">0</div>
                                    <div class="text-muted small">Currently earning interest</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Create New Fixed Deposit Modal -->
                <div class="modal fade" id="newFdModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Create New Fixed Deposit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               <form id="newFdForm" method="POST" action="{{ route('user.deposit.store') }}">
    @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Amount</label>
            <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" name="amount" class="form-control" placeholder="1,000.00" min="1000" step="1" required>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Tenure</label>
            <select name="tenure" class="form-select" required>
                <option value="">Select tenure</option>
                <option value="3">3 Months (3.5% p.a.)</option>
                <option value="6">6 Months (4.2% p.a.)</option>
                <option value="12">1 Year (5.1% p.a.)</option>
                <option value="24">2 Years (5.8% p.a.)</option>
                <option value="36">3 Years (6.5% p.a.)</option>
            </select>
        </div>
        <div class="col-12">
            <label class="form-label">Payment Method</label>
            <select name="payment_method" class="form-select" required>
                <option value="">Select payment method</option>
                <option value="wallet">Wallet Balance ($5,342.50)</option>
                <option value="bank">Bank Transfer</option>
            </select>
        </div>

        <!-- Optional: Add live JS summary later -->
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Submit Deposit</button>
        </div>
    </div>
</form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" form="newFdForm" class="btn btn-primary">Create Fixed Deposit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Fixed Deposits -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="h5 mb-0">Active Fixed Deposits</h3>
                        <span class="badge bg-primary rounded-pill"></span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>FD Number</th>
                                        <th>Principal</th>
                                        <th>Interest Rate</th>
                                        <th>Start Date</th>
                                        <th>Maturity Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="fd-active">
                                        {{-- <td>FD-2025-045</td>
                                        <td>$10,000.00</td>
                                        <td>5.8% p.a.</td>
                                        <td>15 Jan 2025</td>
                                        <td>15 Jan 2025</td>
                                        <td><span class="badge badge-active">Active</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-secondary">View</button>
                                        </td> --}}
                                    </tr>
                                   
                                </tbody>
                            </table>
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
            // Theme toggle functionality
            const darkModeSwitch = document.getElementById('darkModeSwitch');
            const themeIcon = document.getElementById('theme-icon');
            const themeText = document.getElementById('theme-text');
            
            // Check for saved theme preference or use system preference
            const savedTheme = localStorage.getItem('theme');
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            // Set initial theme
            if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
                document.documentElement.setAttribute('data-theme', 'dark');
                darkModeSwitch.checked = true;
                themeIcon.classList.add('bi-moon-fill');
                themeText.textContent = 'Light Mode';
            } else {
                document.documentElement.setAttribute('data-theme', 'light');
                darkModeSwitch.checked = false;
                themeIcon.classList.add('bi-sun-fill');
                themeText.textContent = 'Dark Mode';
            }
            
            // Theme switcher
            darkModeSwitch.addEventListener('change', function() {
                if (this.checked) {
                    document.documentElement.setAttribute('data-theme', 'dark');
                    localStorage.setItem('theme', 'dark');
                    themeIcon.classList.remove('bi-sun-fill');
                    themeIcon.classList.add('bi-moon-fill');
                    themeText.textContent = 'Light Mode';
                } else {
                    document.documentElement.setAttribute('data-theme', 'light');
                    localStorage.setItem('theme', 'light');
                    themeIcon.classList.remove('bi-moon-fill');
                    themeIcon.classList.add('bi-sun-fill');
                    themeText.textContent = 'Dark Mode';
                }
            });
            
            // Mobile sidebar toggle
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const overlay = document.querySelector('.overlay');
            
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('active');
                document.body.classList.toggle('no-scroll');
            });
            
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('show');
                overlay.classList.remove('active');
                document.body.classList.remove('no-scroll');
            });
            
            // Close sidebar when clicking on a nav link (for mobile)
            const navLinks = document.querySelectorAll('.sidebar-nav .nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        sidebar.classList.remove('show');
                        overlay.classList.remove('active');
                        document.body.classList.remove('no-scroll');
                    }
                });
            });
            
            // Handle window resize
            function handleResize() {
                if (window.innerWidth >= 992) {
                    sidebar.classList.remove('show');
                    overlay.classList.remove('active');
                    document.body.classList.remove('no-scroll');
                }
            }
            
            window.addEventListener('resize', handleResize);

            // Tenure selection functionality
            const tenureOptions = document.querySelectorAll('.tenure-option');
            tenureOptions.forEach(option => {
                option.addEventListener('click', function() {
                    tenureOptions.forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });

            // Form submission
            const newFdForm = document.getElementById('newFdForm');
            if (newFdForm) {
                newFdForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    // Process form submission here
                    alert('Fixed deposit created successfully!');
                    const modal = bootstrap.Modal.getInstance(document.getElementById('newFdModal'));
                    modal.hide();
                });
            }
        });
    </script>
</body>
</html>

@include('user.footer')