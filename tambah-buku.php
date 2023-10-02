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
    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
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
            <h3>Tambah Buku</h3>
            <div class ="box">
                 <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required> <!--wajib di isi-->
                        <option value="">--Pilih --</option>
                        <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM kategori1 ORDER BY id_kategori DESC");
                            while($r = mysqli_fetch_array($kategori)){                                           #--looping--#
                        ?>
                        <option value="<?php echo $r['id_kategori'] ?>"><?php echo $r['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Buku" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                    <input type="file" name="gambar" class="input-control" required>
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                    <br>
                    <select class="input-control" name="status">
                        <option value="">--Pilih--</option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                    </select>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                if(isset($_POST['submit'])){
                   
                    //print_r($_FILES['gambar']);
                    // menampung inputan dari form
                    $kategori   = $_POST['kategori'];
                    $nama       = $_POST['nama'];
                    $harga      = $_POST['harga'];
                    $deskripsi  = $_POST['deskripsi'];
                    $status     = $_POST['status'];

                    // menampung data file yang diupload
                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];                         // format gambar
                    
                    $newname ='buku'.time().'.'.$type2;
                    
                    // menampung data format file yang diizinkan 
                    $tipe_diizinkan = array('jpg', 'jpeg', 'png');

                    // validasi format file
                    if(!in_array($type2, $tipe_diizinkan)){
                        // jika format file tidak ada di dalam tipe diizinkan
                        echo '<script>alert("Format File Tidak Diizinkan")</script>';
                    }else {
                        // jika format file sesuai dengan yang ada di dalam array tipe diizinkan
                        // proses upload file sekaligus insert ke database
                        move_uploaded_file($tmp_name, './bukuu/'.$newname);

                        $insert = mysqli_query($conn, "INSERT INTO buku1 VALUES(
                                            null,
                                            '".$kategori."',
                                            '".$nama."',
                                            '".$harga."',
                                            '".$deskripsi."',
                                            '".$newname."',
                                            '".$status."',
                                            null
                                                )");
                        function tambah($insert){
                            if($insert){
                                echo '<script>alert(Tambah Data Berhasil")</script>';
                                echo '<script>window.location="buku.php"</script>';
                            }else{
                                echo 'Gagal' .mysqli_error($conn);
                            }
                        }
                        tambah($insert);
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
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>
</html>