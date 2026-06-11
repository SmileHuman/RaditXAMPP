  </div><!-- penutup container -->
</main>

<footer class="bg-dark text-white pt-5 pb-3 mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-5 mb-3">
        <h5><i class="bi bi-dumbbell"></i> GymCore</h5>
        <p>Pusat perlengkapan gym terbaik untuk kebugaran Anda. Produk original, garansi resmi.</p>
        <p><i class="bi bi-envelope"></i> cs@gymcore.id &nbsp;|&nbsp; <i class="bi bi-whatsapp"></i> +62 812 3456 7890</p>
        <div>
          <a href="#" class="text-white me-3"><i class="bi bi-instagram fs-5"></i></a>
          <a href="#" class="text-white me-3"><i class="bi bi-facebook fs-5"></i></a>
          <a href="#" class="text-white"><i class="bi bi-tiktok fs-5"></i></a>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <h6>Langganan Promo</h6>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="d-flex gap-2">
          <input type="email" name="subs_email" class="form-control form-control-sm" placeholder="Email Anda" required>
          <button type="submit" name="subscribe" class="btn btn-warning btn-sm">Kirim</button>
        </form>
        <?php if(isset($_POST['subscribe']) && !empty($_POST['subs_email'])): ?>
          <div class="alert alert-success alert-sm mt-2 py-1">Terima kasih berlangganan!</div>
        <?php endif; ?>
      </div>
      <div class="col-md-3 text-md-end">
        <p class="small">&copy; 2026 GetSkill - GymCore. Hak Cipta dilindungi.</p>
      </div>
    </div>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>