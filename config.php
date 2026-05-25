<?php
// Database Configuration (Simulasi data array)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'umkm_website');

// Session start sudah di masing-masing file

// Get featured products (untuk home page)
function getFeaturedProducts() {
    return [
        ['id' => 1, 'name' => 'Batik Tulis Mega Mendung', 'description' => 'Batik tulis asli Cirebon dengan motif mega mendung yang elegan', 'full_description' => 'Batik tulis premium dibuat dengan tangan oleh pengrajin berpengalaman di Cirebon. Motif mega mendung melambangkan kesabaran dan ketenangan.', 'price' => 850000, 'category' => 'Fashion', 'image' => 'https://images.unsplash.com/photo-1584917865449-ef8f9a028e34?w=400', 'umkm_name' => 'Batik Nusantara', 'location' => 'Cirebon, Jawa Barat', 'join_date' => '2020', 'rating' => 4.8],
        ['id' => 2, 'name' => 'Keripik Tempe Crispy', 'description' => 'Keripik tempe renyah dengan bumbu original pilihan', 'full_description' => 'Keripik tempe homemade dengan resep turun temurun. Renyah, gurih, dan sehat.', 'price' => 25000, 'category' => 'Kuliner', 'image' => 'https://images.unsplash.com/photo-1585771724684-38269d6639fd?w=400', 'umkm_name' => 'Dapur Mama', 'location' => 'Malang, Jawa Timur', 'join_date' => '2019', 'rating' => 4.9],
        ['id' => 3, 'name' => 'Wayang Kulit', 'description' => 'Wayang kulit handmade asli Yogyakarta', 'full_description' => 'Wayang kulit berkualitas tinggi buatan pengrajin Yogyakarta. Cocok untuk koleksi atau dekorasi.', 'price' => 450000, 'category' => 'Kerajinan', 'image' => 'https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?w=400', 'umkm_name' => 'Seni Budaya Jogja', 'location' => 'Yogyakarta', 'join_date' => '2018', 'rating' => 4.7],
        ['id' => 4, 'name' => 'Kopi Arabika Gayo', 'description' => 'Kopi arabika specialty dari Gayo', 'full_description' => 'Kopi arabika terbaik dari dataran tinggi Gayo. Aroma khas dengan rasa yang smooth.', 'price' => 120000, 'category' => 'Minuman', 'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?w=400', 'umkm_name' => 'Kopi Nusantara', 'location' => 'Aceh Tengah', 'join_date' => '2021', 'rating' => 4.9],
        ['id' => 5, 'name' => 'Tas Rajut Eceng Gondok', 'description' => 'Tas rajut dari serat eceng gondok alami', 'full_description' => 'Tas ramah lingkungan buatan tangan dari eceng gondok pilihan. Kuat dan stylish.', 'price' => 175000, 'category' => 'Fashion', 'image' => 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=400', 'umkm_name' => 'Rajut Bahagia', 'location' => 'Bandung, Jawa Barat', 'join_date' => '2020', 'rating' => 4.8],
        ['id' => 6, 'name' => 'Lampu Hias Bambu', 'description' => 'Lampu hias dari bambu pilihan', 'full_description' => 'Lampu hias minimalis dari bambu. Memberikan suasana hangat di ruangan Anda.', 'price' => 89000, 'category' => 'Dekorasi', 'image' => 'https://images.unsplash.com/photo-1513506003901-1e6a229e2d15?w=400', 'umkm_name' => 'Kreasi Bambu', 'location' => 'Solo, Jawa Tengah', 'join_date' => '2019', 'rating' => 4.6]
    ];
}

// Get product by ID
function getProductById($id) {
    $products = getFeaturedProducts();
    foreach($products as $product) {
        if($product['id'] == $id) {
            return $product;
        }
    }
    return null;
}

// Get all products
function getAllProducts() {
    return getFeaturedProducts();
}

// Get related products
function getRelatedProducts($currentId) {
    $products = getFeaturedProducts();
    $related = [];
    foreach($products as $product) {
        if($product['id'] != $currentId && count($related) < 3) {
            $related[] = $product;
        }
    }
    return $related;
}

// User registration (simulasi session)
function registerUser($name, $email, $password) {
    // Simulasi penyimpanan user
    if($email == 'admin@umkm.com') {
        return false;
    }
    $_SESSION['temp_user'] = ['name' => $name, 'email' => $email];
    return true;
}

// User login
function loginUser($email, $password) {
    // Demo credentials
    if($email == 'admin@umkm.com' && $password == 'password123') {
        return ['id' => 1, 'name' => 'Admin UMKM', 'email' => 'admin@umkm.com'];
    }
    if($email == 'user@umkm.com' && $password == 'password123') {
        return ['id' => 2, 'name' => 'User Biasa', 'email' => 'user@umkm.com'];
    }
    return null;
}

// Get all users (untuk admin)
function getAllUsers() {
    return [
        ['id' => 1, 'name' => 'Admin UMKM', 'email' => 'admin@umkm.com', 'created_at' => '2024-01-01'],
        ['id' => 2, 'name' => 'Budi Santoso', 'email' => 'budi@email.com', 'created_at' => '2024-01-15'],
        ['id' => 3, 'name' => 'Siti Aminah', 'email' => 'siti@email.com', 'created_at' => '2024-02-01']
    ];
}
?>