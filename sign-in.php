<!doctype html>
<html class="no-js" lang="en">
<head>
<?php include('include/link_css.php'); ?>
    <style>
        *{
            -webkit-user-select: none; /* Safari */
            -moz-user-select: none; /* Firefox */
            -ms-user-select: none; /* IE10+/Edge */
            user-select: none; /* Standard syntax */

        }

        .signin-header{
            margin-top:20px;
            margin-left:15px;
            margin-right:15px;
        }
        .axil-signin-form{
            margin-top: 70px;
        }
        lable{

            background-color: transparent;
        }
        .axil-signin-area{
            margin:40px;
            height:600px;
            width:auto;
        }
        .bg_image {
            background-image: url('assets/images/login_image.svg'); /* Replace with the path to image */
            background-size:25em; /* Cover the entire div without stretching */
            background-position: -1px 100px; /* Center the background image */
            height: 100%; /* Set a height, or it will be as tall as its content */
        }

    </style>
</head>
<body>
<div class="axil-signin-area"  style="border-radius: 20px;
            font-size: 18px;
            border-radius: 18px;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, .4);


"
>
    <!-- Start Header -->
<div class="signin-header">
<div class="row align-items-center">
<div class="col-sm-4">
<a href="index.php" class="site-logo"><img src="assets/images/logo/logo.png" alt="logo"></a>
</div>
<div class="col-sm-8">
<div class="singin-header-btn">
<p>Don't you have an account ?</p>
<a href="sign-up.php" style=" border: 1px rgb(180, 178, 178) solid;" class="axil-btn   sign-up-btn">Sign Up Now</a><!--Sign up button on top-->
</div>
</div>
</div>
</div>
<!-- End Header -->

<div class="row">
<div class="col-xl-4 col-lg-6">
<div class="axil-signin-banner bg_image bg_image" ><!--image on the left-->

    <h3 class="title"></h3>
</div>
</div>
<div class="col-lg-6 offset-xl-2">
<div class="axil-signin-form-wrap">
<div class="axil-signin-form">
<h3 class="title">Welcome Back </h3>
<p class="b2 mb--55">Enter your details below</p>
<?php if(isset($_GET['error'])){?><div class="errorWrap"><strong></strong><?php echo htmlentities($_GET['error']); ?> </div><?php }
else if(isset($_GET['msg'])){?><div class="succWrap"><strong></strong><?php echo htmlentities($_GET['msg']); ?> </div><?php }?>
<form class="singin-form" method="post" action="sign-ckeck.php">
<div class="form-group">
<label style="height:3px;">Your Email</label>
<input type="Email" class="form-control" name="email" placeholder="annie@example.com" id="email"  onkeyup="validateForm1()" title="Must enter Your Email">
</div>
<div class="form-group">
<label>Password</label>
<input type="password" class="form-control" name="password" placeholder="PassWord" onkeyup="validateForm1()" id="pswd1"  title="Must enter Your Password">
</div>

<div class="form-group d-flex align-items-center justify-content-between">
<button type="submit" name="login" class="axil-btn btn-bg-primary submit-btn">Sign In</button>
<a href="forgot-password.php" class="forgot-btn">Forgot password?</a>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<!-- JS
============================================ -->
<!-- Modernizer JS -->
<?php include('include/jslink.php');   ?>

</body>
</html>