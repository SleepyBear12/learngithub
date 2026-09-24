<?php
// Pastikan TIDAK ADA SPASI sebelum tag <?php di atas

$conn = new mysqli("localhost", "root", "", "akademik");
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $sql = "DELETE FROM mhs WHERE nim = '$nim'";

    if ($conn->query($sql) === TRUE) {
        // PERBAIKAN: Arahkan kembali ke index.php (bukan lihat_mhs.php)
        header("location:index.php");
        exit();
    } else {
        echo "Error menghapus data: " . $conn->error;
    }
} else {
    echo "NIM tidak ditemukan.";
}
?>