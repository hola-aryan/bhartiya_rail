<?php
session_start();
echo $_SESSION['TID'];
echo "<br/>";
echo '<pre>';
print_r($_REQUEST);
?>