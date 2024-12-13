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
            <form id="login" action="login-proses.php" method="post">
                <div class="form-group">
                    <label>
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nama" id="username" name="username">
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <i class="fas fa-key"></i>
                        <input type="password" placeholder="Password" id="password" name="password">
                        <i class="fas fa-eye-slash"></i>
                    </label>
                </div>
                <button class="login-btn" type="submit" name="login">LOGIN</button>
            </form>
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
        const form = document.getElementById('register');
        form.addEventListener('submit', async function (event) {
            event.preventDefault(); // Mencegah pengiriman default

            const formData = new FormData(form);

            try {
                const response = await fetch('register_proses.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.text();
                if (result.trim() === 'success') {
                    document.getElementById('popupBox').style.display = 'block';
                    document.getElementById('overlay').style.display = 'block';
                } else {
                    alert('Gagal Login: ' + result);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan. Silakan coba lagi.');
            }
        });

        function goToNextPage() {
            window.location.href = "admin.php"; // Ganti dengan URL halaman tujuan
        }
    </script>

<!-- <?php
// Memulai sesi
// session_start();

// // Cek apakah cookie 'username' tersedia
// if (isset($_COOKIE['username'])) {
//     $username = $_COOKIE['username'];
//     echo "<h1>Selamat datang, $username!</h1>";
// } else {
//     // Jika cookie tidak ada, redirect ke halaman login
//     header("Location: index.php");
//     exit;
// }
// ?>
<p><a href="logout.php">Logout</a></p> -->

</body>
</html>