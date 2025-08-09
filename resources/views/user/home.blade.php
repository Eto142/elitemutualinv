@include('user.header')
    
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
            <div class="row g-4 mb-4 summary-cards-container">
    <!-- Cash Balance: full width on phone, 1/4 width on laptop -->
    <div class="col-12 col-lg-3">
        <div class="card summary-card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <i class="bi bi-wallet2 text-success fs-5"></i>
                    <span class="card-title">Cash Balance</span>
                </div>
                <div class="d-flex flex-column">
                    <div class="card-text">$0.00</div>
                    <div class="change-text text-success">↑ 0.00%</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fixed Deposit: 50% on phone, 1/4 width on laptop -->
    <div class="col-6 col-lg-3">
        <div class="card summary-card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <i class="bi bi-bank text-warning fs-5"></i>
                    <span class="card-title">Fixed Deposit</span>
                </div>
                <div class="d-flex flex-column">
                    <div class="card-text">${{ $deposit }}</div>
                    <div class="change-text text-success">↑ 0.00%</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mutual Funds: 50% on phone, 1/4 width on laptop -->
    <div class="col-6 col-lg-3">
        <div class="card summary-card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <i class="bi bi-graph-up text-info fs-5"></i>
                    <span class="card-title">Mutual Funds</span>
                </div>
                <div class="d-flex flex-column">
                    <div class="card-text">$0.00</div>
                    <div class="change-text text-success">↑ 0.00%</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Networth: full width on phone, 1/4 width on laptop -->
    <div class="col-12 col-lg-3">
        <div class="card summary-card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <i class="bi bi-calculator text-primary fs-5"></i>
                    <span class="card-title">Total Networth</span>
                </div>
                <div class="d-flex flex-column">
                    <div class="card-text">$0.00</div>
                    <div class="change-text text-success">↑ 0.00%</div>
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
    <table class="table table-borderless align-middle transaction-table">
        <thead class="bg-light text-muted">
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>From</th>
                <th>Date</th>
                <th>Status</th>
                <th class="text-end">Amount</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $txn)
                <tr>
                    <td>{{ $txn->transaction_id }}</td>

                    <td>
                        <span class="badge bg-{{ $txn->transaction_type === 'Credit' ? 'success' : 'danger' }}">
                            {{ ucfirst($txn->transaction_type) }}
                        </span>
                    </td>

                    <td>
                        @if($txn->transaction === 'credit')
                            Deposit
                        @else
                            Withdrawal
                        @endif
                    </td>

                    <td>{{ \Carbon\Carbon::parse($txn->created_at)->format('M d, Y') }}</td>

                    <td>
                        @switch($txn->status)
                            @case(0)
                                <span class="badge bg-warning text-dark">Pending</span>
                                @break
                            @case(1)
                                <span class="badge bg-success">Completed</span>
                                @break
                            @default
                                <span class="badge bg-danger">Failed</span>
                        @endswitch
                    </td>

                    <td class="text-end fw-semibold">
                        @if ($txn->transaction_type === 'Credit')
                            <span class="text-success">+${{ number_format($txn->credit, 2) }}</span>
                        @else
                            <span class="text-danger">-${{ number_format($txn->debit, 2) }}</span>
                        @endif
                    </td>

                    
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No transactions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
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