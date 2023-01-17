<?php 
session_start();
unset($_SESSION["nome"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
header("Location: 2_emp_login.php");
session_destroy();
?>