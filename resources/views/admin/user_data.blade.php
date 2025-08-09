@include('admin.header')

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Page Header -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <div class="mb-3 mb-md-0">
                <h1 class="h3 mb-1">User Profile</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $userProfile->first_name }}{{ $userProfile->last_name }}</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addDepositModal">
                    <i class="fas fa-hand-holding-usd me-1"></i> Add Deposit 
                </button>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addMutualFundModal">
                    <i class="fas fa-plus-circle me-1"></i> Add Mutual Fund 
                </button>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCashBalanceModal">
                    <i class="fas fa-plus-circle me-1"></i> Add Cash Balance
                </button>
                <button class="btn btn-info">
                    <i class="fas fa-broom me-1"></i> Clear Account
                </button>
            </div>
        </div>

        <!-- Alert Placeholder -->
        <div class="alert-container" id="alertContainer">
            <!-- Alerts will appear here -->
            @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert" id="successAlert">
        <strong>✅ Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <style>
        .custom-alert {
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            font-size: 0.95rem;
            font-weight: 500;
            padding: 12px 16px;
        }
        .custom-alert.fade-out {
            opacity: 0;
            transition: opacity 0.6s ease;
        }
    </style>

    <script>
        setTimeout(function () {
            let alertEl = document.getElementById('successAlert');
            if (alertEl) {
                alertEl.classList.add('fade-out');
                setTimeout(() => {
                    let alert = new bootstrap.Alert(alertEl);
                    alert.close();
                }, 600); // Wait for fade-out animation
            }
        }, 3500); // Visible for 3.5 seconds
    </script>
