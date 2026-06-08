<?php 
$page_title = "Detail Produk - UMKM Nusantara";
include 'includes/header.php';

// Simulasi data produk berdasarkan parameter GET
$product_id = $_GET['product'] ?? 'woodcraft';
$product_data = [
    'woodcraft' => [
        'name' => 'Ukiran Kayu Jepara',
        'desc' => 'Produk ukiran kayu jati berkualitas tinggi dengan motif flora dan fauna khas Indonesia. Setiap produk dibuat oleh pengrajin berpengalaman lebih dari 20 tahun.',
        'price' => 'Rp 350.000',
        'image' => 'https://picsum.photos/id/13/600/400',
        'detail' => 'Ukiran ini cocok untuk hiasan dinding, meja, atau hadiah istimewa. Ukuran 30x40 cm, finishing natural.'
    ],
    'coffee' => [
        'name' => 'Kopi Arabika Gayo',
        'desc' => 'Kopi spesial dari dataran tinggi Gayo, Aceh. Diproses secara semi-washed, menghasilkan rasa fruity dan aftertaste yang panjang.',
        'price' => 'Rp 85.000 / 200gr',
        'image' => 'https://picsum.photos/id/20/600/400',
        'detail' => 'Kopi sudah disangrai medium, cocok untuk manual brew maupun espresso.'
    ],
    'tenun' => [
        'name' => 'Tenun Ikat NTT',
        'desc' => 'Kain tenun tradisional dengan motif ikat khas dari Nusa Tenggara Timur. Pewarnaan alami dan ditenun manual dengan alat tradisional.',
        'price' => 'Rp 450.000',
        'image' => 'https://picsum.photos/id/30/600/400',
        'detail' => 'Lebar kain 110cm, panjang 2 meter. Sangat cocok untuk bahan pakaian atau selendang.'
    ]
];
$product = $product_data[$product_id] ?? $product_data['woodcraft'];
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php" class="text-orange-red">Home</a></li>
        <li class="breadcrumb-item active text-white-50" aria-current="page"><?= $product['name'] ?></li>
    </ol>
</nav>

<div class="row g-5">
    <div class="col-md-6">
        <img src="<?= $product['image'] ?>" class="img-fluid rounded shadow-lg" alt="<?= $product['name'] ?>">
    </div>
    <div class="col-md-6">
        <h1 class="display-5 fw-bold text-orange-red"><?= $product['name'] ?></h1>
        <p class="lead"><?= $product['desc'] ?></p>
        <h3 class="text-orange-red mb-3"><?= $product['price'] ?></h3>
        <p><i class="fas fa-check-circle text-success me-2"></i> Stok tersedia</p>
        <p><?= $product['detail'] ?></p>
        <div class="d-flex gap-3 mt-4">
            <button class="btn btn-orange-red btn-lg" data-bs-toggle="modal" data-bs-target="#infoModal">Beli Sekarang</button>
            <button class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#infoModal">Tanya Produk</button>
        </div>
    </div>
</div>

<!-- Modal untuk demo interaksi (komponen modal Bootstrap) -->
<div class="modal fade" id="infoModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-orange-red">
                <h5 class="modal-title">Informasi Pembelian</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Untuk pemesanan produk <strong><?= $product['name'] ?></strong>, silakan hubungi WhatsApp kami di <span class="text-orange-red">+62 812 3456 7890</span> atau email ke <span class="text-orange-red">sales@umkmnusantara.id</span>.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>