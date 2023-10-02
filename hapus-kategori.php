<?php
    include 'data.php';
    if(isset($_GET['idk'])){
        $delete = mysqli_query($conn, "DELETE FROM kategori1 WHERE id_kategori = '".$_GET['idk']."' ");
        echo '<script>window.location="kategori.php"</script>';
    }

    if(isset($_GET['idb'])){
        $buku = mysqli_query($conn, "SELECT gambar_buku FROM buku1 WHERE id_buku = '".$_GET['idb']."' ");
        $b = mysqli_fetch_object($buku);

        unlink('./bukuu/'.$b->gambar_buku);
        $delete = mysqli_query($conn, "DELETE FROM buku1 WHERE id_buku = '".$_GET['idb']."' ");
        echo '<script>window.location="buku.php"</script>';
    }
?>