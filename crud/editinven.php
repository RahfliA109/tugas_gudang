<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .judul {
            text-align: center;
        }

        form {
            width: 200px;
            height: auto;
            background-color: black;
            padding: 20px;
            color: orangered;
            border-radius: 20px;
            position: relative;
            margin-top: 100px;
        }

        input {
            margin-bottom: 10px;
            width: 95%;
            height: 20px;
        }

        button {
            width: 100%;
            height: 30px;
            background-color: orangered;
        }

        button:hover {
            background-color: gray;
            color: black;
        }
    </style>
</head>
<body>

    <?php
    include '../admin/koneksi.php'; 
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Use prepared statement to prevent SQL injection
        $stmt = $koneksi->prepare("SELECT * FROM inventory WHERE id_inven = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "Data tidak ditemukan!";
                exit;
            }
        } else {
            echo "Error: " . $koneksi->error;
            exit;
        }
    } else {
        echo "ID tidak ditentukan!";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nama_barang = $_POST['nama_barang'];
        $jenis_barang = $_POST['jenis_barang'];
        $kuantitas_stok = $_POST['kuantitas_stok'];
        $lokasi_gudang = $_POST['lokasi_gudang'];
        $serial_number = $_POST['serial_number'];

        if (empty($nama_barang) || empty($jenis_barang) || empty($kuantitas_stok) || empty($lokasi_gudang) || empty($serial_number)) {
            
            echo "Semua kolom harus diisi!";
        } else {
            $update_stmt = $koneksi->prepare("UPDATE inventory SET 
                    nama_barang = ?, 
                    jenis_barang = ?, 
                    kuantitas_stok = ?, 
                    lokasi_gudang = ?, 
                    serial_number = ? 
                    WHERE id_inven = ?");
            $update_stmt->bind_param("ssissi", $nama_barang, $jenis_barang, $kuantitas_stok, $lokasi_gudang, $serial_number, $id);

            if ($update_stmt->execute()) {
                header("Location: ../admin/inventory.php"); 
                exit();
            } else {
                echo "Error: " . $update_stmt->error;
            }
        }
    }
    
    $koneksi->close();
    ?>
    
    <form action="" method="POST">

    <h2>Edit Data Inventory</h2>
        <input type="hidden" name="id" value="<?php echo $row['id_inven']; ?>">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required>
        
        <label for="jenis_barang">Jenis Barang</label>
        <input type="text" name="jenis_barang" value="<?php echo $row['jenis_barang']; ?>" required>
        
        <label for="kuantitas_stok">Stok</label>
        <input type="number" name="kuantitas_stok" value="<?php echo $row['kuantitas_stok']; ?>" required>
        
        <label for="lokasi_gudang">Lokasi Gudang</label>
        <input type="text" name="lokasi_gudang" value="<?php echo $row['lokasi_gudang']; ?>" required>
        
        <label for="serial_number">Serial Number</label>
        <input type="text" name="serial_number" value="<?php echo $row['serial_number']; ?>" required>
        
        <button type="submit">Update</button>
    </form>
    
</body>
</html>
