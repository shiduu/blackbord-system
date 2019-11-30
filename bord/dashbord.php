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
    

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
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
        <a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
      </li>
      
      </ul>
      </div>
      </div>
   </div>

   <div class="row " style="height:60px">
    <div class="col-md-4 bg-primary "><a class="text-white " href="dashbord.php"><h4>Dashbord</h4> </a></div>
    <div class="col-md-4 bg-success "><a class="text-white" href="usersDetails.php"><h4>Users</h4></a></div>
    <div class="col-md-4 bg-info "><a class="text-white" href="resources.php"><h4> Resources</h4></a></div>
   </div>
  


   
    <div class="row reg mt-5 pt-5">
    <div class="container">
    <div class="row">
    <div class="col-md-6 ">
      <div class="card bg-success text-white">
     
      <div class="card-body">
      <div class="row">
      <div class="col-md-6"><i class="fas fa-users fa-4x"></i></div>
      <div class="col-md-6">
       <h5 class="text-white text-right">Users</h5><br>
       
       <?php 

         require 'db.php';
 
         $query = "SELECT * FROM users";
         $select_all = mysqli_query($conn, $query);

         $users_count = mysqli_num_rows($select_all);
         
         echo "<h5 class='text-white text-right'>$users_count</h5>";
         ?>

      </div>
      </div>
      </div>
      <div class="card-footer"><a class="text-white" href="usersDetails.php">Views users</a></div>
      </div>      
    </div>



    <div class="col-md-6 ">
      <div class="card bg-info text-white">
     
      <div class="card-body">
      <div class="row">
      <div class="col-md-6"><i class="fas fa-folder fa-4x"></i></div>
      <div class="col-md-6">
       <h5 class="text-white text-right">Resources</h5><br>
       
       <?php 

        require 'db.php';

        $query = "SELECT * FROM resources";
        $select_all = mysqli_query($conn, $query);

        $res_count = mysqli_num_rows($select_all);

        echo "<h5 class='text-white text-right'>$res_count</h5>";
        ?>

      </div>
      </div>
      </div>
      <div class="card-footer"><a class="text-white" href="resources.php">Views Resources</a></div>
      </div>      
    </div>


   
     
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