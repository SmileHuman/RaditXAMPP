<?php include 'includes/header.php'; ?>
<h2 class="mb-4">🏋️ Semua Produk Gym</h2>
<div id="products-grid" class="row g-4"></div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof renderProductCards === 'function') renderProductCards();
        else console.warn("renderProductCards not loaded");
    });
</script>
<?php include 'includes/footer.php'; ?>