<?php include 'includes/header.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
?>
<div class="row" id="detail-product-container">
    <div class="col-md-6 text-center" id="detail-img"></div>
    <div class="col-md-6" id="detail-info"></div>
</div>
<script>
    function loadDetail() {
        const productId = <?php echo $id; ?>;
        const products = getProducts();
        const product = products.find(p => p.id === productId);
        if(!product) {
            document.getElementById('detail-product-container').innerHTML = '<div class="alert alert-danger">Produk tidak ditemukan.</div>';
            return;
        }
        document.getElementById('detail-img').innerHTML = `<img src="${product.image}" class="img-fluid rounded-4 shadow" style="max-height:350px">`;
        document.getElementById('detail-info').innerHTML = `
            <h2>${product.name}</h2>
            <p class="lead text-success fw-bold">Rp ${product.price.toLocaleString('id-ID')}</p>
            <div class="mb-3"><span class="badge bg-secondary"><i class="bi bi-box"></i> Stok tersisa: ${product.stock}</span></div>
            <p>${product.description}</p>
            <button id="buyNowDetailBtn" class="btn btn-gym btn-lg" data-id="${product.id}" ${product.stock===0 ? 'disabled' : ''}><i class="bi bi-bag"></i> Beli Sekarang</button>
            <a href="produk.php" class="btn btn-outline-dark ms-2">Kembali</a>
        `;
        const buyBtn = document.getElementById('buyNowDetailBtn');
        if(buyBtn) {
            buyBtn.addEventListener('click', (e) => {
                const pid = parseInt(buyBtn.dataset.id);
                if(reduceStock(pid)) {
                    alert("Pembelian sukses! Stok diperbarui.");
                    location.reload();
                } else {
                    alert("Stok produk habis / gagal.");
                }
            });
        }
    }
    document.addEventListener('DOMContentLoaded', loadDetail);
</script>
<?php include 'includes/footer.php'; ?>