@endif

        </div>

        <div class="row">
            <!-- Left Column - Profile Card -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="position-relative mb-3 mx-auto">
                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=random" 
                                 class="rounded-circle shadow profile-img" alt="Profile Photo">
                            <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-2 border border-3 border-white">
                                <i class="fas fa-check text-white"></i>
                            </span>
                        </div>
                        <h3 class="mb-1">{{ $userProfile->first_name }}{{ $userProfile->last_name }}</h3>
                        <p class="text-muted mb-3">{{ $userProfile->email }}</p>
                        
                        <div class="d-flex justify-content-center flex-wrap gap-2 mb-3">
                            <a href="mailto:{{ $userProfile->email }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-envelope me-1"></i> Email
                            </a>
                            <a href="tel:+1234567890" class="btn btn-sm btn-outline-info">
                                <i class="fas fa-phone me-1"></i> Call
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>
                            <button class="btn btn-outline-danger" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                        
                        <hr>
                        
                        <!-- Financial Summary Cards -->
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <div class="card stat-card success">
                                    <div class="card-body p-2 text-center">
                                        <h6 class="card-title text-success mb-1">Total Networth</h6>
                                        <p class="card-text fw-bold fs-5 mb-0">${{ number_format(($credit_transfers) - ($debit_transfers), 2) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card stat-card danger">
                                    <div class="card-body p-2 text-center">
                                        <h6 class="card-title text-danger mb-1">Total Deposits</h6>
                                        <p class="card-text fw-bold fs-5 mb-0">${{ $user_deposits }}</p>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-6">
                                <div class="card stat-card primary">
                                    <div class="card-body p-2 text-center">
                                        <h6 class="card-title text-primary mb-1">Cash Balance</h6>
                                        <p class="card-text fw-bold fs-5 mb-0">$0.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card stat-card warning">
                                    <div class="card-body p-2 text-center">
                                        <h6 class="card-title text-warning mb-1">Total Mutual Funds</h6>
                                        <p class="card-text fw-bold fs-5 mb-0">$0.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column - User Details and Activity -->
            <div class="col-lg-8">
                <!-- Personal Information Card -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Personal Information</h5>
                        <span class="badge bg-success">
                            Active
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted small">Full Name</label>
                                <div class="fw-semibold">{{ $userProfile->first_name }}{{ $userProfile->last_name }}</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted small">Email Address</label>
                                <div class="fw-semibold d-flex align-items-center">
                                    {{ $userProfile->email }}
                                    <span class="badge bg-success ms-2">
                                        Verified
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted small">Phone Number</label>
                                <div class="fw-semibold">{{ $userProfile->phone ?? 'Not provided yet' }}</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted small">Registration Date</label>
                                <div class="fw-semibold">
                                  {{ \Carbon\Carbon::parse($userProfile->created_at)->format('M d, Y h:i A') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <!-- Account Activity Section -->
<div class="card">
    <div class="card-header bg-white p-0">
        <ul class="nav nav-tabs card-header-tabs flex-nowrap overflow-auto" id="activityTabs" role="tablist" style="border-bottom: none;">
            <li class="nav-item" role="presentation">
                <button class="nav-link px-4 py-3 fw-bold text-warning hover-border-warning" id="loans-tab" data-bs-toggle="tab" data-bs-target="#loans" type="button" role="tab">
                    <i class="fas fa-hand-holding-usd me-2"></i> investment
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link active px-4 py-3 fw-bold text-primary border-primary" id="transactions-tab" data-bs-toggle="tab" data-bs-target="#transactions" type="button" role="tab" style="border-bottom: 3px solid !important;">
                    <i class="fas fa-exchange-alt me-2"></i> Transactions
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-4 py-3 fw-bold text-success hover-border-success" id="deposits-tab" data-bs-toggle="tab" data-bs-target="#deposits" type="button" role="tab">
                    <i class="fas fa-money-bill-wave me-2"></i> Deposits
                </button>
            </li>
        </ul>
    </div>
    
    <div class="card-body p-0">
        <div class="tab-content p-3" id="activityTabsContent">
            <!-- Transactions Tab -->
            <div class="tab-pane fade show active" id="transactions" role="tabpanel">
                @if(count($user_transactions) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user_transactions as $transaction)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('M d, Y h:i A') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $transaction->transaction_type == 'Credit' ? 'success' : 'danger' }}">
                                            {{ $transaction->transaction_type }}
                                        </span>
                                    </td>
                                    <td class="fw-bold">{{ $transaction->transaction_amount }}</td>
                                    <td>{{ $transaction->description ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $transaction->transaction_status == '1' ? 'success' : 'warning' }}">
                                            {{ $transaction->transaction_status == '1' ? 'Completed' : 'Pending' }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                        <nav aria-label="Transaction pagination">
                            <ul class="pagination pagination-sm">
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
                @else
                    <div class="alert alert-info mt-3 mb-0">
                        <i class="fas fa-info-circle me-2"></i> No transactions found for this user.
                    </div>
                @endif
            </div>
            
            <!-- Deposits Tab -->
            <div class="tab-pane fade" id="deposits" role="tabpanel">
                @if(count($user_deposits_list) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Method</th>
                                    <th>Reference</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user_deposits_list as $deposit)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($deposit->created_at)->format('M d, Y h:i A') }}</td>
                                    <td class="fw-bold">{{ $deposit->amount }}</td>
                                    <td>{{ $deposit->method ?? 'N/A' }}</td>
                                    <td><code>{{ $deposit->reference ?? 'N/A' }}</code></td>
                                    <td>
                                        <span class="badge bg-{{ $deposit->status == '1' ? 'success' : ($deposit->status == '2' ? 'danger' : 'warning') }}">
                                            @if($deposit->status == '1') Approved
                                            @elseif($deposit->status == '2') Declined
                                            @else Pending
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.approve-deposit', $deposit->id) }}" method="POST" class="me-2">
                                            @csrf
                                            <input type="hidden" name="status" value="1">
                                            <input type="hidden" name="user_id" value="{{$userProfile->id}}">
                                            <input type="hidden" name="email" value="{{$userProfile->email}}">
                                            <input type="hidden" name="amount" value="{{$deposit->amount}}">
                                            <input type="hidden" name="deposit_type" value="{{$deposit->deposit_type}}">
                                            <button class="btn btn-sm btn-success me-1" data-bs-toggle="tooltip" title="Approve">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.decline-deposit', $deposit->id) }}" method="POST" class="me-2">
                                            @csrf
                                            <input type="hidden" name="status" value="2">
                                            <input type="hidden" name="user_id" value="{{$userProfile->id}}">
                                            <input type="hidden" name="email" value="{{$userProfile->email}}">
                                            <input type="hidden" name="amount" value="{{$deposit->amount}}">
                                            <input type="hidden" name="deposit_type" value="{{$deposit->deposit_type}}">
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Decline">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                        <nav aria-label="Deposit pagination">
                            <ul class="pagination pagination-sm">
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
                @else
                    <div class="alert alert-info mt-3 mb-0">
                        <i class="fas fa-info-circle me-2"></i> No deposits found for this user.
                    </div>
                @endif
            </div>
            
            <!-- Loans Tab -->
            <div class="tab-pane fade" id="loans" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Interest</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jun 10, 2023 11:45 AM</td>
                                <td class="fw-bold">$2,000.00</td>
                                <td>8%</td>
                                <td>Dec 10, 2023</td>
                                <td>
                                    <span class="badge bg-success">
                                        Active
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="tooltip" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Mark as Paid">
                                        <i class="fas fa-check-circle"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Add Deposit Modal -->
    <div class="modal fade" id="addDepositModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Deposit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               <form action="{{ route('admin.addUserDeposit') }}" method="POST">
    @csrf
   <input type="hidden" name="id" value="{{$userProfile->id}}"/>
    <div class="modal-body">
        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input type="number" class="form-control" name="amount" placeholder="Enter deposit amount" required>
        </div>



        <div class="mb-3">
            <label class="form-label">Method</label>
            <select name="method" class="form-control" required>
                <option value="">Select method</option>
                <option value="bank">Bank Transfer</option>
                <option value="crypto">Cryptocurrency</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Deposit Date</label>
            <input type="date" class="form-control" name="deposit_date" required>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Add Deposit</button>
    </div>
</form>

            </div>
        </div>
    </div>

    <!-- Add Mutual Fund Modal -->
    <div class="modal fade" id="addMutualFundModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Mutual Fund</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="mutualFundForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Fund Name</label>
                            <select class="form-control" name="fund_name" required>
                                <option value="">Select Fund</option>
                                <option value="growth">Growth Fund</option>
                                <option value="balanced">Balanced Fund</option>
                                <option value="income">Income Fund</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control" name="amount" placeholder="Enter amount" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Add Mutual Fund</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Cash Balance Modal -->
    <div class="modal fade" id="addCashBalanceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Cash Balance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="cashBalanceForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control" name="amount" placeholder="Enter cash amount" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Transaction Type</label>
                            <select class="form-control" name="type" required>
                                <option value="credit">Credit (Add Funds)</option>
                                <option value="debit">Debit (Withdraw Funds)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Transaction description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Balance</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete User Modal -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm User Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle me-2"></i> This action will permanently delete the user account and all associated data.
                    </div>
                    <div class="mb-3">
                        <label class="form-label">User Details</label>
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=John+Doe" 
                                         class="rounded-circle me-3" width="40" height="40" alt="Profile Photo">
                                    <div>
                                        <h6 class="mb-0">{{ $userProfile->first_name }}{{ $userProfile->last_name }}</h6>
                                        <small class="text-muted">{{ $userProfile->email }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Action</label>
                        <input type="text" class="form-control" name="confirmation" placeholder="Type 'DELETE' to confirm" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete User</button>
                </div>
            </div>
        </div>
    </div>

@include('admin.footer')