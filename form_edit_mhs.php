<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>
    
    <?php
    // 1. Koneksi
    $conn = new mysqli("localhost", "root", "", "akademik");
    if ($conn->connect_error) {
        die("Koneksi Gagal: " . $conn->connect_error);
    }

    // 2. Ambil NIM dari URL
    $nim = $_GET['nim'];

    // 3. Ambil data mahasiswa berdasarkan NIM tersebut
    $sql = "SELECT * FROM mhs WHERE nim = '$nim'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    ?>

    <form action="update_mhs.php" method="POST">
        <table border="1">
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" value="<?php echo $data['nim']; ?>" readonly></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
            </tr>
            <tr>
                <td>Kota</td>
                <td><input type="text" name="kota" value="<?php echo $data['kota']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Update Data">
                </td>
            </tr>
        </table>
    </form>
    
    <br>
    <a href="index.php">Kembali</a> </body>
</html>