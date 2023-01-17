<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: 2_emp_login.php");
    exit;
}

?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $t_no = $_POST['t_no'];
        $t_name = $_POST['t_name'];
        $delay = $_POST['a_time'];
        
      
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "train";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        $sql = "UPDATE `train` SET `Delay`='$delay' WHERE `Number` = '$t_no' AND `Name` = '$t_name'";
        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo '<div class="cen text-success">
          <strong>Success! Value Updated</strong>
        </div>';
        }
        else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="cen text-danger">
          <strong>Error! Can not update the values</strong>
          </button>
        </div>';
        }

      }

    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bhartiya Rail - Delay</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="bg-dark text-white">
    <div className="poora">

        <nav class="navbar navbar-dark bg-dark">
        <span style="margin: auto">
        <a class="navbar-brand" href="#">
        <img src="images/rail2.svg" alt="Logo" width="40" height="30" class="d-inline-block align-text-top">
            Railway Employee Portal
        </a>
        </span>
        <form class="d-flex" role="search" action="logout.php">
            <a class="btn btn-danger btn-sm me-1" href="" role="button">
            <button class="btn btn-outline-light" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
              <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
            </svg>
        </button>
            </a>
        </form>
        </nav>
     
     <div class="containaa text-white" style="background-color: rgb(69, 62, 62);">
     <?php require 'partials/_emp_head.php';?>
        <div class="farm">
        <h3 class="mb-4">Add Delay</h3>
        <form action="3_add_delay.php" method="post" class="row g-3">
            <div class="col-md-6">
              <label for="Name" class="form-label">Train Number</label>
              <input type="text" class="form-control" name="t_no" id="Name">
            </div>
            <div class="col-md-6">
              <label for="Name" class="form-label">Train Name</label>
              <input type="text" class="form-control" name="t_name" id="Name">
            </div>
            <div class="col-md-6 cen">
              <label for="inputPassword4" class="form-label">Delay</label>
              <input type="time" class="form-control" name="a_time" id="email">
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-danger">Submit</button>
            </div>
            
          </form> 
          
        </div>
        <img src="images/pic2.svg" alt="" class="imeg">      
    </div>

    <?php require 'partials/_footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>