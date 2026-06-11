<?php include 'includes/header.php';?>

<div class="hero-section text-center">
    <h1 class="display-4 fw-bold">Latihan Lebih Kuat, Hasil Maksimal</h1>
    <p class="lead mt-2">Perlengkapan gym premium untuk rumah & studio. Mulai perjalanan fitnes Anda hari ini.</p>
    <a href="produk.php" class="btn btn-gym btn-lg mt-3"><i class="bi bi-cart"></i> Belanja Sekarang</a>
</div>

<!-- Media Visual (Gambar representatif) -->
<div class="row g-3 mb-5 align-items-center">
    <div class="col-md-6">
        <img src="https://images.pexels.com/photos/841130/pexels-photo-841130.jpeg?auto=compress&cs=tinysrgb&w=600" class="img-fluid rounded-4 shadow" alt="Gym equipment">
    </div>
    <div class="col-md-6">
        <h3>Alat Gym Profesional</h3>
        <p>Dari dumbbell adjustable hingga pull-up bar, semua produk melalui uji ketahanan. Kami hadir untuk mendukung gaya hidup aktif Anda.</p>
        <div class="row text-center mt-4">
            <div class="col-4"><i class="bi bi-truck fs-1 text-warning"></i><br>Gratis Ongkir</div>
            <div class="col-4"><i class="bi bi-shield-check fs-1 text-warning"></i><br>Garansi 1 Thn</div>
            <div class="col-4"><i class="bi bi-arrow-repeat fs-1 text-warning"></i><br>Return 14 Hari</div>
        </div>
    </div>
</div>

<!-- Item Produk (Featured) preview dari produk utama -->
<h2 class="mb-4 text-center"><i class="bi bi-fire"></i> Produk Best Seller</h2>
<div id="featured-products" class="row row-cols-1 row-cols-md-3 g-4 mb-5"></div>

<!-- Testimoni -->
<h3 class="text-center mt-4">Apa Kata Pelanggan</h3>
<div class="row mt-3 g-4">
    <div class="col-md-4">
        <div class="testimonial-card"><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i>
            <p class="mt-2">"Dumbbell set nya solid banget, stok update realtime dan proses beli mudah. Rekomended!"</p>
            <strong>- Rangga, Jakarta</strong>
        </div>
    </div>
    <div class="col-md-4">
        <div class="testimonial-card"><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-half text-warning"></i>
            <p>"Pull-up bar kokoh, pemasangan mudah. Pelayanan cepat. Stok akurat."</p>
            <strong>- Dewi, Surabaya</strong>
        </div>
    </div>
    <div class="col-md-4">
        <div class="testimonial-card"><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i>
            <p>"Matras yoga nyaman & anti slip, gratis ongkir tepat waktu. Terima kasih GymCore!"</p>
            <strong>- Andhika, Bandung</strong>
        </div>
    </div>
</div>

<!-- Call to Action (CTA) -->
<div class="text-center my-5 p-4 bg-light rounded-4 shadow-sm">
    <h4>Mulai Latihan Sekarang!</h4>
    <p>Dapatkan diskon 10% untuk pembelian pertama melalui website.</p>
    <button class="btn btn-gym btn-lg" data-bs-toggle="modal" data-bs-target="#promoModal"><i class="bi bi-gift"></i> Klaim Voucher</button>
</div>

<!-- Modal Bootstrap -->
<div class="modal fade" id="promoModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title fw-bold">✨ Promo Spesial ✨</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Gunakan kode <strong>GYMCORE10</strong> saat checkout untuk mendapatkan potongan 10% (maks. Rp 100rb). Belanja minimum Rp 300rb. Berlaku hingga akhir bulan.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
    // render produk unggulan (ambil 3 produk pertama dari localStorage)
    function renderFeatured() {
        const products = getProducts();
        const featuredContainer = document.getElementById('featured-products');
        if(!featuredContainer) return;
        const top3 = products.slice(0,3);
        let html = '';
        top3.forEach(p => {
            html += `<div class="col">
                        <div class="card card-product h-100">
                            <img src="${p.image}" class="card-img-top product-img" alt="${p.name}">
                            <div class="card-body">
                                <h5 class="card-title">${p.name}</h5>
                                <p class="card-text">Rp ${p.price.toLocaleString('id-ID')}</p>
                                <a href="detail.php?id=${p.id}" class="btn btn-sm btn-outline-dark">Lihat</a>
                            </div>
                        </div>
                    </div>`;
        });
        featuredContainer.innerHTML = html;
    }
    window.addEventListener('DOMContentLoaded', () => {
        if(typeof getProducts === 'function') {
            renderFeatured();
        }
    });
</script>

<?php include 'includes/footer.php'; ?>