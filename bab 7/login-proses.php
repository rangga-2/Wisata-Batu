<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestUsername = mysqli_real_escape_string($koneksi, $_POST['username']);
    $requestPassword = $_POST['password'];

    // Query untuk mendapatkan data pengguna berdasarkan username
    $sql = "SELECT * FROM user WHERE username = '$requestUsername'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Ambil data pengguna
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password']; // Password hash yang tersimpan di database

        // Verifikasi password
        if (password_verify($requestPassword, $storedPassword)) {
            session_start();
            $_SESSION['username'] = $row['username'];

            // Kirim respons sukses
            echo json_encode(['status' => 'success', 'message' => 'Login berhasil!']);
        } else {
            // Kirim respons jika password salah
            echo json_encode(['status' => 'error', 'message' => 'Password salah.']);
        }
    } else {
        // Kirim respons jika username tidak ditemukan
        echo json_encode(['status' => 'error', 'message' => 'Username tidak ditemukan.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Metode request tidak valid.']);
}
?>