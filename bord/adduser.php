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
        <a class="nav-link" href="register.php">Register <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="login.php">Login<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="adminLogin.php">Admin<span class="sr-only">(current)</span></a>
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
    <div class="container" style="width: 400px">
    <form action="" method="post">
    <h4>Add user</h4>


      <?php

if(isset($_POST['submit'])){
    require 'db.php';

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email =  mysqli_real_escape_string($conn, $_POST['email']);
    $password =  mysqli_real_escape_string($conn, $_POST['password']);
    $confirmpwd =  mysqli_real_escape_string($conn, $_POST['confirmpwd']);

    $hash = password_hash($password, PASSWORD_DEFAULT);

    if(empty($username) || empty($email) || empty($password) || empty($confirmpwd)){
        echo '<i style="color:red;"> Registration failed ! fill the fields</i>';
    }elseif($password != $confirmpwd){
        echo '<i style="color:red;">your password dont match</i>';
    }else{

       $query = "INSERT INTO users (user_name,user_email,user_password) VALUES('$username', '$email', '$hash' )";
       $insert_data = mysqli_query($conn, $query);

       if(!$insert_data){
           die("query failed".mysqli_connect_error($conn));
       }else{
         echo "<script>alert('you have registered successfully....thank you')</script>";
       }


    }

}

?>


    <div class="form-group">
    <input type="text" class="form-control" placeholder="username"name="username">
    </div>

    <div class="form-group">
    <input type="email" class="form-control" placeholder="email" name="email">
    </div>

    <div class="form-group">
    <input type="password" class="form-control" placeholder="password" name="password">
    </div>

    <div class="form-group">
    <input type="password" class="form-control" placeholder="confirm password" name="confirmpwd">
    </div>

    <div class="form-group">
    <input type="submit" class="form-control btn btn-primary" name="submit" value="Register">
    </div>
    </form>
    </div>
    </div>

   









    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>