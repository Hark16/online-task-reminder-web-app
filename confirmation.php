<?php  

error_reporting(0);

include "db.php";

$username =$_GET['username'];

$upd= "UPDATE reminder SET confirm = 'confirmed' WHERE username = '$username' ";

mysqli_query($conn, $upd);
ob_start();

   header("Location: index.php");
ob_end_flush();


?>
