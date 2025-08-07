<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Elite Mutual Investment - Withdrawal</title>
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

        body {
            font-family: 'BaselBook', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            background-color: #f8f9fa;
            overflow-x: hidden;
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
            margin-left: 280px;
            transition: margin-left 0.3s ease;
            width: calc(100% - 280px);
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1040;
            display: none;
        }

        /* Header */
        .main-header {
            padding: 1rem;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        /* Cards */
        .withdrawal-card {
            transition: all 0.2s ease;
            border-radius: 0.5rem;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .withdrawal-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .method-card {
            cursor: pointer;
            transition: all 0.2s ease;
            border-radius: 0.5rem;
        }

        .method-card:hover, .method-card.active {
            border-color: #0d6efd !important;
            background-color: rgba(13, 110, 253, 0.05);
        }

        .method-card.active {
            background-color: rgba(13, 110, 253, 0.1);
        }

        /* Avatar and Logo */
        .avatar-sy {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #0d6efd;
            color: white;
            border-radius: 50%;
            font-weight: 600;
        }

        .logo-e {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #0d6efd;
            color: white;
            border-radius: 0.375rem;
            font-weight: 700;
        }

        /* Tables */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            width: 100%;
        }

        .withdrawal-table th, 
        .withdrawal-table td {
            white-space: nowrap;
            padding: 0.75rem;
        }

        /* Badges */
        .bg-blue-100 {
            background-color: rgba(13, 110, 253, 0.1);
        }
        .text-blue-800 {
            color: rgba(13, 110, 253, 0.8);
        }
        .bg-purple-100 {
            background-color: rgba(111, 66, 193, 0.1);
        }
        .text-purple-800 {
            color: rgba(111, 66, 193, 0.8);
        }

        /* Mobile Responsiveness */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0 !important;
                width: 100% !important;
            }
            .summary-card .card-text {
                font-size: 1.5rem;
            }
            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            .modal-dialog {
                margin: 0.5rem auto;
                max-width: 95%;
            }
        }

        @media (max-width: 767.98px) {
            .summary-cards-container .col {
                flex: 0 0 100%;
                max-width: 100%;
                margin-bottom: 1rem;
            }
            .withdrawal-card .btn {
                padding: 0.375rem 0.75rem;
            }
            .card-header h3 {
                font-size: 1.25rem;
            }
            .nav-tabs .nav-link {
                padding: 0.5rem;
                font-size: 0.875rem;
            }
        }

        @media (max-width: 575.98px) {
            .withdrawal-card .btn {
                width: 100%;
                margin-top: 0.5rem;
            }
            .method-card {
                margin-bottom: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Overlay for mobile sidebar -->
    <div class="overlay"></div>
    
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
                    <a class="nav-link active" href="#">
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
                    <a class="nav-link" href="#">
                        <i class="bi bi-person"></i> Profile
                    </a>
                    <a class="nav-link" href="#">
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

        <!-- Main Content -->
        <div class="main-content" id="mainContent">
            <!-- Main Header -->
            <header class="main-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <button class="btn btn-link sidebar-toggle me-2 d-lg-none" id="sidebarToggle">
                        <i class="bi bi-list" style="font-size: 1.5rem;"></i>
                    </button>
                    <h1 class="h5 mb-0">Withdrawal</h1>
                </div>
                <div class="d-flex align-items-center">
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="avatar-sy me-2">{{ substr(Auth::user()->first_name, 0, 1) }}{{ substr(Auth::user()->last_name, 0, 1) }}</div>
                            <span class="d-none d-sm-inline">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
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
            <div class="content-area p-3">
                <!-- Portfolio Summary -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3">
                            <h2 class="h4 mb-3 mb-md-0">Withdraw Funds</h2>
                            <div class="d-flex align-items-center text-muted">
                                <i class="bi bi-calendar me-2"></i>
                                <span id="portfolioDate">{{ date('F j, Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Balance Summary -->
                <div class="card withdrawal-card">
                    <div class="card-body">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                            <div class="mb-3 mb-md-0">
                                <h3 class="h6 mb-1">Available Balance</h3>
                                <div class="d-flex align-items-center">
                                    <span class="fs-3 fw-bold">$0.00</span>
                                    <span class="badge bg-success ms-3">
                                        <i class="bi bi-arrow-up"></i> Active
                                    </span>
                                </div>
                            </div>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#withdrawalModal">
                                <i class="bi bi-arrow-up-circle me-2"></i>Withdraw Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Withdrawal Methods -->
                <div class="card withdrawal-card">
                    <div class="card-header">
                        <h3 class="h5 mb-0">Withdrawal Methods</h3>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Bank Transfer -->
                            <div class="col-12 col-lg-6">
                                <div class="card method-card h-100 border">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="bg-blue-100 text-blue-800 rounded-circle p-2 me-3">
                                                <i class="bi bi-bank fs-5"></i>
                                            </div>
                                            <h4 class="h6 mb-0">Bank Transfer</h4>
                                        </div>
                                        <ul class="list-unstyled small text-muted mb-0">
                                            <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i> 1-3 business days processing</li>
                                            <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i> 1% fee (min $1)</li>
                                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Secure and reliable</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Cryptocurrency -->
                            <div class="col-12 col-lg-6">
                                <div class="card method-card h-100 border active">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="bg-purple-100 text-purple-800 rounded-circle p-2 me-3">
                                                <i class="bi bi-currency-bitcoin fs-5"></i>
                                            </div>
                                            <h4 class="h6 mb-0">Cryptocurrency</h4>
                                        </div>
                                        <ul class="list-unstyled small text-muted mb-0">
                                            <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i> Instant processing</li>
                                            <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-2"></i> 0.5% fee</li>
                                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Multiple coins supported</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Withdrawals -->
                <div class="card withdrawal-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="h5 mb-0">Recent Withdrawals</h3>
                        <a href="#" class="btn btn-sm btn-link">View All</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 withdrawal-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Method</th>
                                        <th class="d-none d-md-table-cell">Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>WD-78945</td>
                                        <td>
                                            <span class="badge bg-purple-100 text-purple-800">
                                                <i class="bi bi-currency-bitcoin me-1"></i> Crypto
                                            </span>
                                        </td>
                                        <td class="d-none d-md-table-cell">May 14, 2025</td>
                                        <td class="fw-bold">$1,250.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>WD-78944</td>
                                        <td>
                                            <span class="badge bg-blue-100 text-blue-800">
                                                <i class="bi bi-bank me-1"></i> Bank
                                            </span>
                                        </td>
                                        <td class="d-none d-md-table-cell">May 10, 2025</td>
                                        <td class="fw-bold">$500.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>WD-78943</td>
                                        <td>
                                            <span class="badge bg-blue-100 text-blue-800">
                                                <i class="bi bi-bank me-1"></i> Bank
                                            </span>
                                        </td>
                                        <td class="d-none d-md-table-cell">May 5, 2025</td>
                                        <td class="fw-bold">$750.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <nav aria-label="Withdrawal pagination">
                            <ul class="pagination pagination-sm mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Withdrawal Modal -->
    <div class="modal fade" id="withdrawalModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Withdraw Funds</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="withdrawalForm">
                        <!-- Method Selection -->
                        <div class="mb-4">
                            <label class="form-label">Withdrawal Method</label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="radio" class="btn-check" name="withdrawalMethod" id="bankMethod" autocomplete="off" checked>
                                    <label class="btn btn-outline-primary w-100 text-start p-3" for="bankMethod">
                                        <i class="bi bi-bank me-2"></i> Bank Transfer
                                    </label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" class="btn-check" name="withdrawalMethod" id="cryptoMethod" autocomplete="off">
                                    <label class="btn btn-outline-primary w-100 text-start p-3" for="cryptoMethod">
                                        <i class="bi bi-currency-bitcoin me-2"></i> Cryptocurrency
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Bank Details -->
                        <div id="bankDetails">
                            <div class="mb-3">
                                <label class="form-label">Select Bank Account</label>
                                <select class="form-select">
                                    <option>Bank of America - ****7890 (Primary)</option>
                                    <option>Chase - ****4321</option>
                                    <option value="add">+ Add New Bank Account</option>
                                </select>
                            </div>

                            <div id="newBankDetails" class="border-top pt-3 mt-3" style="display: none;">
                                <div class="mb-3">
                                    <label class="form-label">Bank Name</label>
                                    <input type="text" class="form-control" placeholder="Enter bank name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Account Holder Name</label>
                                    <input type="text" class="form-control" placeholder="Enter account holder name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Account Number</label>
                                    <input type="text" class="form-control" placeholder="Enter account number">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Routing Number</label>
                                    <input type="text" class="form-control" placeholder="Enter routing number">
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="saveBankDetails">
                                    <label class="form-check-label" for="saveBankDetails">Save this bank account for future withdrawals</label>
                                </div>
                            </div>
                        </div>

                        <!-- Crypto Details -->
                        <div id="cryptoDetails" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label">Cryptocurrency</label>
                                <select class="form-select">
                                    <option>Bitcoin (BTC)</option>
                                    <option>Ethereum (ETH)</option>
                                    <option>USDT (ERC20)</option>
                                    <option>USDC (ERC20)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Wallet Address</label>
                                <input type="text" class="form-control" placeholder="Enter wallet address">
                                <small class="text-muted">Double-check your wallet address to avoid loss of funds</small>
                            </div>
                        </div>

                        <!-- Amount -->
                        <div class="mb-4">
                            <label class="form-label">Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" placeholder="0.00" min="10" step="0.01">
                                <button class="btn btn-outline-secondary" type="button">Max</button>
                            </div>
                            <small class="text-muted">Available: $24,847.84 | Minimum: $10.00</small>
                        </div>

                        <!-- Fee Information -->
                        <div class="alert alert-warning mb-4">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <div>
                                    <strong>Withdrawal Fee:</strong> 
                                    <span id="feeAmount">1% (min $1.00)</span>
                                </div>
                            </div>
                        </div>

                        <!-- Summary -->
                        <div class="card border-0 bg-light mb-4">
                            <div class="card-body">
                                <h6 class="card-title mb-3">Withdrawal Summary</h6>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Amount:</span>
                                    <span id="summaryAmount">$0.00</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Fee:</span>
                                    <span id="summaryFee">$0.00</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold">
                                    <span>You'll receive:</span>
                                    <span id="summaryTotal">$0.00</span>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">
                            Confirm Withdrawal
                        </button>
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
                    <h5 class="mb-2">Processing Withdrawal</h5>
                    <p class="text-muted">Please wait while we process your withdrawal request.</p>
                    <div class="progress mt-3">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 45%"></div>
                    </div>
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
                        <i class="bi bi-check-circle-fill" style="font-size: 2rem;"></i>
                    </div>
                    <h5 class="mb-2">Withdrawal Successful!</h5>
                    <p class="text-muted mb-4">Your withdrawal request has been submitted successfully.</p>
                    
                    <div class="card border-0 bg-light mb-4 text-start">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Reference ID:</span>
                                <span class="fw-bold">WD-78946</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Amount:</span>
                                <span class="fw-bold">$1,000.00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Fee:</span>
                                <span class="fw-bold">$10.00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Method:</span>
                                <span class="fw-bold">Bank Transfer</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Estimated Completion:</span>
                                <span class="fw-bold">1-3 business days</span>
                            </div>
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal">
                        Done
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('withdrawalForm');
    const processingModal = new bootstrap.Modal(document.getElementById('processingModal'));
    const successModal = new bootstrap.Modal(document.getElementById('successModal'));

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const method = document.getElementById('bankMethod').checked ? 'bank' : 'crypto';
        const amount = parseFloat(form.querySelector('input[type="number"]').value);
        const currency = method === 'crypto' ? form.querySelector('#cryptoDetails select').value : null;

        if (!amount || amount < 10) {
            alert("Minimum amount is $10");
            return;
        }

        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('method', method);
        formData.append('amount', amount);
        if (currency) formData.append('currency', currency);

        processingModal.show();

        fetch("{{ route('user.withdraw') }}", {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            processingModal.hide();
            if (data.success) {
                document.querySelector('#successModal .fw-bold:nth-child(2)').textContent = data.referenceId;
                document.querySelector('#successModal .fw-bold:nth-child(4)').textContent = `$${data.amount.toFixed(2)}`;
                document.querySelector('#successModal .fw-bold:nth-child(6)').textContent = `$${data.fee.toFixed(2)}`;
                document.querySelector('#successModal .fw-bold:nth-child(8)').textContent = method === 'bank' ? 'Bank Transfer' : data.currency.toUpperCase();
                successModal.show();
            } else {
                alert('Withdrawal failed.');
            }
        })
        .catch(err => {
            processingModal.hide();
            alert('An error occurred.');
            console.error(err);
        });
    });

    // Handle method switching
    document.querySelector('select').addEventListener('change', function (e) {
        const showNew = e.target.value === 'add';
        document.getElementById('newBankDetails').style.display = showNew ? 'block' : 'none';
    });

    document.getElementById('bankMethod').addEventListener('change', function () {
        document.getElementById('bankDetails').style.display = 'block';
        document.getElementById('cryptoDetails').style.display = 'none';
    });

    document.getElementById('cryptoMethod').addEventListener('change', function () {
        document.getElementById('bankDetails').style.display = 'none';
        document.getElementById('cryptoDetails').style.display = 'block';
    });
});
</script>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set current date
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('portfolioDate').textContent = new Date().toLocaleDateString('en-US', options);
            
            // Sidebar toggle functionality
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const overlay = document.querySelector('.overlay');
            
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
            
            // Handle window resize
            function handleResponsive() {
                const isDesktop = window.innerWidth >= 992;
                
                if (isDesktop) {
                    sidebar.classList.remove('show');
                    overlay.classList.remove('active');
                    document.body.style.overflow = '';
                }
            }
            
            window.addEventListener('resize', handleResponsive);
            handleResponsive(); // Run on initial load
            
            // Withdrawal method toggle
            const bankMethod = document.getElementById('bankMethod');
            const cryptoMethod = document.getElementById('cryptoMethod');
            const bankDetails = document.getElementById('bankDetails');
            const cryptoDetails = document.getElementById('cryptoDetails');
            const feeAmount = document.getElementById('feeAmount');
            
            bankMethod.addEventListener('change', function() {
                bankDetails.style.display = 'block';
                cryptoDetails.style.display = 'none';
                feeAmount.textContent = '1% (min $1.00)';
            });
            
            cryptoMethod.addEventListener('change', function() {
                bankDetails.style.display = 'none';
                cryptoDetails.style.display = 'block';
                feeAmount.textContent = '0.5% (no minimum)';
            });
            
            // Add new bank account toggle
            const bankSelect = document.querySelector('#bankDetails select');
            const newBankDetails = document.getElementById('newBankDetails');
            
            bankSelect.addEventListener('change', function() {
                if (this.value === 'add') {
                    newBankDetails.style.display = 'block';
                } else {
                    newBankDetails.style.display = 'none';
                }
            });
            
            // Form submission
            const withdrawalForm = document.getElementById('withdrawalForm');
            const withdrawalModal = new bootstrap.Modal('#withdrawalModal');
            const processingModal = new bootstrap.Modal('#processingModal');
            const successModal = new bootstrap.Modal('#successModal');
            
            withdrawalForm.addEventListener('submit', function(e) {
                e.preventDefault();
                withdrawalModal.hide();
                processingModal.show();
                
                // Simulate processing delay
                setTimeout(() => {
                    processingModal.hide();
                    successModal.show();
                }, 3000);
            });
            
            // Method card selection
            const methodCards = document.querySelectorAll('.method-card');
            methodCards.forEach(card => {
                card.addEventListener('click', function() {
                    methodCards.forEach(c => c.classList.remove('active'));
                    this.classList.add('active');
                });
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
            
            // Update summary when amount changes
            const amountInput = document.querySelector('#withdrawalForm input[type="number"]');
            const summaryAmount = document.getElementById('summaryAmount');
            const summaryFee = document.getElementById('summaryFee');
            const summaryTotal = document.getElementById('summaryTotal');
            
            amountInput.addEventListener('input', function() {
                const amount = parseFloat(this.value) || 0;
                const isBank = bankMethod.checked;
                const fee = isBank ? Math.max(amount * 0.01, 1) : amount * 0.005;
                const total = amount - fee;
                
                summaryAmount.textContent = `$${amount.toFixed(2)}`;
                summaryFee.textContent = `$${fee.toFixed(2)}`;
                summaryTotal.textContent = `$${total.toFixed(2)}`;
            });
            
            // Max button functionality
            document.querySelector('#withdrawalForm .btn-outline-secondary').addEventListener('click', function() {
                amountInput.value = '24847.84';
                amountInput.dispatchEvent(new Event('input'));
            });
        });
    </script>
</body>
</html>