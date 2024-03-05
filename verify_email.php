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
        ::-webkit-scrollbar {
            display: none;
        }
        .axil-signin-form{
        }


.axil-signin-area{
    margin:40px;
    height:600px;
    width:auto;
}
#photo{
    margin-top:-130px;
    margin-left:20px;
}
        .signin-header{
         margin-top:-20px;
            padding:-20px;
            position: absolute;

        }
        .axil-signin-form{
            margin-top:70px;

        }
        .axil-signin-area{
            margin:40px;
            height:600px;
            width:auto;
        }
        .bg_image {
            background-image: url('assets/images/forgot.svg'); /* Replace with the path to image */
            background-size:20em; /* Cover the entire div without stretching */
            background-position: 30px 300px; /* Center the background image */
            height: 100%; /* Set a height, or it will be as tall as its content */
        }

    </style>
</head>
<body>
<!--border style for validate-->
<div class="axil-signin-area"  style="border-radius: 20px;
            font-size: 18px;
            border-radius: 18px;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, .4);


"
>

<!-- Start Header -->
<div class="signin-header" >
<div class="row align-items-center">
<div class="col-xl-4 col-sm-6">
<a href="index.php" class="site-logo"><img src="assets/images/logo/logo.png" alt="logo"></a>
</div>
<div class="col-md-2 d-lg-block d-none">
<a href="forgot-password.php" class="back-btn"><i class="far fa-angle-left"></i></a>
</div>
<div class="col-xl-6 col-lg-4 col-sm-6">
<div class="singin-header-btn">
<p>Already a member? <a class="axil-btn btn-sm-secondary " style=" border: 1px rgb(180, 178, 178) solid;"  href="sign-in.php" class="sign-in-btn">Sign In</a></p>
</div>
</div>
</div>
</div>
<!-- End Header -->

<div class="row">
<div class="col-xl-4 col-lg-6">
<div class="axil-signin-banner bg_image bg_image--10" id="photo">
<h2 class="title"></h2>
</div>
</div>
<div class="col-lg-6 offset-xl-2">
<div class="axil-signin-form-wrap">
<div class="axil-signin-form">
<h3 class="title mb--35">Validate Your Account</h3>
<p class="b2 mb--55">The Verification Code will be sent to your mailbox Please Check it .</p>
<?php if(isset($_GET['error'])){?><div class="errorWrap"><strong></strong><?php echo htmlentities($_GET['error']); ?> </div><?php }
else if(isset($msg)){?><div class="succWrap"><strong></strong><?php echo htmlentities($msg); ?> </div><?php }?>

<form class="singin-form" action="sign-ckeck.php" method="post">
<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" name="email" value="<?php if(isset($_GET['email'])) echo $_GET['email'];?>"   title="Must enter Email" >

</div>

<div class="form-group">
<label>Verification Code</label>
<input type="text" class="form-control" name="verification_code"  title="Must enter verification code">
</div>
<div class="form-group">
<button type="submit" name="verify_email" class="axil-btn btn-bg-primary submit-btn">Login</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- JS
============================================ -->
<?php include('include/jslink.php');   ?> 

</body>

</html>