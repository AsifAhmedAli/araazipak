<?php
include("db.php");
$email1 = $_GET['email'];
function select_user_with_email_php($email1, $seleced_db, $conn1){
    // echo "<script>console.log('".$email1."')</script>";
    $sql = "CALL ".$seleced_db.".select_user_with_email('$email1')";
    $result = $conn1->query($sql);
    // !$conn1 -> query($sql);
    // echo("Error description: " . $conn1 -> error);
  
    if ($result->num_rows > 0) {
      return $result;
    }
}
$sql = "CALL ".$seleced_db.".get_database_details_for_one_user('$email1')";
$result = $conn1->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
      $row = $result->fetch_assoc();
      $db_name = $row['dbname'];
    //   echo $db_name."<br>";
    //   echo $db_pass."<br>";
//       $servername1a = "localhost";
//       $username1a = "root";
// // Create connection
// $conn11 = new mysqli($servername1a, $username1a, $db_pass, $db_name);

// // Check connection
// if ($conn11->connect_error) {
//   die("Connection failed: " . $conn11->connect_error);
// }
                    $result->close();
                    $conn1->next_result();
      $sql = "CREATE TABLE $db_name.cancelled (
        id int(11) NOT NULL,
        emplyeename varchar(100) NOT NULL,
        idofproperty varchar(100) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
      $conn1->query($sql);
      $sql = "CREATE TABLE $db_name.notification (
  id int(11) NOT NULL,
  notification_text text NOT NULL,
  by_user varchar(100) NOT NULL,
  timeanddate timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  project_name varchar(100) NOT NULL,
  is_read varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn1->query($sql);



$sql = "CREATE TABLE $db_name.projects (
  Type1 varchar(100) NOT NULL,
  Developer varchar(100) NOT NULL,
  Title varchar(100) NOT NULL,
  Enquiry_Only_Email varchar(100) NOT NULL,
  Name_Sales_Request_Recipient varchar(100) NOT NULL,
  phone_Sales_Request_Recipient varchar(100) NOT NULL,
  email_Sales_Request_Recipient varchar(100) NOT NULL,
  Websites varchar(100) NOT NULL,
  Architect varchar(100) NOT NULL,
  Levels varchar(100) NOT NULL,
  Builder varchar(100) NOT NULL,
  Expected_Completion_Date varchar(100) NOT NULL,
  Introduction text NOT NULL,
  Features text NOT NULL,
  Reservation_no varchar(100) NOT NULL,
  Street_Number varchar(100) NOT NULL,
  Street_Name varchar(100) NOT NULL,
  Suburb varchar(100) NOT NULL,
  State1 varchar(100) NOT NULL,
  Postal_Code varchar(100) NOT NULL,
  Country varchar(100) NOT NULL,
  Latitude varchar(100) NOT NULL,
  Longitude varchar(100) NOT NULL,
  Retail_Sales_Commission_percentage varchar(100) NOT NULL,
  Developer_Sales_Commission_percentage varchar(100) NOT NULL,
  Partner_Sales_Commission_percentage varchar(100) NOT NULL,
  Offshore_Commission_percentage varchar(100) NOT NULL,
  other_Offshore_Commission_percentage varchar(100) NOT NULL,
  other_Developer_Sales_Commission_percentage varchar(100) NOT NULL,
  other_Partner_Sales_Commission_percentage varchar(100) NOT NULL,
  Currency varchar(20) NOT NULL,
  id int(11) NOT NULL,
  time_added timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  status1 varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn1->query($sql);

$sql = "CREATE TABLE $db_name.project_documents (
  id int(11) NOT NULL,
  document_name varchar(100) NOT NULL,
  project_id int(11) NOT NULL,
  file_type varchar(30) NOT NULL,
  thumbnail varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn1->query($sql);


$sql = "CREATE TABLE $db_name.properties (
  id int(11) NOT NULL,
  project_id int(11) NOT NULL,
  idbyadmin varchar(30) NOT NULL,
  price varchar(30) NOT NULL,
  Beds varchar(30) NOT NULL,
  Baths varchar(30) NOT NULL,
  Cars varchar(30) NOT NULL,
  Car_lots varchar(30) NOT NULL,
  Storage_lots varchar(30) NOT NULL,
  level1 varchar(30) NOT NULL,
  aspect varchar(30) NOT NULL,
  totalarea varchar(30) NOT NULL,
  internalarea varchar(30) NOT NULL,
  externalarea varchar(30) NOT NULL,
  status1 varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn1->query($sql);


