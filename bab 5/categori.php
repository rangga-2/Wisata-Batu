<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8" />
	<link rel="icon" href="icon.png" />
	<link rel="stylesheet" href="admin.css" />
	<!-- Boxicons CDN Link -->
	<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Admin Trip | Categories</title>
</head>

<body>
	<div class="sidebar">
		<div class="logo-details">
			<!-- <i class="bx bx-category"></i> -->
			<span class="logo_name">Wisata Kota Batu</span>
		</div>
		<ul class="nav-links">
			<li>
				<a href="admin.php">
					<i class="bx bx-grid-alt"></i>
					<span class="links_name">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="categori.php" class="active">
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
			<h3>Destinasi Wisata</h3>
			<button type="button" class="btn btn-tambah" onclick="openModal()">Tambah Data</button>

			<div id="myModal" class="modal">
				<div class="modal-content">
					<span class="close" onclick="closeModal()">&times;</span>
					<h3>Input Destinasi</h3>
					<form action="">
						<label for="categories">Destinasi</label>
						<input class="input" type="text" name="categories" id="categories" placeholder="Destinasi"
							required />
						<label for="price">Harga</label>
						<input class="input" type="number" name="price" id="price" placeholder="Harga" required />
						<label for="Description">Deskripsi</label>
						<input class="input" type="text" name="Description" id="Description" placeholder="Deskripsi"
							required />
						<label for="photo">Foto</label>
						<input type="file" name="photo" id="Foto" style="margin-bottom: 20px" required />
						<button type="submit" class="btn btn-simpan">Simpan</button>
					</form>
				</div>
			</div>

			<table class="table-data">
				<thead>
					<tr>
						<th scope="col" style="width: 20%">Foto</th>
						<th>Destinasi</th>
						<th scope="col" style="width: 20%">Deskripsi</th>
						<th scope="col" style="width: 15%">Harga</th>
						<th scope="col" style="width: 30%">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><img src="https://i2.wp.com/blog.tripcetera.com/id/wp-content/uploads/2020/02/jatim-park-1-flying-tornado.jpg"
								alt="" /></td>
						<td>Jawa Timur Park 1</td>
						<td>Jawa Timur Park 1 adalah taman rekreasi edukatif di Kota Batu, Malang, yang menawarkan
							beragam wahana menarik serta pameran ilmu pengetahuan dan budaya, cocok untuk keluarga dan
							semua kalangan.</td>
						<td>130,000</td>
						<td>
							<button class="btn-edit" onclick="editCategory()">Edit</button>
							<button class="btn-delete" onclick="deleteCategory()">Hapus</button>
							<p id="hapus"></p>
						</td>
					</tr>
				</tbody>
			</table>
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
	<script>
		// Fungsi untuk membuka modal
		function openModal() {
			document.getElementById("myModal").style.display = "block";
		}

		// Fungsi untuk menutup modal
		function closeModal() {
			document.getElementById("myModal").style.display = "none";
		}

		// Menutup modal jika klik di luar modal
		window.onclick = function (event) {
			var modal = document.getElementById("myModal");
			if (event.target == modal) {
				modal.style.display = "none";
			}
		};
	</script>
	<script>
		// Mengambil semua elemen gambar
		const images = document.querySelectorAll("img");

		images.forEach(img => {
			img.addEventListener("dblclick", function () {
				// Cek jika gambar sudah di-zoom in (scale > 1)
				if (img.style.transform === "scale(1.5)") {
					img.style.transform = "scale(1)"; // Kembali ke ukuran normal
				} else {
					img.style.transform = "scale(1.5)"; // Zoom in
				}
			});
		});
	</script>
</body>
</html>