<?php require_once 'includes/header.php'; ?>

<div class="container d-flex align-items-center justify-content-center" style="min-height: 75vh;">
    
    <div class="w-100">
        <h1 class="text-center fw-bold mb-4">Keranjang <span class="text-orange">Belanja</span></h1>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card bg-dark border-orange">
                    <div class="card-body p-4">
                        <div id="cartItemsContainer">
                            <div class="text-center py-5">
                                <i class="fas fa-shopping-cart fa-3x mb-3 text-secondary"></i>
                                <p>Keranjang kosong. Silakan belanja dulu yuk!</p>
                                <a href="produk.php" class="btn btn-orange">Lihat Produk</a>
                            </div>
                        </div>
                        
                        <div id="cartSummary" class="mt-4 pt-3 border-top border-orange d-none">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4>Total: <span id="cartTotal" class="text-orange">Rp 0</span></h4>
                                <button id="checkoutBtn" class="btn btn-orange btn-lg">
                                    <i class="fas fa-credit-card"></i> Checkout
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<?php require_once 'includes/footer.php'; ?>