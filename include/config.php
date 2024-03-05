<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;  
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
// create connection 

$server="localhost";
$root="root";
$password="";
$dbname="SecureKeyGuard";
$conn= new mysqli($server,$root,$password);
$sql = "CREATE DATABASE  if NOT EXISTS SecureKeyGuard";
if($conn->query($sql)==True){
    $conn= new mysqli($server,$root,$password,$dbname);
 $sql="CREATE TABLE if NOT EXISTS User (
        ID int(11) NOT NULL AUTO_INCREMENT ,
        UserName varchar(100) NOT NULL,
        Passwords varchar(100) NOT NULL,
        Email varchar(150) NOT NULL  ,
        States int(2) Not NULL,
        verification_code varchar(50) DEFAULT NULL ,
        CreationDate timestamp NULL DEFAULT current_timestamp(),
        UpdationDate timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
        PRIMARY KEY (ID)
     
      )" ;
      $conn->query($sql);
      
  $sql="CREATE TABLE if NOT EXISTS Passwords (
     ID int(11) NOT NULL AUTO_INCREMENT  PRIMARY KEY,
     Name       varchar(120) NOT NULL,
     Password   varchar(200) NOT NULL,
     ID_User    int(11)  NOT NULL,
     CreationDate timestamp NULL DEFAULT current_timestamp(),
     UpdationDate timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
     RememberDate timestamp NULL DEFAULT NULL ,

     FOREIGN KEY (ID_User) REFERENCES User(ID)
             )";
    $conn->query($sql);

    $sql="CREATE TABLE if NOT EXISTS Massage_table (
        id int(11) NOT NULL AUTO_INCREMENT  PRIMARY KEY,
        ID_User    int(11)  NOT NULL,
        Name       varchar(120) NOT NULL,
        phone      varchar(20) NOT NULL,
        Textmassage varchar(500) NOT NULL,
        Email  varchar(100) NOT NULL,
        RegDate timestamp NOT NULL DEFAULT current_timestamp(),
        FOREIGN KEY (ID_User) REFERENCES User(ID)
      )";
       $conn->query($sql);
    $sql="CREATE TABLE if NOT EXISTS Notifications (
      ID int(11) NOT NULL AUTO_INCREMENT  PRIMARY KEY,
      Name   varchar(50) NOT NULL,
      ID_User    int(11)  NOT NULL,
      CreationDate timestamp NULL DEFAULT current_timestamp(),
      Notification_Date timestamp NULL DEFAULT NULL,
      FOREIGN KEY (ID_User) REFERENCES User(ID)
    )";
     $conn->query($sql);        
   
     $sql="select  ID, UserName From User where id=1 and UserName='admin'";
     $result= $conn->query($sql);
      if($result->num_rows>0){
       echo"";
      }else{
          /*  $sql="INSERT INTO User(UserName,Passwords,Email,States,verification_code)
      VALUES ('admin','1127c22eed46c2ab7b927505e6729f82','alhomaidim8@gmail.com	','1','12345')";*/
       $conn->query($sql);
       echo"";   }
    }
 

    $sql = "SELECT * from Passwords where RememberDate != ''   ";
    $query= $conn->query($sql);
    if($query->num_rows > 0){
    while($result=$query->fetch_assoc() ){
      $date1=date("Y-m-d h:i");
      if($result['RememberDate']!='' &&$result['RememberDate']!= '0000-00-00 00:00:00'){
        $date2=date("Y-m-d h:i",strtotime($result['RememberDate'])); 
      }
   if(isset($date2)&& $date2<=$date1){
         $mail = new PHPMailer(true);
        $mail->SMTPAuth = true;
     try {
         $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
         $mail->isSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->Username = ' Securekeyguard@gmail.com';
         $mail->Password = 'ipva kthd fnpf fnyf'; 
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
         $mail->Port = 587;
         $mail->setFrom(' Securekeyguard@gmail.com');
            //Add a recipient
            $id= $result['ID_User'];
            $date=$result['RememberDate'];
            $sql = "SELECT Email  from User where ID='$id'  LIMIT   1 ";
             $query1= $conn->query($sql);
            while($result1=$query1->fetch_assoc() ){
              $email= $result1['Email'] ; 
              $mail->addAddress($email);
            //Set email format to HTML
            $mail->isHTML(true);
            $massage  = $result['Name'];
            
            $sql="INSERT INTO Notifications(Name,ID_User,Notification_Date) VALUES ('$massage','$id','$date')";
             $conn->query($sql);
            $sql="update  Passwords set RememberDate=Null where Name='$massage' and ID_User='$id' ";
            $conn->query($sql);
            $mail->Subject = 'Update password';
            $mail->Body    = '<p>Reminder To Update Your Password : <b style="font-size: 25px;">' . $massage . '</b></p>';
            $mail->send();}
  

} catch (Exception $e) {
 echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
      } }}
    



    