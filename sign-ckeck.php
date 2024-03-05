
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;  
require 'include/config.php';
//for sign up
if (isset($_POST["register"])) {
    $name = $_POST["username"];
    $email = $_POST["Email"];
    // $password = md5();
    $password = password_hash(hash('sha512', $_POST['PassWord']), PASSWORD_DEFAULT);
    $States = 1;

    // Sanitize email
    $email = mysqli_real_escape_string($conn, $email);

    // Check if email already exists in the database
    $check_email = "SELECT Email FROM User WHERE Email = '$email' LIMIT 1";
    $check_email_run = $conn->query($check_email);
    /*check if email exist on the database*/
    if (mysqli_num_rows($check_email_run) > 0) {
        $error = "The Email Exists Already";
        header("Location:sign-up.php?error=" . urlencode($error));
        exit();
    } else {
        //Instantiation and passing `true` enables exceptions
        // PHPMailer for sending verification email
        $mail = new PHPMailer(true);
        try {
            // SMTP configuration
            //Send using SMTP
            $mail->isSMTP();
            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';
            //Enable SMTP authentication
            $mail->SMTPAuth = true;
            //SMTP username
            $mail->Username = 'Securekeyguard@gmail.com';
            //SMTP password
            $mail->Password = 'ipva kthd fnpf fnyf';
            //Enable TLS encryption;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('Securekeyguard@gmail.com');
            //Add a recipient
            $mail->addAddress($email);

            // Content
            //Set email format to HTML
            $mail->isHTML(true);
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            //subject of th email
            $mail->Subject = 'Email Verification';
            //the content of the email
            $mail->Body    = "<p>Your verification code is: <b style='font-size: 30px;'>$verification_code</b></p>";

            $mail->send(); // echo 'Message has been sent';


            // Insert user data into the database
            $sql = "INSERT INTO User (UserName, Passwords, Email, States, verification_code) VALUES ('$name', '$password', '$email', '$States', '$verification_code')";
            if ($conn->query($sql)) {
                header("Location: verify_email.php?email=" . urlencode($email));
                exit();
            } else {
                $error = "Something went wrong. Please try again";
                echo $error;
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

 // verify  email.......................................................................
if (isset($_POST["verify_email"])) {
    $email = $_POST["email"];
    $verification_code = $_POST["verification_code"];

    // Check for empty fields
    if (empty($email) && empty($verification_code)) {
        $error = "Please fill all fields!";
        header("Location:verify_email.php?error=" . urlencode($error));
        exit();
    } elseif (empty($email)) {
        $error = "Please enter your email!";
        header("Location:verify_email.php?error=" . urlencode($error));
        exit();
    } elseif (empty($verification_code)) {
        $error = "Please enter the verification code";
        header("Location:verify_email.php?error=" . urlencode($error));
        exit();
    }

    // Prevent SQL Injection
    $email = mysqli_real_escape_string($conn, $email);
    $verification_code = mysqli_real_escape_string($conn, $verification_code);

    // Query to check the email and verification code
    $check_email = "SELECT * FROM User WHERE verification_code = '$verification_code' AND Email = '$email'";
    $check_email_run = $conn->query($check_email);

    if ($check_email_run) {
        if (mysqli_num_rows($check_email_run) > 0) {
            // Email and code verified
            session_start();
            while ($result = $check_email_run->fetch_assoc()) {
                $_SESSION['alogin'] = $result['UserName'];
                $_SESSION['ID'] = $result['ID'];
                $_SESSION['Email'] = $result['Email'];
            }
            $msg = "Account Verified Successfully!";
            header("Location:index.php?msg=" . urlencode($msg));
            exit();
        } else {
            // No user found with the given email or verification code is incorrect
            $error = "Invalid email or verification code!";
            header("Location:verify_email.php?email=" . urlencode($email) . "&error=" . urlencode($error));
            exit();
        }
    } else {
        // Query failed to execute
        $error = "An error occurred. Please try again later.";
        header("Location:verify_email.php?error=" . urlencode($error));
        exit();
    }
}



//for sign in *********************************************************

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
     if(empty($email) && empty($password)) {
         $error = "Please fill all fields!";
     } elseif(empty($email)) {
         $error = "Please enter your email!";
     } elseif(empty($password)) {
         $error = "Please enter your password!";
     }

     if(!empty($error)) {
         header("Location: sign-in.php?error=" . urlencode($error));
         exit();
     }
    $sql= "SELECT * FRom User WHERE Email='$email' LIMIT   1 ";

    $query= $conn->query($sql);
     if($query->num_rows == 0){
         // No user found with the given email
         $error = "Your email is not registered!";
         header("Location: sign-in.php?error=" . urlencode($error));

     }

     if($query->num_rows > 0)
    {
    while($result=$query->fetch_assoc() )
    {
    if(password_verify(hash('sha512', $_POST['password']),$result['Passwords'])){
               $mail = new PHPMailer(true);
               $mail->SMTPAuth = true;
            try {
                //Enable verbose debug output
                $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

                //Send using SMTP
                $mail->isSMTP();

                //Set the SMTP server to send through
                $mail->Host = 'smtp.gmail.com';

                //Enable SMTP authentication

                //SMTP username
                $mail->Username = 'Securekeyguard@gmail.com';

                //SMTP password
                $mail->Password = 'ipva kthd fnpf fnyf';
                //Enable TLS encryption;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                $mail->Port = 587;
                //Recipients
                $mail->setFrom('Securekeyguard@gmail.com');
                //Add a recipient
                $mail->addAddress($email);

                //Set email format to HTML
                $mail->isHTML(true);

                $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

                $mail->Subject = 'Email verification';
                $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
                $mail->send();

                $sql="update  User set verification_code='$verification_code' where Email='$email' ";
               if($conn->query($sql)==true){
                header("Location:verify_email.php?email=" . $email);
                exit();
               }

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
      //echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    } else{
        $error=" Password not correct  please try agian !";
        header("Location:sign-in.php?email={$_POST['email']}&error={$error}   ");
        exit();
    }}

  } else{
    $error=" Something wrong please try agian !";
    header("Location:sign-in.php?email={$_POST['email']}&error={$error}   ");
    exit(); }
 }

     //for forgot password *********************************************************

    if (isset($_POST["forgotpassword"]))
    {
        $email = $_POST["email"];
        // check if credentials are okay, and email is verified
        $sql= "SELECT * FRom User WHERE Email='$email' LIMIT   1 ";
        $query= $conn->query($sql);
        if($query->num_rows > 0)
        {  
                   $mail = new PHPMailer(true);
                   $mail->SMTPAuth = true;
                try {
                    //Enable verbose debug output
                    $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
         
                    //Send using SMTP
                    $mail->isSMTP();
         
                    //Set the SMTP server to send through
                    $mail->Host = 'smtp.gmail.com';
         
                    //Enable SMTP authentication
         
                    //SMTP username
                    $mail->Username = ' Securekeyguard@gmail.com';
         
                    //SMTP password
                    $mail->Password = 'ipva kthd fnpf fnyf'; 
                    //Enable TLS encryption;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                    $mail->Port = 587;
                    //Recipients
                    $mail->setFrom(' Securekeyguard@gmail.com');
                    //Add a recipient
                    $mail->addAddress($email);
         
                    //Set email format to HTML
                    $mail->isHTML(true);
         
                    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
         
                    $mail->Subject = 'Email verification';
                    $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';   
                    $mail->send();
               
                    $sql="update  User set verification_code='$verification_code' where Email='$email' ";
                   if($conn->query($sql)==true){
                    header("Location:verify_email.php?email=" . $email);
                    exit(); 
                   } 
        
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
          //echo "<script type='text/javascript'> document.location ='index.php'; </script>";
        } else{
            $error=" Something wrong please try agian !";
            header("Location:forgot-password.php?email={$_POST['email']}&error={$error}   ");
            exit(); 
             }
    }

?>

