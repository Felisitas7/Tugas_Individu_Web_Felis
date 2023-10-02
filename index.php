<?php
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
                <input type="text" name="search" placeholder="Cari Buku">
                <input type="submit" name="cari" value="Cari Buku">
            </form>
        </div>
    </div>

    <!-- kategori -->
        <div class="section">
            <div class="container">
                <h3>Kategori</h3>
                <div class="box">
                    <?php 
                        $kategori = mysqli_query($conn, "SELECT * FROM kategori1 ORDER BY id_kategori DESC");
                        if(mysqli_num_rows($kategori) > 0){
                            while($k=mysqli_fetch_array($kategori)){                                             //looping//
                    ?>
                        <a href="detail-buku.php?kat=<?php echo $k['id_kategori']?>">
                            <div class="col-6">
                                <img src="img/ikon buku.jpeg" width="50px" style="margin-bottom:5px;">
                                <p><?php echo $k['nama_kategori']?></p>
                            </div>
                        </a>
                    <?php }} else {?>
                    <p>Kategori Tidak Ada</p>
                    <?php }?>
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