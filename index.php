<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-light">

    <div class="container mt-5">
        
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-user-graduate"></i> Daftar Mahasiswa</h4>
            </div>
            
            <div class="card-body">
                <a href="form_mhs.php" class="btn btn-success mb-3">
                    <i class="fas fa-plus-circle"></i> Tambah Data
                </a>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">No</th> <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Kota</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Koneksi Database
                            $conn = new mysqli("localhost", "root", "", "akademik");
                            if ($conn->connect_error) { die("Koneksi gagal: " . $conn->connect_error); }

                            $sql = "SELECT * FROM mhs ORDER BY nim ASC"; // Urutkan berdasarkan NIM
                            $result = $conn->query($sql);
                            $no = 1; // Variabel nomor urut

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++; ?></td>
                                        <td><?php echo $row["nim"]; ?></td>
                                        <td><?php echo $row["nama"]; ?></td>
                                        <td><?php echo $row["kota"]; ?></td>
                                        <td class="text-center">
                                            <a href="form_edit_mhs.php?nim=<?php echo $row['nim']; ?>" class="btn btn-warning btn-sm text-white">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            
                                            <a href="delet.php?nim=<?php echo $row['nim']; ?>" class="btn btn-danger btn-sm tombol-hapus">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                            <?php 
                                }
                            } else {
                                echo "<tr><td colspan='5' class='text-center'>Data tidak ditemukan</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div> </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Logika SweetAlert untuk Konfirmasi Hapus
        const deleteButtons = document.querySelectorAll('.tombol-hapus');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const href = this.getAttribute('href');

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = href;
                    }
                })
            });
        });
    </script>
</body>
</html>