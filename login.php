<?php include 'includes/header.php';?>
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-header bg-dark text-white"><h4 class="mb-0">Login Member</h4></div>
            <div class="card-body">
                <form id="loginForm">
                    <div class="mb-3"><label>Username / Email</label><input type="text" id="loginUser" class="form-control" placeholder="demo@gymcore.id"></div>
                    <div class="mb-3"><label>Password</label><input type="password" id="loginPass" class="form-control" placeholder="password123"></div>
                    <button type="submit" class="btn btn-gym w-100">Masuk</button>
                </form>
                <div id="loginMsg" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>
<script>
    const validUsername = "demo@gymcore.id";
    const validPassword = "password123";
    document.getElementById('loginForm').addEventListener('submit', (e) => {
        e.preventDefault();
        const user = document.getElementById('loginUser').value;
        const pass = document.getElementById('loginPass').value;
        const msgDiv = document.getElementById('loginMsg');
        if(user === validUsername && pass === validPassword) {
            msgDiv.innerHTML = '<div class="alert alert-success">✅ Login sukses! Selamat datang di GymCore.</div>';
        } else {
            msgDiv.innerHTML = '<div class="alert alert-danger">❌ Username atau password salah. Coba lagi.</div>';
        }
    });
</script>
<?php include 'includes/footer.php'; ?>