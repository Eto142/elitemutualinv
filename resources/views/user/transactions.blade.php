<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elite Mutual Investment - Transactions</title>
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

    /* Card Styles */
    .transaction-card {
      border-radius: 0.5rem;
      overflow: hidden;
      margin-bottom: 1.5rem;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    /* Table Styles */
    .transaction-table {
      width: 100%;
    }
    
    .transaction-table th {
      white-space: nowrap;
      padding: 1rem;
      background-color: #f8f9fa;
    }
    
    .transaction-table td {
      padding: 1rem;
      vertical-align: middle;
    }

    /* Status Badges */
    .badge-success {
      background-color: #d1fae5;
      color: #065f46;
    }
    
    .badge-pending {
      background-color: #fef3c7;
      color: #92400e;
    }
    
    .badge-failed {
      background-color: #fee2e2;
      color: #991b1b;
    }

    /* Avatar */
    .avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #0d6efd;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 600;
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
      .transaction-table thead {
        display: none;
      }
      
      .transaction-table tr {
        display: block;
        margin-bottom: 1rem;
        border: 1px solid #dee2e6;
        border-radius: 0.5rem;
      }
      
      .transaction-table td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem;
      }
      
      .transaction-table td::before {
        content: attr(data-label);
        font-weight: 600;
        margin-right: 1rem;
      }
    }
  </style>
</head>
<body>
  <!-- Mobile Overlay -->
  <div class="overlay"></div>
  
@include('user.navbar')
    <!-- Main Content -->
    <div class="main-content flex-grow-1" id="mainContent">
      <!-- Header -->
      <header class="main-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <button class="btn btn-link sidebar-toggle me-2 d-lg-none" id="sidebarToggle">
            <i class="bi bi-list" style="font-size: 1.5rem;"></i>
          </button>
          <h1 class="h5 mb-0">Transaction History</h1>
        </div>
        
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown">
            <div class="avatar me-2">{{ Auth::user()->first_name }}</div>
            <span>{{ Auth::user()->first_name }}</span>
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
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="h4 mb-0">All Transactions</h2>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary">
              <i class="bi bi-download me-2"></i> Export
            </button>
          </div>
        </div>
        
        <!-- Filters -->
        <div class="card transaction-card mb-4">
          <div class="card-body">
            <form>
              <div class="row g-3">
                <div class="col-md-3">
                  <label class="form-label">Date From</label>
                  <input type="date" class="form-control">
                </div>
                <div class="col-md-3">
                  <label class="form-label">Date To</label>
                  <input type="date" class="form-control">
                </div>
                <div class="col-md-3">
                  <label class="form-label">Type</label>
                  <select class="form-select">
                    <option>All Types</option>
                    <option>Deposit</option>
                    <option>Withdrawal</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label class="form-label">Status</label>
                  <select class="form-select">
                    <option>All Status</option>
                    <option>Completed</option>
                    <option>Pending</option>
                    <option>Failed</option>
                  </select>
                </div>
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary">Apply Filters</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        
        <!-- Transactions Table -->
        <div class="card transaction-card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="h5 mb-0">Recent Transactions</h3>
            <div class="input-group" style="max-width: 300px;">
              <span class="input-group-text"><i class="bi bi-search"></i></span>
              <input type="text" class="form-control" placeholder="Search transactions...">
            </div>
          </div>
          
          <div class="table-responsive">
            <table class="table transaction-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Type</th>
                  <th>Method</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Amount</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-label="ID">TXN-78945</td>
                  <td data-label="Type">Deposit</td>
                  <td data-label="Method">Bank Transfer</td>
                  <td data-label="Date">May 15, 2025</td>
                  <td data-label="Status"><span class="badge badge-success">Completed</span></td>
                  <td data-label="Amount">$1,250.00</td>
                  <td>
                    <button class="btn btn-sm btn-outline-secondary">
                      <i class="bi bi-eye"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td data-label="ID">TXN-78944</td>
                  <td data-label="Type">Withdrawal</td>
                  <td data-label="Method">Crypto</td>
                  <td data-label="Date">May 14, 2025</td>
                  <td data-label="Status"><span class="badge badge-success">Completed</span></td>
                  <td data-label="Amount">$500.00</td>
                  <td>
                    <button class="btn btn-sm btn-outline-secondary">
                      <i class="bi bi-eye"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td data-label="ID">TXN-78943</td>
                  <td data-label="Type">Deposit</td>
                  <td data-label="Method">Bank Transfer</td>
                  <td data-label="Date">May 12, 2025</td>
                  <td data-label="Status"><span class="badge badge-pending">Pending</span></td>
                  <td data-label="Amount">$750.00</td>
                  <td>
                    <button class="btn btn-sm btn-outline-secondary">
                      <i class="bi bi-eye"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td data-label="ID">TXN-78942</td>
                  <td data-label="Type">Withdrawal</td>
                  <td data-label="Method">Bank Transfer</td>
                  <td data-label="Date">May 10, 2025</td>
                  <td data-label="Status"><span class="badge badge-failed">Failed</span></td>
                  <td data-label="Amount">$1,000.00</td>
                  <td>
                    <button class="btn btn-sm btn-outline-secondary">
                      <i class="bi bi-eye"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <div class="card-footer d-flex justify-content-between align-items-center">
            <div class="text-muted">
              Showing 1 to 4 of 24 entries
            </div>
            <nav aria-label="Page navigation">
              <ul class="pagination pagination-sm mb-0">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
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

  @include('user.footer')