<!doctype html>
<html class="no-js" lang="en">
<head>
    <style>
        .signin-header{
            margin-top:20px;
            margin-left:15px;
            margin-right:15px;
        }
        .axil-signin-area{
            height:600px;
            width:auto;
        }
        .signin-header{

        }
        .axil-signin-form{
            margin-top: 70px;
        }
        .bg_image {
            background-image: url('assets/images/login_image.svg'); /* Replace with the path to image */
            background-size:20em; /* Cover the entire div without stretching */
            background-position: inherit; /* Center the background image */
            height: 100%; /* Set a height, or it will be as tall as its content */
        }
    </style>
</head>
<?php include('include/link_css.php'); ?>   
<body>
<div class="axil-signin-area" style="border-radius: 20px;
            font-size: 18px;
            border-radius: 18px;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, .4);">

<!-- Start Header -->
<div class="signin-header">
<div class="row align-items-center">
<div class="col-xl-4 col-sm-6">
<a href="index.php" class="site-logo"><img src="assets/images/logo/logo.png" alt="logo"></a>
</div>
<div class="col-md-2 d-lg-block d-none">
<a href="sign-in.php" class="back-btn"><i class="far fa-angle-left"></i></a>
</div>
<div class="col-xl-6 col-lg-4 col-sm-6">
<div class="singin-header-btn">
<p>Already a member?</p>
<a href="sign-in.php"  style=" border: 1px rgb(180, 178, 178) solid;"class="sign-up-btn axil-btn btn-bg-secondary">Sign In</a>
</div>
</div>
</div>
</div>
<!-- End Header -->

<div class="row">
<div class="col-xl-4 col-lg-6">
<div class="axil-signin-banner bg_image bg_image">
<h3 class="title"></h3>
</div>
</div>
<div class="col-lg-6 offset-xl-2">
<div class="axil-signin-form-wrap">
<div class="axil-signin-form">
<h3 class="title">Forgot Password?</h3>
<?php if(isset($_GET['error'])){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($_GET['error']); ?> </div><?php }
else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<p class="b2 mb--55">Enter the email address you used when you joined and we’ll send you instructions to reset your password.</p>
<form class="singin-form " method="post" action="sign-ckeck.php">
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="annie@example.com" value="<?php if(isset($_GET['email'])) echo $_GET['email'];?>">
    </div>
    <div class="form-group">
        <button type="submit" name="forgotpassword" class="axil-btn btn-bg-primary submit-btn">Send  </button>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- Main JS -->
<script src="assets/js/main.js"></script>
</body>
</html>