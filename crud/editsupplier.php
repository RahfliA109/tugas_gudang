<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Supplier</title>
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
    $stmt = $koneksi->prepare("SELECT * FROM supplier WHERE id_supplier = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    echo "ID tidak ditentukan!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_sup = $_POST['nama_sup'];
    $kontak_sup = $_POST['kontak_sup'];
    $nama_barang = $_POST['nama_barang'];

    if (empty($nama_sup) || empty($kontak_sup) || empty($nama_barang)) {
        
        echo "Semua kolom harus diisi!";
    } else {
        // Update the supplier data
        $update_stmt = $koneksi->prepare("UPDATE supplier SET 
                nama_sup = ?, 
                kontak_sup = ?, 
                nama_barang = ? 
                WHERE id_supplier = ?");
        $update_stmt->bind_param("sssi", $nama_sup, $kontak_sup, $nama_barang, $id);

        if ($update_stmt->execute()) {
            header("Location: ../admin/supplier.php"); // Redirect after update
            exit();
        } else {
            echo "Error: " . $update_stmt->error;
        }
    }
}

$koneksi->close();
?>

<form action="" method="POST">
    <div class="judul">
        <h1>Edit Data Supplier</h1>
    </div>
    <input type="hidden" name="id_sup" value="<?php echo $row['id_supplier']; ?>">
    <label for="nama_supplier">Nama Supplier</label>
    <input type="text" name="nama_sup" value="<?php echo $row['nama_sup']; ?>" required>
    <label for="kontak_sup">Kontak Supplier</label>
    <input type="text" name="kontak_sup" value="<?php echo $row['kontak_sup']; ?>" required>
    <label for="nama_barang">Nama Barang</label>
    <input type="text" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required>
    <button type="submit">Update</button>
</form>

</body>
</html>
