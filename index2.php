<?php
session_start();
if(!isset($_SESSION['booking']) || $_SESSION['booking']!=true){
    header("location: 1_availaibility.php");
    exit;
}
?>

<?php


$mojoURL = "test.instamojo.com";


$namee = "_".$_SESSION['name'];
$name = str_replace("_","","$namee");

$seatss = " ".$_SESSION['seats'];
$seats = str_replace(" ","","$seatss");

$emailee = " ".$_SESSION['emaile'];
$emaile = str_replace(" ","","$emailee");

$databaseee = " ".$_SESSION['datebase'];
$databasee = str_replace(" ","","$databaseee");

$tablaa = " ".$_SESSION['tabla'];
$tabla = str_replace(" ","","$tablaa");

$seats_noo = " ".$_SESSION['seats_no'];
$seats_no = str_replace(" ","","$seats_noo");

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://$mojoURL/api/1.1/payment-requests/");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key: test_b145d2a9bb2a7fc47506a888832",
                  "X-Auth-Token: test_71aaf2d229fd9de2a43338134f6"));
$payload = Array(
    'purpose' => 'Booking seat no. '."$seats_no",
    'amount' => "500"*"$seats",
    'phone' => "9354271433",
    'buyer_name' => "$name",
    'redirect_url' => 'http://localhost/minor/congratulations.php',
    'send_email' => true,
    'webhook' => '',
    'send_sms' => true,
    'email' => "$emaile",
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
$decode = json_decode($response);

$success = $decode -> success;
if ($success == true)
{

$paymentURL = $decode->payment_request->longurl;

  $conn1 = mysqli_connect("localhost", "root", "" , $databasee);
  $sql = "UPDATE `test train` SET `Name`='$name',`email`='$emaile', `booked`='1' WHERE `Sno.` IN ($seats_no)";
  $result = mysqli_query($conn1,$sql);

// SQL DATA ENTRY


header("Location:$paymentURL");
exit();

}


?>