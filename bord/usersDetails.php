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
  


   <div class="container">
    <div class="row reg mt-2 pt-2">
    
      <div class="col-md-10">
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

  <?php 

  require 'db.php';

  $query = "SELECT * FROM users";
  $select_users = mysqli_query($conn, $query);

  while($row=(mysqli_fetch_assoc($select_users))){
      $user_id = $row['user_id'];
      $user_name = $row['user_name'];
      $user_email = $row['user_email'];
      $user_password = $row['user_password'];

      echo "
         <tr>
         <td>$user_id </td>
         <td>$user_name</td>
         <td>$user_email</td>
         <td>$user_password</td>
         
         <td>
         <a href='usersDetails.php?delete={$user_id}' class='btn btn-danger btn-sm'>Delete</a>
         </td>
  
         </tr>
         ";

         if (isset($_GET['delete'])) {
          $the_user_id = $_GET['delete'];
      
          $query = "delete from users where user_id = $the_user_id ";
          $delete_user = mysqli_query($conn, $query);
          header("location: usersDetails.php");
        }
        // else{
        //    echo die("eror".mysqli_connect_error($conn));
        // }
  }
 


?>
  
  </tbody>
</table>
</div>
<div class="col-md-2">
  <a href="adduser.php" class="btn btn-info">Add user</a>
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