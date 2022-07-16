<?php
    // tangkap id_mhs & foto yang diedit
    $Project_Leader = $_GET['Project_Leader'];
    $foto = $_GET['Foto'];

    //inisialisasa variable koneksi
    $servername = "localhost";
    $username = "root";
    $password = "12345";
    $dbname = "Digitaliz";

    // Create connection db
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection db
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // hapus gambar
    unlink('Foto/'.$foto);

    //membuat query
     $querySQL = "Delete FROM monitoring where Project_Leader='$Project_Leader'";
    //mengeksekusi 
     $hasil = $conn->query( $querySQL);

    //kembali ke indekx.php
    header('location: index.php')
?>