
<!doctype html>
<html lang="en">
  <head>

  <title>bord</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" >

    
  </head>




  <body>
    
   <div class="navbar navbar-expand-sm navbar-dark bg-dark fixed top">
   <div class="container">
   <a href="index.php" class="navbar-brand">Blackbord</a>

   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="log.php">Logout <span class="sr-only">(current)</span></a>
      </li>
      
      
      </ul>
      </div>
      </div>
   </div>
  

    
    <div class="row mt-2 pt-2">
    <div class="container">
    <h3 class="text-success text-center">Welcome to blackbord system</h3>
    </div>
    </div>
   
    <div class="row reg mt-2 pt-1">
   <div class="container">
       <div class="row mt-4 pt-4">

       <?php 

      require 'db.php';


       $query = "select * from resources";
       $select_resources = mysqli_query($conn, $query);

       while($row = mysqli_fetch_assoc($select_resources)){

         $res_title = $row['res_title'];
         $res_file = $row['res_file'];

         ?>

          <div class="col-md-4">
       <div class="card  ">
       <div class="card-header"><h5><?php echo $res_title; ?></h5></div>
       <div class="card-body">
       <a class="text-primary" download="<?php echo $res_file; ?>" href="<?php echo "uploads/$res_file"; ?>"><?php echo $res_file; ?></a>
       
       </div>
       </div>
       </div>


     <?php  } ?>

       
       </div>
    </div>
    </div>

   









    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>