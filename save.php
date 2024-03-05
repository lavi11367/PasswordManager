<?php
session_start();
include('include/config.php');
//  Add password(database)
if (isset($_POST['save'])) {
    $name = $_POST['Names'];
    $password = base64_encode($_POST['passwords']);
    $id = $_SESSION['ID'];
    $sql = "INSERT INTO Passwords(Name ,Password ,ID_User ) VALUES('$name','$password','$id')";
    $query = $conn->query($sql);
    if ($query != "") {
        $msg = "Added successfully";
        header("Location:passwords.php?msg=" . $msg);
    } else {
        $error = "something wrong please try again! ";
        header("Location:passwords.php?error=" . $error);

    }


// to Update password(database)

    }else if(isset($_POST['Edit'])){
    $name=$_POST['name'];
    $ID=$_POST['ID'];
    $password = base64_encode($_POST['password']); 
     $sql="update  Passwords set Password='$password',Name='$name' where ID='$ID' ";
   if($conn->query($sql)==true){
    $msg="Edited   successfully";
    header("Location:passwords.php?msg=" . $msg);
    } else {
        $error="something wrong please try again! ";
        header("Location:passwords.php?error=" . $error);
    }


  // to delete  password(database)

  }else if(isset($_REQUEST['del'])&&$_REQUEST['del']!=""){
    $delid=intval($_GET['del']);
    
    $sql = "delete from Passwords  WHERE  ID='$delid'";
    if($conn->query($sql)==true){
        $msg="Passwords   deleted   successfully";
        header("Location:passwords.php?msg=" . $msg);
        } else {
            $error="something wrong please try again! ";
            header("Location:passwords.php?error=" . $error);
        }    

  // to update Date Notification(database)
    } else if(isset($_POST['Edit_Date'])){
        $Date=date("Y-m-d h:i",strtotime($_POST['Date']));        
        $ID=$_POST['ID'];
         $sql="update  Passwords set RememberDate='$Date' where ID='$ID' ";
       if($conn->query($sql)==true){
        $msg="Edited Date Notification   successfully";
        header("Location:passwords.php?msg=" . $msg);
        } else {
            $error="something wrong please try again! ";
            header("Location:passwords.php?error=" . $error);
        }
    
          // to Delete User account(database)

    }else if(isset($_REQUEST['Delete_Account'])){
        $ID=$_GET['Delete_Account'];
        $sql= "delete from Passwords  WHERE  ID_User='$ID'";
        $conn->query($sql);
        $sql= "delete from Massage_table  WHERE  ID_User='$ID'";
        $conn->query($sql);
        $sql= "delete from Notifications  WHERE  ID_User='$ID'";
        $conn->query($sql);

        $sql= "delete from User  WHERE  ID='$ID'";
        if($conn->query($sql)==true){
         session_destroy();
        $msg="Your account deleted  successfully";
        header("Location:sign-in.php?msg=" . $msg);
        } else {
            $error="something wrong please try again! ";
            header("Location:index.php?error=" . $error);
        }
    }
?>