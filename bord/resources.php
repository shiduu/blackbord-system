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
  


   
    <div class="row reg mt-2 pt-2">
    
    <div class="col-md-5">
    <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Resources</th>
      <th scope="col">Delete</th>
     
    </tr>
  </thead>
  <tbody>
  <?php 

require 'db.php';

$query = "SELECT * FROM resources";
$select_files = mysqli_query($conn, $query);

while($row=(mysqli_fetch_assoc($select_files))){
    $res_id = $row['res_id'];
    $res_title = $row['res_title'];
    $res_file = $row['res_file'];
    

    echo "
       <tr>
       <td>$res_id </td>
       <td>$res_title</td>
       <td><a download='<?php echo $res_file; ?>' href='uploads/$res_file '>$res_file </a></td>
       
       <td><a href='resources.php?delete={$res_id}'>Delete</a></td>

       </tr>
       ";
}
if (isset($_GET['delete'])) {
  $the_res_id = $_GET['delete'];

  $query = "delete from resources where res_id = $the_res_id ";
  $delete_file = mysqli_query($conn, $query);
  header("location: resources.php");
}


?>
    
    
  </tbody>
</table>
    </div>






    <div class="col-md-5 ml-5">
    <form action="" method="post" enctype="multipart/form-data">

      <h5 class="text-primary">Upload files</h5>

      <?php 

if (isset($_POST['submit'])) {

  require 'db.php';


  $res_title = mysqli_real_escape_string($conn, $_POST['title']);
  $res_file = mysqli_real_escape_string($conn, $_FILES['res']['name']);
  $res_file_temp = $_FILES['res']['tmp_name'];

  move_uploaded_file($res_file_temp, "uploads/$res_file");

  

   if($res_title == "" || empty($res_title)) {
            echo '<i style="color:red;">please title</i>';
        }else if($res_file == "" || empty($res_file)) {
              echo '<i style="color:red;">please select a file</i>';
        
        }else{

  $query = "insert into resources(res_title, res_file) values('$res_title','$res_file')";
  $insert_file = mysqli_query($conn, $query);

  if ($insert_file) {
    echo "<script>alert('FILE UPLOADED SUCCESSFULLY')</script>";
  }else{
    die(mysqli_error($conn));
  }
}
}

?>

      <div class="form-group">
     <label for="upload">Enter title</label>
     <input type="text" class="form-control" name="title" placeholder="enter title" required>
     </div>

     <div class="form-group">
     <label for="res">Select a file to upload</label>
     <input type="file" class="form-control" name="res">
     </div>

     <div class="form-group">
     <input type="submit" class="form-control btn btn-primary" name="submit" value="upload">
     </div>

    </form>
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