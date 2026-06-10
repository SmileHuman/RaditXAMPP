// ==================== UTILITY FUNCTIONS ====================
function escapeHtml(str) {
    if (!str) return '';
    return str.replace(/[&<>]/g, function(m) {
        if (m === '&') return '&amp;';
        if (m === '<') return '&lt;';
        if (m === '>') return '&gt;';
        return m;
    });
}

function formatRupiah(number) {
    return new Intl.NumberFormat('id-ID').format(number);
}

// ==================== KERANJANG BELANJA (CART) ====================
function getCart() {
    let cart = localStorage.getItem('gymCart');
    return cart ? JSON.parse(cart) : [];
}

function saveCart(cart) {
    localStorage.setItem('gymCart', JSON.stringify(cart));
    updateCartCount();
}

function updateCartCount() {
    const cart = getCart();
    const totalItems = cart.reduce((sum, item) => sum + (item.quantity || 0), 0);
    const badge = document.getElementById('cartCount');
    if (badge) {
        badge.textContent = totalItems;
        badge.style.display = totalItems > 0 ? 'inline-block' : 'none';
    }
}

function addToCart(productId, name, priceRaw) {
    let price = parseInt(String(priceRaw).replace(/[^0-9]/g, ''));
    if (isNaN(price)) {
        console.error('Harga tidak valid:', priceRaw);
        alert('Gagal menambahkan: harga produk tidak valid');
        return false;
    }
    
    let cart = getCart();
    const existing = cart.find(item => item.id == productId);
    if (existing) {
        existing.quantity += 1;
    } else {
        cart.push({
            id: productId,
            name: name,
            price: price,
            quantity: 1
        });
    }
    saveCart(cart);
    alert(`${name} berhasil ditambahkan ke keranjang!`);
    return true;
}

function updateQuantity(productId, newQty) {
    if (newQty < 1) {
        removeFromCart(productId);
        return;
    }
    let cart = getCart();
    const item = cart.find(item => item.id == productId);
    if (item) {
        item.quantity = newQty;
        saveCart(cart);
        renderCart(); // jika di halaman cart
    }
}

function removeFromCart(productId) {
    let cart = getCart();
    cart = cart.filter(item => item.id != productId);
    saveCart(cart);
    renderCart(); // jika di halaman cart
}

function renderCart() {
    const container = document.getElementById('cartItemsContainer');
    const summary = document.getElementById('cartSummary');
    if (!container) return;
    
    const cart = getCart();
    if (cart.length === 0) {
        container.innerHTML = `
            <div class="text-center py-5">
                <i class="fas fa-shopping-cart fa-3x mb-3 text-secondary"></i>
                <p>Keranjang kosong. Silakan belanja dulu yuk!</p>
                <a href="produk.php" class="btn btn-orange">Lihat Produk</a>
            </div>
        `;
        if (summary) summary.classList.add('d-none');
        return;
    }
    
    let html = '<div class="table-responsive"><table class="table table-dark table-bordered"><thead><tr><th>Produk</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th><th></th></tr></thead><tbody>';
    let total = 0;
    cart.forEach(item => {
        const subtotal = item.price * item.quantity;
        total += subtotal;
        html += `
            <tr>
                <td>${escapeHtml(item.name)}</td>
                <td>Rp ${formatRupiah(item.price)}</td>
                <td>
                    <div class="input-group input-group-sm" style="width: 120px;">
                        <button class="btn btn-outline-orange decrement-qty" data-id="${item.id}">-</button>
                        <input type="text" class="form-control bg-dark text-light text-center quantity-input" value="${item.quantity}" data-id="${item.id}" readonly>
                        <button class="btn btn-outline-orange increment-qty" data-id="${item.id}">+</button>
                    </div>
                 </td>
                <td>Rp ${formatRupiah(subtotal)}</td>
                <td><button class="btn btn-sm btn-danger remove-item" data-id="${item.id}"><i class="fas fa-trash"></i></button></td>
            </tr>
        `;
    });
    html += '</tbody></table></div>';
    container.innerHTML = html;
    if (summary) summary.classList.remove('d-none');
    const totalSpan = document.getElementById('cartTotal');
    if (totalSpan) totalSpan.innerHTML = `Rp ${formatRupiah(total)}`;
    
    // Event listeners untuk tombol dalam keranjang
    document.querySelectorAll('.decrement-qty').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.getAttribute('data-id');
            const cart = getCart();
            const item = cart.find(i => i.id == id);
            if (item && item.quantity > 1) updateQuantity(id, item.quantity - 1);
            else removeFromCart(id);
        });
    });
    document.querySelectorAll('.increment-qty').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.getAttribute('data-id');
            const cart = getCart();
            const item = cart.find(i => i.id == id);
            if (item) updateQuantity(id, item.quantity + 1);
        });
    });
    document.querySelectorAll('.remove-item').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.getAttribute('data-id');
            removeFromCart(id);
        });
    });
}

function setupCheckout() {
    const checkoutBtn = document.getElementById('checkoutBtn');
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', () => {
            if (getCart().length === 0) return;
            alert('Terima kasih! Pesanan Anda akan segera diproses.');
            localStorage.removeItem('gymCart');
            renderCart();
            updateCartCount();
        });
    }
}

// ==================== MODAL DETAIL PRODUK (produk.php - klik card) ====================
let currentProduct = {};

