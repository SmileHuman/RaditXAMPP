<?php
session_start();
require_once 'config.php';

$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$product = getProductById($product_id);

if(!$product) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> - UMKM Center</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Navbar sama seperti index.php -->
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
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#products">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="products-table.php">Data Produk</a></li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Product Detail -->
<section class="product-detail-section py-5 mt-5">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php#products">Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $product['name']; ?></li>
            </ol>
        </nav>
        
        <div class="row mt-4">
            <div class="col-lg-6 mb-4">
                <img src="<?php echo $product['image']; ?>" class="img-fluid rounded-4 shadow" alt="<?php echo $product['name']; ?>">
            </div>
            <div class="col-lg-6">
                <span class="badge bg-primary mb-3"><?php echo $product['category']; ?></span>
                <h1 class="display-5 fw-bold mb-3"><?php echo $product['name']; ?></h1>
                <div class="mb-3">
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star-half-alt text-warning"></i>
                    <span class="text-muted ms-2">(128 ulasan)</span>
                </div>
                <p class="lead mb-4"><?php echo $product['description']; ?></p>
                <h2 class="text-primary fw-bold mb-4">Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></h2>
                
                <div class="mb-4">
                    <label class="form-label fw-bold">Jumlah</label>
                    <div class="input-group" style="width: 150px;">
                        <button class="btn btn-outline-secondary" type="button">-</button>
                        <input type="text" class="form-control text-center" value="1">
                        <button class="btn btn-outline-secondary" type="button">+</button>
                    </div>
                </div>
                
                <div class="d-flex gap-3">
                    <button class="btn btn-primary btn-lg flex-grow-1" onclick="showAddToCartModal()">
                        <i class="fas fa-shopping-cart me-2"></i> Tambah ke Keranjang
                    </button>
                    <button class="btn btn-outline-primary btn-lg" onclick="addToWishlist()">
                        <i class="far fa-heart"></i>
                    </button>
                </div>
                
                <hr class="my-4">
                
                <div class="product-info">
                    <h5><i class="fas fa-store me-2"></i> Informasi UMKM</h5>
                    <p><strong>Nama UMKM:</strong> <?php echo $product['umkm_name']; ?></p>
                    <p><strong>Lokasi:</strong> <?php echo $product['location']; ?></p>
                    <p><strong>Bergabung sejak:</strong> <?php echo $product['join_date']; ?></p>
                </div>
            </div>
        </div>
        
        <!-- Product Details Tab -->
        <div class="row mt-5">
            <div class="col-12">
                <ul class="nav nav-tabs" id="productTab" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#description">Deskripsi</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#specification">Spesifikasi</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#reviews">Ulasan</button>
                    </li>
                </ul>
                <div class="tab-content p-4 border border-top-0 rounded-bottom">
                    <div class="tab-pane fade show active" id="description">
                        <p><?php echo $product['full_description']; ?></p>
                    </div>
                    <div class="tab-pane fade" id="specification">
                        <ul>
                            <li>Material: Bahan berkualitas tinggi</li>
                            <li>Ukuran: Tersedia berbagai ukuran</li>
                            <li>Berat: 500 gram</li>
                            <li>Garansi: 30 hari</li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="reviews">
                        <p>Belum ada ulasan. Jadilah yang pertama memberi ulasan!</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Related Products -->
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="fw-bold mb-4">Produk Terkait</h3>
                <div class="row g-4">
                    <?php 
                    $relatedProducts = getRelatedProducts($product_id);
                    foreach($relatedProducts as $related):
                    ?>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="<?php echo $related['image']; ?>" class="card-img-top" alt="<?php echo $related['name']; ?>">
                            <div class="card-body">
                                <h6 class="card-title"><?php echo $related['name']; ?></h6>
                                <p class="card-text text-primary fw-bold">Rp <?php echo number_format($related['price'], 0, ',', '.'); ?></p>
                                <a href="product-detail.php?id=<?php echo $related['id']; ?>" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Add to Cart -->
<div class="modal fade" id="cartModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fas fa-check-circle me-2"></i>Berhasil Ditambahkan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-shopping-cart fa-4x text-success mb-3"></i>
                <p>Produk berhasil ditambahkan ke keranjang belanja!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Lanjut Belanja</button>
                <a href="#" class="btn btn-primary">Lihat Keranjang</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function showAddToCartModal() {
    var myModal = new bootstrap.Modal(document.getElementById('cartModal'));
    myModal.show();
}
function addToWishlist() {
    alert('Produk ditambahkan ke wishlist!');
}
</script>
</body>
</html>