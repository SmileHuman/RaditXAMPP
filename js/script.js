// ========== REGISTRASI & TABEL (DOM Manipulation) ==========
document.addEventListener('DOMContentLoaded', function() {
    // Cek apakah halaman auth-data.php memiliki form registrasi & tabel
    const registerForm = document.getElementById('registerForm');
    const userTableBody = document.getElementById('userTableBody');
    const modalMessage = document.getElementById('modalMessage');
    const infoModal = new bootstrap.Modal(document.getElementById('infoModal'), {});
    
    // Data default untuk tabel (tanpa database)
    let users = [
        { name: 'Ahmad Santoso', email: 'ahmad@example.com', phone: '081234567890' },
        { name: 'Siti Rahmawati', email: 'siti@example.com', phone: '082345678901' }
    ];
    
    function renderUserTable() {
        if (userTableBody) {
            userTableBody.innerHTML = '';
            users.forEach((user, index) => {
                const row = `<tr>
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    <td>${user.phone}</td>
                    <td><button class="btn btn-sm btn-outline-danger" onclick="deleteUser(${index})"><i class="fas fa-trash"></i></button></td>
                </tr>`;
                userTableBody.insertAdjacentHTML('beforeend', row);
            });
        }
    }
    
    window.deleteUser = function(index) {
        users.splice(index, 1);
        renderUserTable();
        showModal('Data pengguna berhasil dihapus!');
    };
    
    function showModal(msg) {
        if (modalMessage) {
            modalMessage.innerText = msg;
            infoModal.show();
        }
    }
    
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('regName').value.trim();
            const email = document.getElementById('regEmail').value.trim();
            const phone = document.getElementById('regPhone').value.trim();
            
            if (!name || !email || !phone) {
                alert('Semua field harus diisi!');
                return;
            }
            if (!email.includes('@')) {
                alert('Email tidak valid!');
                return;
            }
            // Tambah ke array users
            users.push({ name, email, phone });
            renderUserTable();
            registerForm.reset();
            showModal(`Registrasi berhasil! Selamat datang, ${name}. Data ditambahkan ke tabel.`);
        });
        renderUserTable();
    }
    
    // ========== LOGIN (hardcoded username/password) ==========
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const username = document.getElementById('loginUsername').value;
            const password = document.getElementById('loginPassword').value;
            // Hardcoded credentials
            const validUsername = 'admin';
            const validPassword = 'admin123';
            
            if (username === validUsername && password === validPassword) {
                alert('Login berhasil! Selamat datang Admin.');
                // Optional: reset form
                loginForm.reset();
            } else {
                alert('Login gagal! Username atau password salah. (Gunakan admin / admin123)');
            }
        });
    }
});