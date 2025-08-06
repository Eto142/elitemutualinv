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
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-4 mb-md-5 summary-cards-container">
                    <div class="col">
                        <div class="card summary-card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <i class="bi bi-wallet2 text-success fs-5"></i>
                                    <span class="card-title">Cash Balance</span>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="card-text">$0.00</div>
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
                                    <div class="card-text">$0.00</div>
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
                                    <div class="card-text">$0.00</div>
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
                                    <div class="card-text">$0.00</div>
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