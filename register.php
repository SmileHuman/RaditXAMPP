<?php include 'includes/header.php'; ?>
<h2>📝 Form Registrasi</h2>
<div class="row">
    <div class="col-md-5">
        <div class="card shadow-sm p-3">
            <form id="registerForm">
                <div class="mb-2"><label>Nama Lengkap</label><input type="text" id="regName" class="form-control" required></div>
                <div class="mb-2"><label>Email</label><input type="email" id="regEmail" class="form-control" required></div>
                <div class="mb-2"><label>Password</label><input type="password" id="regPass" class="form-control" required></div>
                <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
            </form>
        </div>
    </div>
    <div class="col-md-7">
        <h5>Daftar Pengguna Terdaftar</h5>
        <div class="table-responsive">
            <table class="table table-striped" id="userTable">
                <thead class="table-dark"><tr><th>Nama</th><th>Email</th></tr></thead>
                <tbody id="userTableBody"></tbody>
            </table>
        </div>
    </div>
</div>
<script>
    let users = [];
    function renderUserTable() {
        const tbody = document.getElementById('userTableBody');
        tbody.innerHTML = '';
        users.forEach(u => {
            const row = `<tr><td>${u.name}</td><td>${u.email}</td></tr>`;
            tbody.insertAdjacentHTML('beforeend', row);
        });
    }
    document.getElementById('registerForm').addEventListener('submit', (e) => {
        e.preventDefault();
        const name = document.getElementById('regName').value.trim();
        const email = document.getElementById('regEmail').value.trim();
        const pass = document.getElementById('regPass').value;
        if(name && email && pass) {
            users.push({ name, email });
            renderUserTable();
            document.getElementById('registerForm').reset();
            alert("Registrasi berhasil, data ditambahkan ke tabel!");
        } else alert("Lengkapi data!");
    });
    renderUserTable();
</script>
<?php include 'includes/footer.php'; ?>