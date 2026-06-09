# File: produk.php
<?php include 'includes/header.php'; ?>

<div class="container py-5">
    <h1 class="text-center fw-bold mb-5">Koleksi <span class="text-orange">Alat Gym</span></h1>
    
    <div class="row g-4">
        <?php
        $products = [
            ['name' => 'Adjustable Dumbbell 20kg', 'price' => 'Rp 1.250.000', 'desc' => 'Dumbbell adjustable 2 in 1, material besi solid', 'img' => 'https://images.unsplash.com/photo-1586401100295-7a8096fd231a?w=500&h=300&fit=crop'],
            ['name' => 'Pull Up Bar Multifungsi', 'price' => 'Rp 450.000', 'desc' => 'Bisa untuk pull up, push up, dan sit up', 'img' => 'https://images.unsplash.com/photo-1598971639058-fab3c3109a00?w=500&h=300&fit=crop'],
            ['name' => 'Resistance Band 5 pcs', 'price' => 'Rp 275.000', 'desc' => 'Set 5 level tahanan, portable', 'img' => 'https://images.unsplash.com/photo-1598289431512-b97b0917affc?w=500&h=300&fit=crop'],
            ['name' => 'Yoga Mat Premium', 'price' => 'Rp 185.000', 'desc' => 'Tebal 10mm, anti slip', 'img' => 'https://images.unsplash.com/photo-1592432678016-e910b452f9a2?w=500&h=300&fit=crop'],
            ['name' => 'Kettlebell 12kg', 'price' => 'Rp 350.000', 'desc' => 'Cast iron vinyl coating', 'img' => 'https://images.unsplash.com/photo-1584735935682-2f2b69dff9d2?w=500&h=300&fit=crop'],
            ['name' => 'Weighted Vest 10kg', 'price' => 'Rp 590.000', 'desc' => 'Adjustable sandbag, nyaman dipakai', 'img' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=500&h=300&fit=crop']
        ];
        foreach($products as $p): ?>
        <div class="col-md-4 col-lg-3">
            <div class="card product-card h-100 bg-dark border-orange">
                <img src="<?= $p['img'] ?>" class="card-img-top" alt="<?= $p['name'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $p['name'] ?></h5>
                    <p class="card-text small text-secondary"><?= $p['desc'] ?></p>
                    <p class="card-text text-orange fw-bold"><?= $p['price'] ?></p>
                    <button class="btn btn-outline-orange w-100 btn-sm quick-view" data-name="<?= $p['name'] ?>" data-desc="<?= $p['desc'] ?>" data-price="<?= $p['price'] ?>">Quick View</button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal Quick View -->
<div class="modal fade" id="quickViewModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header border-orange">
                <h5 class="modal-title">Detail Produk</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="quickViewBody"></div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>