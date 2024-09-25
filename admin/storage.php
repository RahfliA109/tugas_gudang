<?php
include("sidebar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gudang</title>
    <link rel="stylesheet" href="button.css">
</head>
<body>
<div class="tampil">
<table border="1">
        <div class="navbar">
            <h1>Table Storage</h1>
        </div>
        <div>
           <a href="../crud/tambahstorage.php"><button>Tambah data</button></a>
        </div>
            <tr>
                <th>Id</th>
                <th>Nama Gudang</th>
                <th>Lokasi Gudang</th>
                <th>aksi</th>
            </tr>

            <?php
            include("koneksi.php");
            $tampil = mysqli_query($koneksi,"SELECT * FROM storage");
            while($data = mysqli_fetch_array($tampil)){
            ?>
            <tr>
            <td><?php echo$data['id_storage']?></td>
            <td><?php echo$data['nama_gudang']?></td>
            <td><?php echo$data['lokasi_gudang']?></td>
            <td>
                <a href='../crud/hapusstorage.php?id=<?php echo $data['id_storage']; ?>' onclick='return confirm("ingin menghapus?")'>
                    <button>hapus</button>
                </a>
                <a href='../crud/editstorage.php?id=<?php echo $data['id_storage']; ?>'>
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