// File: js/script.js
document.addEventListener('DOMContentLoaded', function() {
    // Modal global untuk index.php (dumbbell dll)
    const productModal = document.getElementById('productModal');
    if (productModal) {
        productModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const productName = button.getAttribute('data-product');
            document.getElementById('modalProductBody').innerHTML = `<strong>${productName}</strong><br>Kualitas terbaik, harga bersaing. Tersedia di halaman produk.`;
        });
    }
    
    // Quick view di produk.php
    const quickBtns = document.querySelectorAll('.quick-view');
    if (quickBtns.length) {
        quickBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const name = btn.getAttribute('data-name');
                const desc = btn.getAttribute('data-desc');
                const price = btn.getAttribute('data-price');
                const modalBody = document.getElementById('quickViewBody');
                modalBody.innerHTML = `<h5>${name}</h5><p>${desc}</p><p class="text-orange fw-bold">${price}</p>`;
                new bootstrap.Modal(document.getElementById('quickViewModal')).show();
            });
        });
    }
    
    // Register form - simpan ke localStorage & tampilkan di tabel member
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('regName').value.trim();
            const email = document.getElementById('regEmail').value.trim();
            const username = document.getElementById('regUsername').value.trim();
            const password = document.getElementById('regPassword').value;
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
                password: btoa(password), // encoding sederhana
                registeredAt: new Date().toLocaleString()
            };
            users.push(newUser);
            localStorage.setItem('gymUsers', JSON.stringify(users));
            alert('Pendaftaran berhasil! Silakan lihat data di halaman Members.');
            window.location.href = 'member.php';
        });
    }
    
    // Tampilkan data user di tabel member.php
    const userTableBody = document.getElementById('userTableBody');
    if (userTableBody) {
        let users = JSON.parse(localStorage.getItem('gymUsers')) || [];
        if (users.length > 0) {
            userTableBody.innerHTML = '';
            users.forEach((user, index) => {
                const row = `<tr>
                    <td>${index+1}</td>
                    <td>${escapeHtml(user.name)}</td>
                    <td>${escapeHtml(user.email)}</td>
                    <td>${escapeHtml(user.username)}</td>
                    <td>${user.registeredAt}</td>
                </tr>`;
                userTableBody.insertAdjacentHTML('beforeend', row);
            });
        } else {
            userTableBody.innerHTML = '<tr><td colspan="5" class="text-center">Belum ada pendaftar. <a href="register.php" class="text-orange">Daftar sekarang</a></td></tr>';
        }
    }
    
    function escapeHtml(str) {
        return str.replace(/[&<>]/g, function(m) {
            if (m === '&') return '&amp;';
            if (m === '<') return '&lt;';
            if (m === '>') return '&gt;';
            return m;
        });
    }
    
    // Active nav link highlight
    const currentPath = window.location.pathname.split('/').pop();
    document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
        const href = link.getAttribute('href');
        if (href === currentPath || (currentPath === '' && href === 'index.php')) {
            link.classList.add('active');
        } else if (href && href.includes('#') && currentPath === 'index.php') {
            // skip hash
        } else if (href === 'produk.php' && currentPath === 'produk.php') {
            link.classList.add('active');
        } else if (href === 'member.php' && currentPath === 'member.php') {
            link.classList.add('active');
        } else if (href === 'login.php' && currentPath === 'login.php') {
            link.classList.add('active');
        } else if (href === 'register.php' && currentPath === 'register.php') {
            link.classList.add('active');
        }
    });
});