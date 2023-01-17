<?php
  // Connecting to the Database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "blogs_content";

  // Create a connection
  $conn = mysqli_connect($servername, $username, $password, $database);
  // Die if connection was not successful
  if (!$conn){
      echo "Failed Connection";
  }
  else{ 
    // Submit these to a database
    // Sql query to be executed 
    $sql = "select * from blogs_content";
    $result = mysqli_query($conn, $sql);

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bhartiya Rail - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
      .row{
        margin-right: 0px;
      }
    </style>
</head>
<body>
    <div className="poora" style="width=100%">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid ">
                <img src="images/rail2.svg" alt="Logo" width="40" height="36" class="d-inline-block align-text-top">
                <a class="navbar-brand" href="#">Bhartiya Rail</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href="1_home.php">Home</a>
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
     <div style="background-color: rgb(69, 62, 62);">
        <header class="hero" style="background-image: url('images/bgrail.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%; ">
            <img class="hero-img" src="images/rail.svg" alt="">
            <h3 class="hero-heading">IRCTC<div class="span-web">Bhartiya Rail</div></h3>
        </header>

        <marquee onmouseover="this.stop();" onmouseout="this.start();" behavior="" direction=""><a href="https://innovation.indianrailways.gov.in/" style="text-decoration: none;"><h6>Ministry of Railways to support Indian Startups/MSMEs/Entrepreneurs/Innovators with funds for development of innovative products & low cost solutions for IR.</h6></a></marquee>


    <?php
    echo'<div class="row g-4 cent">';
    while($row = mysqli_fetch_assoc($result)){
        echo'
        <div class="card mx-4 my-3 mt-5 bg-info" style="width: 17rem;">
    <img src="'.$row['Img'].'" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">'.$row['title'].'</h5>
        <p class="card-text">'.$row['descrip'].'</p>
        <a href="#" class="btn btn-primary">Read more</a>
    </div>
    </div>';
    }
    echo'</div>';
    ?>

    


    <?php require 'partials/_footer.php';?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>