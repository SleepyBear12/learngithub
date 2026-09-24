<?php
// Koneksi
$conn = new mysqli("localhost", "root", "", "akademik");
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// Ambil data dari form (gunakan extract atau $_POST manual)
extract($_POST);

// Query Update
$sql = "UPDATE mhs SET nama='$nama', kota='$kota' WHERE nim='$nim'";

if ($conn->query($sql) === TRUE) {
    // Jika berhasil, kembali ke halaman utama (index.php)
    header("location:index.php");
} else {
    echo "Gagal update: " . $conn->error;
    echo "<br><a href='index.php'>Kembali</a>";
}

$conn->close();
?>