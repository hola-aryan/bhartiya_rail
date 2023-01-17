<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["e_Name"];
    $password = $_POST["e_Password"]; 
    
     
    $sql = "Select * from employee where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['e_name'] = $username;
        header("location: 3_emp_home.php");

    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bhartiya Rail - Employee</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="bg-dark text-white">
    <div className="poora">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid ">
                <img src="images/rail2.svg" alt="Logo" width="40" height="36" class="d-inline-block align-text-top">
                <a class="navbar-brand" href="1_home.php">Bhartiya Rail</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="1_home.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="1_enquiry.php">Enquiry</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="1_availaibility.php">Availability</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="1_confirm.php">Confirm List</a>
                  </li>
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg></button>
                </form>
                
                    <div class="btn-group dropstart bg-dark">
                        <button type="button" class="btn btn-secondary dropdown-toggle bg-dark" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                              </svg>
                        </button>
                        <ul class="dropdown-menu bg-dark">
                          <li><a class="dropdown-item text-white" href="2_emp_login.php">Employee Login</a></li>
                          <li><a class="dropdown-item text-white" href="2_vis_login.php">Visitor Complaint</a></li>
                      </ul>
                      </div>
              </div>
            </div>
     </nav>
     
     <div class="containaa text-white" style="background-color: rgb(69, 62, 62);">
        <div class="p-3 headin">
            <h1 style="margin: auto; width:50%; padding: 10px;">Wecome to IRCTC</h1>
            <p>Enter the required details to login as an employee of IRCTC.</p>
        </div>
        <marquee onmouseover="this.stop();" onmouseout="this.start();" behavior="" direction=""><a href="https://innovation.indianrailways.gov.in/" style="text-decoration: none;"><h6>Ministry of Railways to support Indian Startups/MSMEs/Entrepreneurs/Innovators with funds for development of innovative products & low cost solutions for IR.</h6></a></marquee>

        <div class="loge">
        <form action="2_emp_login.php" method="post" class="row g-3">
            <div class="col-md-12">
              <label for="e_Name" class="form-label">User Name</label>
              <input type="text" class="form-control" name="e_Name" id="e_Name">
            </div>

            <div class="col-md-12">
              <label for="e_inputPassword4" class="form-label">Password</label>
              <input type="password" class="form-control" name="e_Password" id="e_inputPassword4">
            </div>

            <?php 
            echo "<small>" . $showError . "</small>";
            ?>

            <div class="col-12">
              <a href=""><button type="submit" class="btn btn-primary">Login</button></a>
            </div>
          </form> 
        </div>
        <img src="images/pic2.svg" alt="" class="imeg">      
    </div>

    <?php require 'partials/_footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>