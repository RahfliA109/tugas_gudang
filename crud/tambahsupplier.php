<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama_sup = $_POST['nama_sup'];
        $kontak_sup = $_POST['kontak_sup'];
        $nama_barang = $_POST['nama_barang'];

        if (empty($nama_sup) || empty($kontak_sup) || empty($nama_barang)) {
            
        } else {
            $sql = "INSERT INTO supplier (nama_sup, kontak_sup, nama_barang) 
                    VALUES ('$nama_sup', '$kontak_sup', '$nama_barang')";

            if ($koneksi->query($sql) === TRUE) {
                header("Location: ../admin/supplier.php"); 
                exit(); 
            } else {
                echo "Error: " . $sql . "<br>" . $koneksi->error;
            }
        }
    }

    $koneksi->close();
    ?>

    <form action="" method="POST">
        <h1>Input Data Supplier</h1>
        <label for="nama_sup">Nama Supplier</label>
        <input type="text" name="nama_sup" required>
        <label for="kontak_sup">Kontak Supplier</label>
        <input type="text" name="kontak_sup" required>
        <label for="nama_barang">Nama Barang</label>
        <input type="text" name="nama_barang" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
