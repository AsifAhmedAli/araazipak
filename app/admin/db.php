<?php
session_start();
include("../../db.php");
$asdfaga = $_SESSION['employee_username'];
// echo $asdfaga;
$sql = "SELECT * FROM $seleced_db.database_credentials where user_email = '$asdfaga'";
$result = $conn1->query($sql);
// echo("Error description: " . $conn1 -> error);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $dbnamesecond = $row['dbname'];
  }
}
// $dbname = "araazipak";
// echo $dbnamesecond;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbnamesecond);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>