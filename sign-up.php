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
        .axil-signin-area {
            min-height: 900px;
            margin-top:120px;

        }

        .axil-signin-form {
            overflow: hidden;
        }

         #signupForm {
             min-height: 1000px;
         }
        .title {
            margin-top:14px;
            margin-left: 17px;

        }
        #subtitle {
            margin-left: 17px;
            margin-top:-10px;
        }
        .signin-header {
            margin-top: -30px;

        }

.col-lg-6 offset-xl-2{
    margin-top:30px;

}
        .errorWrap{
            margin-top:-30px;
margin-left:10px;
        }
        .succWrap{
            margin-top:-30px;
            margin-left:5px;
        }
        .bg_image {
            background-image: url('assets/images/Sign_UP.png'); /* Replace with the path to image */
            background-size:20em; /* Cover the entire div without stretching */
            background-position: 100px 100px; /* Center the background image */
            height: 100%; /* Set a height, or it will be as tall as its content */
        }
    </style>
</head>
<body >
<div class="axil-signin-area " style="border:rgba(255,255,255,0.9) 15px  solid; box-shadow: 10px 2px rgba(255,255,255,0.9);">
<!-- Start Header -->
<div class="signin-header">
<div class="row align-items-center">
<div class="col-md-6">
<a href="index.php" class="site-logo"><img src="assets/images/logo/logo.png" alt="logo"></a>
</div>
<div class="col-md-6" id="col">
<div class="singin-header-btn" id="col">
<p> Already have an Account ?</p>
<a href="sign-in.php" class="axil-btn btn-bg-secondary sign-up-btn" style=" border: 1px rgb(180, 178, 178) solid;">Sign In</a><!--Sign in button on top-->
</div>
</div>
</div>
</div>
<!-- End Header -->
<div class="row"  >
<div class="col-xl-4 col-lg-6"><!--coulmn on the left-->
<div class="axil-signin-banner bg_image bg_image"><!--image on the left-->
<h3 class="title" ></h3>
</div>
</div>              <!-- (offset-xl-2) x position of form-->
<div class="col-lg-6 offset-xl-2" style="box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.2><!--coulmn on the right-->
<div class="axil-signin-form-wrap">
<div class="axil-signin-form" );">
    <h3 class="title">Welcome to SecureKeyGuard!</h3>
<p class="b2 mb--54"id="subtitle">Register your account </p>
    <!-- PHP code for displaying server-side errors or messages -->
    <?php if(isset($_GET['error'])){?><div class="errorWrap"><strong></strong><?php echo htmlentities($_GET['error']); ?> </div><?php }
    else if(isset($msg)){?><div class="succWrap"><strong></strong><?php echo htmlentities($msg); ?> </div><?php }?>
    <div id="customErrorMessage" class="errorWrap" style="color: red;"></div>
    <form id="signupForm" class="singin-form" action="sign-ckeck.php" method="post" enctype="multipart/form-data">

        <br>
        <div class="form-group">
            <label> Name</label>
            <input type="text" class="form-control" name="username" placeholder="User Name"   title="Must enter user name  ">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="Email" placeholder="SecurekeyGuard@gmail.com"   title="Must enter your Email ">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" id="pswd1" class="form-control" onclick=validateForm() placeholder="PassWord"name="PassWord"title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"   >
            <span id = "message1" style="color:red"> </span>
        </div>
        <div class="form-group">
            <label>Confirm password</label>
            <input type="password" id="pswd2" class="form-control" onclick=validateForm() name="Confirm_password" placeholder="Confirm_password" id="psw"  title="Must enter Confirm password ">
            <span id = "message2" style="color:red"> </span>

        </div>

        <div class="form-group">
            <button type="submit" name="register" class="axil-btn btn-bg-primary submit-btn"  style=" width: 150px !important;"id="register">Sign Up</button>
        </div>
    </form>


    <!-- Place to display the custom error message -->
    <script>


        document.getElementById("signupForm").addEventListener("submit", function(event){
            var username = document.forms["signupForm"]["username"].value;
            var email = document.forms["signupForm"]["Email"].value;
            var password = document.forms["signupForm"]["PassWord"].value;
            var confirmPassword = document.forms["signupForm"]["Confirm_password"].value;
            var errorMessage = document.getElementById("customErrorMessage");

            errorMessage.innerHTML = ""; // Clear previous error messages
            var isValid = true;

            // Check if all fields are empty
            if(username === "" && email === "" && password === "" && confirmPassword === ""){
                errorMessage.innerHTML = "All fields are required.<br>";
                event.preventDefault();
                return; // Stop further execution
            }   else if(email === "" && password === "" && confirmPassword === ""){
                errorMessage.innerHTML = "All fields are required.<br>";
                event.preventDefault();
                return; // Stop further execution
            }
            else if(password === "" && confirmPassword === ""){
                errorMessage.innerHTML = "All fields are required.<br>";
                event.preventDefault();
                return; // Stop further execution
            }
            else if(password === ""){
                errorMessage.innerHTML = "Fill the password field.<br>";
                event.preventDefault();
                return; // Stop further execution
            }
            else if(confirmPassword === ""){
                errorMessage.innerHTML = "All fields are required.<br>";
                event.preventDefault();
                return; // Stop further execution
            }


            // Check if username is empty
            if(username === ""){
                errorMessage.innerHTML += "Please enter your username.<br>";
                isValid = false;
            }

            // Check if email is empty
            if(email === ""){
                errorMessage.innerHTML += "Please enter your email.<br>";
                isValid = false;
            }

            // Password format validation
            var passwordFormat = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
            if(password === ""){
                errorMessage.innerHTML += "Please enter your password.<br>";
                isValid = false;
            } else if(!passwordFormat.test(password)){
                errorMessage.innerHTML += "Password must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters.<br>";
                isValid = false;
            }

            // Check if confirm password is empty and matches password
            if(confirmPassword === ""){
                errorMessage.innerHTML += "Please confirm your password.<br>";
                isValid = false;
            } else if(password !== confirmPassword){
                errorMessage.innerHTML += "Passwords do not match.<br>";
                isValid = false;
            }

            if(!isValid){
                event.preventDefault(); // Prevent form submission
            }
        });
            document.addEventListener("DOMContentLoaded", function() {
            var pw1 = document.getElementById("pswd1");
            var pw2 = document.getElementById("pswd2");

            // Function to validate form
            function validateForm() {
            if(pw1.value != pw2.value) {
            document.getElementById("message2").innerHTML = "**Passwords are not same";
            document.getElementById("message2").style.color = "red";
            $("#register").attr("disabled", "disabled");
        } else {
            document.getElementById("message2").innerHTML = "**Passwords are same";
            document.getElementById("message2").style.color = "green";
            $("#register").removeAttr("disabled");
        }
        }

            // Attach validateForm function to the 'input' event of both password fields
            pw1.addEventListener("input", validateForm);
            pw2.addEventListener("input", validateForm);
        });

    </script>

</div>
</div>
</div>
</div>
</div>


<!-- JS
============================================ -->
<?php include('include/jslink.php');   ?>

<script>


</script>
</body>

</html>