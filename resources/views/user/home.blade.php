<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Mutual Investment Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

        /* Custom styles that might not be in Tailwind */
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        
        /* Add transition for dark mode */
        html {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Base font */
        body {
            font-family: 'BaselBook', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
            font-weight: 400;
            letter-spacing: -0.01em;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        /* Headings and bold text */
        .font-bold, .font-medium, h1, h2, h3, h4, h5, h6 {
            font-family: 'BaselBook', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            font-weight: 400;
            letter-spacing: -0.01em;
            -webkit-text-stroke: 0.3px;
        }

        /* Safari-specific adjustments */
        @supports (-webkit-hyphens:none) {
            body {
                -webkit-font-smoothing: antialiased;
                text-shadow: none;
            }
            
            .font-bold, .font-medium, h1, h2, h3, h4, h5, h6 {
                -webkit-font-smoothing: antialiased;
                -webkit-text-stroke: 0.35px;
                text-shadow: none;
            }
            
            /* Enhance text that needs more weight */
            .text-2xl, .text-xl, .text-lg {
                -webkit-text-stroke: 0.35px;
                text-shadow: none;
            }
        }

        @media (prefers-color-scheme: dark) {
            /* Enhance text that needs more weight */
            .text-2xl, .text-xl, .text-lg {
                -webkit-text-stroke: 0.35px;
                text-shadow: none;
            }
        }

        /* Layout Styles */
        .sidebar {
            width: 250px;
            background-color: #ffffff;
            border-right: 1px solid #e9ecef;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: transform 0.3s ease;
        }
        .sidebar.collapsed {
            transform: translateX(-100%);
        }
        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e9ecef;
            height: 72px;
        }
        .sidebar-nav {
            flex-grow: 1;
            padding: 1.5rem;
            overflow-y: auto;
        }
        .sidebar-nav .nav-link {
            color: #6c757d;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 500;
            white-space: nowrap;
        }
        .sidebar-nav .nav-link.active {
            background-color: #e0f2fe;
            color: #0d6efd;
        }
        .sidebar-nav .nav-link:hover:not(.active) {
            background-color: #f0f2f5;
            color: #212529;
        }
        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid #e9ecef;
        }
        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            margin-left: 250px;
            transition: margin 0.3s ease;
            min-width: 0; /* Fix for flexbox overflow issues */
        }
        .main-content.expanded {
            margin-left: 0;
        }
        .main-header {
            background-color: #ffffff;
            border-bottom: 1px solid #e9ecef;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            height: 72px;
        }
        .content-area {
            padding: 1.5rem;
            flex-grow: 1;
            width: 100%;
            overflow-x: auto; /* Allow horizontal scrolling on small devices */
        }
        .summary-card .card-body {
            padding: 1.5rem;
        }
        .summary-card .card-title {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }
        .summary-card .card-text {
            font-size: 1.75rem;
            font-weight: 700;
            color: #212529;
            -webkit-text-stroke: 0.35px;
        }
        .summary-card .change-text {
            font-size: 0.875rem;
            font-weight: 500;
        }
        .transaction-table th {
            color: #6c757d;
            font-weight: 500;
        }
        .transaction-table td {
            vertical-align: middle;
        }
        .transaction-type-dot {
            width: 8px;
            height: 8px;
            background-color: #28a745;
            border-radius: 50%;
            display: inline-block;
            margin-right: 0.5rem;
        }
        .badge-approved {
            background-color: #d4edda;
            color: #155724;
            padding: 0.35em 0.65em;
            border-radius: 0.375rem;
            font-size: 0.75em;
            font-weight: 600;
        }
        .avatar-sy {
            background-color: #0d6efd;
            color: #ffffff;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.9rem;
        }
        .logo-e {
            background-color: #0d6efd;
            color: #ffffff;
            width: 32px;
            height: 32px;
            border-radius: 0.375rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1rem;
        }
        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.25rem;
            color: #6c757d;
            padding: 0.5rem;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }
        
        /* No scroll class for when sidebar is open */
        .no-scroll {
            overflow: hidden;
        }

        /* Mobile-specific styles */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            .sidebar-toggle {
                display: block;
            }
            .overlay.active {
                display: block;
            }
            
            /* Adjust content padding on mobile */
            .content-area {
                padding: 1rem;
            }
            
            /* Summary cards adjustments */
            .summary-card .card-body {
                padding: 1rem;
            }
            .summary-card .card-text {
                font-size: 1.5rem;
            }
            
            /* Transaction table adjustments */
            .transaction-table {
                font-size: 0.875rem;
            }
            .transaction-table th, 
            .transaction-table td {
                padding: 0.5rem;
            }
        }

        /* Small mobile adjustments */
        @media (max-width: 576px) {
            .sidebar {
                width: 80%;
            }
            
            .main-header {
                padding: 1rem;
            }
            
            .summary-card .card-text {
                font-size: 1.25rem;
            }
            
            /* Stack summary cards on very small screens */
            .summary-cards-container .col {
                flex: 0 0 100%;
                max-width: 100%;
            }
            
            /* Hide some table columns on very small screens */
            .transaction-table th:nth-child(3),
            .transaction-table td:nth-child(3) {
                display: none;
            }
        }
    </style>
