<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="UTF-8" />
	<link rel="icon" href="icon.png" />
	<link rel="stylesheet" href="admin.css" />
	<!-- Boxicons CDN Link -->
	<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Admin Trip | Akomodasi</title>
</head>

<body>
	<div class="sidebar">
		<div class="logo-details">
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
				<a href="akomodasi.php" class="active">
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
	
	<!-- Halaman Akomodasi -->
	<section class="home-section">
		<nav>
			<div class="sidebar-button">
				<i class="bx bx-menu sidebarBtn"></i>
				<span class="dashboard">Akomodasi</span>
			</div>
			<div class="profile-details">
				<span class="admin_name">Admin Trip</span>
			</div>
		</nav>
		<div class="home-content">
        <button type="button" class="btn btn-tambah" onclick="openModal()">Tambah Data</button>
        <a href="cetak_pdf.php" target="_blank">
            <button class="btn_cetak">Cetak PDF</button>
         </a>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>Input Akomodasi</h3>
        <form action="create-post.php" method="POST" enctype="multipart/form-data">
            <label for="categories">Hotel</label>
            <input class="input" type="text" name="hotel" id="categories" placeholder="Destinasi" required />
            <label for="price">Harga</label>
            <input class="input" type="number" name="price" id="price" placeholder="Harga" required />
            <label for="price">Jumlah Kamar</label>
            <input class="input" type="number" name="jumlah_kamar" id="price" placeholder="Harga" required />
            <button type="submit" class="btn btn-simpan">Simpan</button>
        </form>
    </div>
</div>
           
			<h2 class="content-title">Data Akomodasi</h2>
			<div class="table-container">
				<table class="table-data">
					<thead>
						<tr>
							<th scope="col">Hotel</th>
							<th scope="col">Harga</th>
							<th scope="col">Jumlah Kamar yang Dipesan</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody id="room-data">
                                    <?php
                    include 'koneksi.php';
                    $query = "SELECT * FROM akomodasi";
                    $result = mysqli_query($koneksi, $query);
                ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
						<tr>
							<td><?php echo $row['nama_hotel']; ?></td>
							<td><?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
							<td><?php echo $row['jumlah_kamar']; ?></td>
							<td>
                            <button class="btn-edit">
                                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                                </button>
                                <button class="btn-delete">
                                    <a href="delete-akomodasi.php?id=<?php echo $row['id']; ?>">Delete</a>
                                </button>
							</td>
						</tr>
					<?php endwhile; ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</section>
    <script>
    function editCategory(id) {
        fetch(`get_destination.php?id=${id}`)
    .then(response => {
        console.log("Response:", response);
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log("Data diterima:", data); // Debug data
        document.getElementById("editId").value = data.id;
        document.getElementById("editCategories").value = data.name;
        document.getElementById("editPrice").value = data.price;
        document.getElementById("editDescription").value = data.description;
        document.getElementById("editModal").style.display = "block";
    })
    .catch(error => {
        console.error("Terjadi kesalahan:", error);
        alert("Gagal memuat data. Silakan cek konsol untuk detail.");
    });

    function closeEditModal() {
        document.getElementById("editModal").style.display = "none";
    }
}
    </script>
	<script>
		let sidebar = document.querySelector(".sidebar");
		let sidebarBtn = document.querySelector(".sidebarBtn");
		sidebarBtn.onclick = function () {
			sidebar.classList.toggle("active");
			if (sidebar.classList.contains("active")) {
				sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
			} else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
		};

		// Function to save booked room counts to local storage
		function saveBookedRooms() {
			const roomInputs = document.querySelectorAll('.room-input');
			const roomCounts = {};

			roomInputs.forEach(input => {
				const hotelName = input.getAttribute('data-hotel');
				const count = input.value; // Get the value from the input
				roomCounts[hotelName] = count; // Save to the object
			});

			localStorage.setItem('roomCounts', JSON.stringify(roomCounts)); // Store in local storage
			alert('Data Kamar Disimpan!');
		}

		// Function to display booked room counts on page load
		function displayBookedRooms() {
			const roomCounts = JSON.parse(localStorage.getItem('roomCounts')) || {};
			const roomInputs = document.querySelectorAll('.room-input');

			roomInputs.forEach(input => {
				const hotelName = input.getAttribute('data-hotel');
				const count = roomCounts[hotelName] || 0; // Default to 0 if no booking exists
				input.value = count; // Set the input value
			});
		}

		// Functions to add and remove rooms
		function addRoom(hotelName) {
			const input = document.querySelector(`.room-input[data-hotel="${hotelName}"]`);
			input.value = parseInt(input.value) + 1; // Increase room count
		}

		function removeRoom(hotelName) {
			const input = document.querySelector(`.room-input[data-hotel="${hotelName}"]`);
			if (input.value > 0) {
				input.value = parseInt(input.value) - 1; // Decrease room count
			}
		}

		// Event listeners for buttons
		document.querySelectorAll('.add-room').forEach(button => {
			button.addEventListener('click', () => {
				const hotelName = button.getAttribute('data-hotel');
				addRoom(hotelName);
			});
		});

		document.querySelectorAll('.remove-room').forEach(button => {
			button.addEventListener('click', () => {
				const hotelName = button.getAttribute('data-hotel');
				removeRoom(hotelName);
			});
		});

		// Event listener for the save button
		document.getElementById('save-button').addEventListener('click', saveBookedRooms);

		// Call the function to display the data when the page loads
		document.addEventListener('DOMContentLoaded', displayBookedRooms);
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
</body>
</html>