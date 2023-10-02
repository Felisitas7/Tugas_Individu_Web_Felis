<?php
    error_reporting(0);
    include 'data.php';
    $kontak = mysqli_query($conn, "SELECT no_telp, email, alamat FROM admin1 WHERE id_admin=1");
    $a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyBook</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>
<body>
   <!-- header -->
   <header>
        <div class="container"> 
            <h1><a href="index.php">MyBook </a></h1>
            <ul>
                <li><a href="detail-buku.php">Buku</a></li>
            </ul>
        </div>
    </header>

    <!-- search -->
    <div class="search">
        <div class="container">  
            <form action="detail-buku.php">
                <input type="text" name="search" placeholder="Cari Buku" value="<?php echo $_GET['search'] ?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                <input type="submit" name="cari" value="Cari Buku">
            </form>
        </div>
    </div>

    <!-- buku-buku-->
    <div class="section">
        <div class="container">
            <h3>Buku</h3>
            <div class="box">
                <?php
                    if($_GET['search'] !='' || $_GET['kat'] != '' ){
                        $where = "AND nama_buku LIKE '%".$_GET['search']."%' AND id_kategori LIKE '%".$_GET['kat']."%'  ";
                    }
                    $buku = mysqli_query($conn, "SELECT * FROM buku1 WHERE status_buku = 1  $where 
                    ORDER BY id_buku DESC");

                    if(mysqli_num_rows($buku) > 0){
                        while($b=mysqli_fetch_array($buku)){
                ?>
                    <a href="buku-buku.php?id=<?php echo $b['id_buku'] ?>">
                        <div class="col-4">
                            <img src="bukuu/<?php echo $b['gambar_buku'] ?>">
                            <p class="nama"><?php echo substr($b['nama_buku'], 0, 25)?></p>
                            <p class="harga">Rp.<?php echo number_format( $b['harga_buku'])?></p>
                        </div>
                    </a>
                <?php }}else{ ?>
                    <p>Buku Tidak Ada</p>
                <?php } ?>
            </div>
        </div>
    </div>
                
                        
                    
                
    <!-- footer-->
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p><?php echo $a-> alamat ?></p>

            <h4>Email</h4>
            <p><?php echo $a-> email ?></p>

            <h4>No.HP</h4>
            <p><?php echo $a-> no_telp ?></p>
            <small>Copyright &copy; 2023 - MyBook </small>
        </div>
    </div>
</body>
</html>