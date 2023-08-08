<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="../js/sweetalert2.all.min.js"></script>
	<title>Document</title>
</head>

<body>

</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Ambil data dari form
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$meja = $_POST['meja'];
	$menu_makanan = $_POST['menu_makanan'];
	$jumlah = $_POST['jumlah'];

	// Proses Aritmatika (Harga Menu Makanan)
	$harga_makanan = 0;
	if ($menu_makanan == "Nasi Goreng") {
		$harga_makanan = 15000;
	} elseif ($menu_makanan == "Ayam Bakar") {
		$harga_makanan = 25000;
	}
	// Tambahkan kode untuk menghitung harga menu makanan lainnya

	// Hitung total harga
	$total_harga = $harga_makanan * $jumlah;

	// Koneksi ke database
	$conn = mysqli_connect("localhost", "root", "", "pemesanan");

	// Cek koneksi
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}

	// Masukkan data ke tabel pemesanan
	$query = "INSERT INTO pemesanan (nama_pelanggan, meja, menu_makanan, jumlah, total_harga) VALUES ('$nama_pelanggan', '$meja', '$menu_makanan', '$jumlah', '$total_harga')";
	$result = mysqli_query($conn, $query);

	// Tutup koneksi
	mysqli_close($conn);


	// Tampilkan SweetAlert setelah data berhasil disimpan
	if ($result) {
		echo "<script>
              Swal.fire({
                icon: 'success',
                title: 'Data berhasil disimpan!',
                showConfirmButton: false,
                timer: 1500
              }).then(function() {
                window.location = '../pesanan.php';
              });
            </script>";
	} else {
		echo "<script>
              Swal.fire({
                icon: 'error',
                title: 'Data gagal disimpan!',
                text: 'Terjadi kesalahan saat menyimpan data.',
                confirmButtonColor: '#007bff'
              }).then(function() {
                window.location = '../tambah.php';
              });
            </script>";
	}
}

?>