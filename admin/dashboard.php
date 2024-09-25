<?php
include("sidebar.php");
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <style>
        /* Basic styles for the search form */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .search-bar {
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <div class="tampil">
        <div class="navbar">
            <h1>Selamat Datang Admin</h1>
            <form method="POST" class="search-bar">
                <input type="text" name="search_all" placeholder="Search...">
                <input type="submit" value="Search">
            </form>
        </div>

        <?php
        $search_all = isset($_POST['search_all']) ? $_POST['search_all'] : '';
        $found = false;
        ?>

        <h1>Hasil Pencarian</h1>
        <table border="1" id="search_results">
            <tr>
                <th>Type</th>
                <th>Details</th>
            </tr>
            <?php
            if ($search_all) {
                include("koneksi.php");

                // Search in Inventory
                $query = "SELECT * FROM inventory WHERE nama_barang LIKE '%$search_all%' OR jenis_barang LIKE '%$search_all%'";
                $inventory_data = mysqli_query($koneksi, $query);
                
                while ($data = mysqli_fetch_array($inventory_data)) {
                    $found = true; 
                    echo "<tr><td>Inventory</td><td>Id: {$data['id_inven']}, Nama: {$data['nama_barang']}, Jenis: {$data['jenis_barang']}, Stok: {$data['kuantitas_stok']}, Lokasi: {$data['lokasi_gudang']}, Serial: {$data['serial_number']}</td></tr>";
                }

                // Search in Storage
                $query = "SELECT * FROM storage WHERE nama_gudang LIKE '%$search_all%'";
                $storage_data = mysqli_query($koneksi, $query);
                
                while ($data = mysqli_fetch_array($storage_data)) {
                    $found = true;
                    echo "<tr><td>Storage</td><td>Id: {$data['id_storage']}, Nama: {$data['nama_gudang']}, Lokasi: {$data['lokasi_gudang']}</td></tr>";
                }

                // Search in Supplier
                $query = "SELECT * FROM supplier WHERE nama_sup LIKE '%$search_all%'";
                $supplier_data = mysqli_query($koneksi, $query);
                
                while ($data = mysqli_fetch_array($supplier_data)) {
                    $found = true;
                    echo "<tr><td>Supplier</td><td>Id: {$data['id_supplier']}, Nama: {$data['nama_sup']}, Kontak: {$data['kontak_sup']}, Barang: {$data['nama_barang']}</td></tr>";
                }
            }
            ?>
        </table>

        <h1>Table Inventory</h1>
        <table border="1" id="inventory_table">
            <tr>
                <th>Id Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Stok</th>
                <th>Lokasi Gudang</th>
                <th>Serial Number</th>
            </tr>
            <?php
            $query = "SELECT * FROM inventory";
            $inventory_data = mysqli_query($koneksi, $query);

            while ($data = mysqli_fetch_array($inventory_data)) {
                echo "<tr>
                        <td>{$data['id_inven']}</td>
                        <td>{$data['nama_barang']}</td>
                        <td>{$data['jenis_barang']}</td>
                        <td>{$data['kuantitas_stok']}</td>
                        <td>{$data['lokasi_gudang']}</td>
                        <td>{$data['serial_number']}</td>
                      </tr>";
            }
            ?>
        </table>

        <h1>Table Gudang</h1>
        <table border="1" id="storage_table">
            <tr>
                <th>Id</th>
                <th>Nama Gudang</th>
                <th>Lokasi Gudang</th>
            </tr>
            <?php
            $query = "SELECT * FROM storage";
            $storage_data = mysqli_query($koneksi, $query);

            while ($data = mysqli_fetch_array($storage_data)) {
                echo "<tr>
                        <td>{$data['id_storage']}</td>
                        <td>{$data['nama_gudang']}</td>
                        <td>{$data['lokasi_gudang']}</td>
                      </tr>";
            }
            ?>
        </table>

        <h1>Table Supplier</h1>
        <table border="1" id="supplier_table">
            <tr>
                <th>Id Supplier</th>
                <th>Nama Supplier</th>
                <th>Kontak Supplier</th>
                <th>Nama Barang</th>
            </tr>
            <?php
            $query = "SELECT * FROM supplier";
            $supplier_data = mysqli_query($koneksi, $query);

            while ($data = mysqli_fetch_array($supplier_data)) {
                echo "<tr>
                        <td>{$data['id_supplier']}</td>
                        <td>{$data['nama_sup']}</td>
                        <td>{$data['kontak_sup']}</td>
                        <td>{$data['nama_barang']}</td>
                      </tr>";
            }
            ?>
        </table>

        <script>
            // If no data was found after the search, show an alert
            <?php if ($search_all && !$found): ?>
                alert("Data tidak ditemukan!");
            <?php endif; ?>
        </script>
    </div>
</body>
</html>
