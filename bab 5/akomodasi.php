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
						<tr>
							<td>Hotel Batu Paradise</td>
							<td>Rp 500,000</td>
							<td>
								<input type="number" min="0" class="room-input" data-hotel="Hotel Batu Paradise" value="0" />
							</td>
							<td>
								<button class="add-room" data-hotel="Hotel Batu Paradise">Tambah Kamar</button>
								<button class="remove-room" data-hotel="Hotel Batu Paradise">Hapus Kamar</button>
							</td>
						</tr>
						<tr>
							<td>Hotel Selecta</td>
							<td>Rp 750,000</td>
							<td>
								<input type="number" min="0" class="room-input" data-hotel="Hotel Selecta" value="0" />
							</td>
							<td>
								<button class="add-room" data-hotel="Hotel Selecta">Tambah Kamar</button>
								<button class="remove-room" data-hotel="Hotel Selecta">Hapus Kamar</button>
							</td>
						</tr>
						<tr>
							<td>Hotel Kusuma Agrowisata</td>
							<td>Rp 900,000</td>
							<td>
								<input type="number" min="0" class="room-input" data-hotel="Hotel Kusuma Agrowisata" value="0" />
							</td>
							<td>
								<button class="add-room" data-hotel="Hotel Kusuma Agrowisata">Tambah Kamar</button>
								<button class="remove-room" data-hotel="Hotel Kusuma Agrowisata">Hapus Kamar</button>
							</td>
						</tr>
						<tr>
							<td>Jambuluwuk Resort</td>
							<td>Rp 1,200,000</td>
							<td>
								<input type="number" min="0" class="room-input" data-hotel="Jambuluwuk Resort" value="0" />
							</td>
							<td>
								<button class="add-room" data-hotel="Jambuluwuk Resort">Tambah Kamar</button>
								<button class="remove-room" data-hotel="Jambuluwuk Resort">Hapus Kamar</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<button id="save-button">Simpan Kamar</button>
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
</body>

</html>