<?php
$servername = "localhost";
$username = "root";
<<<<<<< HEAD
$password = "jaan3038611";
=======
$password = "";
>>>>>>> e0de672d796c331b870ce90fe8f00d1956961781
$db_name = 'araazipak';

// Create connection
$conn1 = new mysqli($servername, $username, $password);

// Check connection
if ($conn1->connect_error) {
  die("Connection failed: " . $conn1->connect_error);
}
$seleced_db = 'araazipak';
?>