
<html>
<head><title><?php 
error_reporting(0);

session_start();

$firstname= $_SESSION['firstname'];
$username= $_SESSION['username'];



$table_name= ($username.'_reminder');

echo($firstname. " reminders");


?>
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



<div class="container">
<div class="row">
  <div class="col-xs-6">
<h1>Reminder.MyPrabandhak.com </h1>


</div>
  <div class="col-xs-6">

<?php

echo("<br/><a href='logout.php?username=".$username."' class='btn btn-danger'>log out </a><br/>");

?>
</div> </div> </div>



<h1><?php

echo("welcom ". $firstname."<br/>");


 ?> </h1>

<div class="container">

<form method='POST'>

<div class="container">
<div class="row">
  <div class="col-xs-6">

Unique Number of your Task
</div>

  <div class="col-xs-6">

<input type='number' name='id' ></input><br/>
</div> </div> 

<div class="row">
  <div class="col-xs-4">
<input type='text' name='thetask'> name of task </input><br/>
name of task 
</div>

  <div class="col-xs-8">

<input type='text' name='about' value=''>  task </input><br/>
about your task 
</div> </div>


<div class="row">
  <div class="col-xs-2">

<input name='year' type='number'>year</input>
</div>
  <div class="col-xs-2">

<input name='month' type='number'>month</input>
</div>
  <div class="col-xs-2">

<input type='number' name='date'>date</input>
</div>
  <div class="col-xs-2">

<input type='number' name='hour'>hour</input>
</div>
  <div class="col-xs-2">

<input type='number' name='minute'>minute</input>
</div>
  <div class="col-xs-2">

<input type='number' name='second'>second</input>
</div> </div>
<div class="row">
  <div class="col-xs-12">
<center>

<input type='submit' value='show' name='submit'></input>
</center> </div> </div> </div> 

</form>
</div>

<?php


include "db.php";
error_reporting(0);


if(isset($_POST['submit'])){
$id= $_POST['id'];

$thetask= $_POST['thetask'];
$about= $_POST['about'];
$year= $_POST['year'];
$month= $_POST['month'];
$date= $_POST['date'];
$hour= $_POST['hour'];
$minute= $_POST['minute'];
$second= $_POST['second'];


$ins= "INSERT INTO $table_name (id, task_name, about, year, month, date, hour, minute, second) VALUES('$id', '$thetask', '$about', '$year', '$month', '$date', '$hour', '$minute', '$second')";

mysqli_query($conn, $ins);


}


$sql = "SELECT * FROM $table_name";


$del= "DELETE FROM $table_name WHERE id= 0";

mysqli_query($conn, $del);


if($result = mysqli_query($conn, $sql)){

if(mysqli_num_rows($result) > 0){

echo "<table>";

echo "<tr>";
echo "<th>Number</th>";

echo "<th>Memory </th>";

echo "<th> About </th>";
echo "<th>Memory date</th>";
echo "<th>Submit date</th>";

echo "</tr>";


while($row = mysqli_fetch_array($result)){

$idnum = $row['id'];
$year = $row['year'];
$mon = $row['month'];
$date = $row['date'];
$hour = $row['hour'];
$min = $row['minute'];
$sec = $row['second'];

echo "<tr>";

echo "<td>" . $idnum. "</td>";

echo "<td>" . $row['task_name'] . "</td>";

echo "<td>" . $row['about'] . "</td>";

echo "<td>" .$year."/".$mon."/".$date." ".$hour.":".$min.":".$sec."</td>";
echo "<td>" . $row['registor'] . "</td>";



echo "</tr>";

}
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    
} else{
        echo "No records matching your query were found.";
    }
} else{
    
        die();
    
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}



?>

</body>
</html>
