<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Monitoring</title>
    <link rel="stylesheet" href="http://localhost/digitaliz/assets/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/digitaliz/assets/style.css">

  </head>
  <body>
  <div class="container">
  <div class="jumbotron text-center">
        <h1>Project Monitoring</h1>
  </div>
  <div class="row utama label"> 
  <div class="col-sm-12 ">
    <table width='100%' border=0>
        <thead bgcolor='#ffffff' >
        <form action="create_aksi.php", method="POST", enctype="multipart/form-data">
        <div class="row">
    <div class="col-sm-6">
        <label> PROJECT NAME </label><br>
            <input type="text" name="project"><br/><br/>
        <label> CLIENT </label><br>
            <input type="text" name="client"><br/><br/>
        <label> PROJECT LEADER </label><br>
            <input type="text" name="project_leader"><br/><br/>
        <label> FOTO </label><br>
            <input type="file" name="Foto">
        </div>
    <div class="col-sm-6">
        <label> START DATE </label><br>
            <input type="date" name="start"><br/><br/>
        <label> END DATE </label><br>
            <input type="date" name="end"><br/><br/>
        <label> PROGRESS </label><br>
            <input type="text" name="progress"><br/>
        
        </div>
        </div>
    <div class="row">
    <div class="col-sm-8 text-center">
            <button type="submit" name="submit" value="submit"> Submit</button>
    </div>
    </div>
        </form>
            
  </div>
  <!-- </div> -->


  </body>
</html>
      