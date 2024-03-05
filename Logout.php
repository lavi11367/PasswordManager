<?php
session_start(); 
require 'include/config.php';
$ID=$_SESSION['ID'];
$email =$_SESSION['Email'];
$verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

$sql="update  User set verification_code='$verification_code' where Email='$email' and ID='$ID' ";
if($conn->query($sql)==true){
session_destroy(); // destroy session
header("location:index.php");
   }

?>





