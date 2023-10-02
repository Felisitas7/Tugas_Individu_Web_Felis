<?php
    error_reporting(0);
    include 'data.php';
    $kontak = mysqli_query($conn, "SELECT no_telp, email, alamat FROM admin1 WHERE id_admin=1");
    $a = mysqli_fetch_object($kontak);

    $detail = mysqli_query($conn, "SELECT * FROM buku1 WHERE id_buku ='".$_GET['id']."'  ");
    $b = mysqli_fetch_object($detail);
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

    <!-- detail buku-buku -->
    <div class="section">
        <div class="container">
            <h3>Detail Buku</h3>
            <div class="box">
                <div class="col-2">
                    <img  src="bukuu/<?php echo $b->gambar_buku ?>" width="60%" >
                </div>
                <div class="col-2">
                    <h3> <?php echo $b->nama_buku ?></h3>
                    <h4>Rp.<?php echo number_format($b->harga_buku) ?></h4>
                    <p> Deskripsi : <br>
                        <?php echo $b-> deskripsi_buku ?>
                    </p>
                    <p><a href="https://web.whatsapp.com/send?text=Hai, saya tertarik dengan buku ini. &phone=<?php echo $a-> no_telp?>" target="_blank">
                    Hubungi Via WhatsApp
                    <img src="img/wa.jpeg" width="30px"></a>
                </p>
                </div>
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