</head>
<body>
     <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="logo-e">E</div>
                    <span class="fw-semibold text-dark">Elite Mutual Investment</span>
                </div>
            </div>
            <div class="sidebar-nav scrollbar-hide">
                <div class="text-muted text-sm mb-3">Menu</div>
                <nav class="nav flex-column">
                    <a class="nav-link active" href="{{ route('user.home') }}">
                        <i class="bi bi-grid"></i> Overview
                    </a>
                    <a class="nav-link" href="{{ route('user.deposit') }}">
                        <i class="bi bi-arrow-down-circle"></i> Deposit
                    </a>
                    <a class="nav-link" href="{{ route('user.fixed.deposit') }}">
                        <i class="bi bi-bank"></i> Fixed Deposit
                    </a>
                    <a class="nav-link" href="{{ route('user.mutual.funds') }}">
                        <i class="bi bi-graph-up"></i> Mutual Funds
                    </a>
                    <a class="nav-link" href="{{ route('user.withdrawal') }}">
                        <i class="bi bi-arrow-up-circle"></i> Withdrawal
                    </a>
                    <a class="nav-link" href="#">
                        <i class="bi bi-file-earmark-text"></i> Transactions
                    </a>
                </nav>

                <div class="text-muted text-sm mt-5 mb-3">Profile & Help</div>
                <nav class="nav flex-column">
                    <a class="nav-link" href="{{ route('user.profile') }}">
                        <i class="bi bi-person"></i> Profile
                    </a>
                    <a class="nav-link" href="{{ route('user.withdrawal') }}">
                        <i class="bi bi-question-circle"></i> Help & Center
                    </a>
                </nav>
            </div>

            <div class="sidebar-footer">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-moon text-muted"></i>
                        <span class="text-muted text-sm">Dark Mode</span>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="darkModeSwitch">
                        <label class="form-check-label visually-hidden" for="darkModeSwitch">Toggle Dark Mode</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Overlay for mobile sidebar -->
        <div class="overlay" id="overlay"></div>
    
        <!-- Main Content -->
        <div class="main-content" id="mainContent">
            <div class="main-header">
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <h1 class="h4 fw-semibold text-dark mb-0">Overview</h1>
                <div class="avatar-sy">{{ Auth::user()->first_name }}</div>
            </div>

            <div class="content-area">
                <!-- Welcome Message -->
                <div class="d-flex align-items-center justify-content-between mb-4 mb-md-5">
                    <div class="d-flex align-items-center gap-2">
                        <h2 class="h5 fw-semibold text-dark mb-0">Welcome, {{ Auth::user()->first_name }}</h2>
                        <span class="fs-5">👋</span>
                    </div>
                    <button class="btn btn-link text-muted p-0" aria-label="Chat">
                        <i class="bi bi-chat-dots fs-5"></i>
                    </button>
                </div>

                <!-- Summary Cards -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-4 mb-md-5 summary-cards-container">
                    <div class="col">
                        <div class="card summary-card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <i class="bi bi-wallet2 text-success fs-5"></i>
                                    <span class="card-title">Cash Balance</span>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="card-text">$49.40</div>
                                    <div class="change-text text-success">↑ 1.000%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card summary-card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <i class="bi bi-bank text-warning fs-5"></i>
                                    <span class="card-title">Fixed Deposit</span>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="card-text">$494,316.86</div>
                                    <div class="change-text text-success">↑ 0.24%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card summary-card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <i class="bi bi-graph-up text-info fs-5"></i>
                                    <span class="card-title">Mutual Funds</span>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="card-text">$224,275.77</div>
                                    <div class="change-text text-success">↑ 0.69%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card summary-card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <i class="bi bi-calculator text-primary fs-5"></i>
                                    <span class="card-title">Total Networth</span>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="card-text">$718,642.03</div>
                                    <div class="change-text text-success">↑ 0.38%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Transaction History -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h3 class="h5 fw-semibold text-dark mb-0">Transaction History</h3>
                            <a href="#" class="text-primary text-decoration-none fw-medium">
                                See all <i class="bi bi-chevron-right small"></i>
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-borderless transaction-table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">From</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col" class="text-end"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>TRDP0527109</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="transaction-type-dot"></span>
                                                <span class="text-success fw-medium">Deposit</span>
                                            </div>
                                        </td>
                                        <td>Bank</td>
                                        <td>Nov 27, 2024</td>
                                        <td><span class="badge badge-approved">Approved</span></td>
                                        <td class="fw-semibold text-dark">+$55,000.00</td>
                                        <td class="text-end">
                                            <a href="#" class="text-primary text-decoration-none fw-medium">Details</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TRDP0527670</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="transaction-type-dot"></span>
                                                <span class="text-success fw-medium">Deposit</span>
                                            </div>
                                        </td>
                                        <td>Bank</td>
                                        <td>May 17, 2024</td>
                                        <td><span class="badge badge-approved">Approved</span></td>
                                        <td class="fw-semibold text-dark">+$120,000.00</td>
                                        <td class="text-end">
                                            <a href="#" class="text-primary text-decoration-none fw-medium">Details</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TRDP0527018</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="transaction-type-dot"></span>
                                                <span class="text-success fw-medium">Deposit</span>
                                            </div>
                                        </td>
                                        <td>Bank</td>
                                        <td>Mar 27, 2024</td>
                                        <td><span class="badge badge-approved">Approved</span></td>
                                        <td class="fw-semibold text-dark">+$150,000.00</td>
                                        <td class="text-end">
                                            <a href="#" class="text-primary text-decoration-none fw-medium">Details</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const mainContent = document.getElementById('mainContent');
            const overlay = document.getElementById('overlay');
            
            // Toggle sidebar on mobile
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('active');
                document.body.classList.toggle('no-scroll');
            });
            
            // Close sidebar when clicking on overlay
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
            handleResize(); // Initialize on load
        });
    </script>
</body>
</html>