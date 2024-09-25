<?php
include("sidebar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier</title>
    <link rel="stylesheet" href="button.css">
</head>
<body>
<div class="tampil">
<table border="1">
        <div class="navbar">
            <h1>Table Supplier</h1>
        </div>
        <div>
        <a href="../crud/tambahsupplier.php"><button>Tambah data</button></a>
        </div>
           
            <tr>
                <th>Id Supplier</th>
                <th>Nama Supplier</th>
                <th>Kontak Supplier</th>
                <th>Nama Barang</th>
                <th>Aksi</th>
            </tr>

            <?php
            include("koneksi.php");
            $tampil = mysqli_query($koneksi,"SELECT * FROM supplier");
            while($data = mysqli_fetch_array($tampil)){
            ?>
            <tr>
            <td><?php echo$data['id_supplier']?></td>
            <td><?php echo$data['nama_sup']?></td>
            <td><?php echo$data['kontak_sup']?></td>
            <td><?php echo$data['nama_barang']?></td>
            <td>
                <a href='../crud/hapussup.php?id=<?php echo $data['id_supplier']; ?>' onclick='return confirm("ingin menghapus?")'>
                    <button>hapus</button>
                </a>
                <a href='../crud/editsupplier.php?id=<?php echo $data['id_supplier']; ?>'>
                    <button>edit</button>
                </a>
            </td>
           </tr>

            <?php
            }
            ?>
</table>
</div>
    
</body>
</html>