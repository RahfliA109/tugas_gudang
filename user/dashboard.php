<?php
include("sidebar.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    
</head>
<body>
   
    <div class="tampil">
        <table border="1">
        <div class="navbar">
            <h1>Selamat Datang Admin</h1>
</div>
            <tr>
                <th>Id Barang</ths>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Stok</th>
                <th>Lokasi Gudang</th>
                <th>Serial Number</th>
                <th>aksi</th>
            </tr>
            <?php
            include("koneksi.php");
            $tampil = mysqli_query($koneksi,"SELECT * FROM inventory");
            while($data = mysqli_fetch_array($tampil)){
            ?>
            <td><?php echo$data['id_inventory']?></td>
            <td><?php echo$data['nama_barang']?></td>
            <td><?php echo$data['jenis_barang']?></td>
            <td><?php echo$data['kuantitas_stok']?></td>
            <td><?php echo$data['lokasi_gudang']?></td>
            <td><?php echo$data['serial_number']?></td>
          

            <?php
            }
            ?>

        </table>
    </div>
    
</body>
</html>