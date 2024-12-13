<?php
include 'koneksi.php';

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if (empty($email) || empty($username) || empty($password)) {
        echo "Harap mengisi semua data.";
        exit;
    }

    $sql = "INSERT INTO auth (id, email, password, username) VALUES (NULL, '$email', '$password', '$username')";

    if (mysqli_query($koneksi, $sql)) {
        echo "success";
    } else {
        echo "Gagal membuat akun: " . mysqli_error($koneksi);
    }
} else {
    echo "Data tidak lengkap.";
}