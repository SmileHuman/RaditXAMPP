<?php require_once 'includes/header.php'; ?>

<div class="container py-5">
    <h1 class="text-center fw-bold mb-5">Koleksi <span class="text-orange">Alat Gym</span></h1>

    <div class="row g-4">
        <?php
        // Tambahkan full_desc untuk deskripsi lengkap
        $products = [
            [
                'id' => 1,
                'name' => 'Adjustable Dumbbell 20kg',
                'price' => 1250000,
                'desc_short' => 'Dumbbell adjustable 2 in 1, material besi solid',
                'full_desc' => 'Dumbbell adjustable 2 in 1 dengan berat maksimal 20kg. Material besi solid dilapisi karet anti slip. Cocok untuk latihan berbagai gerakan seperti bicep curl, shoulder press, dan tricep extension. Dilengkapi dengan kunci pengaman yang mudah dioperasikan.',
                'img' => 'https://images.unsplash.com/photo-1586401100295-7a8096fd231a?w=500&h=300&fit=crop'
            ],
            [
                'id' => 2,
                'name' => 'Pull Up Bar Multifungsi',
                'price' => 450000,
                'desc_short' => 'Bisa untuk pull up, push up, dan sit up',
                'full_desc' => 'Pull Up Bar multifungsi yang dapat dipasang di kusen pintu tanpa paku. Kapasitas beban hingga 120kg. Selain pull up, bisa digunakan untuk push up (dengan meletakkan di lantai) dan sit up (dengan mengaitkan kaki). Praktis untuk home gym.',
                'img' => 'https://images.unsplash.com/photo-1598971639058-fab3c3109a00?w=500&h=300&fit=crop'
            ],
            [
                'id' => 3,
                'name' => 'Resistance Band 5 pcs',
                'price' => 275000,
                'desc_short' => 'Set 5 level tahanan, portable',
                'full_desc' => 'Set resistance band dengan 5 level tahanan (extra light, light, medium, heavy, extra heavy). Terbuat dari lateks premium, tidak mudah putus. Dilengkapi dengan pintu anchor, ankle strap, dan tas penyimpanan. Cocok untuk latihan seluruh tubuh, terutama untuk pemula hingga atlet.',
                'img' => 'https://images.unsplash.com/photo-1598289431512-b97b0917affc?w=500&h=300&fit=crop'
            ],
            [
                'id' => 4,
                'name' => 'Yoga Mat Premium',
                'price' => 185000,
                'desc_short' => 'Tebal 10mm, anti slip',
                'full_desc' => 'Yoga mat dengan ketebalan 10mm, memberikan kenyamanan ekstra untuk lutut dan siku. Material TPE ramah lingkungan, tidak berbau. Permukaan anti slip di kedua sisi. Tersedia warna hitam dan abu-abu. Dilengkapi strap pembawa.',
                'img' => 'https://images.unsplash.com/photo-1592432678016-e910b452f9a2?w=500&h=300&fit=crop'
            ],
            [
                'id' => 5,
                'name' => 'Kettlebell 12kg',
                'price' => 350000,
                'desc_short' => 'Cast iron vinyl coating',
                'full_desc' => 'Kettlebell 12kg dari besi cor (cast iron) dengan lapisan vinyl coating yang tidak licin. Pegangan lebar dan halus. Cocok untuk gerakan swing, snatch, goblet squat. Telah teruji beban hingga 150kg.',
                'img' => 'https://images.unsplash.com/photo-1584735935682-2f2b69dff9d2?w=500&h=300&fit=crop'
            ],
            [
                'id' => 6,
                'name' => 'Weighted Vest 10kg',
                'price' => 590000,
                'desc_short' => 'Adjustable sandbag, nyaman dipakai',
                'full_desc' => 'Rompi pemberat dengan beban adjustable 5-10kg. Terdiri dari 8 kantong pasir yang bisa disesuaikan. Bahan oxford tebal, mesh di area punggung agar tidak gerah. Gunakan untuk latihan push up, pull up, atau lari. Tersedia ukuran S, M, L.',
                'img' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=500&h=300&fit=crop'
            ]
        ];
        foreach ($products as $p): ?>
            <div class="col-md-4 col-lg-3">
                <!-- Card tanpa tombol, seluruh area card bisa diklik -->
                <div class="card product-card h-100 bg-dark border-orange product-clickable" 
                     data-id="<?= $p['id'] ?>"
                     data-name="<?= htmlspecialchars($p['name']) ?>"
                     data-price="<?= $p['price'] ?>"
                     data-img="<?= $p['img'] ?>"
                     data-desc-short="<?= htmlspecialchars($p['desc_short']) ?>"
                     data-full-desc="<?= htmlspecialchars($p['full_desc']) ?>"
                     style="cursor: pointer;">
                    <img src="<?= $p['img'] ?>" class="card-img-top" alt="<?= $p['name'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $p['name'] ?></h5>
                        <p class="card-text small text-secondary"><?= $p['desc_short'] ?></p>
                        <p class="card-text text-orange fw-bold">Rp <?= number_format($p['price'], 0, ',', '.') ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal Detail Produk (akan muncul saat card diklik) -->
<div class="modal fade" id="productDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header border-orange">
                <h5 class="modal-title">Detail <span class="text-orange">Produk</span></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <img id="modalProductImg" src="" class="img-fluid rounded-3 mb-3" alt="Product image">
                    </div>
                    <div class="col-md-7">
                        <h3 id="modalProductName"></h3>
                        <p class="text-orange fw-bold fs-4" id="modalProductPrice"></p>
                        <p id="modalProductFullDesc"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-orange">
                <button type="button" class="btn btn-outline-orange" data-bs-dismiss="modal">Tutup</button>
                <button type="button" id="modalBuyNowBtn" class="btn btn-orange">Beli Sekarang</button>
                <button type="button" id="modalAddToCartBtn" class="btn btn-outline-orange">Tambah ke Keranjang</button>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>