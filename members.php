<?php require_once 'includes/header.php'; ?>

<div class="container my-3 py-5">
    <h1 class="text-center fw-bold mb-4">Stok <span class="text-orange">Barang Tersisa</span></h1>
    <p class="text-center mb-5">Informasi ketersediaan produk alat gym di gudang</p>

    <div class="table-responsive">
        <table class="table table-dark table-bordered border-orange">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Stok Tersisa</th>
                    <th>Satuan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Data stok barang (statis, tanpa database)
                $stokProduk = [
                    ['nama' => 'Adjustable Dumbbell 20kg', 'kategori' => 'Dumbbell', 'stok' => 12, 'satuan' => 'set'],
                    ['nama' => 'Pull Up Bar Multifungsi', 'kategori' => 'Bar', 'stok' => 8, 'satuan' => 'unit'],
                    ['nama' => 'Resistance Band 5 pcs', 'kategori' => 'Band', 'stok' => 25, 'satuan' => 'paket'],
                    ['nama' => 'Yoga Mat Premium', 'kategori' => 'Mat', 'stok' => 15, 'satuan' => 'lembar'],
                    ['nama' => 'Kettlebell 12kg', 'kategori' => 'Kettlebell', 'stok' => 6, 'satuan' => 'buah'],
                    ['nama' => 'Weighted Vest 10kg', 'kategori' => 'Vest', 'stok' => 4, 'satuan' => 'buah'],
                    ['nama' => 'Bench Press Flat', 'kategori' => 'Bench', 'stok' => 3, 'satuan' => 'unit'],
                    ['nama' => 'Skipping Rope', 'kategori' => 'Aksesoris', 'stok' => 30, 'satuan' => 'buah'],
                ];
                $no = 1;
                foreach ($stokProduk as $item): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $item['nama'] ?></td>
                    <td><?= $item['kategori'] ?></td>
                    <td class="<?= $item['stok'] <= 5 ? 'text-orange fw-bold' : '' ?>">
                        <?= $item['stok'] ?>
                        <?php if ($item['stok'] <= 5): ?>
                            <span class="badge bg-warning text-dark ms-2">Stok Terbatas!</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $item['satuan'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Catatan stok -->
    <div class="alert alert-secondary bg-dark text-light border-orange mt-4">
        <i class="fas fa-info-circle text-orange me-2"></i> 
        Stok diperbarui secara berkala. Untuk pemesanan dalam jumlah besar, silakan hubungi bagian sales.
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>