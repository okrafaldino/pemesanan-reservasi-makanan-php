<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Marble &mdash; Free HTML5 Bootstrap Website Template by FreeHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	-->

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/sweetalert2.all.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight">

			<h1 id="fh5co-logo"><a href="index.html">Kapita</a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li><a href="index.php	">Home</a></li>
					<li class="fh5co-active"><a href="pesanan.php">Pesanan</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</nav>

			<div class="fh5co-footer">
				<p><small>&copy; 2023 Okra And Khomsi. All Rights Reserved.</span> <span>Designed by Okra</small></p>
				<ul>
					<li><a href="#"><i class="icon-facebook2"></i></a></li>
					<li><a href="#"><i class="icon-twitter2"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
					<li><a href="#"><i class="icon-linkedin2"></i></a></li>
				</ul>
			</div>

		</aside>

		<div id="fh5co-main">
			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Data Pesanan</h2>
				<div class="row row-bottom-padded-md">
					<div class="col-xs-12 col-sm-12 col-md-12 col-padding animate-box" data-animate-effect="fadeInLeft">
						<div class="text-left">
							<p style="padding:10pt 0pt 0pt 10pt;">
								<a href="tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus"></i>Tambah Pesanan</a>
							</p>
						</div>
						<div class="table-responsive">
							<table class="table table-striped table-bordered tbl-tampil">
								<thead>
									<tr>
										<th>ID</th>
										<th>Nama Pelanggan</th>
										<th>Meja</th>
										<th>Menu Makanan</th>
										<th>Jumlah</th>
										<th>Total Harga</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									// Koneksi ke database
									$conn = mysqli_connect("localhost", "root", "", "pemesanan");

									// Cek koneksi
									if (mysqli_connect_errno()) {
										echo "Failed to connect to MySQL: " . mysqli_connect_error();
										exit();
									}

									// Ambil data dari tabel pemesanan
									$query = "SELECT * FROM pemesanan";
									$result = mysqli_query($conn, $query);

									// Tampilkan data dalam tabel
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>" . $row['id'] . "</td>";
										echo "<td>" . $row['nama_pelanggan'] . "</td>";
										echo "<td>" . $row['meja'] . "</td>";
										echo "<td>" . $row['menu_makanan'] . "</td>";
										echo "<td>" . $row['jumlah'] . "</td>";
										echo "<td>" . $row['total_harga'] . "</td>";
										echo "<td>
                <a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary'><span class='icon-pencil'></a>
                <button class='btn btn-hapus btn-xs btn-danger' data-id='" . $row['id'] . "'><span class='icon-trash'></span></button>
              </td>";
										echo "</tr>";
									}

									// Tutup koneksi
									mysqli_close($conn);
									?>
								</tbody>
							</table>

							<script>
								// Ambil semua tombol hapus dengan class "btn-hapus"
								const buttonsHapus = document.querySelectorAll('.btn-hapus');

								// Tambahkan event listener untuk setiap tombol hapus
								buttonsHapus.forEach(button => {
									button.addEventListener('click', function() {
										const dataId = this.getAttribute('data-id');

										// Tampilkan SweetAlert konfirmasi sebelum menghapus data
										Swal.fire({
											icon: 'warning',
											title: 'Apakah Anda yakin ingin menghapus data ini?',
											showCancelButton: true,
											confirmButtonColor: '#dc3545',
											cancelButtonColor: '#007bff',
											confirmButtonText: 'Ya, Hapus',
											cancelButtonText: 'Batal'
										}).then((result) => {
											if (result.isConfirmed) {
												// Jika pengguna mengklik "Ya, Hapus", kirimkan request ke halaman hapus_data.php
												window.location = `process/hapus_proses.php?id=${dataId}`;
											}
										});
									});
								});
							</script>
						</div>

					</div>
				</div>
			</div>

			<div id="get-in-touch">
				<div class="fh5co-narrow-content">
					<div class="row">
						<div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
							<h1 class="fh5co-heading-colored">Get in touch</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<p class="fh5co-lead">Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							<p><a href="#" class="btn btn-primary">Learn More</a></p>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>


	<!-- MAIN JS -->
	<script src="js/main.js"></script>

</body>

</html>