$sql = "CREATE TABLE $db_name.properties_archived (
  project_id int(11) NOT NULL,
  idbyadmin varchar(30) NOT NULL,
  price varchar(30) NOT NULL,
  Beds varchar(30) NOT NULL,
  Baths varchar(30) NOT NULL,
  Cars varchar(30) NOT NULL,
  Car_lots varchar(30) NOT NULL,
  Storage_lots varchar(30) NOT NULL,
  level1 varchar(30) NOT NULL,
  aspect varchar(30) NOT NULL,
  totalarea varchar(30) NOT NULL,
  internalarea varchar(30) NOT NULL,
  externalarea varchar(30) NOT NULL,
  status1 varchar(30) NOT NULL,
  id int(11) NOT NULL,
  id_primary int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn1->query($sql);
$sql = "CREATE TABLE $db_name.properties_details (
  id int(11) NOT NULL,
  project_id int(11) NOT NULL,
  property_id int(11) NOT NULL,
  Advertise_as varchar(50) NOT NULL,
  Match_as varchar(50) NOT NULL,
  Balcony_Size varchar(50) NOT NULL,
  Courtyard_Size varchar(50) NOT NULL,
  Study_Space varchar(50) NOT NULL,
  Ceiling_Height varchar(50) NOT NULL,
  Council_Rate varchar(50) NOT NULL,
  Water_Rate varchar(50) NOT NULL,
  Stamp_Duty varchar(50) NOT NULL,
  Owners_Corp varchar(50) NOT NULL,
  Dutiable_Value varchar(50) NOT NULL,
  Interior_Designer varchar(50) NOT NULL,
  Landscape_Architect varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn1->query($sql);

$sql = "CREATE TABLE $db_name.property_documents (
  id int(11) NOT NULL,
  document_name varchar(100) NOT NULL,
  project_id int(11) NOT NULL,
  property_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn1->query($sql);


$sql = "CREATE TABLE $db_name.property_floorplans (
  id int(11) NOT NULL,
  document_name varchar(100) NOT NULL,
  project_id int(11) NOT NULL,
  property_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn1->query($sql);


$sql = "CREATE TABLE $db_name.property_reserved_by (
  id int(11) NOT NULL,
  reserved_by varchar(100) NOT NULL,
  property_id int(5) NOT NULL,
  timeanddate timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  buyername varchar(100) NOT NULL,
  advance_paid varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn1->query($sql);

$sql = "CREATE TABLE $db_name.property_sold_by (
  id int(11) NOT NULL,
  sold_by varchar(100) NOT NULL,
  property_id int(5) NOT NULL,
  timeanddate timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  buyer_name text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn1->query($sql);

$sql = "CREATE TABLE $db_name.users (
  firstname text NOT NULL,
  email1 text NOT NULL,
  pass1 text NOT NULL,
  role1 text NOT NULL,
  id int(11) NOT NULL,
  phone varchar(20) NOT NULL,
  lastname text NOT NULL,
  timestamp timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  status varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn1->query($sql);




$sql = "ALTER TABLE $db_name.cancelled
  ADD PRIMARY KEY (id);";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.notification
  ADD PRIMARY KEY (id);";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.projects
  ADD PRIMARY KEY (id);";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.project_documents
  ADD PRIMARY KEY (id);";
$conn1->query($sql);
$sql = "ALTER TABLE $db_name.properties
  ADD PRIMARY KEY (id);";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.properties_archived
  ADD PRIMARY KEY (id_primary);";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.properties_details
  ADD PRIMARY KEY (id);";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.property_documents
  ADD PRIMARY KEY (id);";
$conn1->query($sql);
$sql = "ALTER TABLE $db_name.property_floorplans
  ADD PRIMARY KEY (id);";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.property_reserved_by
  ADD PRIMARY KEY (id);";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.property_sold_by
  ADD PRIMARY KEY (id);";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.users
  ADD PRIMARY KEY (id);";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.cancelled
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.notification
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.projects
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.project_documents
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.properties
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.properties_archived
  MODIFY id_primary int(11) NOT NULL AUTO_INCREMENT;";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.properties_details
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.property_documents
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.property_floorplans
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.property_reserved_by
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.property_sold_by
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;";
$conn1->query($sql);

$sql = "ALTER TABLE $db_name.users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;";
        $conn1->query($sql);
                            // echo "<script>window.location.replace('index.php');</script>";
        // echo("Error description: " . $conn1 -> error);
$result = select_user_with_email_php($email1,$seleced_db, $conn1);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $full_name = $row['full_name'];
        $contact_number = $row['contact_number'];
        $pass = $row['pass1'];
    }
  }
  $result->close();
    $conn1->next_result();
$sql = "INSERT INTO $db_name.users(firstname, email1, pass1, role1, phone, lastname, status) VALUES ('$full_name','$email1','$pass','admin','$contact_number','','active')";

if ($conn1->query($sql) === TRUE) {
    echo "<script>window.location.replace('index.php');</script>";
}
echo("Error description: " . $conn1 -> error);
}
?>