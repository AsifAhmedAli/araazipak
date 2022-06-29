<?php

$companyselect = $_POST['companyselect'];
$agentloginpass = $_POST['agentloginpass'];
$agentloginemail = $_POST['agentloginemail'];

include("../db.php");
// echo "<script>alert('".$username.$password."');</script>";
$sql = "CALL ".$seleced_db.".select_db_using_company('$companyselect')";
$result = $conn1->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $dbname = $row['dbname'];
  }
}
// echo "<script>console.log('".$password."')</script>";
// echo "<script>console.log('".$username."')</script>";
include("db.php");
$sql = "SELECT * FROM users where email1 = '$agentloginemail' and pass1 = '$agentloginpass' and role1 = 'agent' and status = 'active'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  session_start();
  $_SESSION['employee_username1'] = $agentloginemail;
  $_SESSION['firstname1'] = $row['firstname'];
  $_SESSION['role2'] = $row['role1'];
  $_SESSION['dbname'] = $dbname;
  // $_SESSION['employee_password'] = $password;
  // echo "<script>alert('".$username."');</script>";
  echo "<script>window.location.replace('index.php');</script>";
} else {
  echo "<script>
  Swal.fire(
  'Error',
  'Username or Password is wrong!',
  'error'
)</script>";
}
// echo "<script>alert('".$username.$password."')</script>";

?>