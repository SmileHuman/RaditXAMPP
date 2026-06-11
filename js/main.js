// Data produk standar (alat gym)
const DEFAULT_PRODUCTS = [
    { id: 1, name: "BenchPressStation", price: 800000, stock: 12, image: "images/BenchPressStation.jpg", description: "BenAlat ini dilengkapi dengan bangku datar (flat bench) dan penyangga tiang besi (barbell) yang utamanya digunakan untuk melatih otot dada (pectoralis), bahu, dan tricep." },
    { id: 2, name: "Dumbbell", price: 150000, stock: 18, image: "images/Dumbbell.jpg", description: "Alat latihan kardio yang dirancang untuk mensimulasikan sensasi bersepeda balap di dalam ruangan. Sangat bagus untuk membakar kalori dan melatih kekuatan otot kaki." },
    { id: 3, name: "LatPulldownMachine", price: 500000, stock: 5, image: "images/LatPulldownMachine.jpg", description: "Alat beban bebas (free weight) genggam yang fleksibel. Pada gambar terlihat jenis adjustable dumbbell yang beratnya bisa diatur dengan menambah atau mengurangi piringan beban (plate)." },
    { id: 4, name: "SpinBike", price: 700000, stock: 9, image: "images/SpinBike.jpg", description: "Alat berbasis katrol dan kabel dengan stang panjang yang ditarik ke bawah menuju dada. Fungsi utamanya adalah untuk membangun dan melatih otot punggung lebar (latissimus dorsi)." },
    { id: 5, name: "Treadmill", price: 999500, stock: 25, image: "images/Treadmill.jpg", description: "Alat kardio paling populer yang memiliki sabuk berjalan dinamis untuk memfasilitasi latihan berjalan, joging, hingga berlari di dalam ruangan tanpa berpindah tempat." }
];

// Load dari localStorage atau default
function getProducts() {
    const stored = localStorage.getItem("DEFAULT_PRODUCTS");
    if (stored) {
        try {
            return JSON.parse(stored);
        } catch(e) { return DEFAULT_PRODUCTS; }
    }
    return DEFAULT_PRODUCTS;
}

function saveProducts(products) {
    localStorage.setItem("gymcore_products", JSON.stringify(products));
}

// Update stok produk tertentu (berkurang 1)
function reduceStock(productId) {
    let products = getProducts();
    const index = products.findIndex(p => p.id == productId);
    if (index !== -1 && products[index].stock > 0) {
        products[index].stock -= 1;
        saveProducts(products);
        return true;
    }
    return false;
}

// Mendapatkan detail produk berdasarkan ID
function getProductById(id) {
    const products = getProducts();
    return products.find(p => p.id == id) || null;
}

// Fungsi untuk render tabel stok (digunakan di halaman stok)
function renderStockTable() {
    const container = document.getElementById("stock-table-container");
    if (!container) return;
    const products = getProducts();
    let html = `<table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr><th>ID</th><th>Nama Produk</th><th>Harga (Rp)</th><th>Stok Tersedia</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>`;
    products.forEach(prod => {
        html += `<tr>
                    <td>${prod.id}</td>
                    <td><strong>${prod.name}</strong></td>
                    <td>${prod.price.toLocaleString('id-ID')}</td>
                    <td><span class="badge ${prod.stock > 0 ? 'bg-success' : 'bg-danger'}">${prod.stock}</span></td>
                    <td><button class="btn btn-sm btn-warning buy-stock-btn" data-id="${prod.id}" ${prod.stock === 0 ? 'disabled' : ''}><i class="bi bi-cart-plus"></i> Beli</button></td>
                  </tr>`;
    });
    html += `</tbody></table><p class="text-muted small">*Klik Beli akan mengurangi stok produk (disimpan di LocalStorage)</p>`;
    container.innerHTML = html;

    // event listener tombol beli di tabel stok
    document.querySelectorAll('.buy-stock-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(btn.dataset.id);
            if (reduceStock(id)) {
                alert("✅ Pembelian berhasil! Stok berkurang.");
                renderStockTable();  // refresh tabel
                // jika ada komponen lain di halaman yang perlu sinkron (optional)
                if (typeof window.updateProductCards === 'function') window.updateProductCards();
                if (typeof window.updateDetailPage === 'function') window.updateDetailPage();
                location.reload(); // untuk memastikan semua tampilan konsisten (opsional, tapi bagus)
            } else {
                alert("Stok habis! Tidak bisa membeli.");
            }
        });
    });
}

// Render daftar produk sebagai card (halaman produk)
function renderProductCards() {
    const grid = document.getElementById("products-grid");
    if (!grid) return;
    const products = getProducts();
    if (products.length === 0) {
        grid.innerHTML = '<div class="col-12 text-center">Belum ada produk</div>';
        return;
    }
    let cards = '';
    products.forEach(prod => {
        cards += `<div class="col-md-6 col-lg-4 mb-4">
                    <div class="card card-product h-100">
                        <img src="${prod.image}" class="card-img-top product-img" alt="${prod.name}">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">${prod.name}</h5>
                            <p class="card-text text-muted small">${prod.description.substring(0, 70)}...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 text-success">Rp ${prod.price.toLocaleString('id-ID')}</span>
                                <span class="stok-badge"><i class="bi bi-box-seam"></i> Stok: ${prod.stock}</span>
                            </div>
                            <div class="mt-3 d-flex gap-2">
                                <a href="detail.php?id=${prod.id}" class="btn btn-outline-dark btn-sm flex-fill">Lihat Detail</a>
                                <button class="btn btn-gym btn-sm flex-fill buy-product-btn" data-id="${prod.id}" ${prod.stock === 0 ? 'disabled' : ''}><i class="bi bi-bag-check"></i> Beli</button>
                            </div>
                        </div>
                    </div>
                </div>`;
    });
    grid.innerHTML = cards;

    // event beli card
    document.querySelectorAll('.buy-product-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(btn.dataset.id);
            if (reduceStock(id)) {
                alert("✔ Produk berhasil dibeli! Stok diperbarui.");
                renderProductCards();    // refresh cards
                if (document.getElementById("stock-table-container")) renderStockTable();
            } else {
                alert("Stok habis, gagal membeli.");
            }
        });
    });
}