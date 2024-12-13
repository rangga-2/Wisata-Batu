<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Kota Batu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style2.css"> <!-- Menghubungkan dengan file CSS -->
</head>
<body>
    <div class="container">
        <div class="image-section"></div>
        <div class="form-section">
            <h1>Wisata Kota Batu</h1>
            <p>Come on, let's create a story by going on an adventure in Batu City</p>
            <div class="form-group">
                <label>
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Nama">
                </label>
            </div>
            <div class="form-group">
                <label>
                    <i class="fas fa-key"></i>
                    <input type="password" placeholder="Password">
                    <i class="fas fa-eye-slash"></i>
                </label>
            </div>
            <button class="login-btn" onclick="showPopup()">LOGIN</button>
            <a href="register.php">Lupa password</a>
            <a href="register.php">Belum Punya Akun ?</a>
        </div>
    </div>
    <button class="back-btn" onclick="window.location.href='index.php';">Kembali</button>

    <!-- Overlay untuk latar belakang gelap -->
    <div id="overlay"></div>

    <!-- Box Pop-up -->
    <div id="popupBox">
        <span class="closeBtn" onclick="closePopup()">&#10006;</span>
        <h3>Login Berhasil</h3>
        <p>Selamat datang di Wisata Kota Batu! Klik tombol di bawah untuk melanjutkan ke halaman berikutnya.</p>
        <button onclick="goToNextPage()">Oke</button>
    </div>

    <script>
        function showPopup() {
            document.getElementById('popupBox').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('popupBox').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        function goToNextPage() {
            window.location.href = "admin.php"; // Ganti dengan URL halaman tujuan
        }
    </script>

<?php
// Memulai sesi
session_start();

// Cek apakah cookie 'username' tersedia
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    echo "<h1>Selamat datang, $username!</h1>";
} else {
    // Jika cookie tidak ada, redirect ke halaman login
    header("Location: index.php");
    exit;
}
?>
<p><a href="logout.php">Logout</a></p>

</body>
</html>