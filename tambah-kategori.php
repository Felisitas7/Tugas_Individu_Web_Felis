<?php
    session_start();
    include 'data.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
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
            <h1><a href="dashboard.php">MyBook </a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil </a></li>
                <li><a href="kategori.php">Kategori </a></li>
                <li><a href="buku.php">Buku </a></li>
                <li><a href="keluar.php">Logout </a></li>
            </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Tambah Data Kategori</h3>
            <div class ="box">
                 <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                if(isset($_POST['submit'])){
                    $nama = ucwords($_POST['nama']);
                    $insert = mysqli_query($conn, "INSERT INTO kategori1 VALUES(
                                       null,
                                        '".$nama."')");
                    if($insert){
                        echo '<script>alert("Tambah Data Berhasil")</script>';
                        echo '<script>window.location="kategori.php"</script>';
                    }else{
                        echo 'gagal'.mysqli_error($conn);
                    }
                }
                ?>
            </div>    
        </div>
    </div>

    <!--footer-->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2023 - MyBook.</small>
        </div>
    </footer>
</body>
</html>