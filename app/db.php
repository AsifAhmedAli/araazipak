<?php

$servername = "localhost";
$username = "root";
$password = "";
if($dbname != "" or $dbname != null){

}
else{
  session_start();
  $dbname = $_SESSION['dbname'];
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// echo $dbname;
// Check connection
if ($conn->connect_error) {
  // echo "<script>console.log('".$dbname."')</script>";
  die("Connection failed: " . $conn->connect_error);
}
// else{

// }
?>