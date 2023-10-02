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
            <h3>Buku</h3>
            <div class ="box">
                <p><a href="tambah-buku.php">Tambah Buku</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th>Nama Buku</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th width="150px">Aksi</th>
                        </tr>
                </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $buku = mysqli_query($conn, "SELECT * FROM buku1 LEFT JOIN kategori1 USING (id_kategori) ORDER BY id_buku DESC");
                            if(mysqli_num_rows($buku) > 0){
                            while($row = mysqli_fetch_array($buku)){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>                                 <!-- looping-->
                            <td><?php echo $row['nama_kategori'] ?></td>
                            <td><?php echo $row['nama_buku'] ?></td>
                            <td>Rp. <?php echo number_format($row['harga_buku'])?></td>
                            <td><a href="bukuu/<?php echo $row['gambar_buku'] ?>"><img src="bukuu/<?php echo $row['gambar_buku'] ?>" width="100px"></a></td>
                            <td><?php echo ($row['status_buku'] == 0)? 'Tidak Tersedia':'Tersedia' ?></td>
                            <td>
                                <a href="edit-buku.php?id=<?php echo $row ['id_buku']?>">Edit</a> || <a href="hapus-kategori.php?idb=<?php echo $row['id_buku']?>" onclick="return confirm('Yakin Ingin Hapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php  }}else {?>
                            <tr>
                                <td colspan="7">Tidak Ada Data</td>
                            </tr>
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