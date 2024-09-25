<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <style>

        body{
            display:flex;
            justify-content:center;
            align-items:center;
        }
          form{
            width:200px;
            height:auto;
            background-color:black;
            padding:20px;
            color:orangered;
            border-radius:20px;
            position: relative;
            margin-top:100px;
        }

        input{
            margin-bottom:10px;
            width:95%;
            height:20px;
        }

        button{
            width:100%;
            height:30px;
            background-color:orangered;
          
        }

        button:hover{
            background-color:gray;
            color:black;
        }
    </style>

<?php
include '../admin/koneksi.php'; // Sertakan file koneksi

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $kuantitas_stok = $_POST['kuantitas_stok'];
    $lokasi_gudang = $_POST['lokasi_gudang'];
    $serial_number = $_POST['serial_number'];

    // Validasi: Pastikan semua field terisi
    if (empty($nama_barang) || empty($jenis_barang) || empty($kuantitas_stok) || empty($lokasi_gudang) || empty($serial_number)) {
        
        echo "Semua kolom harus diisi!";
    } else {
        // Siapkan dan jalankan query
        $sql = "INSERT INTO inventory (nama_barang, jenis_barang, kuantitas_stok, lokasi_gudang, serial_number) 
                VALUES ('$nama_barang', '$jenis_barang', '$kuantitas_stok', '$lokasi_gudang', '$serial_number')";

        if ($koneksi->query($sql) === TRUE) {
            // Redirect ke halaman inventory setelah berhasil
            header("Location:../admin/inventory.php"); // Ganti 'inventory.php' dengan nama file halaman inventory Anda
            exit(); // Penting untuk menghentikan eksekusi skrip setelah redirect
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    }
}

// Tutup koneksi
$koneksi->close();
?>






</head>
<body>
    <form action="" method="POST">
        <h2>Input Data Inventory</h2>
        <label for="#">Nama Barang</label>
        <input type="nama_barang" name="nama_barang">
        <label for="#">Jenis Barang</label>
        <input type="Jenis_barang" name="jenis_barang">
        <label for="#">Stok</label>
        <input type="kuantitas_stok" name="kuantitas_stok">
        <label for="#">Lokasi Gudang</label>
        <input type="lokasi_gudang" name="lokasi_gudang">
        <label for="#">Serial Number</label>
        <input type="serial_number" name="serial_number">
        <button type="submit">Submit</button>
    </form>
    
</body>
</html>