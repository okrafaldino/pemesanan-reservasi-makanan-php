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
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
		$id = $_GET['id'];

		// Koneksi ke database
		$conn = mysqli_connect("localhost", "root", "", "pemesanan");

		// Cek koneksi
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			exit();
		}

		// Ambil data dari tabel pemesanan berdasarkan ID
		$query = "SELECT * FROM pemesanan WHERE id = $id";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);

		// Tutup koneksi
		mysqli_close($conn);
	?>
		<div id="fh5co-page">
			<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
			<aside id="fh5co-aside" role="complementary" class="border js-fullheight">

				<h1 id="fh5co-logo"><a href="index.html">Kapita</a></h1>
				<nav id="fh5co-main-menu" role="navigation">
					<ul>
						<li><a href="index.php">Home</a></li>
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
						<div class=" col-padding animate-box" data-animate-effect="fadeInLeft">
							<div class="panel panel-default">
								<div class="panel-body">
									<h3 class="text-center">Edit Pesanan</h3>
									<hr>
									<form role="form" action="process/edit_proses.php" method="post">
										<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
										<div class="form-group">
											<label for="nama_pelanggan">Nama Pelanggan:</label>
											<input type="text" name="nama_pelanggan" class="form-control" value="<?php echo $row['nama_pelanggan']; ?>" required id="nama_pelanggan">
										</div>
										<div class="form-group">
											<label for="meja">Meja:</label>
											<input type="text" name="meja" value="<?php echo $row['meja']; ?>" required class="form-control" id="meja">
										</div>
										<div class="form-group">
											<label>Menu Makanan:</label>
											<select name="menu_makanan" required class="form-control">
												<option value="Nasi Goreng" <?php if ($row['menu_makanan'] == "Nasi Goreng") echo "selected"; ?> class="form-control">Nasi Goreng</option>
												<option value="Ayam Bakar" <?php if ($row['menu_makanan'] == "Ayam Bakar") echo "selected"; ?> class="form-control">Ayam Bakar</option>
												<!-- Tambahkan opsi menu makanan lainnya sesuai dengan kebutuhan kafe Anda -->
											</select>
										</div>
										<div class="form-group">
											<label for="jumlah">Jumlah:</label>
											<input type="number" name="jumlah" value="<?php echo $row['jumlah']; ?>" required class="form-control" id="jumlah">
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-lg btn-success" style="width:49%;"><span class="glyphicon glyphicon-ok-sign"></span>Selesai</button>
											<a href="pesanan.php" class="btn btn-lg btn-danger" style="width:49%;"><span class="glyphicon glyphicon-remove-sign"></span> Kembali</a>
										</div>
									</form>
								</div>
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
	<?php } ?>
</body>

</html>