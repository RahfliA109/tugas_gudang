<?php
include("../admin/koneksi.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $deleteQuery = "DELETE FROM supplier WHERE id_supplier = ?";
    
    
    $stmt = $koneksi->prepare($deleteQuery);
    $stmt->bind_param("i", $id);
    
   
    if($stmt->execute()){
        echo "Data berhasil dihapus. <a href='../admin/supplier.php'>Kembali ke tabel</a>";
    } else {
        echo "Terjadi kesalahan: " . $koneksi->error;
    }
    
    $stmt->close();
}

$koneksi->close();
?>
