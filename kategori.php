<?php
    session_start();
    include 'data.php';
    if($_SESSION['status_login'] != true){          ## kondisi ##
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
            <h3>Kategori</h3>
            <div class ="box">
                 <p><a href="tambah-kategori.php">Tambah Kategori</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th width="150px">Aksi</th>
                        </tr>
                </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $kategori = mysqli_query($conn, "SELECT * FROM kategori1 ORDER BY id_kategori DESC");
                            if(mysqli_num_rows($kategori)> 0){
                            while($row = mysqli_fetch_array($kategori)){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>              <!-- looping-->
                            <td><?php echo $row['nama_kategori'] ?></td>
                            <td>
                                <a href="edit-kategori.php?id=<?php echo $row ['id_kategori']?>">Edit</a> || 
                                <a href="hapus-kategori.php?idk=<?php echo $row['id_kategori']?>" onclick="return confirm('Yakin Ingin Hapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php  }}else{ ?>
                            <tr>
                                <td colspan="3"> Tidak Ada Kategori </td>
                        <?php } ?> 
                    </tbody>
                </table>
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