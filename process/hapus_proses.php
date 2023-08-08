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
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
	$id = $_GET['id'];

	// Koneksi ke database
	$conn = mysqli_connect("localhost", "root", "", "pemesanan");

	// Cek koneksi
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}

	// Hapus data dari tabel pemesanan berdasarkan ID
	$query = "DELETE FROM pemesanan WHERE id = $id";
	$result = mysqli_query($conn, $query);

	// Tutup koneksi
	mysqli_close($conn);

	// Tampilkan SweetAlert setelah data berhasil dihapus
	if ($result) {
		echo "<script>
              Swal.fire({
                icon: 'success',
                title: 'Data berhasil dihapus!',
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
                title: 'Data gagal dihapus!',
                text: 'Terjadi kesalahan saat menghapus data.',
                confirmButtonColor: '#007bff'
              }).then(function() {
                window.location = '../pesanan.php';
              });
            </script>";
	}
}
