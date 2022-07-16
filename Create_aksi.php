<?php
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
    //tangkap Data
    $project = $_POST['project'];
    $client = $_POST['client'];
    $project_leader = $_POST['project_leader'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $progress = $_POST['progress'];


    // tangkap data foto
    $img_tmp = $_FILES['Foto']['tmp_name'];
    $img_name = $_FILES['Foto']['name'];
    // menyimpan gambar secara permanen
    move_uploaded_file($img_tmp, 'Foto/'.$img_name);
    // echo $img_name;

    //membuat query
    $querySQL = "INSERT INTO monitoring (Project_Name, Client, Project_Leader, Start_Date, End_Date, Progress, Foto)
                                    VALUES('$project', '$client','$project_leader','$start','$end','$progress','$img_name')";
    //mengeksekusi 
    $hasil = $conn->query( $querySQL);

    //   redict kembali ke index.php
      header('Location: index.php')
     


?>
