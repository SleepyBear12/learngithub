<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <table border ="1">
    <tr><th>Nim</th><th>Nama Mahasiswat</th><th>Kota</th><th>Aksi</th></tr>
<?php
    $conn = new mysqli(hostname: "localhost", username: "root", password: "", database: "akademik");
   if($conn->connect_error)
    die("sambungan gagal ".$conn->connect_error);

    $mhs= $conn->query("SELECT * FROM mhs");
    while($row =$mhs->fetch_assoc()){            //ini adalah variable menggunakna array asosiatif//
        echo "<tr> ";
            // <td>".$row["nim"]."</td>
            // <td>".$row["nama"]."</td>
            // <td>".$row["kota"]."</td></tr>";

        foreach ($row as $baca){
            echo "<td>$baca</td>";
        }
        echo "<td>
            <a href=\"form_edit_mhs.php?nim=".$row["nim"]."\">Update</a>
            <a href=\"delet.php?nim=".$row["nim"]."\">Delete </a>
        </td>";
         echo "</tr> ";

    
    


    }
?>
</table> <br>
    <a href="tambah_data_mhs.php">Tambah Data Mahasiswa</a>
</body>
</html>