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
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <!-- Deposit Form Card -->
                <div class="card mb-4">
                    <div class="card-body p-3 p-md-4">
                        <form id="depositForm" method="POST" action="{{ route('user.deposit') }}">
                            @csrf
                            <input type="hidden" name="method" id="selectedMethod" value="bank">
                            <input type="hidden" name="amount" id="hiddenAmount">
                            <input type="hidden" name="currency" id="hiddenCurrency">

                            <!-- Step 1: Deposit Method Selection -->
                            <div id="step1">
                                <div class="d-flex align-items-center gap-3 mb-3 mb-md-4">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-2 p-md-3 text-primary">
                                        <i class="bi bi-arrow-down-circle fs-4"></i>
                                    </div>
                                    <div>
                                        <h3 class="h5 mb-1">Select Deposit Method</h3>
                                        <p class="text-muted mb-0 small">Choose how you want to deposit funds</p>
                                    </div>
                                </div>

                                <!-- Method Selection Cards -->
                                <div class="row g-2 g-md-3 mb-4">
                                    <div class="col-12 col-md-6">
                                        <div class="deposit-method-card p-3 p-md-4 rounded-3 border active" data-method="bank">
                                            <div class="form-check mb-0">
                                                <input class="form-check-input" type="radio" name="depositMethodUI" id="bankTransfer" checked>
                                                <label class="form-check-label d-flex align-items-center gap-2 gap-md-3 w-100" for="bankTransfer">
                                                    <div class="bg-primary bg-opacity-10 rounded-circle p-2 text-primary">
                                                        <i class="bi bi-bank fs-4"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-1 fs-6">Bank Transfer</h5>
                                                        <p class="text-muted small mb-0">1-3 business days</p>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="deposit-method-card p-3 p-md-4 rounded-3 border" data-method="crypto">
                                            <div class="form-check mb-0">
                                                <input class="form-check-input" type="radio" name="depositMethodUI" id="cryptoTransfer">
                                                <label class="form-check-label d-flex align-items-center gap-2 gap-md-3 w-100" for="cryptoTransfer">
                                                    <div class="bg-primary bg-opacity-10 rounded-circle p-2 text-primary">
                                                        <i class="bi bi-currency-bitcoin fs-4"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-1 fs-6">Cryptocurrency</h5>
                                                        <p class="text-muted small mb-0">~1 hour confirmation</p>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bank Transfer Form -->
                                <div id="bankForm">
                                    <div class="mb-3 mb-md-4">
                                        <label for="bankAmount" class="form-label fw-medium">Amount (USD)</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control" id="bankAmount" placeholder="0.00" min="10" step="0.01">
                                        </div>
                                        <div class="form-text text-muted small">Minimum deposit: $10.00</div>
                                    </div>

                                    <div class="alert alert-warning bg-warning bg-opacity-10 border-warning border-opacity-25 mb-3 mb-md-4">
                                        <p class="fw-bold mb-2">Important Information:</p>
                                        <ul class="mb-0 ps-3 small">
                                            <li>Minimum deposit: $10.00</li>
                                            <li>Bank transfers typically process within 1-3 business days</li>
                                            <li>You will be contacted by our team to complete the transfer</li>
                                        </ul>
                                    </div>

                                    <button type="button" id="submitBankDeposit" class="btn btn-primary w-100 py-2">
                                        Request Deposit
                                    </button>
                                </div>

                                <!-- Crypto Transfer Form (Hidden Initially) -->
                                <div id="cryptoForm" class="d-none">
                                    <div class="mb-3 mb-md-4">
                                        <label for="cryptoCurrency" class="form-label fw-medium">Cryptocurrency</label>
                                        <select class="form-select" id="cryptoCurrency">
                                            <option value="btc">Bitcoin (BTC)</option>
                                            <option value="eth">Ethereum (ETH)</option>
                                            <option value="usdt">Tether (USDT)</option>
                                            <option value="usdc">USD Coin (USDC)</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 mb-md-4">
                                        <label for="cryptoAmount" class="form-label fw-medium">Amount (USD)</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control" id="cryptoAmount" placeholder="0.00" min="10" step="0.01">
                                        </div>
                                        <div class="form-text text-muted small">Minimum deposit: $10.00</div>
                                    </div>

                                    <div class="alert alert-warning bg-warning bg-opacity-10 border-warning border-opacity-25 mb-3 mb-md-4">
                                        <p class="fw-bold mb-2">Important Information:</p>
                                        <ul class="mb-0 ps-3 small">
                                            <li>Minimum deposit: $10.00 USD</li>
                                            <li>Deposits typically confirm within 1 hour</li>
                                            <li>Send only the selected cryptocurrency to the deposit address</li>
                                        </ul>
                                    </div>

                                    <button type="button" id="submitCryptoDeposit" class="btn btn-primary w-100 py-2">
                                        Generate Deposit Address
                                    </button>
                                </div>
                            </div>

                            <!-- Step 2: Confirmation -->
                            <div id="step2" class="d-none text-center">
                                <div class="my-3 my-md-4">
                                    <div class="bg-success bg-opacity-10 rounded-circle p-3 text-success d-inline-flex">
                                        <i class="bi bi-check-circle fs-2"></i>
                                    </div>
                                </div>
                                <h4 class="h5 mb-2" id="confirmationTitle">Deposit Request Submitted</h4>
                                <p class="text-muted mb-3 mb-md-4 small" id="confirmationMessage">Your deposit request has been received successfully.</p>

                                <div class="bg-light p-3 p-md-4 rounded-3 mb-3 mb-md-4 text-start">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted small">Reference ID:</span>
                                        <span class="fw-medium small" id="referenceId">DEP-293847</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted small">Method:</span>
                                        <span class="fw-medium small" id="depositMethod">Bank Transfer</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted small">Amount:</span>
                                        <span class="fw-medium small" id="depositAmount">$500.00</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted small">Status:</span>
                                        <span class="text-warning fw-medium small" id="depositStatus">Pending</span>
                                    </div>
                                </div>

                                <div id="bankContactInfo" class="alert alert-info bg-info bg-opacity-10 border-info border-opacity-25 text-start mb-3 mb-md-4 small">
                                    <p class="mb-2">Our team will contact you shortly to complete your bank transfer.</p>
                                    <a href="#" class="text-decoration-none small">Contact Us <i class="bi bi-arrow-right"></i></a>
                                </div>

                                <div class="d-flex flex-column flex-sm-row gap-2 gap-md-3">
                                    <button class="btn btn-primary flex-grow-1 py-2">
                                        New Deposit
                                    </button>
                                    <button class="btn btn-outline-secondary flex-grow-1 py-2">
                                        Go to Dashboard
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
<!-- Recent Deposits Card -->
<div class="card">
    <div class="card-body p-3 p-md-4">
        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between mb-3 mb-md-4">
            <h3 class="h5 fw-semibold text-dark mb-2 mb-sm-0">Recent Deposits</h3>
            <a href="{{ route('user.transactions') }}" class="text-primary text-decoration-none fw-medium small">
                See all <i class="bi bi-chevron-right"></i>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-borderless table-hover small">
                <thead class="bg-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Method</th>
                        
                        <th scope="col" class="text-end">Amount</th>
                        <th scope="col">Date</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @forelse ($deposit as $dep)
                        <tr>
                            <td>{{ $dep->reference_id }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    @if ($dep->method === 'bank')
                                        <i class="bi bi-bank text-primary"></i>
                                        <span>Bank Transfer</span>
                                    @else
                                        <i class="bi bi-currency-bitcoin text-primary"></i>
                                        <span>{{ ucfirst($dep->currency) }}</span>
                                    @endif
                                </div>
                            </td>
                            
                            <td class="fw-semibold text-end">${{ number_format($dep->amount, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($dep->created_at)->format('M d, Y') }}</td>
                           
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No deposits yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
</div>

<!-- Crypto Deposit Modal -->
<div class="modal fade" id="cryptoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fs-6 fs-md-5" id="cryptoModalTitle">Deposit Cryptocurrency</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center px-3 px-md-4 py-3">
                <div class="qr-code-container mb-3 mb-md-4 p-3 bg-white rounded-3 border d-inline-block">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=bitcoin:1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa" 
                         alt="QR Code" class="img-fluid" width="160" height="160">
                </div>
                
                <div class="mb-3 mb-md-4">
                    <label class="form-label d-block text-start fw-medium small">Wallet Address</label>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="walletAddress" 
                               value="1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa" readonly>
                        <button class="btn btn-outline-secondary btn-sm" type="button" id="copyWalletAddress">
                            <i class="bi bi-clipboard"></i> <span class="d-none d-md-inline">Copy</span>
                        </button>
                    </div>
                </div>
                
                <div class="alert alert-warning bg-warning bg-opacity-10 border-warning border-opacity-25 text-start small">
                    <ul class="mb-0 ps-3">
                        <li>Minimum deposit: <span id="minDepositAmount">$10.00</span> USD</li>
                        <li>Deposits typically confirm within 1 hour</li>
                        <li>Send only <span id="selectedCrypto">Bitcoin (BTC)</span> to this address</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer border-0 justify-content-center pt-0">
                <button type="button" class="btn btn-primary px-3 px-md-4 py-2" data-bs-dismiss="modal">
                    I've Completed My Deposit
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

{{-- <script>
document.addEventListener('DOMContentLoaded', function () {
    // Toggle deposit method
    const methodCards = document.querySelectorAll('.deposit-method-card');
    methodCards.forEach(card => {
        card.addEventListener('click', function() {
            methodCards.forEach(c => c.classList.remove('active'));
            this.classList.add('active');
            
            const method = this.dataset.method;
            document.getElementById('selectedMethod').value = method;
            
            if (method === 'bank') {
                document.getElementById('bankForm').classList.remove('d-none');
                document.getElementById('cryptoForm').classList.add('d-none');
            } else {
                document.getElementById('bankForm').classList.add('d-none');
                document.getElementById('cryptoForm').classList.remove('d-none');
            }
        });
    });

    // Form submission handlers
    document.getElementById('submitBankDeposit').addEventListener('click', submitBankDeposit);
    document.getElementById('submitCryptoDeposit').addEventListener('click', submitCryptoDeposit);
    
    // Copy wallet address
    document.getElementById('copyWalletAddress').addEventListener('click', copyWalletAddress);
    
    // Navigation buttons
    document.getElementById('newDeposit').addEventListener('click', resetForm);
    document.getElementById('goToDashboard').addEventListener('click', () => {
        window.location.href = "{{ route('user.home') }}";
    });

    function submitBankDeposit() {
        const amount = parseFloat(document.getElementById('bankAmount').value);
        if (!amount || amount < 10) {
            alert('Please enter a valid amount (minimum $10)');
            return;
        }

        document.getElementById('hiddenAmount').value = amount;
        sendDeposit('bank', amount);
    }

    function submitCryptoDeposit() {
        const amount = parseFloat(document.getElementById('cryptoAmount').value);
        const currency = document.getElementById('cryptoCurrency').value;

        if (!amount || amount < 10) {
            alert('Please enter a valid amount (minimum $10)');
            return;
        }

        document.getElementById('hiddenAmount').value = amount;
        document.getElementById('hiddenCurrency').value = currency;

        sendDeposit('crypto', amount, currency);
    }

    function sendDeposit(method, amount, currency = null) {
        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('method', method);
        formData.append('amount', amount);
        if (currency) formData.append('currency', currency);

        fetch("{{ route('user.deposit') }}", {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                if (method === 'crypto') {
                    showCryptoModal(data, currency);
                } else {
                    showConfirmation(data);
                }
            } else {
                alert(data.message || 'Deposit failed.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    }

    function showCryptoModal(data, currency) {
        const currencyName = document.getElementById('cryptoCurrency').options[
            document.getElementById('cryptoCurrency').selectedIndex
        ].text;
        
        document.getElementById('walletAddress').value = data.walletAddress;
        document.getElementById('selectedCrypto').textContent = currencyName;
        document.querySelector('#cryptoModal .qr-code-container img').src = 
            `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${data.walletAddress}`;
        
        const modal = new bootstrap.Modal(document.getElementById('cryptoModal'));
        modal.show();
        
        document.getElementById('cryptoModal').addEventListener('hidden.bs.modal', () => {
            showConfirmation(data);
        }, { once: true });
    }

    function showConfirmation(data) {
        document.getElementById('referenceId').textContent = data.referenceId || 'DEP-XXXXXX';
        document.getElementById('depositMethod').textContent = 
            data.method === 'crypto' ? document.getElementById('cryptoCurrency').options[
                document.getElementById('cryptoCurrency').selectedIndex
            ].text : 'Bank Transfer';
        document.getElementById('depositAmount').textContent = `$${parseFloat(data.amount).toFixed(2)}`;
        document.getElementById('depositStatus').textContent = 'Pending';
        document.getElementById('bankContactInfo').style.display = 
            data.method === 'bank' ? 'block' : 'none';

        document.getElementById('step1').classList.add('d-none');
        document.getElementById('step2').classList.remove('d-none');
    }

    function copyWalletAddress() {
        const walletAddress = document.getElementById('walletAddress');
        walletAddress.select();
        document.execCommand('copy');
        
        const copyBtn = document.getElementById('copyWalletAddress');
        const originalHTML = copyBtn.innerHTML;
        copyBtn.innerHTML = '<i class="bi bi-check"></i> <span class="d-none d-md-inline">Copied!</span>';
        
        setTimeout(() => {
            copyBtn.innerHTML = originalHTML;
        }, 2000);
    }

    function resetForm() {
        document.getElementById('step2').classList.add('d-none');
        document.getElementById('step1').classList.remove('d-none');
        document.getElementById('bankAmount').value = '';
        document.getElementById('cryptoAmount').value = '';
    }
});
</script> --}}


{{-- <script>
    const walletAddresses = @json($wallets->pluck('address', 'method'));
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    // Define wallet addresses manually
    const walletAddresses = {
      
    };

    // Toggle deposit method
    const methodCards = document.querySelectorAll('.deposit-method-card');
    methodCards.forEach(card => {
        card.addEventListener('click', function() {
            methodCards.forEach(c => c.classList.remove('active'));
            this.classList.add('active');

            const method = this.dataset.method;
            document.getElementById('selectedMethod').value = method;

            if (method === 'bank') {
                document.getElementById('bankForm').classList.remove('d-none');
                document.getElementById('cryptoForm').classList.add('d-none');
            } else {
                document.getElementById('bankForm').classList.add('d-none');
                document.getElementById('cryptoForm').classList.remove('d-none');
            }
        });
    });

    // Form submission handlers
    document.getElementById('submitBankDeposit').addEventListener('click', submitBankDeposit);
    document.getElementById('submitCryptoDeposit').addEventListener('click', submitCryptoDeposit);

    // Copy wallet address
    document.getElementById('copyWalletAddress').addEventListener('click', copyWalletAddress);

    // Navigation buttons
    document.getElementById('newDeposit').addEventListener('click', resetForm);
    document.getElementById('goToDashboard').addEventListener('click', () => {
        window.location.href = "{{ route('user.home') }}";
    });

    function submitBankDeposit() {
        const amount = parseFloat(document.getElementById('bankAmount').value);
        if (!amount || amount < 10) {
            alert('Please enter a valid amount (minimum $10)');
            return;
        }

        document.getElementById('hiddenAmount').value = amount;
        sendDeposit('bank', amount);
    }

    function submitCryptoDeposit() {
        const amount = parseFloat(document.getElementById('cryptoAmount').value);
        const currency = document.getElementById('cryptoCurrency').value;

        if (!amount || amount < 10) {
            alert('Please enter a valid amount (minimum $10)');
            return;
        }

        document.getElementById('hiddenAmount').value = amount;
        document.getElementById('hiddenCurrency').value = currency;

        sendDeposit('crypto', amount, currency);
    }

    function sendDeposit(method, amount, currency = null) {
        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('method', method);
        formData.append('amount', amount);
        if (currency) formData.append('currency', currency);

        fetch("{{ route('user.deposit') }}", {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                if (method === 'crypto') {
                    showCryptoModal(data, currency);
                } else {
                    showConfirmation(data);
                }
            } else {
                alert(data.message || 'Deposit failed.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    }

    function showCryptoModal(data, currency) {
        const currencyName = document.getElementById('cryptoCurrency').options[
            document.getElementById('cryptoCurrency').selectedIndex
        ].text;

        const address = walletAddresses[currency];
        document.getElementById('walletAddress').value = address;
        document.getElementById('selectedCrypto').textContent = currencyName;

        document.querySelector('#cryptoModal .qr-code-container img').src =
            `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${address}`;

        const modal = new bootstrap.Modal(document.getElementById('cryptoModal'));
        modal.show();

        document.getElementById('cryptoModal').addEventListener('hidden.bs.modal', () => {
            showConfirmation({
                method: 'crypto',
                amount: document.getElementById('cryptoAmount').value,
                referenceId: data.referenceId || 'DEP-XXXXXX'
            });
        }, { once: true });
    }

    function showConfirmation(data) {
        document.getElementById('referenceId').textContent = data.referenceId || 'DEP-XXXXXX';
        document.getElementById('depositMethod').textContent =
            data.method === 'crypto' ? document.getElementById('cryptoCurrency').options[
                document.getElementById('cryptoCurrency').selectedIndex
            ].text : 'Bank Transfer';
        document.getElementById('depositAmount').textContent = `$${parseFloat(data.amount).toFixed(2)}`;
        document.getElementById('depositStatus').textContent = 'Pending';
        document.getElementById('bankContactInfo').style.display =
            data.method === 'bank' ? 'block' : 'none';

        document.getElementById('step1').classList.add('d-none');
        document.getElementById('step2').classList.remove('d-none');
    }

    function copyWalletAddress() {
        const walletAddress = document.getElementById('walletAddress');
        walletAddress.select();
        document.execCommand('copy');

        const copyBtn = document.getElementById('copyWalletAddress');
        const originalHTML = copyBtn.innerHTML;
        copyBtn.innerHTML = '<i class="bi bi-check"></i> <span class="d-none d-md-inline">Copied!</span>';

        setTimeout(() => {
            copyBtn.innerHTML = originalHTML;
        }, 2000);
    }

    function resetForm() {
        document.getElementById('step2').classList.add('d-none');
        document.getElementById('step1').classList.remove('d-none');
        document.getElementById('bankAmount').value = '';
        document.getElementById('cryptoAmount').value = '';
    }
});
</script> --}}


<script>
document.addEventListener('DOMContentLoaded', function () {
    // Fetch wallet addresses from the DB (method => address)
    const walletAddresses = @json($wallets->pluck('address', 'method'));

    // Toggle deposit method
    const methodCards = document.querySelectorAll('.deposit-method-card');
    methodCards.forEach(card => {
        card.addEventListener('click', function() {
            methodCards.forEach(c => c.classList.remove('active'));
            this.classList.add('active');

            const method = this.dataset.method;
            document.getElementById('selectedMethod').value = method;

            if (method === 'bank') {
                document.getElementById('bankForm').classList.remove('d-none');
                document.getElementById('cryptoForm').classList.add('d-none');
            } else {
                document.getElementById('bankForm').classList.add('d-none');
                document.getElementById('cryptoForm').classList.remove('d-none');
            }
        });
    });

    // Form submission handlers
    document.getElementById('submitBankDeposit').addEventListener('click', submitBankDeposit);
    document.getElementById('submitCryptoDeposit').addEventListener('click', submitCryptoDeposit);

    // Copy wallet address
    document.getElementById('copyWalletAddress').addEventListener('click', copyWalletAddress);

    // Navigation buttons
    document.getElementById('newDeposit').addEventListener('click', resetForm);
    document.getElementById('goToDashboard').addEventListener('click', () => {
        window.location.href = "{{ route('user.home') }}";
    });

    function submitBankDeposit() {
        const amount = parseFloat(document.getElementById('bankAmount').value);
        if (!amount || amount < 10) {
            alert('Please enter a valid amount (minimum $10)');
            return;
        }

        document.getElementById('hiddenAmount').value = amount;
        sendDeposit('bank', amount);
    }

    function submitCryptoDeposit() {
        const amount = parseFloat(document.getElementById('cryptoAmount').value);
        const currency = document.getElementById('cryptoCurrency').value;

        if (!amount || amount < 10) {
            alert('Please enter a valid amount (minimum $10)');
            return;
        }

        document.getElementById('hiddenAmount').value = amount;
        document.getElementById('hiddenCurrency').value = currency;

        sendDeposit('crypto', amount, currency);
    }

    function sendDeposit(method, amount, currency = null) {
        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('method', method);
        formData.append('amount', amount);
        if (currency) formData.append('currency', currency);

        fetch("{{ route('user.deposit') }}", {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                if (method === 'crypto') {
                    showCryptoModal(data, currency);
                } else {
                    showConfirmation(data);
                }
            } else {
                alert(data.message || 'Deposit failed.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    }

    function showCryptoModal(data, currency) {
        const currencyName = document.getElementById('cryptoCurrency').options[
            document.getElementById('cryptoCurrency').selectedIndex
        ].text;

        const address = walletAddresses[currency]; // ✅ dynamic from DB
        document.getElementById('walletAddress').value = address || "No wallet found";
        document.getElementById('selectedCrypto').textContent = currencyName;

        document.querySelector('#cryptoModal .qr-code-container img').src =
            `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${address}`;

        const modal = new bootstrap.Modal(document.getElementById('cryptoModal'));
        modal.show();

        document.getElementById('cryptoModal').addEventListener('hidden.bs.modal', () => {
            showConfirmation({
                method: 'crypto',
                amount: document.getElementById('cryptoAmount').value,
                referenceId: data.referenceId || 'DEP-XXXXXX'
            });
        }, { once: true });
    }

    function showConfirmation(data) {
        document.getElementById('referenceId').textContent = data.referenceId || 'DEP-XXXXXX';
        document.getElementById('depositMethod').textContent =
            data.method === 'crypto' ? document.getElementById('cryptoCurrency').options[
                document.getElementById('cryptoCurrency').selectedIndex
            ].text : 'Bank Transfer';
        document.getElementById('depositAmount').textContent = `$${parseFloat(data.amount).toFixed(2)}`;
        document.getElementById('depositStatus').textContent = 'Pending';
        document.getElementById('bankContactInfo').style.display =
            data.method === 'bank' ? 'block' : 'none';

        document.getElementById('step1').classList.add('d-none');
        document.getElementById('step2').classList.remove('d-none');
    }

    function copyWalletAddress() {
        const walletAddress = document.getElementById('walletAddress');
        walletAddress.select();
        document.execCommand('copy');

        const copyBtn = document.getElementById('copyWalletAddress');
        const originalHTML = copyBtn.innerHTML;
        copyBtn.innerHTML = '<i class="bi bi-check"></i> <span class="d-none d-md-inline">Copied!</span>';

        setTimeout(() => {
            copyBtn.innerHTML = originalHTML;
        }, 2000);
    }

    function resetForm() {
        document.getElementById('step2').classList.add('d-none');
        document.getElementById('step1').classList.remove('d-none');
        document.getElementById('bankAmount').value = '';
        document.getElementById('cryptoAmount').value = '';
    }
});
</script>


</body>
</html>

@include('user.footer')