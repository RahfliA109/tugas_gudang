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


        <?php
        include '../admin/koneksi.php'; 
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
            $nama_gudang = $_POST['nama_gudang'];
            $lokasi_gudang = $_POST['lokasi_gudang'];
           
        
           
            if (empty($nama_gudang) || empty($lokasi_gudang)) {
                
                echo "Semua kolom harus diisi!";
            } else {
              
                $sql = "INSERT INTO storage (nama_gudang, lokasi_gudang) 
                        VALUES ('$nama_gudang', '$lokasi_gudang')";
        
                if ($koneksi->query($sql) === TRUE) {
                   
                    header("Location:../admin/storage.php"); 
                    exit(); 
                } else {
                    echo "Error: " . $sql . "<br>" . $koneksi->error;
                }
            }
        }
        
    
        $koneksi->close();
        ?>

    </style>
</head>
<body>
    <form action="" method="POST">
        <h1>Input Data Storage</h1>
        <label for="#">Nama Gudang</label>
        <input type="nama_gudang" name="nama_gudang">
        <label for="#">Lokasi Gudang</label>
        <input type="lokasi_gudang" name="lokasi_gudang">
        <button type="submit">Submit</button>
    </form>
    
</body>
</html>