document.body.addEventListener('click', function(e) {
    const card = e.target.closest('.product-clickable');
    // Hanya jika card memiliki class product-clickable dan bukan tombol di dalamnya
    if (card && !e.target.closest('.btn')) {
        const id = card.getAttribute('data-id');
        const name = card.getAttribute('data-name');
        const price = card.getAttribute('data-price');
        const img = card.getAttribute('data-img');
        const fullDesc = card.getAttribute('data-full-desc');
        
        if (id && name && price) {
            currentProduct = {
                id: id,
                name: name,
                price: parseInt(price),
                img: img,
                fullDesc: fullDesc
            };
            
            document.getElementById('modalProductImg').src = img;
            document.getElementById('modalProductName').innerText = name;
            document.getElementById('modalProductPrice').innerHTML = 'Rp ' + formatRupiah(price);
            document.getElementById('modalProductFullDesc').innerHTML = fullDesc || 'Deskripsi lengkap tidak tersedia.';
            
            const modal = new bootstrap.Modal(document.getElementById('productDetailModal'));
            modal.show();
        }
    }
});

// Tombol Beli Sekarang di modal detail
const buyNowBtn = document.getElementById('modalBuyNowBtn');
if (buyNowBtn) {
    buyNowBtn.addEventListener('click', function() {
        if (currentProduct.name) {
            alert(`✅ Pesanan berhasil!\nProduk: ${currentProduct.name}\nTotal: Rp ${formatRupiah(currentProduct.price)}\nTerima kasih telah berbelanja di Fenic Store.`);
            const modalElement = document.getElementById('productDetailModal');
            const modal = bootstrap.Modal.getInstance(modalElement);
            if (modal) modal.hide();
        }
    });
}

// Tombol Tambah ke Keranjang di modal detail
const addToCartModalBtn = document.getElementById('modalAddToCartBtn');
if (addToCartModalBtn) {
    addToCartModalBtn.addEventListener('click', function() {
        if (currentProduct.id && currentProduct.name && currentProduct.price) {
            addToCart(currentProduct.id, currentProduct.name, currentProduct.price);
            const modalElement = document.getElementById('productDetailModal');
            const modal = bootstrap.Modal.getInstance(modalElement);
            if (modal) modal.hide();
        }
    });
}

// ==================== REGISTER & TABEL USER (stok barang di member.php diganti, tapi fungsi ini tetap untuk keperluan lain jika ada) ====================
// Fungsi untuk menyimpan user ke localStorage (digunakan di register.php)
const registerForm = document.getElementById('registerForm');
if (registerForm) {
    registerForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const name = document.getElementById('regName')?.value.trim();
        const email = document.getElementById('regEmail')?.value.trim();
        const username = document.getElementById('regUsername')?.value.trim();
        const password = document.getElementById('regPassword')?.value;
        if (!name || !email || !username || !password) {
            alert('Harap isi semua field!');
            return;
        }
        let users = JSON.parse(localStorage.getItem('gymUsers')) || [];
        const newUser = {
            id: Date.now(),
            name: name,
            email: email,
            username: username,
            password: btoa(password),
            registeredAt: new Date().toLocaleString()
        };
        users.push(newUser);
        localStorage.setItem('gymUsers', JSON.stringify(users));
        alert('Pendaftaran berhasil! Silakan login.');
        window.location.href = 'login.php';
    });
}

// NOTE: Untuk member.php sekarang menampilkan stok barang (statis dari PHP), tidak perlu load data user dari localStorage.
// Jika suatu saat ingin menampilkan user, kode di bawah ini bisa diaktifkan, tetapi saat ini member.php menggunakan tabel stok statis.
// Jadi tidak perlu menampilkan data user di member.php.

// ==================== QUICK VIEW MODAL (produk.php) ====================
const quickViewBtns = document.querySelectorAll('.quick-view');
if (quickViewBtns.length) {
    quickViewBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const name = btn.getAttribute('data-name');
            const desc = btn.getAttribute('data-desc');
            const price = btn.getAttribute('data-price');
            const modalBody = document.getElementById('quickViewBody');
            if (modalBody) {
                modalBody.innerHTML = `<h5>${escapeHtml(name)}</h5><p>${escapeHtml(desc)}</p><p class="text-orange fw-bold">Rp ${formatRupiah(price)}</p>`;
                new bootstrap.Modal(document.getElementById('quickViewModal')).show();
            }
        });
    });
}

// ==================== MODAL GLOBAL untuk index.php (produk unggulan) ====================
const productModal = document.getElementById('productModal');
if (productModal) {
    productModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const productName = button?.getAttribute('data-product');
        const modalBody = document.getElementById('modalProductBody');
        if (modalBody && productName) {
            modalBody.innerHTML = `<strong>${escapeHtml(productName)}</strong><br>Kualitas terbaik, harga bersaing. Tersedia di halaman produk.`;
        }
    });
}

// ==================== INISIALISASI HALAMAN ====================
// Halaman cart.php
if (document.getElementById('cartItemsContainer')) {
    renderCart();
    setupCheckout();
}

// Update badge keranjang di semua halaman
updateCartCount();

// ==================== NAVIGASI ACTIVE LINK (opsional) ====================
const currentPath = window.location.pathname.split('/').pop();
document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
    const href = link.getAttribute('href');
    if (href === currentPath || (currentPath === '' && href === 'index.php')) {
        link.classList.add('active');
    } else if (href === 'produk.php' && currentPath === 'produk.php') {
        link.classList.add('active');
    } else if (href === 'member.php' && currentPath === 'member.php') {
        link.classList.add('active');
    } else if (href === 'login.php' && currentPath === 'login.php') {
        link.classList.add('active');
    } else if (href === 'register.php' && currentPath === 'register.php') {
        link.classList.add('active');
    } else if (href && href.includes('#') && currentPath === 'index.php') {
        // skip hash
    }
});