<?php
// $nim = $_POST['nim'];
// $nama = $_POST['nama']; 
// $kota = $_POST['kota'];

extract($_POST);
$sql = "INSERT INTO mhs VALUES('$nim', '$nama', '$kota')"; 
$conn = mysqli_connect("localhost","root","","akademik");
        if ($conn->connect_error)
            die("Koneksi Gagal: ".$conn->connect_error);
$conn->query($sql);
header("location:lihat_mhs.php");      
?>