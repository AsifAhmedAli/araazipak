<?php
include("../db.php");
$email1 = $_GET['email'];
$verification_code = $_GET['verification_code'];
// echo $email1;
// echo $verification_code;
// function select_database_credentials_with_email_php($email1, $seleced_db, $conn1){
//     $sql = "CALL ".$seleced_db.".select_user_with_email('$email1')";
//     $result = $conn1->query($sql);
//     return $result;
// }

// echo $email1.$verification_code;

function create_database_credentials_user($email1,$dbname, $seleced_db, $conn1){
        $sql = "CALL ".$seleced_db.".add_database_credentials('$dbname','$email1')";
        $result = $conn1->query($sql);
        return $result;
}

function select_user_with_email_php_for_login($email1, $seleced_db, $conn1){
        // echo "<script>console.log('".$email1."')</script>";
        $sql = "CALL ".$seleced_db.".select_user_with_email('$email1')";
        $result = $conn1->query($sql);
        // !$conn1 -> query($sql);
        // echo("Error description: " . $conn1 -> error);
      
        if ($result->num_rows > 0) {
          return $result;
        }
      
}
function generateRandomString($length = 25) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
}
$myeruer = "SELECT user_email FROM ".$seleced_db.".database_credentials where user_email = '$email1'";
$sql = $myeruer;
$result = $conn1->query($sql);

if ($result->num_rows > 0) {
        echo "<script>window.location.replace('../index.php');</script>";   
}else{
      $result = select_user_with_email_php_for_login($email1, $seleced_db, $conn1);
      if ($result->num_rows > 0) {
          // output data of each row
          $row = $result->fetch_assoc();
          $verification_code_from_db = $row['random_number'];
          $result->close();
          $conn1->next_result();
          if($verification_code_from_db == $verification_code){
                $sql = "UPDATE ".$seleced_db.".users SET verified='yes' WHERE email1='$email1'";

                if ($conn1->query($sql) === TRUE) {
                    //usage 
                    $as = rand(5,30);
                    $dbname = generateRandomString($as);
                    $add_credentails = create_database_credentials_user($email1, $dbname, $seleced_db, $conn1);
                //     $add_credentails->close();
                //     $conn1->next_result();
                    $sql = "CREATE DATABASE $dbname";
                    if($conn1->query($sql)){
                        //     echo "<script>window.location.replace('../index.php');</script>"; 
                            echo "<script>window.location.replace('../createdbstructure.php?email=".$email1."');</script>";
                }
                //     else{
                //         echo("Error description: " . $conn1 -> error);
                //     }
                }       
          }
          else{
                echo "<script>window.location.replace('../index.php');</script>";   
          }
        }
          else{
                echo "<script>window.location.replace('../index.php');</script>";   
          }
        }
?>