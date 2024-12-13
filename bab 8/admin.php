<?php
session_start();
if($_SESSION['username'] == null) {
    header('location:login.php');
}

// Koneksi ke database
include 'koneksi.php';

// Query untuk mengambil data destinasi wisata dan akomodasi
$query_destinasi = "SELECT COUNT(*) AS total_destinasi FROM destinations";
$query_akomodasi = "SELECT COUNT(*) AS total_akomodasi FROM akomodasi";

$result_destinasi = mysqli_query($koneksi, $query_destinasi);
$result_akomodasi = mysqli_query($koneksi, $query_akomodasi);

// Ambil hasil query
$row_destinasi = mysqli_fetch_assoc($result_destinasi);
$row_akomodasi = mysqli_fetch_assoc($result_akomodasi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="icon.png" />
    <link rel="stylesheet" href="admin.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Trip</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <span class="logo_name">Wisata Kota Batu</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="admin.php" class="active">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="categori.php">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Destinasi</span>
                </a>
            </li>
            <li>
                <a href="transaction.php">
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Transaksi</span>
                </a>
            </li>
            <li>
                <a href="akomodasi.php">
                    <i class="bx bx-bed"></i>
                    <span class="links_name">Akomodasi</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
            </div>
            <div class="profile-details">
                <span class="admin_name">Admin Trip</span>
            </div>
        </nav>
        <div class="home-content">
            <h1>Selamat Datang Admin <?php echo $_SESSION['username'];?></h1>
            
            <!-- Widget Destinasi -->
            <div class="widget">
                <div class="widget-header">
                    <h3>Destinasi Wisata</h3>
                </div>
                <div class="widget-body">
                    <p>Total Destinasi Wisata: <strong><?php echo $row_destinasi['total_destinasi']; ?></strong></p>
                    <a href="categori.php">Lihat Destinasi</a>
                </div>
            </div>

            <!-- Widget Akomodasi -->
            <div class="widget">
                <div class="widget-header">
                    <h3>Akomodasi</h3>
                </div>
                <div class="widget-body">
                    <p>Total Akomodasi: <strong><?php echo $row_akomodasi['total_akomodasi']; ?></strong></p>
                    <a href="akomodasi.php">Lihat Akomodasi</a>
                </div>
            </div>
        </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function () {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        };
    </script>
</body>
</html>