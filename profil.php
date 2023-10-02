<?php
    session_start();
    include 'data.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $query = mysqli_query($conn, "SELECT * FROM admin1 WHERE id_admin ='".$_SESSION['id']."'" );
    $d = mysqli_fetch_object($query);
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
            <h3>Profil</h3>
            <div class ="box">
                 <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->nama ?>" required>
                    <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
                    <input type="text" name="hp" placeholder="No Telepon" class="input-control" value="<?php echo $d->no_telp?>" required>
                    <input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->email ?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->alamat ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $nama   = ucwords($_POST['nama']);
                        $user   = $_POST['user'];
                        $hp     = $_POST['hp'];
                        $email  = $_POST['email'];
                        $alamat = ucwords($_POST['alamat']);

                        $update = mysqli_query($conn, "UPDATE admin1 SET 
                                    nama = '".$nama."',
                                    username= '".$user."',
                                    no_telp = '".$hp."',
                                    email = '".$email."',
                                    alamat = '".$alamat."'
                                    WHERE id_admin ='".$d->id_admin."' ");
                        if($update){
                            echo '<script>alert("Ubah Data Berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        }else{
                            echo 'gagal' .mysqli_error($conn);
                        }
                    }
                ?>
            </div>

            <h3>Ubah Password</h3>
            <div class ="box">
                 <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                    <input type="password" name="pass2" placeholder="Konfirasi Password Baru" class="input-control" required>
                    <input type="submit" name="Ubah_Password" value="Ubah Password" class="btn">
                </form>
                <?php
                    if(isset($_POST['Ubah_Password'])){
                       
                        $pass1   = $_POST['pass1'];
                        $pass2   = $_POST['pass2'];

                        if($pass2 != $pass1){
                            echo '<script>alert("Konfirmasi Password Baru tidak Sesuai")</script>';
                        }else{
                            $up_pass = mysqli_query($conn, "UPDATE admin1 SET 
                                    password = '".MD5($pass1)."'
                                    WHERE id_admin ='".$d->id_admin."' ");
                            if($up_pass){
                                echo '<script>alert("Ubah Data Berhasil")</script>';
                                echo '<script>window.location="profil.php"</script>';
                            }else{
                                echo 'Gagal'.mysqli_error($conn);
                            }
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
