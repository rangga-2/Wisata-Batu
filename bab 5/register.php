<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Kota Batu</title>
    <link rel="stylesheet" href="style3.css"> <!-- Hubungkan ke file CSS -->
</head>
<body>
    <div class="left"></div>
    <div class="right">
        <h1>Wisata Kota Batu</h1>
        <p>Come on, let's create a story by going on an adventure in Batu City</p>
        <form onsubmit="event.preventDefault(); showPopup();">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit" class="button">Buat Akun</button>
        </form>
    </div>
    <button class="back-btn" onclick="window.location.href='login.php';">Kembali</button>

    <!-- Overlay -->
    <div id="overlay"></div>

    <!-- Pop-up Box -->
    <div id="popupBox">
        <h3>Akun Anda Berhasil Dibuat!</h3>
        <button onclick="goToLogin()">Tutup</button>
    </div>

    <script>
        function showPopup() {
            document.getElementById('popupBox').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function goToLogin() {
            window.location.href = 'login.php'; // Arahkan ke halaman login
        }
    </script>

<?php
// Memulai session
session_start();

// Memeriksa apakah pengguna sudah login (dengan memeriksa data session)
if (!isset($_SESSION['user'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: login.php");
    exit;
}

// Ambil data pengguna dari session
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Wisata Kota Batu</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <h1>Selamat Datang, <?php echo htmlspecialchars($user['name']); ?>!</h1>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>

</body>
</html>