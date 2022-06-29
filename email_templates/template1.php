

<?php  
$url = 'http://3.139.194.191/';
    //new agent email
    $new_agent_registration = '
        <body style="background-color: #eeeeee;">
        <div>
            <h3 style="text-align:center">
                Email Verification
            </h3>
            <p>
                You have been registered as an admin on Araazipak.
                Email Address: '.$email1.'
            </p>
            <p>
            Please click on the link below to verify your email.
            <br>
            Verification Code: '.$random_number.'
            <a href="'.$url.'email_templates/email_verification.php?email='.$email1.'&verification_code='.$random_number.'">Verify Email</a>
        </p>
        </div>    
        </body>';





    $disable_account = '
        <body style="background-color: #eeeeee;">
        <div>
            <h3 style="text-align:center">
                Disabled Account
            </h3>
            <p>
                Your account has been disabled. Now, you will not be able to access the system.
                Email Address: '.$email.'
            </p>
        </div>    
        </body>';

        


    $activate_account = '
        <body style="background-color: #eeeeee;">
        <div>
            <h3 style="text-align:center">
                Activated Account
            </h3>
            <p>
                Your account has been Activated. Now, you will be able to access the system.
                Email Address: '.$email.'
            </p>
        </div>    
        </body>';


        $demorequest = '
        <body style="background-color: #eeeeee;">
        <div>
            <h3 style="text-align:center">
                Demo Request for AraaziPak
            </h3>
            <p>
            <a href=""></a>
            Email Address: '.$email1.'
            PasswordL '.$email1.'
            </p>
        </div>    
        </body>';
?>
