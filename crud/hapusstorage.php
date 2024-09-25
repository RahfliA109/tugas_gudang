<?php
include("../admin/koneksi.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $deleteQuery = "DELETE FROM storage WHERE id_storage = ?";
    
    
    $stmt = $koneksi->prepare($deleteQuery);
    $stmt->bind_param("i", $id);
    
   
    if($stmt->execute()){
        echo "Data berhasil dihapus. <a href='../admin/storage.php'>Kembali ke tabel</a>";
    } else {
        echo "Terjadi kesalahan: " . $koneksi->error;
    }
    
    $stmt->close();
}

$koneksi->close();
?>
