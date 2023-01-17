<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: 2_emp_login.php");
    exit;
}
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect1.php';
    $email = $_POST["email"]; 
    
     
    $sql = "DELETE FROM `complaints` WHERE `complaints`.`email` = '$email'";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bhartiya Rail - Reply</title>
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
          <h3 class="mb-4">Visitor Complaints Reply</h3>

          <form action="4_reply.php" method="post" class="row g-3">
            <div class="col-md-12">
              <label for="c_img" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="c_img">
            </div>
            <div class="col-md-12">
              <label for="c_title" class="form-label">Subject</label>
              <input type="text" class="form-control" name="subject" id="c_title">
            </div>
            <div class="col-md-12">
              <label for="c_conc" class="form-label">Reply</label>
              <textarea class="form-control" id="c_conc" name="message" rows="3"></textarea>
            </div>
            <div class="col-12">
            <button type="submit" class="btn btn-danger">Submit</button>
            </div>
            
          </form>

        </div>
        <img src="images/pic2.svg" alt="" class="imeg">      
    </div>
        <?php
        //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\exception;

        require 'PHPMailer-master/src/Exception.php';
        require 'PHPMailer-master/src/PHPMailer.php';
        require 'PHPMailer-master/src/SMTP.php';


        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings                 //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail -> Username = 'bhartiyarailway808@gmail.com';
            $mail -> Password = 'oinqdptbmvdacemy';                             //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('bhartiyarailway808@gmail.com');
            $mail->addAddress($_POST["email"]);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $_POST["subject"];
            $mail->Body    = $_POST["message"];

            $mail->send();
            echo 'Message has been sent';
            
            echo"
            <script>
            alet('Sent Successfully');
            document.location.href = '3_vis_comp.php';
            </script>";
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        ?>

    <?php require 'partials/_footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>