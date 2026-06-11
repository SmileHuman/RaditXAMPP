<?php include 'includes/header.php'; ?>
<h2><i class="bi bi-table"></i> Manajemen Stok Alat Gym</h2>
<p class="text-muted">Tabel stok produk, pembelian akan mengurangi stok secara realtime</p>
<div id="stock-table-container"></div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        if(typeof renderStockTable === 'function') renderStockTable();
        else console.error("renderStockTable not defined");
    });
</script>
<?php include 'includes/footer.php'; ?>