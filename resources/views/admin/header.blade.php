<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Elite Mutual Investment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #1a237e;
            --secondary-color: #3949ab;
            --accent-color: #00bcd4;
            --light-color: #f5f5f5;
            --dark-color: #121858;
            --success-color: #4caf50;
            --danger-color: #f44336;
            --warning-color: #ff9800;
            --info-color: #2196f3;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            overflow-x: hidden;
            min-height: 100vh;
        }
        
        /* Sidebar Styles */
        .sidebar {
            background-color: var(--primary-color);
            color: white;
            height: 100vh;
            position: fixed;
            width: 250px;
            transition: all 0.3s ease;
            z-index: 1000;
            left: 0;
            top: 0;
            overflow-y: auto;
        }
        
        .sidebar-brand {
            padding: 1.5rem 1rem;
            font-weight: 700;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: sticky;
            top: 0;
            background-color: var(--primary-color);
            z-index: 10;
        }
        
        .sidebar-brand img {
            height: 30px;
            margin-right: 10px;
        }
        
        .sidebar-nav {
            padding: 1rem 0;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.75rem 1.5rem;
            margin: 0.25rem 1rem;
            border-radius: 5px;
            display: flex;
            align-items: center;
            transition: all 0.3s;
            white-space: nowrap;
        }
        
        .nav-link:hover, .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            text-decoration: none;
        }
        
        .nav-link i {
            width: 24px;
            text-align: center;
            margin-right: 10px;
            font-size: 1.1rem;
        }
        
        .sidebar-footer {
            position: sticky;
            bottom: 0;
            width: 100%;
            padding: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            background-color: var(--primary-color);
        }
        
        .user-info {
            display: flex;
            align-items: center;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }
        
        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s ease;
            min-height: 100vh;
        }
        
        /* Cards */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 24px;
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-weight: 600;
            padding: 15px 20px;
            border-radius: 10px 10px 0 0 !important;
        }
        
        /* Stats Cards */
        .stat-card {
            padding: 20px;
            border-left: 4px solid;
        }
        
        .stat-card.primary {
            border-left-color: var(--primary-color);
        }
        
        .stat-card.success {
            border-left-color: var(--success-color);
        }
        
        .stat-card.warning {
            border-left-color: var(--warning-color);
        }
        
        .stat-card.danger {
            border-left-color: var(--danger-color);
        }
        
        /* Tables */
        .table th {
            border-top: none;
            font-weight: 600;
            color: #6c757d;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            padding-top: 15px;
            padding-bottom: 15px;
        }
        
        /* Alert System */
        .alert-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            width: 100%;
            max-width: 400px;
            padding: 0 15px;
        }

        .alert {
            border-radius: 8px;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .alert-content {
            display: flex;
            align-items: center;
            padding: 15px;
            position: relative;
        }

        .alert-icon {
            margin-right: 12px;
            display: flex;
            align-items: center;
        }

        .alert-text {
            flex: 1;
            font-size: 14px;
            line-height: 1.4;
        }

        .btn-close {
            background: none;
            border: none;
            padding: 0;
            margin-left: 12px;
            opacity: 0.7;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .alert-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.3);
            animation: progressBar 5s linear forwards;
        }

        @keyframes progressBar {
            0% { width: 100%; }
            100% { width: 0%; }
        }

        /* Profile Image */
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
        
        /* Tab Styles */
        .hover-border-success:hover {
            color: #198754 !important;
            border-bottom: 3px solid #198754 !important;
        }
        
        .hover-border-warning:hover {
            color: #ffc107 !important;
            border-bottom: 3px solid #ffc107 !important;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .sidebar-toggle {
                display: block;
            }
            
            .sidebar-overlay.show {
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar Overlay (Mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar Toggle Button (Mobile) -->
    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <img src="assets/img/logo.png" alt="logo">
            <span>Elite Mutual</span>
        </div>
        
        <div class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            
            <a href="{{ route('admin.users') }}" class="nav-link">
                <i class="fas fa-users"></i>
                <span>Manage Users</span>
            </a>
            
            <a href="{{ route('admin.loans') }}" class="nav-link">
                <i class="fas fa-piggy-bank"></i>
                <span> Manage Deposits</span>
            </a>

             <a href="{{ route('admin.manage.payment') }}" class="nav-link">
                <i class="fas fa-piggy-bank"></i>
                <span>Update Wallet</span>
            </a>
            
            <a href="{{ route('admin.transactions') }}" class="nav-link">
                <i class="fas fa-exchange-alt"></i>
                <span>Transactions</span>
            </a>
            
                   <!-- Logout Link with Hidden Form -->
<a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
    <i class="fas fa-sign-out-alt"></i>
    <span>Logout</span>
</a>

<!-- Hidden Logout Form -->
<form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    @csrf
</form>
        </div>
        
        <div class="sidebar-footer">
            <div class="user-info">
                <img src="https://ui-avatars.com/api/?name=Admin+User" class="user-avatar" alt="Admin">
                <div>
                    <p class="user-name mb-0">Admin User</p>
                    <small class="user-role">Administrator</small>
                </div>
            </div>
        </div>
    </div>









