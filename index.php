<?php
session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM Center - Platform UMKM Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">
            <i class="fas fa-store me-2"></i>UMKM Center
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#products">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="tabelProduk.php">Data Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="#testimonials">Testimoni</a></li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout (<?php echo $_SESSION['user_name']; ?>)</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link btn btn-primary btn-sm text-white ms-2" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-outline-primary btn-sm ms-2" href="register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6 animate-fade-in">
                <span class="badge bg-primary mb-3">✨ UMKM Indonesia Berkualitas</span>
                <h1 class="display-4 fw-bold mb-4">Dukung Produk <span class="text-gradient">Lokal</span><br>Bangga Buatan Indonesia</h1>
                <p class="lead mb-4">Temukan ribuan produk unggulan dari UMKM terbaik di seluruh Indonesia. Dukung perekonomian lokal dengan berbelanja di UMKM Center.</p>
                <div class="d-flex gap-3">
                    <a href="#products" class="btn btn-primary btn-lg">Jelajahi Produk <i class="fas fa-arrow-right ms-2"></i></a>
                    <a href="register.php" class="btn btn-outline-primary btn-lg">Daftar Jadi UMKM</a>
                </div>
            </div>
            <div class="col-lg-6 animate-fade-in-delay">
                <img src="https://images.unsplash.com/photo-1472851294608-062f824d29cc?w=600" alt="Hero Image" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section id="products" class="products-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary mb-3">Produk Unggulan</span>
            <h2 class="display-5 fw-bold">Pilihan <span class="text-gradient">Terbaik</span> Untuk Anda</h2>
            <p class="text-muted">Produk-produk berkualitas dari UMKM pilihan yang sudah terverifikasi</p>
        </div>
        <div class="row g-4">
            <?php 
            $products = getFeaturedProducts();
            foreach($products as $product): 
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="card product-card h-100">
                    <div class="position-relative">
                        <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
                        <span class="product-badge"><?php echo $product['category']; ?></span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?php echo $product['name']; ?></h5>
                        <p class="card-text text-muted"><?php echo $product['description']; ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price text-primary fw-bold fs-4">Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></span>
                            <a href="detailProduk.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-primary">Detail <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                        <div class="mt-2">
                            <small class="text-muted"><i class="fas fa-store me-1"></i> <?php echo $product['umkm_name']; ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary mb-3">Testimoni</span>
            <h2 class="display-5 fw-bold">Apa Kata <span class="text-gradient">Pelanggan</span>?</h2>
            <p class="text-muted">Pengalaman nyata dari para pembeli produk UMKM</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card testimonial-card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="card-text">"Produk UMKM sangat berkualitas! Saya sudah 3 kali belanja di sini dan selalu puas."</p>
                        <div class="mt-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <h6 class="mt-2 fw-bold">Budi Santoso</h6>
                            <small class="text-muted">Pembeli Batik</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card testimonial-card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="card-text">"Platform yang sangat membantu UMKM lokal untuk dikenal lebih luas. Rekomendasi!"</p>
                        <div class="mt-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <h6 class="mt-2 fw-bold">Siti Aminah</h6>
                            <small class="text-muted">Owner Kerajinan</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card testimonial-card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="card-text">"Pengiriman cepat, produk original, dan harga bersaing. Saya akan belanja lagi!"</p>
                        <div class="mt-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <h6 class="mt-2 fw-bold">Andi Wijaya</h6>
                            <small class="text-muted">Kolektor Kerajinan</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="display-5 fw-bold mb-4">Siap Mengembangkan UMKM Anda?</h2>
                <p class="lead mb-4">Dapatkan akses ke ribuan pembeli dan tingkatkan penjualan Anda bersama UMKM Center</p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="register.php" class="btn btn-primary btn-lg">Daftar Sekarang <i class="fas fa-arrow-right ms-2"></i></a>
                    <button class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#infoModal">Pelajari Lebih Lanjut</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Bootstrap -->
<div class="modal fade" id="infoModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-info-circle me-2"></i>Info UMKM Center</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>UMKM Center adalah platform digital yang membantu pelaku UMKM di Indonesia untuk memasarkan produk mereka secara online.</p>
                <hr>
                <h6>Keuntungan Bergabung:</h6>
                <ul>
                    <li>Akses ke ribuan pembeli potensial</li>
                    <li>Fitur promosi produk gratis</li>
                    <li>Pendampingan bisnis UMKM</li>
                    <li>Analisis penjualan real-time</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="register.php" class="btn btn-primary">Daftar Sekarang</a>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h5 class="fw-bold mb-3"><i class="fas fa-store me-2"></i>UMKM Center</h5>
                <p>Platform digital untuk mengembangkan UMKM Indonesia dan mendorong produk lokal agar mendunia.</p>
                <div class="social-links">
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <h5 class="fw-bold mb-3">Kontak Kami</h5>
                <p><i class="fas fa-map-marker-alt me-2"></i> Jl. Merdeka No. 123, Jakarta</p>
                <p><i class="fas fa-phone me-2"></i> (021) 1234-5678</p>
                <p><i class="fas fa-envelope me-2"></i> info@umkmcenter.com</p>
            </div>
            <div class="col-lg-4 mb-4">
                <h5 class="fw-bold mb-3">Jam Operasional</h5>
                <p>Senin - Jumat: 09:00 - 17:00</p>
                <p>Sabtu: 09:00 - 13:00</p>
                <p>Minggu: Tutup</p>
            </div>
        </div>
        <hr class="my-4">
        <div class="text-center">
            <p class="mb-0">Copyright © 2026 GetSkill. All rights reserved. | #BanggaBuatanIndonesia</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>