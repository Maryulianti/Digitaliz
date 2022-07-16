<?php
    // tangkap id_mhs yang diedit
    $Project_Leader = $_GET['Project_Leader'];
    
    //inisialisasa variable koneksi
    $servername = "localhost";
    $username = "root";
    $password = "12345";
    $dbname = "Digitaliz";

    // pembuatan koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // pengecekkan koneksi
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    //membuat query
    $querySQL = "SELECT * FROM monitoring where Project_Leader='$Project_Leader'";
    //mengeksekusi 
    $hasil = $conn->query( $querySQL);
    // uraikan data mhs
    $data = mysqli_fetch_array($SqlQuery);
    echo $data['Project_Name'];

?>
