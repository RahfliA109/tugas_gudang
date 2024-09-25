<?php
include("sidebar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invemtory</title>
    <link rel="stylesheet" href="button.css">

    <script>
        function checkStock(stock, itemName) {
            if (stock == 1) {
                alert("Stok hanya tersisa 1 untuk: " + itemName + "!");
            }
        }
    </script>
</head>
<body>
    <div class="tampil">
    <table border="1">
    <div class="navbar">
        <h1>Table Inventory</h1>
    </div>
    <div>
        <a href="../crud/tambahinven.php"><button>Tambah data</button></a>
    </div>
    <tr>
        <th>Id</th>
        <th>Nama Barang</th>
        <th>Jenis Barang</th>
        <th>Stok</th>
        <th>Lokasi Gudang</th>
        <th>Serial Number</th>
        <th>aksi</th>
    </tr>
    <?php
    include("koneksi.php");
    $tampil = mysqli_query($koneksi, "SELECT * FROM inventory");
    while ($data = mysqli_fetch_array($tampil)) {
    ?>
        <tr>
            <td><?php echo $data['id_inven']; ?></td>
            <td><?php echo $data['nama_barang']; ?></td>
            <td><?php echo $data['jenis_barang']; ?></td>
            <td><?php echo $data['kuantitas_stok']; ?></td>
            <td><?php echo $data['lokasi_gudang']; ?></td>
            <td><?php echo $data['serial_number']; ?></td>
            <td>
                <a href='../crud/hapusinven.php?id=<?php echo $data['id_inven']; ?>' onclick='return confirm("ingin menghapus?")'>
                    <button>hapus</button>
                </a>
                <a href='../crud/editinven.php?id=<?php echo $data['id_inven']; ?>'>
                    <button>edit</button>
                </a>
            </td>
        </tr>
    <?php
    }
    ?>
    </div>
</table>


    </div>

</body>
</html>