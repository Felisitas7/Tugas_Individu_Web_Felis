<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'db_mybook';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('gagal terhubung ke database');
?>