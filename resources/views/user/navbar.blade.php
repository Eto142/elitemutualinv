  <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="logo-e">E</div>
                    <span class="fw-semibold text-dark">Elite Mutual Fund</span>
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
