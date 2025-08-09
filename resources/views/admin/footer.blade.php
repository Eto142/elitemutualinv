    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar toggle functionality
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                sidebarOverlay.classList.toggle('show');
            });
            
            sidebarOverlay.addEventListener('click', function() {
                sidebar.classList.remove('show');
                sidebarOverlay.classList.remove('show');
            });
            
            // Tooltip initialization
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Alert handling
            function showAlert(type, message) {
                const alertContainer = document.getElementById('alertContainer');
                const alert = document.createElement('div');
                alert.className = `alert alert-${type} alert-dismissible fade show`;
                alert.innerHTML = `
                    <div class="alert-content">
                        <div class="alert-icon">
                            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
                        </div>
                        <div class="alert-text">
                            ${message}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="alert-progress"></div>
                `;
                alertContainer.appendChild(alert);
                
                // Auto-dismiss after 5 seconds
                setTimeout(() => {
                    alert.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
                    alert.style.transform = 'translateX(100%)';
                    alert.style.opacity = '0';
                    
                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                }, 5000);
            }
            
            // Form submission handlers
            document.getElementById('depositForm').addEventListener('submit', function(e) {
                e.preventDefault();
                showAlert('success', 'Deposit added successfully!');
                $('#addDepositModal').modal('hide');
                this.reset();
            });
            
            document.getElementById('mutualFundForm').addEventListener('submit', function(e) {
                e.preventDefault();
                showAlert('success', 'Mutual fund added successfully!');
                $('#addMutualFundModal').modal('hide');
                this.reset();
            });
            
            document.getElementById('cashBalanceForm').addEventListener('submit', function(e) {
                e.preventDefault();
                showAlert('success', 'Cash balance updated successfully!');
                $('#addCashBalanceModal').modal('hide');
                this.reset();
            });
            
            // Logout button
            document.getElementById('logoutBtn').addEventListener('click', function(e) {
                e.preventDefault();
                // Add logout logic here
                showAlert('info', 'You have been logged out successfully.');
            });
        });
    </script>
</body>
</html>