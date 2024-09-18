
<!DOCTYPE html>
<html>
<head><title>


Change Password
</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="mystyle.css">

</head>
<body>

<h1> change password</h1>

<div class="container">

<form method='POST'>

<div class="container">
<div class="row">
  <div class="col-xs-6">

new password : 
</div>

  <div class="col-xs-6">

<input type='text' name='pass'/><br/>
</div></div>

<div class="row">
  <div class="col-xs-6">

confirm password : 
</div>

  <div class="col-xs-6">

<input type='text' name='pass1'/><br/>
</div></div>

<div class="row">
  <div class="col-xs-6">
<center>

<input type='submit' name='submit' value='submit' />
</center></div> </div>

</div>
</form>
</div>
<?php
session_start();

include "db.php";

if(isset($_POST['submit'])){
$pass= $_POST['pass'];
$pass1 = $_POST['pass1'];

if($pass==$pass1){
$email= $_SESSION['email'];

$upd= "UPDATE reminder SET password = '$pass' WHERE email = '$email' ";

mysqli_query($conn, $upd);

echo"<h1> password chenged successfully </h1>";

}



}
?>
<div class="container">

<a href='login.php'>login page</a>
</div>

</body>
</html>

