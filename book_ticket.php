<?php
session_start();
if(!isset($_SESSION['booking']) || $_SESSION['booking']!=true){
    header("location: 1_availaibility.php");
    exit;
}
?>
<?php
$login = false;
$showError = false;
$con = mysqli_connect("localhost","root","","test_train");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $brands = $_POST['numbs'];
    $i=0;
      $a=array();
      foreach($brands as $item)
      {
          $i++;
          array_push($a, $item);
      }
      $seats_no = implode(",",$a);
      echo $seats_no;//seat no. string

    $result= "SELECT * FROM `test train` WHERE Sno. IN ({$seats_no})";
    if ($result){
      echo $i;//no. of seats
      $_SESSION['seats'] = $i;
      
      $_SESSION['seats_no'] = $seats_no;
      header("location: index2.php");
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bhartiya Rail - Book</title>
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
        <div class="p-3 headin">
            <h1 style="margin: auto; width:50%; padding: 10px;">Hello <?php echo $_SESSION['name']; ?><br> Choose your favorite seats here</h1>
            <p>Now you can Book your ticket anytime, anywhere</p>
        </div>

        <marquee onmouseover="this.stop();" onmouseout="this.start();" behavior="" direction=""><a href="https://innovation.indianrailways.gov.in/" style="text-decoration: none;"><h6>Ministry of Railways to support Indian Startups/MSMEs/Entrepreneurs/Innovators with funds for development of innovative products & low cost solutions for IR.</h6></a></marquee>
        <div class="farm">
        <form action="book_ticket.php" method="post" >
        <?php
            $datebase = " ".$_SESSION['datebase'];
            $tabla = "_".$_SESSION['tabla'];
        
            $betabase = str_replace(" ","","$datebase");//name of database
            $atable = str_replace("_","","$tabla");//name of table

            // Connecting to the Database
            $servername1 = "localhost";
            $username1 = "root";
            $password1 = "";
            $database1 = "$betabase";

            // Create a connection
            $conn1 = mysqli_connect($servername1, $username1, $password1, $database1);
            // Die if connection was not successful
            if($conn1){
              // Submit these to a database
              // Sql query to be executed 
              $sql1 = "SELECT * FROM `$atable`";
              $result1 = mysqli_query($conn1, $sql1);
      
              if($result1){
                echo '<div class="cen text-success my-4">
                <strong>'.$_SESSION['t_name'].' availaible Seats'.'</strong>
              </div>';
              $x=1;
          while($row1 = mysqli_fetch_assoc($result1)){
            if($row1['booked']==1){
              echo '<div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="'.$row1['Sno.'].'" name="numbs[]" checked disabled>
            <label class="form-check-label" for="inlineCheckbox2">'.$row1['Sno.'].'</label>
          </div>';
            }
            else{
              echo '<div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="'.$row1['Sno.'].'" name="numbs[]" >
            <label class="form-check-label" for="inlineCheckbox2">'.$row1['Sno.'].'</label>
          </div>';
            }
            
          if($x%10==0){
            echo'<br>';
          }
          if($x%30==0){
            echo'<div class=mt-3>';
          }
          $x++;
          }
              }
              else{
                  // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
                  echo '<div class="cen text-danger my-4">
                <strong>Error! Can not find the values</strong>
                </button>
              </div>';
              }

            }
    ?>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
        
        </div>
        <img src="images/pic2.svg" alt="" class="imeg">      
    </div>

    <?php require 'partials/_footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>