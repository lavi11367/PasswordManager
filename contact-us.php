<?php
session_start();
require 'include/config.php';
if (isset($_POST["send"])) {   
$name = $_POST["contact-name"];
$phone = $_POST["contact-phone"];
$message =$_POST['contact-message'];
if( isset($_SESSION['ID'])){
$ID_User=$_SESSION['ID'];
$email = $_SESSION['Email'];
}else{
$ID_User=1;
$email = $_POST["contact-email"];
}

$sql="INSERT INTO Massage_table(ID_User,Name,phone ,Email,Textmassage) VALUES('$ID_User','$name','$phone','$email','$message')";
if($conn->query($sql)==true){
$msg="Your Masssage has been sent ";
}else {
$error="Something went wrong  Please try again";
}  }?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<?php include('include/link_css.php'); ?>
    <style>
        ::-webkit-scrollbar {
            display: none;
        }

    </style>
</head>
<!-- Start Header -->
<?php include('include/header.php'); ?>
<!-- End Header -->
<main class="main-wrapper">
<!-- Start Breadcrumb Area  -->
<div class="axil-breadcrumb-area">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-md-8">
<div class="inner">
<ul class="axil-breadcrumb">
<!--<li class="axil-breadcrumb-item"><a href="index.php">Home</a></li>-->
<!--<li class="separator"></li>
<li class="axil-breadcrumb-item active" aria-current="page">Contact</li>-->
</ul>
<h1 class="title">Contact Us</h1>
</div>
</div>
<div class="col-lg-6 col-md-4">
<div class="inner">
<div class="bradcrumb-thumb">
<img src="assets/images/logo/logo.png" alt="Image">
</div>
</div>
</div>
</div>
</div>
</div>
<!-- End Breadcrumb Area  -->

<!-- Start Contact Area  -->
<div class="axil-contact-page-area axil-section-gap">
<div class="container">
<div class="axil-contact-page">
<div class="row row--30">
    <div class="col-lg-8">
        <div class="contact-form">
        <?php if(isset($_GET['error'])){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($_GET['error']); ?> </div><?php }
        else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
      <br>
<h3 class="title mb--10">We would love to hear from you.</h3>
<p> Writ Your opinion here Or your problem If you’ve </p>
<form id="contact-form" method="POST" class="axil-contact-form">
<div class="row row--10">
<div class="col-lg-4">
<div class="form-group">
    <label for="contact-name">Name <span>*</span></label>
    <input type="text" name="contact-name" id="contact-name">
</div>
</div>
<div class="col-lg-4">
<div class="form-group">
    <label for="contact-phone">Phone <span>*</span></label>
    <input type="text" name="contact-phone" id="contact-phone">
</div>
</div>
<div class="col-lg-4">
<div class="form-group">
    <label for="contact-email">E-mail <span>*</span></label>
    <input type="email" name="contact-email" id="contact-email">
</div>
</div>
<div class="col-12">
<div class="form-group">
    <label for="contact-message">Your Message</label>
    <textarea name="contact-message" id="contact-message" cols="1" rows="2"></textarea>
</div>
</div>
<div class="col-12">
<div class="form-group">
<button type="submit" name="send" class="axil-btn btn-bg-primary submit-btn">Send Message</button>

</div>
</div>
</div>
</form>
</div>
</div>
    <div class="col-lg-4">
        <div class="contact-location mb--40">
            <h4 class="title mb--20">SecureKeyGuard </h4>
            <span class="address mb--20">Contact Details:</span>
            <span class="phone">Phone: +966 456 9817</span>
            <span class="email">Email: SecureKeyGuard@gmail.com</span>
        </div>
        <div class="contact-career mb--40">
            <h4 class="title mb--20">Our goal</h4>
            <p>Protect Your Digital Information and Help You Manage Your Passwords </p>
        </div>

    </div>
</div>
</div>

</div>
</div>
<!-- End Contact Area  -->
</main>

<!-- Start Footer Area  -->
<?php include('include/footer.php');   ?>
<!-- End Footer Area  -->
<!-- JS
============================================ -->
<?php include('include/jslink.php');   ?>

</body>
</html>