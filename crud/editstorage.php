<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Storage</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form {
            width: 300px;
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
        $stmt = $koneksi->prepare("SELECT * FROM storage WHERE id_storage = ?");
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
        $nama_gudang = $_POST['nama_gudang'];
        $lokasi_gudang = $_POST['lokasi_gudang'];

        if (empty($nama_gudang) || empty($lokasi_gudang)) {
            
            echo "Semua kolom harus diisi!";
        } else {
            $update_stmt = $koneksi->prepare("UPDATE storage SET 
                    nama_gudang = ?, 
                    lokasi_gudang = ? 
                    WHERE id_storage = ?");
            $update_stmt->bind_param("ssi", $nama_gudang, $lokasi_gudang, $id);

            if ($update_stmt->execute()) {
                header("Location: ../admin/storage.php"); // Redirect after update
                exit();
            } else {
                echo "Error: " . $update_stmt->error;
            }
        }
    }
    
    $koneksi->close();
    ?>

    <form action="" method="POST">
        <h1>Edit Data Storage</h1>
        <input type="hidden" name="id" value="<?php echo isset($row['id_storage']) ? $row['id_storage'] : ''; ?>">
        <label for="nama_gudang">Nama Gudang</label>
        <input type="text" name="nama_gudang" value="<?php echo isset($row['nama_gudang']) ? $row['nama_gudang'] : ''; ?>" required>
        <label for="lokasi_gudang">Lokasi Gudang</label>
        <input type="text" name="lokasi_gudang" value="<?php echo isset($row['lokasi_gudang']) ? $row['lokasi_gudang'] : ''; ?>" required>
        <button type="submit">Update</button>
    </form>

</body>
</html>
