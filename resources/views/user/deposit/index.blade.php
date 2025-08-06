@include('user.header')

        <!-- Main Content -->
        <div class="main-content" id="mainContent">
            <div class="main-header">
                <button class="sidebar-toggle d-lg-none" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <h1 class="h4 fw-semibold text-dark mb-0">Deposit Funds</h1>
                <div class="avatar-sy bg-primary text-white rounded-circle d-flex align-items-center justify-content-center">
                    {{ Auth::user()->first_name }}
                </div>
            </div>

            <div class="content-area">
                <!-- Deposit Form Section -->
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <!-- Step 1: Deposit Method Selection -->
                                <div id="step1">
                                    <div class="d-flex align-items-center gap-3 mb-4">
                                        <div class="bg-primary bg-opacity-10 rounded-circle p-3 text-primary">
                                            <i class="bi bi-arrow-down-circle fs-4"></i>
                                        </div>
                                        <div>
                                            <h3 class="h5 mb-1">Select Deposit Method</h3>
                                            <p class="text-muted mb-0">Choose how you want to deposit funds</p>
                                        </div>
                                    </div>

                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <div class="deposit-method-card p-4 rounded-3 active" data-method="bank">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="depositMethod" id="bankTransfer" checked>
                                                    <label class="form-check-label d-flex align-items-center gap-3 w-100" for="bankTransfer">
                                                        <div class="bg-primary bg-opacity-10 rounded-circle p-2 text-primary">
                                                            <i class="bi bi-bank fs-4"></i>
                                                        </div>
                                                        <div>
                                                            <h5 class="mb-1">Bank Transfer</h5>
                                                            <p class="text-muted small mb-0">1-3 business days</p>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="deposit-method-card p-4 rounded-3" data-method="crypto">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="depositMethod" id="cryptoTransfer">
                                                    <label class="form-check-label d-flex align-items-center gap-3 w-100" for="cryptoTransfer">
                                                        <div class="bg-primary bg-opacity-10 rounded-circle p-2 text-primary">
                                                            <i class="bi bi-currency-bitcoin fs-4"></i>
                                                        </div>
                                                        <div>
                                                            <h5 class="mb-1">Cryptocurrency</h5>
                                                            <p class="text-muted small mb-0">~1 hour confirmation</p>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Bank Transfer Form -->
                                    <div id="bankForm">
                                        <div class="mb-4">
                                            <label for="bankAmount" class="form-label">Amount (USD)</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" class="form-control" id="bankAmount" placeholder="0.00" min="10" step="0.01">
                                            </div>
                                            <div class="form-text">Minimum deposit: $10.00</div>
                                        </div>

                                        <div class="alert alert-warning">
                                            <p class="fw-bold mb-2">Important Information:</p>
                                            <ul class="mb-0">
                                                <li>Minimum deposit: $10.00</li>
                                                <li>Bank transfers typically process within 1-3 business days</li>
                                                <li>You will be contacted by our team to complete the transfer</li>
                                            </ul>
                                        </div>

                                        <button id="submitBankDeposit" class="btn btn-primary w-100">Request Deposit</button>
                                    </div>

                                    <!-- Crypto Transfer Form (Hidden Initially) -->
                                    <div id="cryptoForm" class="d-none">
                                        <div class="mb-4">
                                            <label for="cryptoCurrency" class="form-label">Cryptocurrency</label>
                                            <select class="form-select" id="cryptoCurrency">
                                                <option value="btc">Bitcoin (BTC)</option>
                                                <option value="eth">Ethereum (ETH)</option>
                                                <option value="usdt">Tether (USDT)</option>
                                                <option value="usdc">USD Coin (USDC)</option>
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label for="cryptoAmount" class="form-label">Amount (USD)</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" class="form-control" id="cryptoAmount" placeholder="0.00" min="10" step="0.01">
                                            </div>
                                            <div class="form-text">Minimum deposit: $10.00</div>
                                        </div>

                                        <div class="alert alert-warning">
                                            <p class="fw-bold mb-2">Important Information:</p>
                                            <ul class="mb-0">
                                                <li>Minimum deposit: $10.00 USD</li>
                                                <li>Deposits typically confirm within 1 hour</li>
                                                <li>Send only the selected cryptocurrency to the deposit address</li>
                                            </ul>
                                        </div>

                                        <button id="submitCryptoDeposit" class="btn btn-primary w-100">Generate Deposit Address</button>
                                    </div>
                                </div>

                                <!-- Step 2: Confirmation -->
                                <div id="step2" class="d-none text-center">
                                    <div class="my-4">
                                        <div class="bg-success bg-opacity-10 rounded-circle p-3 text-success d-inline-flex">
                                            <i class="bi bi-check-circle fs-2"></i>
                                        </div>
                                    </div>
                                    <h4 class="h5 mb-2" id="confirmationTitle">Deposit Request Submitted</h4>
                                    <p class="text-muted mb-4" id="confirmationMessage">Your deposit request has been received successfully.</p>

                                    <div class="bg-light p-4 rounded-3 mb-4 text-start">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">Reference ID:</span>
                                            <span class="fw-medium" id="referenceId">DEP-293847</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">Method:</span>
                                            <span class="fw-medium" id="depositMethod">Bank Transfer</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">Amount:</span>
                                            <span class="fw-medium" id="depositAmount">$500.00</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-muted">Status:</span>
                                            <span class="text-warning fw-medium" id="depositStatus">Pending</span>
                                        </div>
                                    </div>

                                    <div id="bankContactInfo" class="alert alert-info text-start mb-4">
                                        <p class="mb-2">Our team will contact you shortly to complete your bank transfer.</p>
                                        <a href="#" class="text-decoration-none">Contact Us <i class="bi bi-arrow-right"></i></a>
                                    </div>

                                    <div class="d-flex gap-3">
                                        <button id="newDeposit" class="btn btn-primary flex-grow-1">New Deposit</button>
                                        <button id="goToDashboard" class="btn btn-outline-secondary flex-grow-1">Go to Dashboard</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Deposits -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h3 class="h5 fw-semibold text-dark mb-0">Recent Deposits</h3>
                            <a href="transactions.html" class="text-primary text-decoration-none fw-medium">
                                See all <i class="bi bi-chevron-right small"></i>
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col" class="text-end"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>DEP-293847</td>
                                        <td>Bank Transfer</td>
                                        <td>May 15, 2024</td>
                                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                                        <td class="fw-semibold text-dark">$500.00</td>
                                        <td class="text-end">
                                            <a href="#" class="text-primary text-decoration-none fw-medium">Details</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DEP-293846</td>
                                        <td>Bitcoin (BTC)</td>
                                        <td>May 10, 2024</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td class="fw-semibold text-dark">$1,250.00</td>
                                        <td class="text-end">
                                            <a href="#" class="text-primary text-decoration-none fw-medium">Details</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DEP-293845</td>
                                        <td>Bank Transfer</td>
                                        <td>May 5, 2024</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td class="fw-semibold text-dark">$750.00</td>
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

    <!-- Crypto Deposit Modal -->
    <div class="modal fade" id="cryptoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cryptoModalTitle">Deposit Cryptocurrency</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="qr-code-container mb-4">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=bitcoin:1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa" alt="QR Code" class="img-fluid">
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label d-block text-start">Wallet Address</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="walletAddress" value="1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa" readonly>
                            <button class="btn btn-outline-secondary" type="button" id="copyWalletAddress">
                                <i class="bi bi-clipboard"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="alert alert-warning text-start">
                        <ul class="mb-0">
                            <li>Minimum deposit: <span id="minDepositAmount">$10.00</span> USD</li>
                            <li>Deposits typically confirm within 1 hour</li>
                            <li>Send only <span id="selectedCrypto">Bitcoin (BTC)</span> to this address</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">I've Completed My Deposit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar toggle for mobile
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const overlay = document.querySelector('.overlay');
            
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('active');
            });
            
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('show');
                overlay.classList.remove('active');
            });

            // Deposit method selection
            const depositMethodCards = document.querySelectorAll('.deposit-method-card');
            const bankForm = document.getElementById('bankForm');
            const cryptoForm = document.getElementById('cryptoForm');
            
            depositMethodCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Update active state
                    depositMethodCards.forEach(c => c.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Check the radio button
                    const radio = this.querySelector('input[type="radio"]');
                    radio.checked = true;
                    
                    // Show the appropriate form
                    if (radio.id === 'bankTransfer') {
                        bankForm.classList.remove('d-none');
                        cryptoForm.classList.add('d-none');
                    } else {
                        bankForm.classList.add('d-none');
                        cryptoForm.classList.remove('d-none');
                    }
                });
            });

            // Form submission
            const submitBankDeposit = document.getElementById('submitBankDeposit');
            const submitCryptoDeposit = document.getElementById('submitCryptoDeposit');
            const step1 = document.getElementById('step1');
            const step2 = document.getElementById('step2');
            const bankContactInfo = document.getElementById('bankContactInfo');
            const cryptoModal = new bootstrap.Modal(document.getElementById('cryptoModal'));
            
            submitBankDeposit.addEventListener('click', function() {
                const amount = document.getElementById('bankAmount').value;
                
                if (!amount || parseFloat(amount) < 10) {
                    alert('Please enter an amount of at least $10.00');
                    return;
                }
                
                // Update confirmation details
                document.getElementById('depositMethod').textContent = 'Bank Transfer';
                document.getElementById('depositAmount').textContent = '$' + parseFloat(amount).toFixed(2);
                document.getElementById('referenceId').textContent = 'DEP-' + Math.floor(100000 + Math.random() * 900000);
                
                // Show bank-specific info
                bankContactInfo.classList.remove('d-none');
                
                // Show confirmation
                step1.classList.add('d-none');
                step2.classList.remove('d-none');
            });
            
            submitCryptoDeposit.addEventListener('click', function() {
                const amount = document.getElementById('cryptoAmount').value;
                const currency = document.getElementById('cryptoCurrency').value;
                const currencyName = document.getElementById('cryptoCurrency').options[document.getElementById('cryptoCurrency').selectedIndex].text;
                
                if (!amount || parseFloat(amount) < 10) {
                    alert('Please enter an amount of at least $10.00');
                    return;
                }
                
                // Update modal details
                document.getElementById('cryptoModalTitle').textContent = `Deposit ${currencyName}`;
                document.getElementById('selectedCrypto').textContent = currencyName;
                document.getElementById('minDepositAmount').textContent = '$10.00';
                
                // Update confirmation details
                document.getElementById('depositMethod').textContent = currencyName;
                document.getElementById('depositAmount').textContent = '$' + parseFloat(amount).toFixed(2);
                document.getElementById('referenceId').textContent = 'DEP-' + Math.floor(100000 + Math.random() * 900000);
                
                // Hide bank-specific info
                bankContactInfo.classList.add('d-none');
                
                // Show crypto modal
                cryptoModal.show();
                
                // Show confirmation after modal is closed
                document.getElementById('cryptoModal').addEventListener('hidden.bs.modal', function() {
                    step1.classList.add('d-none');
                    step2.classList.remove('d-none');
                });
            });
            
            // Copy wallet address
            document.getElementById('copyWalletAddress').addEventListener('click', function() {
                const walletAddress = document.getElementById('walletAddress');
                walletAddress.select();
                document.execCommand('copy');
                
                // Show tooltip or alert
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="bi bi-check"></i> Copied!';
                setTimeout(() => {
                    this.innerHTML = originalText;
                }, 2000);
            });
            
            // New deposit button
            document.getElementById('newDeposit').addEventListener('click', function() {
                step2.classList.add('d-none');
                step1.classList.remove('d-none');
                
                // Reset forms
                document.getElementById('bankAmount').value = '';
                document.getElementById('cryptoAmount').value = '';
            });
            
            // Go to dashboard button
            document.getElementById('goToDashboard').addEventListener('click', function() {
                window.location.href = 'dashboard.html';
            });
        });
    </script>
</body>
</html>