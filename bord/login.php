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




  <body class="bg-success">
    
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
     
      </ul>
      </div>
      </div>
   </div>
  


   
    <div class="row reg mt-5 pt-5">
    <div class="container" style="width: 400px">
       <div class="jumbotron jumbotron-fluid">
    <form action="" method="post">
    <h4 class="mx-4">User Login</h4>

    <?php
    session_start();

    if (isset($_POST['login'])) {

        require 'db.php';

        $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
        $user_pass = mysqli_real_escape_string($conn, $_POST['user_pass']);
        


        if(empty($user_name) || empty($user_pass)){
            echo '<i style="color:red;"> Login failed ! fill the fields</i>';
        }else{

        $sel_user = "select * from users where user_name='$user_name' ";
        $run_user = mysqli_query($conn, $sel_user);

        $check_user = mysqli_num_rows($run_user);

        if($check_user > 1){
            echo "user  exist";
        }elseif($row = mysqli_fetch_assoc($run_user)){
            // $hashedpwd = password_verify($user_pass, $row['user_password']);
            if(password_verify($user_pass, $row['user_password'])){
                echo "<script>window.open('welcome.php?logged_in=you have succesfully logged in&p_id=<?php echo $', '_self')</script>";
                $_SESSION["logged"] = true;
                header("welcome.php");
    
            }
        }

        if ($check_user == 0) {
            echo "<script>alert('username or Password incorrect try again!')</script>";
        }else{
            $_SESSION['user_name'] = $user_name;

            echo "<script>window.open('welcome.php?logged_in=you have succesfully logged in', '_self')</script>";
        }

        }


        }

        ?>


    <div class="form-group mx-3">
    <input type="text" class="form-control" placeholder="username" name="user_name">
    </div>

    <div class="form-group mx-3">
    <input type="password" class="form-control" placeholder="password"name="user_pass">
    </div>

    <div class="form-group mx-3">
    <a href="welcome.php?p_id=<?php echo $user_id; ?>"><input type="submit" class="form-control btn btn-primary btn-sm" value="Login" name="login"></a>
    </div>

    </form>
  </div>
    <?php 
        require 'db.php';
        $query = "select * from users ";
        $sel = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($sel)){
          $user_id = $row['user_id'];
        }



        ?>
    </div>
    </div>











    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>