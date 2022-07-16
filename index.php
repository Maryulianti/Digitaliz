<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Monitoring</title>
    <link rel="stylesheet" href="http://localhost/digitaliz/assets/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/digitaliz/assets/style1.css">

  </head>
  <body>

  <div class="jumbotron text-center">
        <h1>Project Monitoring</h1>

  <div class="row utama label"> 
  <div class="col-sm-12 ">
  <div class="row">
        <div class="col-md-5">
          <div class="panel panel-default">
           
            <div class="panel-body">
              <form class="form-inline" >
                <div class="form-group">
                      <select class="form-control" id="Kolom" name="Kolom" required="">
                        <?php
                          $kolom=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";
                        ?>
                        <option value="Project_Leader" <?php if ($kolom=="Project_Leader") echo "selected"; ?>>Project Leader</option>
                        <option value="Client" <?php if ($kolom=="Client") echo "selected";?>>Client</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="filter" name="filter" value="<?php if (isset($_GET['filter']))  echo $_GET['filter']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">FILTER</button>
                  
                  </form>
              </div>
            </div>
          </div>
          <br/>
          <br/>
          <br/>
          <br/>

    <table width='100%' border=0>
        <thead bgcolor='#ffffff' >
            <tr style="text-left">
                <td  >NomorE</td>
                <td  >PROJECT NAME</td>
                <td >CLIENT</td>
                <td colspan="2">PROJECT LEADER</td>
                <td >START DATE</td>
                <td >END DATE</td>
                <td >PROGRESS</td>
                <td >ACTION</td>
            </tr>
            <?php
            // koneksi database
            $servername = "localhost";
            $username = "root";
            $password = "12345";
            $dbname = "Digitaliz";
            // Create connection db
            $conn = new mysqli($servername, $username, $password, $dbname);
      
            $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
         
            $kolomCari=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";
     
            $kolomFilter=(isset($_GET['filter']))? $_GET['filter'] : "";

            // Jumlah data per halaman
                $limit = 5;

                $limitStart = ($page - 1) * $limit;
                
                //kondisi jika parameter pencarian kosong
                if($kolomCari=="" && $kolomFilter==""){
                  $SqlQuery = mysqli_query($conn, "SELECT * FROM monitoring LIMIT ".$limitStart.",".$limit);
                }else{
                  //kondisi jika parameter kolom pencarian diisi
                  $SqlQuery = mysqli_query($conn, "SELECT * FROM monitoring WHERE $kolomCari LIKE '%$kolomFilter%' LIMIT ".$limitStart.",".$limit);
                }
                $no = $limitStart + 1;
      
                while($data = mysqli_fetch_array($SqlQuery)){ 
                ?>
      
        </thead>
        <tbody>
          
          <tr>
              <td><?php echo $data['id'];?></td>
              <td><?php echo $data['Project_Name'];?></td>
              <td><?php echo $data['Client'];?></td>
              <td>
              <div class="img">
                  <img src="Foto/<?php echo $data['Foto'];?>">
              </div>
              </td>
              <td><?php echo $data['Project_Leader'];?></td>
              <td><?php echo $data['Start_Date'];?></td> 
              <td><?php echo $data['End_Date'];?></td>
              <td>
              <div class="progress">
              <div class="progress-bar <strong>bg-primary</strong>" role="progressbar" style="width:<?php echo $data['Progress'];?>" aria-valuemax="100"><?php echo $data['Progress'];?></div>
            </td>
          </td>
          <td>
              <a href="edit.php?Project_Leader='<?php echo $data['Project_Leader'];?>">Edit</a> |
              <a href="delete_aksi.php?Project_Leader=<?php echo $data['Project_Leader'];?>&Foto=<?php echo $data['Foto'];?>" <?php 'onClick="return confirm(\'Apakah Anda Yakin Ingin Menghapus Data Ini?\')"';?>>Delete</a>
              </td>
      </tr>
          </tbody>
          <?php
            }
          ?>
      </table>
      <hr/>
      <div align="right">
          <ul class="pagination">
            <?php
              // Jika page = 1, maka LinkPrev disable
              if($page == 1){ 
            ?>        
              <!-- link Previous Page disable --> 
              <li class="disabled"><a href="#">Previous</a></li>
            <?php
              }
              else{ 
                $LinkPrev = ($page > 1)? $page - 1 : 1;  

                if($kolomCari=="" && $kolomFilter==""){
                ?>
                  <li><a href="index.php?page=<?php echo $LinkPrev; ?>">Previous</a></li>
              <?php     
                }else{
              ?> 
                <li><a href="index.php?Kolom=<?php echo $kolomCari;?>&flter=<?php echo $kolomFilter;?>&page=<?php echo $LinkPrev;?>">Previous</a></li>
                <?php
                  } 
              }
            ?>
            <?php
            //kondisi jika parameter pencarian kosong
            if($kolomCari=="" && $kolomFilter==""){
              $SqlQuery = mysqli_query($conn, "SELECT * FROM monitoring");
            }else{
              //kondisi jika parameter kolom pencarian diisi
              $SqlQuery = mysqli_query($conn, "SELECT * FROM monitoring WHERE $kolomCari LIKE '%$kolomFilter%'");
            }     
          
            //Hitung semua jumlah data yang berada pada tabel Sisawa
            $JumlahData = mysqli_num_rows($SqlQuery);
            
            // Hitung jumlah halaman yang tersedia
            $jumlahPage = ceil($JumlahData / $limit); 
            
            // Jumlah link number 
            $jumlahNumber = 1; 

            // Untuk awal link number
            $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
            
            // Untuk akhir link number
            $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
            
            for($i = $startNumber; $i <= $endNumber; $i++){
              $linkActive = ($page == $i)? ' class="active"' : '';

              if($kolomCari=="" && $kolomFilter==""){
          ?>
              <li<?php echo $linkActive; ?>><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
              <?php
        }else{
          ?>
          <li<?php echo $linkActive; ?>><a href="index.php?Kolom=<?php echo $kolomCari;?>&filter=<?php echo $kolomFilter;?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php
        }
      }
      ?>
      
      <!-- link Next Page -->
      <?php       
       if($page == $jumlahPage){ 
      ?>
        <li class="disabled"><a href="#">Next</a></li>
      <?php
      }
      else{
        $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
       if($kolomCari=="" && $kolomFilter==""){
          ?>
            <li><a href="index.php?page=<?php echo $linkNext; ?>">Next</a></li>
       <?php     
          }else{
        ?> 
           <li><a href="index.php?Kolom=<?php echo $kolomCari;?>&filter=<?php echo $kolomFilter;?>&page=<?php echo $linkNext; ?>">Next</a></li>
      <?php
        }
      }
      ?>
    </ul>



      <!-- <div action="Create.php" method="POST", enctype="multipart/form-data"> -->
      <button><a href="http://localhost/digitaliz/create.php">CREATE</a></button>
      <!-- </div> -->
      
  </div>

  <!-- </div> -->


  </body>
</html>
      