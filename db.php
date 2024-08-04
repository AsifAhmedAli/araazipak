<?php
$servername = "localhost";
$username = "root";
$db_name = 'araazipak';

// Create connection
$conn1 = new mysqli($servername, $username, $password);

// Check connection
if ($conn1->connect_error) {
  die("Connection failed: " . $conn1->connect_error);
}
$seleced_db = 'araazipak';
?>
