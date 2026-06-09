
<?php require_once 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="hero-section text-center text-light d-flex align-items-center" style="min-height: 100vh; background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('images/download (3).jpg'); background-size: cover; background-position: center;">
    <div class="container">
        <h1 class="display-4 fw-bold">BANGUN OTOT <span class="text-orange">MAKSIMAL</span></h1>
        <p class="lead mb-4">Peralatan gym premium untuk hasil latihan terbaik. Mulai transformasi tubuhmu sekarang!</p>
        <a href="produk.php" class="btn btn-orange btn-lg px-5">Lihat Produk →</a>
    </div>
</section>

<!-- Tentang Section -->
<section id="tentang" class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4">
                <img src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1075&q=80" alt="Tentang Kami" class="img-fluid rounded-3 shadow">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold">Tentang <span class="text-orange">Fenic Store</span></h2>
                <p class="lead">Distributor terpercaya perlengkapan fitness sejak 2020.</p>
                <p>Kami menyediakan alat-alat gym berkualitas standar komersial dengan harga terjangkau. Didukung oleh tim ahli kebugaran, kami memastikan setiap produk yang kami jual aman, tahan lama, dan efektif membantu mencapai target fitness Anda.</p>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="text-orange">500+</h4>
                            <p>Klien Puas</p>
                        </div>
                        <div class="col-6">
                            <h4 class="text-orange">50+</h4>
                            <p>Produk Unggulan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="py-5 bg-dark">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Produk <span class="text-orange">Unggulan</span></h2>
        <div class="row g-4">
            <?php
            $featured = [
                ['name' => 'Adjustable Dumbbell', 'price' => 'Rp 1.250.000', 'img' => 'https://images.unsplash.com/photo-1586401100295-7a8096fd231a?w=500&h=300&fit=crop'],
                ['name' => 'Pull Up Bar', 'price' => 'Rp 450.000', 'img' => 'https://images.unsplash.com/photo-1598971639058-fab3c3109a00?w=500&h=300&fit=crop'],
                ['name' => 'Resistance Band Set', 'price' => 'Rp 275.000', 'img' => 'https://images.unsplash.com/photo-1598289431512-b97b0917affc?w=500&h=300&fit=crop']
            ];
            foreach($featured as $item): ?>
            <div class="col-md-4">
                <div class="card product-card h-100 bg-dark border-orange">
                    <img src="<?= $item['img'] ?>" class="card-img-top" alt="<?= $item['name'] ?>">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $item['name'] ?></h5>
                        <p class="card-text text-orange fw-bold"><?= $item['price'] ?></p>
                        <button class="btn btn-outline-orange btn-sm" data-bs-toggle="modal" data-bs-target="#productModal" data-product="<?= $item['name'] ?>">Detail</button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-5">
            <a href="produk.php" class="btn btn-orange">Lihat Semua Produk</a>
        </div>
    </div>
</section>

<!-- Testimoni Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Apa Kata <span class="text-orange">Mereka</span></h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card bg-dark p-4 text-center border-orange">
                    <div class="mb-3">⭐⭐⭐⭐⭐</div>
                    <p>"Dumbbell-nya solid banget, grip nyaman. Pengiriman cepat. Rekomendasi buat home gym!"</p>
                    <h6 class="text-orange mt-3">- Andi S.</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-dark p-4 text-center border-orange">
                    <div class="mb-3">⭐⭐⭐⭐⭐</div>
                    <p>"Pull up bar kokoh, bisa tahan beban 120kg. Pelayanannya ramah. Top markotop!"</p>
                    <h6 class="text-orange mt-3">- Sarah M.</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-dark p-4 text-center border-orange">
                    <div class="mb-3">⭐⭐⭐⭐⭐</div>
                    <p>"Resistance band set lengkap, kualitas bagus. Cocok untuk latihan di rumah."</p>
                    <h6 class="text-orange mt-3">- Budi W.</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 text-center bg-orange-gradient">
    <div class="container">
        <h3 class="fw-bold">Siap Tingkatkan Latihanmu?</h3>
        <p class="mb-4">Dapatkan diskon 10% untuk pembelian pertama. Bergabung jadi member sekarang!</p>
        <a href="register.php" class="btn btn-dark btn-lg px-5">Daftar Sekarang</a>
    </div>
</section>

<!-- Kontak Section -->
<section id="kontak" class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <h3 class="fw-bold">Hubungi <span class="text-orange">Kami</span></h3>
                <p class="mb-3"><i class="fas fa-map-marker-alt text-orange me-2"></i> Jl. Kebugaran No. 88, Jakarta Selatan</p>
                <p class="mb-3"><i class="fas fa-phone-alt text-orange me-2"></i> +62 812 3456 7890</p>
                <p class="mb-3"><i class="fas fa-envelope text-orange me-2"></i> info@fenicstore.com</p>
                <div class="social-icons mt-4">
                    <a href="#" class="text-orange me-3 fs-4"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-orange me-3 fs-4"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-orange me-3 fs-4"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ratio ratio-16x9 rounded-3 overflow-hidden">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260485283!2d106.822561!3d-6.194741!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0xd7dabc7e5cd16f60!2sJakarta%20Selatan%2C%20Jakarta!5e0!3m2!1sen!2sid!4v1712123456789!5m2!1sen!2sid" allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Global untuk Detail Produk -->
<div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header border-orange">
                <h5 class="modal-title">Detail Produk</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="modalProductBody">
                Informasi produk akan muncul di sini.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-orange" data-bs-dismiss="modal">Tutup</button>
                <a href="produk.php" class="btn btn-orange">Lihat di Toko</a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>