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
        <form id="register" action="register-proses.php" method="POST">
            <label for="name">Nama:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" name="register" class="button">Buat Akun</button>
        </form>

    </div>
    <button class="back-btn" onclick="window.location.href='login.php';">Kembali</button>

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
                    alert('Akun berhasil dibuat!');
                    window.location.href = 'login.php';
                } else {
                    alert('Gagal membuat akun: ' + result);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan. Silakan coba lagi.');
            }
        });
    </script>

</body>
</html>