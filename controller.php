<?php
include("db.php");
include("./email_templates/email_settings.php");
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

function select_user_with_email_php($email1, $seleced_db, $conn1){
            // echo "<script>console.log('".$email1."')</script>";
    $sql = "CALL ".$seleced_db.".select_user_with_email('$email1')";
    $result = $conn1->query($sql);
    // !$conn1 -> query($sql);
    // echo("Error description: " . $conn1 -> error);
    
    if ($result->num_rows > 0) {
      $result->close();
      $conn1->next_result();
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Duplicate Email',
                text: 'User Already Registered!',
              })
            </script>";
            return 1;
    }
    else{
      $result->close();
      $conn1->next_result();
    return 0;    
    }
    
}
function create_new_user($mail,$fullname,$pass1,$cnumber, $email1, $seleced_db, $conn1, $company){
  $random_number = generate_activation_code();
    $call = "CALL ".$seleced_db.".Add_User('$fullname','$email1','$pass1','$cnumber','$random_number', '$company')";
    if ($conn1->query($call) === TRUE) {
        // echo "<script>console.log('asdfasdf')</script>";
        try{
            $mail->setFrom('asif@mexil.it', 'test account');
            $mail->addAddress($email1);     //Add a recipient
            $mail->isHTML(true);           //Set email format to HTML
            $mail->Subject = 'Email Verification';
            require './email_templates/template1.php';
            $mail->Body    = $new_agent_registration;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
              echo "<script>Swal.fire({
                icon: 'success',
                title: 'Done...',
                text: 'You have been registered! Please verify your email',
                allowOutsideClick: false
                })
                $( 'button.swal2-confirm' ).click(function() {
                window.location.replace('./index.php');
                });
                </script>";
          
        } catch (Exception $e) {
            echo "Message could not be sent";
          }
        // echo $random_number;    

    //   }    
  }
}
function generate_activation_code(): string{
    return bin2hex(random_bytes(16));
}

function select_company($company, $seleced_db, $conn1){
         // echo "<script>console.log('".$email1."')</script>";
         $sql = "CALL ".$seleced_db.".select_company('$company')";
         $result = $conn1->query($sql);
         // !$conn1 -> query($sql);
         // echo("Error description: " . $conn1 -> error);
         
         if ($result->num_rows > 0) {
           $result->close();
           $conn1->next_result();
                 echo "<script>
                 Swal.fire({
                     icon: 'error',
                     title: 'Duplicate Company Name',
                     text: 'Company Already Registered!',
                   })
                 </script>";
                 return 1;
         }
         else{
          $result->close();
          $conn1->next_result();
         return 0;    
         }
}
if(isset($_POST['signupform1'])){
    // echo "<script>console.log('asdfasdf')</script>";
    $fullname = $_POST['fullname'];
    $email1 = $_POST['email1'];
    $pass1 = $_POST['pass1'];
    $cnumber = $_POST['cnumber'];
    $company = $_POST['companyname'];
        // echo "<script>console.log('".$fullname.$email1.$pass1.$cnumber."')</script>";
        
    $result2 = select_user_with_email_php($email1, $seleced_db, $conn1);
    if($result2 == 0){
      $result3 = select_company($company, $seleced_db, $conn1);
    }
    
        if($result2 == 0 and $result3 == 0){
            create_new_user($mail,$fullname,$pass1,$cnumber, $email1, $seleced_db, $conn1, $company);
        }
}


if(isset($_POST['loginemail'])){
    // echo "<script>alert('asdfsdf')</script>";
    $email1 = $_POST['loginemail'];
    $loginpassword = $_POST['loginpassword'];
    $result = select_user_with_email_php_for_login($email1, $seleced_db, $conn1);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $emailfromdatabase = $row['email1'];
          $passwordfromdatabase = $row['pass1'];
          $varified = $row['verified'];
        //   echo "<script>alert('".$passwordfromdatabase."')</script>";          
          if($email1 == $emailfromdatabase and $loginpassword == $passwordfromdatabase){
              if($varified == "yes"){
                session_start();
                $_SESSION['email1'] = $emailfromdatabase;
                $_SESSION['full_name'] = $row['full_name'];
                $_SESSION['employee_username'] = $emailfromdatabase;
                echo "<script>window.location.replace('index.php');</script>";
              }
              else{
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Email Not Verified',
                    text: 'Please verify your email address by clicking on the link sent to your email!',
                  })
                </script>";   
              }
          }
          else{
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Wrong Credentials',
                text: 'Incorrect Username or Password!',
              })
            </script>";
          }
        }
      }
      else{
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Wrong Credentials',
            text: 'Incorrect Username or Password!',
          })
        </script>";
      }
}



if(isset($_POST['demo_request'])){
  $fullname = $_POST['fullname'];
  $email1 = $_POST['email1'];
  $phone1 = $_POST['phone1'];
  $city1 = $_POST['city1'];

  $call = "CALL ".$seleced_db.".demo_connection('$fullname','$email1','$phone1','$city1')";
  if ($conn1->query($call) === TRUE) {
    try{
      $mail->setFrom('asif@mexil.it', 'test account');
      $mail->addAddress($email1);     //Add a recipient
      $mail->isHTML(true);           //Set email format to HTML
      $mail->Subject = 'Demo Request For AraaziPak';
      require './email_templates/template1.php';
      $mail->Body    = $demorequest;
      // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();    
  } catch (Exception $e) {
      echo "Message could not be sent";
    }
  }
}
?>