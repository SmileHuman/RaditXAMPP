<?php include 'includes/header.php'; ?>
<div class="container py-5" style="min-height: 75vh;">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card bg-dark border-orange">
                <div class="card-body p-5">
                    <h3 class="text-center fw-bold mb-4">Daftar <span class="text-orange">Akun</span></h3>
                    <form id="registerForm">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" id="regName" class="form-control bg-dark text-light border-orange" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" id="regEmail" class="form-control bg-dark text-light border-orange" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" id="regUsername" class="form-control bg-dark text-light border-orange" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" id="regPassword" class="form-control bg-dark text-light border-orange" required>
                        </div>
                        <button type="submit" class="btn btn-orange w-100">Daftar Sekarang</button>
                    </form>
                    <div class="text-center mt-3">Sudah punya akun? <a href="login.php" class="text-orange">Login</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>