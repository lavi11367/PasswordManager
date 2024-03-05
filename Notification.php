<?php

include('include/config.php');
session_start();
if(strlen($_SESSION['alogin'])==0){	
header('location:sign-in.php');
}else{
if(isset($_REQUEST['del'])&&$_REQUEST['del']!=""){
$delid=intval($_GET['del']);
$sql = "delete from Notifications  WHERE  ID='$delid'";
if($conn->query($sql)==true){
$msg="Password deleted successfully";
} else {
$error="something wrong please try again! ";
} }

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<?php include('include/link_css.php'); ?>
<style>
::-webkit-scrollbar {
display: none;
}
*{
-webkit-user-select: none; /* Safari */
-moz-user-select: none; /* Firefox */
-ms-user-select: none; /* IE10+/Edge */
user-select: none; /* Standard syntax */

}
.main-wrapper{
min-height: 900px; /* Adjust this value as needed */

}

</style>
</head>
<!-- Start Header -->
<?php include('include/header.php'); ?>
<!-- End Header -->

<main class="main-wrapper">

<!-- Start Wishlist Area  -->
<div class="axil-wishlist-area axil-section-gap">
<div class="container">
<div class="product-table-heading">
<h4 class="title">My Notifications</h4>
</div>
<div class="table-responsive">
<table class="table axil-product-table axil-wishlist-table">
<thead>
<tr>
<th scope="col" class="product-title">Number</th>
<th scope="col" class="product-title">Notification Name</th>
<th scope="col" class="product-title">Date Notification </th>
<th scope="col" class="product-remove"></th>

</tr>
</thead>
<tbody>
<?php $id= $_SESSION['ID'];
$sql = "SELECT * from Notifications where ID_User='$id'";
$query= $conn->query($sql);
if($query->num_rows > 0){
while($result=$query->fetch_assoc() )
{?>
<tr>

<td class="product-title"><a href="passwords.php"><?php echo $result['ID'] ;?></td>
<td class="product-title"><a href="passwords.php"><?php echo $result['Name'] ;?></td>
<td class="product-title"><?php echo $result['Notification_Date'] ;?></td>
<td class="product-remove"><a href="Notification.php?del=<?php echo $result['ID'];?>" class="remove-wishlist"><i class="fal fa-times"></i></a></td>
</tr>	<?php  }} ?>

</tbody>
</table>
</div>
</div>
</div>
<!-- End Wishlist Area  -->
</main>

<!-- JS
============================================ -->
<?php include('include/jslink.php');   ?>

</body>
</html>
<?php } ?>