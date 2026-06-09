
<?php include 'includes/header.php'; ?>

<div class="container py-5">
    <h1 class="text-center fw-bold mb-4">Riwayat <span class="text-orange">Member</span></h1>
    <p class="text-center mb-5">Data pengguna yang telah mendaftar (disimpan di localStorage)</p>
    
    <div class="table-responsive">
        <table class="table table-dark table-bordered border-orange" id="userTable">
            <thead>
                <tr>
                    <th>No</th><th>Nama Lengkap</th><th>Email</th><th>Username</th><th>Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                <tr><td colspan="5" class="text-center">Belum ada data, silakan <a href="register.php" class="text-orange">registrasi</a> terlebih dahulu.</td></tr>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>