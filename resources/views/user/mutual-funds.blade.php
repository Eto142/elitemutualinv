
@include('user.header') 
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
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
            font-weight: 400;
            letter-spacing: -0.01em;
            background-color: #f8f9fa;
        }
        /* Headings and bold text */
        .font-bold, .font-medium, h1, h2, h3, h4, h5, h6 {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
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
        }
        .main-content.expanded {
            margin-left: 0;
        }
        .main-header {
            background-color: #ffffff;
            border-bottom: 1px solid #e9ecef;
            padding: 1.5rem;
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
            }
            .sidebar-toggle {
                display: block;
            }
            .overlay.active {
                display: block;
            }
        }
        /* Small mobile adjustments */
        @media (max-width: 576px) {
            .summary-card .card-text {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Overlay for mobile sidebar -->
    <div class="overlay"></div>

    <div class="d-flex">
     
        <!-- Main Content -->
        <div class="main-content" id="mainContent">
            <!-- Main Header -->
            <header class="main-header">
                <div class="d-flex align-items-center">
                    <button class="sidebar-toggle me-3" id="sidebarToggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <h1 class="h5 mb-0">Mutual Funds</h1>
                </div>
                <div class="d-flex align-items-center">
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="avatar-sy me-2"> {{ Auth::user()->first_name }}</div>
                            <span class="d-none d-sm-inline"> {{ Auth::user()->first_name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </header>
            <!-- Content Area -->
            <div class="content-area">
                <!-- Portfolio Summary -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3">
                            <h2 class="h4 mb-3 mb-md-0">My Mutual Fund Portfolio</h2>
                            <div class="d-flex align-items-center text-muted">
                                <i class="bi bi-calendar me-2"></i>
                                <span id="portfolioDate">May 15, 2025</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Summary Cards -->
                <div class="row summary-cards-container mb-4">
                    <div class="col-md-3 col-12 mb-3">
                        <div class="card summary-card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Total Investment</h5>
                                <p class="card-text">$24,847.84</p>
                                <div class="d-flex align-items-center">
                                    <span class="change-text text-success">
                                        <i class="bi bi-arrow-up"></i> 12.5%
                                    </span>
                                    <span class="text-muted ms-2">Overall return</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12 mb-3">
                        <div class="card summary-card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Current Value</h5>
                                <p class="card-text">$28,456.23</p>
                                <div class="d-flex align-items-center">
                                    <span class="change-text text-success">
                                        <i class="bi bi-arrow-up"></i> $3,608.39
                                    </span>
                                    <span class="text-muted ms-2">Absolute gain</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12 mb-3">
                        <div class="card summary-card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Active Funds</h5>
                                <p class="card-text">6</p>
                                <div class="d-flex align-items-center">
                                    <a href="#activeFunds" class="text-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12 mb-3">
                        <div class="card summary-card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Estimated Annual Return</h5>
                                <p class="card-text">$3,108.28</p>
                                <div class="d-flex align-items-center">
                                    <span class="change-text text-success">
                                        <i class="bi bi-arrow-up"></i> 12.5%
                                    </span>
                                    <span class="text-muted ms-2">Average rate</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Filters -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 mb-3 mb-md-0">
                                <div class="d-flex flex-wrap gap-2">
                                    <select class="form-select form-select-sm">
                                        <option selected>All Categories</option>
                                        <option>Equity</option>
                                        <option>Debt</option>
                                        <option>Hybrid</option>
                                        <option>Index</option>
                                    </select>
                                    <select class="form-select form-select-sm">
                                        <option selected>Interest Rate</option>
                                        <option>High (>10%)</option>
                                        <option>Medium (5-10%)</option>
                                        <option>Low (<5%)</option>
                                    </select>
                                    <select class="form-select form-select-sm">
                                        <option selected>Price Range</option>
                                        <option>$0 - $50</option>
                                        <option>$50 - $100</option>
                                        <option>$100 - $200</option>
                                        <option>$200+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex justify-content-md-end gap-2">
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-arrow-clockwise"></i> Reset
                                    </button>
                                    <button class="btn btn-sm btn-primary">
                                        <i class="bi bi-funnel"></i> Apply Filters
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mutual Funds Grid -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-4" id="mutualFundsGrid">
                    <!-- Fund Card 1 -->
                    <div class="col">
                        <div class="card h-100 fund-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-blue-100 text-blue-800 rounded-circle p-2 me-3">
                                            <i class="bi bi-graph-up"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-0">Fidelity Magellan Fund</h5>
                                            <small class="text-muted">FMAGX</small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <h5 class="mb-0">$14.77</h5>
                                        <small class="text-muted">05/02/2025</small>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <small class="text-muted">Guaranteed Interest Rate</small>
                                        <small class="text-success fw-bold">12.5%</small>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-primary flex-grow-1">Buy</button>
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1">Sell</button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-info-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fund Card 2 -->
                    <div class="col">
                        <div class="card h-100 fund-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-green-100 text-green-800 rounded-circle p-2 me-3">
                                            <i class="bi bi-bar-chart"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-0">Vanguard Global Equity Fund</h5>
                                            <small class="text-muted">VHGEX</small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <h5 class="mb-0">$35.56</h5>
                                        <small class="text-muted">05/05/2025</small>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <small class="text-muted">Guaranteed Interest Rate</small>
                                        <small class="text-success fw-bold">10.5%</small>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 84%" aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-primary flex-grow-1">Buy</button>
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1">Sell</button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-info-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fund Card 3 -->
                    <div class="col">
                        <div class="card h-100 fund-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-purple-100 text-purple-800 rounded-circle p-2 me-3">
                                            <i class="bi bi-pie-chart"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-0">PIMCO Total Return Fund</h5>
                                            <small class="text-muted">PTTRX</small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <h5 class="mb-0">$8.56</h5>
                                        <small class="text-muted">05/07/2025</small>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <small class="text-muted">Guaranteed Interest Rate</small>
                                        <small class="text-success fw-bold">8.2%</small>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 65.6%" aria-valuenow="65.6" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-primary flex-grow-1">Buy</button>
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1">Sell</button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-info-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fund Card 4 -->
                    <div class="col">
                        <div class="card h-100 fund-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-blue-100 text-blue-800 rounded-circle p-2 me-3">
                                            <i class="bi bi-graph-up"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-0">T. Rowe Price Blue Chip Growth Fund</h5>
                                            <small class="text-muted">TRBCX</small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <h5 class="mb-0">$177.36</h5>
                                        <small class="text-muted">05/07/2025</small>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <small class="text-muted">Guaranteed Interest Rate</small>
                                        <small class="text-success fw-bold">7.5%</small>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-primary flex-grow-1">Buy</button>
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1">Sell</button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-info-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fund Card 5 -->
                    <div class="col">
                        <div class="card h-100 fund-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-green-100 text-green-800 rounded-circle p-2 me-3">
                                            <i class="bi bi-bar-chart"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-0">American Funds Growth Fund of America</h5>
                                            <small class="text-muted">AGTHX</small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <h5 class="mb-0">$71.90</h5>
                                        <small class="text-muted">05/06/2025</small>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <small class="text-muted">Guaranteed Interest Rate</small>
                                        <small class="text-success fw-bold">7.0%</small>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 56%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-primary flex-grow-1">Buy</button>
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1">Sell</button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-info-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fund Card 6 -->
                    <div class="col">
                        <div class="card h-100 fund-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-orange-100 text-orange-800 rounded-circle p-2 me-3">
                                            <i class="bi bi-line-chart"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-0">JPMorgan Large Cap Growth Fund</h5>
                                            <small class="text-muted">OLGAX</small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <h5 class="mb-0">$74.10</h5>
                                        <small class="text-muted">05/02/2025</small>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <small class="text-muted">Guaranteed Interest Rate</small>
                                        <small class="text-success fw-bold">6.2%</small>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 49.6%" aria-valuenow="49.6" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-primary flex-grow-1">Buy</button>
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1">Sell</button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-info-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- My Portfolio Section -->
                <div class="card mb-4" id="activeFunds">
                    <div class="card-header">
                        <h3 class="h5 mb-0">My Portfolio</h3>
                    </div>
                    <div class="card-body p-0">
                        <!-- Portfolio Tabs -->
                        <ul class="nav nav-tabs" id="portfolioTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="active-tab" data-bs-toggle="tab" data-bs-target="#active-funds" type="button" role="tab">Active Funds</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="transactions-tab" data-bs-toggle="tab" data-bs-target="#transactions" type="button" role="tab">Transaction History</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="sold-tab" data-bs-toggle="tab" data-bs-target="#sold-funds" type="button" role="tab">Sold History</button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content" id="portfolioTabsContent">
                            <!-- Active Funds Tab -->
                            <div class="tab-pane fade show active" id="active-funds" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Fund Name</th>
                                                <th>Units Held</th>
                                                <th>Avg. Purchase Price</th>
                                                <th>Total Investment</th>
                                                <th>Current Market Value</th>
                                                <th>Gain/Loss</th>
                                                <th>Interest Rate</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="bg-blue-100 text-blue-800 rounded-circle p-2 me-3">
                                                            <i class="bi bi-graph-up"></i>
                                                        </div>
                                                        <div>
                                                            <div>Fidelity Magellan Fund</div>
                                                            <small class="text-muted">FMAGX</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>120.45</td>
                                                <td>$14.50</td>
                                                <td>$1,746.53</td>
                                                <td>$1,779.44</td>
                                                <td class="text-success">+$32.91</td>
                                                <td class="text-success">12.5%</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Buy</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Sell</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="bg-green-100 text-green-800 rounded-circle p-2 me-3">
                                                            <i class="bi bi-bar-chart"></i>
                                                        </div>
                                                        <div>
                                                            <div>Vanguard Global Equity Fund</div>
                                                            <small class="text-muted">VHGEX</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>85.20</td>
                                                <td>$34.20</td>
                                                <td>$2,913.84</td>
                                                <td>$3,029.71</td>
                                                <td class="text-success">+$115.87</td>
                                                <td class="text-success">10.5%</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Buy</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Sell</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="bg-purple-100 text-purple-800 rounded-circle p-2 me-3">
                                                            <i class="bi bi-pie-chart"></i>
                                                        </div>
                                                        <div>
                                                            <div>PIMCO Total Return Fund</div>
                                                            <small class="text-muted">PTTRX</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>210.75</td>
                                                <td>$8.45</td>
                                                <td>$1,780.84</td>
                                                <td>$1,804.02</td>
                                                <td class="text-success">+$23.18</td>
                                                <td class="text-success">8.2%</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Buy</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Sell</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="bg-blue-100 text-blue-800 rounded-circle p-2 me-3">
                                                            <i class="bi bi-graph-up"></i>
                                                        </div>
                                                        <div>
                                                            <div>T. Rowe Price Blue Chip Growth Fund</div>
                                                            <small class="text-muted">TRBCX</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>10.25</td>
                                                <td>$175.20</td>
                                                <td>$1,795.80</td>
                                                <td>$1,817.94</td>
                                                <td class="text-success">+$22.14</td>
                                                <td class="text-success">7.5%</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Buy</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Sell</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="bg-green-100 text-green-800 rounded-circle p-2 me-3">
                                                            <i class="bi bi-bar-chart"></i>
                                                        </div>
                                                        <div>
                                                            <div>American Funds Growth Fund of America</div>
                                                            <small class="text-muted">AGTHX</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>25.60</td>
                                                <td>$70.45</td>
                                                <td>$1,803.52</td>
                                                <td>$1,840.64</td>
                                                <td class="text-success">+$37.12</td>
                                                <td class="text-success">7.0%</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Buy</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Sell</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="bg-orange-100 text-orange-800 rounded-circle p-2 me-3">
                                                            <i class="bi bi-line-chart"></i>
                                                        </div>
                                                        <div>
                                                            <div>JPMorgan Large Cap Growth Fund</div>
                                                            <small class="text-muted">OLGAX</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>24.80</td>
                                                <td>$72.50</td>
                                                <td>$1,798.00</td>
                                                <td>$1,837.68</td>
                                                <td class="text-success">+$39.68</td>
                                                <td class="text-success">6.2%</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Buy</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Sell</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Transaction History Tab -->
                            <div class="tab-pane fade" id="transactions" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Fund Name</th>
                                                <th>Type</th>
                                                <th>Units</th>
                                                <th>Price@Tx</th>
                                                <th>Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>05/10/2025</td>
                                                <td>Fidelity Magellan Fund</td>
                                                <td><span class="badge bg-success">Buy</span></td>
                                                <td>20.45</td>
                                                <td>$14.50</td>
                                                <td>$296.53</td>
                                            </tr>
                                            <tr>
                                                <td>05/08/2025</td>
                                                <td>Vanguard Global Equity Fund</td>
                                                <td><span class="badge bg-success">Buy</span></td>
                                                <td>15.20</td>
                                                <td>$34.20</td>
                                                <td>$519.84</td>
                                            </tr>
                                            <tr>
                                                <td>05/05/2025</td>
                                                <td>PIMCO Total Return Fund</td>
                                                <td><span class="badge bg-success">Buy</span></td>
                                                <td>30.75</td>
                                                <td>$8.45</td>
                                                <td>$259.84</td>
                                            </tr>
                                            <tr>
                                                <td>05/03/2025</td>
                                                <td>T. Rowe Price Blue Chip Growth Fund</td>
                                                <td><span class="badge bg-success">Buy</span></td>
                                                <td>5.25</td>
                                                <td>$175.20</td>
                                                <td>$919.80</td>
                                            </tr>
                                            <tr>
                                                <td>05/01/2025</td>
                                                <td>American Funds Growth Fund of America</td>
                                                <td><span class="badge bg-success">Buy</span></td>
                                                <td>10.60</td>
                                                <td>$70.45</td>
                                                <td>$746.77</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Sold History Tab -->
                            <div class="tab-pane fade" id="sold-funds" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Fund Name</th>
                                                <th>Units Sold</th>
                                                <th>Sell Price</th>
                                                <th>Sell Date</th>
                                                <th>Profit/Loss</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Fidelity Contrafund</td>
                                                <td>15.25</td>
                                                <td>$16.20</td>
                                                <td>04/28/2025</td>
                                                <td class="text-success">+$24.75</td>
                                            </tr>
                                            <tr>
                                                <td>Vanguard 500 Index Fund</td>
                                                <td>8.50</td>
                                                <td>$420.45</td>
                                                <td>04/22/2025</td>
                                                <td class="text-success">+$35.68</td>
                                            </tr>
                                            <tr>
                                                <td>American Funds EuroPacific Growth Fund</td>
                                                <td>12.75</td>
                                                <td>$52.30</td>
                                                <td>04/15/2025</td>
                                                <td class="text-success">+$18.25</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted">Showing <span>1</span> to <span>6</span> of <span>6</span> entries</span>
                        </div>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Transaction Modal -->
    <div class="modal fade" id="transactionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transactionModalTitle">Buy Mutual Fund</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="transactionForm">
                        <div class="mb-3">
                            <label class="form-label">Fund Name</label>
                            <div class="d-flex align-items-center gap-3 p-3 bg-light rounded">
                                <div class="bg-blue-100 text-blue-800 rounded-circle p-2">
                                    <i class="bi bi-graph-up"></i>
                                </div>
                                <div>
                                    <div class="fw-medium" id="modalFundName">Fidelity Magellan Fund</div>
                                    <small class="text-muted" id="modalFundCode">FMAGX</small>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Transaction Type</label>
                            <div class="d-flex gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="transactionType" id="buyRadio" value="buy" checked>
                                    <label class="form-check-label" for="buyRadio">Buy</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="transactionType" id="sellRadio" value="sell">
                                    <label class="form-check-label" for="sellRadio">Sell</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Current Price</label>
                                <div class="text-success fw-medium">Guaranteed Interest: <span id="modalFundInterest">12.5%</span></div>
                            </div>
                            <div class="fw-medium" id="modalFundPrice">$14.77 per unit</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Investment Type</label>
                            <div class="d-flex gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="investmentType" id="amountRadio" value="amount" checked>
                                    <label class="form-check-label" for="amountRadio">By Amount</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="investmentType" id="unitsRadio" value="units">
                                    <label class="form-check-label" for="unitsRadio">By Units</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3" id="amountInputContainer">
                            <label for="amountInput" class="form-label">Amount ($)</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="amountInput" placeholder="Enter amount">
                                <button class="btn btn-outline-secondary" type="button" id="amountMaxBtn">Max</button>
                            </div>
                            <small class="text-muted">Minimum investment: $100</small>
                        </div>

                        <div class="mb-3 d-none" id="unitsInputContainer">
                            <label for="unitsInput" class="form-label">Units</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="unitsInput" placeholder="Enter units">
                                <button class="btn btn-outline-secondary" type="button" id="unitsMaxBtn">Max</button>
                            </div>
                            <small class="text-muted">Minimum: 0.0001 units</small>
                        </div>

                        <div class="mb-3 p-3 bg-light rounded d-none" id="holdingsInfoSection">
                            <h6 class="text-primary mb-2">Your Current Holdings</h6>
                            <div class="d-flex justify-content-between mb-1">
                                <small class="text-muted">Total Units:</small>
                                <small class="fw-medium" id="totalHoldingsDisplay">0.000</small>
                            </div>
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">Total Value:</small>
                                <small class="fw-medium" id="totalHoldingsValueDisplay">$0.00</small>
                            </div>
                        </div>

                        <div class="mb-4 p-3 bg-light rounded">
                            <div class="d-flex justify-content-between mb-1">
                                <small class="text-muted" id="estimatedUnitsLabel">Estimated Units:</small>
                                <small class="fw-medium" id="estimatedUnits">0.000</small>
                            </div>
                            <div class="d-flex justify-content-between">
                                <small class="text-muted" id="totalAmountLabel">Total Amount:</small>
                                <small class="fw-medium" id="totalAmount">$0.00</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Payment Method</label>
                            <select class="form-select">
                                <option>Wallet Balance ($24,847.84)</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="confirmTransactionBtn">
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                Confirm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Processing Modal -->
    <div class="modal fade" id="processingModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <div class="spinner-border text-primary mb-4" style="width: 3rem; height: 3rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <h5 class="mb-2">Processing Transaction</h5>
                    <p class="text-muted">Please wait while we process your transaction. This may take a few moments.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <div class="bg-success bg-opacity-10 text-success rounded-circle p-3 d-inline-flex mb-4">
                        <i class="bi bi-check-lg" style="font-size: 2rem;"></i>
                    </div>
                    <h5 class="mb-2">Transaction Successful</h5>
                    <p class="text-muted mb-4" id="successMessage">Your purchase of Fidelity Magellan Fund has been completed successfully.</p>

                    <div class="bg-light p-3 rounded mb-4 text-start">
                        <div class="d-flex justify-content-between mb-2">
                            <small class="text-muted">Transaction ID:</small>
                            <small class="fw-medium" id="transactionId">TX-20250515-001</small>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <small class="text-muted">Fund:</small>
                            <small class="fw-medium" id="transactionFund">Fidelity Magellan Fund (FMAGX)</small>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <small class="text-muted">Amount:</small>
                            <small class="fw-medium" id="transactionAmount">$296.53</small>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <small class="text-muted">Units:</small>
                            <small class="fw-medium" id="transactionUnits">20.45</small>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <small class="text-muted">Price:</small>
                            <small class="fw-medium" id="transactionPrice">$14.50</small>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <small class="text-muted">Interest Rate:</small>
                            <small class="fw-medium text-success" id="transactionInterest">12.5%</small>
                        </div>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">Date:</small>
                            <small class="fw-medium" id="transactionDate">May 10, 2025 14:30</small>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal">Done</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        // Sidebar toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const overlay = document.querySelector('.overlay');

            // Mobile sidebar toggle
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('active');
            });

            // Close sidebar when clicking on overlay
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('show');
                overlay.classList.remove('active');
            });

            // Initialize all tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Initialize transaction modal
            const transactionModal = new bootstrap.Modal(document.getElementById('transactionModal'));
            const processingModal = new bootstrap.Modal(document.getElementById('processingModal'));
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));

            // Handle buy/sell buttons
            document.querySelectorAll('.fund-card .btn-primary, #active-funds-tbody .btn-outline-primary').forEach(button => {
                button.addEventListener('click', function() {
                    const card = this.closest('.fund-card, tr');
                    const fundName = card.querySelector('h5, td div div:first-child').textContent;
                    const fundCode = card.querySelector('small, td div small').textContent;
                    const fundPrice = card.querySelectorAll('h5, td')[card.classList.contains('fund-card') ? 1 : 3].textContent.replace('$', '');
                    const fundInterest = card.querySelectorAll('.text-success')[1]?.textContent || card.querySelector('.text-success').textContent;

                    document.getElementById('transactionModalTitle').textContent = 'Buy Mutual Fund';
                    document.getElementById('modalFundName').textContent = fundName;
                    document.getElementById('modalFundCode').textContent = fundCode;
                    document.getElementById('modalFundPrice').textContent = `$${fundPrice} per unit`;
                    document.getElementById('modalFundInterest').textContent = fundInterest;

                    // Reset to buy mode and hide holdings info
                    document.getElementById('buyRadio').checked = true;
                    document.getElementById('holdingsInfoSection').classList.add('d-none');
                    document.getElementById('amountRadio').checked = true; // Default to amount input
                    document.getElementById('amountInputContainer').classList.remove('d-none');
                    document.getElementById('unitsInputContainer').classList.add('d-none');
                    document.getElementById('estimatedUnitsLabel').textContent = 'Estimated Units:';
                    document.getElementById('totalAmountLabel').textContent = 'Total Amount:';
                    document.getElementById('amountInput').value = ''; // Clear input
                    document.getElementById('unitsInput').value = ''; // Clear input
                    document.getElementById('estimatedUnits').textContent = '0.000';
                    document.getElementById('totalAmount').textContent = '$0.00';


                    transactionModal.show();
                });
            });

            // Handle sell buttons
            document.querySelectorAll('.fund-card .btn-outline-secondary:not(:last-child), #active-funds-tbody .btn-outline-secondary').forEach(button => {
                button.addEventListener('click', function() {
                    const card = this.closest('.fund-card, tr');
                    const fundName = card.querySelector('h5, td div div:first-child').textContent;
                    const fundCode = card.querySelector('small, td div small').textContent;
                    const fundPrice = card.querySelectorAll('h5, td')[card.classList.contains('fund-card') ? 1 : 3].textContent.replace('$', '');
                    const fundInterest = card.querySelectorAll('.text-success')[1]?.textContent || card.querySelector('.text-success').textContent;
                    const unitsHeld = card.querySelectorAll('td')[1]?.textContent || '0';
                    const currentValue = card.querySelectorAll('td')[4]?.textContent.replace('$', '').replace(',', '') || '0';

                    document.getElementById('transactionModalTitle').textContent = 'Sell Mutual Fund';
                    document.getElementById('modalFundName').textContent = fundName;
                    document.getElementById('modalFundCode').textContent = fundCode;
                    document.getElementById('modalFundPrice').textContent = `$${fundPrice} per unit`;
                    document.getElementById('modalFundInterest').textContent = fundInterest;

                    // Show holdings info for sell transactions
                    document.getElementById('holdingsInfoSection').classList.remove('d-none');
                    document.getElementById('totalHoldingsDisplay').textContent = unitsHeld;
                    document.getElementById('totalHoldingsValueDisplay').textContent = `$${currentValue}`;

                    // Check the sell radio button
                    document.getElementById('sellRadio').checked = true;
                    document.getElementById('unitsRadio').checked = true; // Default to units input for sell
                    document.getElementById('amountInputContainer').classList.add('d-none');
                    document.getElementById('unitsInputContainer').classList.remove('d-none');
                    document.getElementById('estimatedUnitsLabel').textContent = 'Estimated Amount:';
                    document.getElementById('totalAmountLabel').textContent = 'Total Value:';
                    document.getElementById('amountInput').value = ''; // Clear input
                    document.getElementById('unitsInput').value = ''; // Clear input
                    document.getElementById('estimatedUnits').textContent = '0.000';
                    document.getElementById('totalAmount').textContent = '$0.00';


                    transactionModal.show();
                });
            });

            // Handle investment type toggle
            document.querySelectorAll('input[name="investmentType"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'amount') {
                        document.getElementById('amountInputContainer').classList.remove('d-none');
                        document.getElementById('unitsInputContainer').classList.add('d-none');
                        document.getElementById('estimatedUnitsLabel').textContent = 'Estimated Units:';
                        document.getElementById('totalAmountLabel').textContent = 'Total Amount:';
                        document.getElementById('unitsInput').value = ''; // Clear units input when switching to amount
                        document.getElementById('amountInput').dispatchEvent(new Event('input')); // Trigger calculation
                    } else {
                        document.getElementById('amountInputContainer').classList.add('d-none');
                        document.getElementById('unitsInputContainer').classList.remove('d-none');
                        document.getElementById('estimatedUnitsLabel').textContent = 'Estimated Amount:';
                        document.getElementById('totalAmountLabel').textContent = 'Total Value:';
                        document.getElementById('amountInput').value = ''; // Clear amount input when switching to units
                        document.getElementById('unitsInput').dispatchEvent(new Event('input')); // Trigger calculation
                    }
                });
            });

            // Handle transaction type toggle
            document.querySelectorAll('input[name="transactionType"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'buy') {
                        document.getElementById('transactionModalTitle').textContent = 'Buy Mutual Fund';
                        document.getElementById('holdingsInfoSection').classList.add('d-none');
                        document.getElementById('amountRadio').checked = true; // Default to amount input for buy
                        document.getElementById('amountInputContainer').classList.remove('d-none');
                        document.getElementById('unitsInputContainer').classList.add('d-none');
                        document.getElementById('estimatedUnitsLabel').textContent = 'Estimated Units:';
                        document.getElementById('totalAmountLabel').textContent = 'Total Amount:';
                        document.getElementById('amountInput').value = ''; // Clear input
                        document.getElementById('unitsInput').value = ''; // Clear input
                        document.getElementById('estimatedUnits').textContent = '0.000';
                        document.getElementById('totalAmount').textContent = '$0.00';
                    } else {
                        document.getElementById('transactionModalTitle').textContent = 'Sell Mutual Fund';
                        document.getElementById('holdingsInfoSection').classList.remove('d-none');
                        document.getElementById('unitsRadio').checked = true; // Default to units input for sell
                        document.getElementById('amountInputContainer').classList.add('d-none');
                        document.getElementById('unitsInputContainer').classList.remove('d-none');
                        document.getElementById('estimatedUnitsLabel').textContent = 'Estimated Amount:';
                        document.getElementById('totalAmountLabel').textContent = 'Total Value:';
                        document.getElementById('amountInput').value = ''; // Clear input
                        document.getElementById('unitsInput').value = ''; // Clear input
                        document.getElementById('estimatedUnits').textContent = '0.000';
                        document.getElementById('totalAmount').textContent = '$0.00';
                    }
                });
            });

            // Handle form submission
            document.getElementById('transactionForm').addEventListener('submit', function(e) {
                e.preventDefault();

                // Show processing modal
                transactionModal.hide();
                processingModal.show();

                // Simulate processing delay
                setTimeout(() => {
                    processingModal.hide();

                    // Set success modal content
                    const transactionType = document.querySelector('input[name="transactionType"]:checked').value;
                    const fundName = document.getElementById('modalFundName').textContent;
                    const fundCode = document.getElementById('modalFundCode').textContent;
                    const amount = document.getElementById('totalAmount').textContent;
                    const units = document.getElementById('estimatedUnits').textContent;
                    const price = document.getElementById('modalFundPrice').textContent.split(' ')[0];
                    const interest = document.getElementById('modalFundInterest').textContent;

                    document.getElementById('successMessage').textContent =
                        `Your ${transactionType} of ${fundName} has been completed successfully.`;
                    document.getElementById('transactionFund').textContent = `${fundName} (${fundCode})`;
                    document.getElementById('transactionAmount').textContent = amount;
                    document.getElementById('transactionUnits').textContent = units;
                    document.getElementById('transactionPrice').textContent = price;
                    document.getElementById('transactionInterest').textContent = interest;
                    document.getElementById('transactionDate').textContent = new Date().toLocaleString('en-US', {
                        month: 'short',
                        day: 'numeric',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    document.getElementById('transactionId').textContent =
                        `TX-${new Date().getFullYear()}${(new Date().getMonth()+1).toString().padStart(2, '0')}${new Date().getDate().toString().padStart(2, '0')}-${Math.floor(Math.random() * 1000).toString().padStart(3, '0')}`;

                    // Show success modal
                    successModal.show();
                }, 2000);
            });

            // Calculate estimated units/amount when input changes
            document.getElementById('amountInput').addEventListener('input', function() {
                const priceText = document.getElementById('modalFundPrice').textContent;
                const priceMatch = priceText.match(/\$([\d.]+)/);
                const price = priceMatch ? parseFloat(priceMatch[1]) : 0;

                const amount = parseFloat(this.value) || 0;
                const units = price > 0 ? amount / price : 0;

                document.getElementById('estimatedUnits').textContent = units.toFixed(4);
                document.getElementById('totalAmount').textContent = `$${amount.toFixed(2)}`;
            });

            document.getElementById('unitsInput').addEventListener('input', function() {
                const priceText = document.getElementById('modalFundPrice').textContent;
                const priceMatch = priceText.match(/\$([\d.]+)/);
                const price = priceMatch ? parseFloat(priceMatch[1]) : 0;

                const units = parseFloat(this.value) || 0;
                const amount = units * price;

                document.getElementById('estimatedUnits').textContent = `$${amount.toFixed(2)}`;
                document.getElementById('totalAmount').textContent = `$${amount.toFixed(2)}`;
            });

            // Max buttons
            document.getElementById('amountMaxBtn').addEventListener('click', function() {
                document.getElementById('amountInput').value = '24847.84';
                document.getElementById('amountInput').dispatchEvent(new Event('input'));
            });

            document.getElementById('unitsMaxBtn').addEventListener('click', function() {
                const transactionType = document.querySelector('input[name="transactionType"]:checked').value;
                if (transactionType === 'sell') {
                    document.getElementById('unitsInput').value = document.getElementById('totalHoldingsDisplay').textContent;
                } else {
                    const priceText = document.getElementById('modalFundPrice').textContent;
                    const priceMatch = priceText.match(/\$([\d.]+)/);
                    const price = priceMatch ? parseFloat(priceMatch[1]) : 0;
                    document.getElementById('unitsInput').value = (24847.84 / price).toFixed(4);
                }
                document.getElementById('unitsInput').dispatchEvent(new Event('input'));
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
        });
    </script>
</body>
</html>
