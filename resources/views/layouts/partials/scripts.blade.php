<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script>
// Language switcher persistence
document.addEventListener('DOMContentLoaded', function() {
    // Cart functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const badge = document.querySelector('.cart-count');
            let count = parseInt(badge.textContent);
            badge.textContent = count + 1;

            // Show added notification
            const toast = document.createElement('div');
            toast.className = 'position-fixed bottom-0 end-0 p-3';
            toast.innerHTML = `
                <div class="toast show" role="alert">
                    <div class="toast-header bg-primary text-white">
                        <strong class="me-auto">Added to Cart</strong>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">
                        Product added to your cart successfully!
                    </div>
                </div>
            `;
            document.body.appendChild(toast);

            // Remove after 3 seconds
            setTimeout(() => {
                toast.remove();
            }, 3000);
        });
    });

    // Quantity controls
    document.querySelectorAll('.btn-outline-secondary').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentNode.querySelector('input');
            let value = parseInt(input.value);

            if (this.textContent.includes('-') && value > 1) {
                input.value = value - 1;
            } else if (this.textContent.includes('+')) {
                input.value = value + 1;
            }
        });
    });
});
</script>