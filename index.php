<?php
session_start();
include('include/config.php');
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
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
        .slider-box-wrap{
        max-width: 100%;
        position: absolute;
        max-height:50em;

        }
        /*height of slide show*/
        .main-slider-thumb{
            height:130px;
            margin-top: -100px;
            width:300px;
        }
        .resizeimg{
            width:300px;
height:300px;
            position: relative;
        }
        h1{
            font-family: Verdana;
        }
        .bbtn{
        background-color:white;
        border-radius: 30px;
        padding:9px;
        width:170px;
        text-align: center;
        position: relative;
       top:-30px;
        }
        .title{
            font-family:Verdana;
            color: #ffffff;
        }
/*#sub{
    color:white;

}*/

        /*#slide2text{
            font-size:40px;
            margin-left:-15px;
            align-items: center;
        }*/

        .axil-btn btn-bg-white{
            color:white;
            background-color: #0a0909;
        }
        input{
            text-indent: 20px; /* Moves the first line of text in the field */
            caret-color: gray;
        }
        input::selection {
            background: rgba(192, 192, 243, 0.9); /* Your desired highlight color */
            color: white; /* Optional: change the color of the text during selection */

        }

        input[type=text]:hover{
            box-shadow: 0 0 5pt 0.5pt #ffffff;
        }
        input[type=text]:focus {
            box-shadow: 0 0 5pt 2pt #ffffff;
            outline-width: 0;
        }

        input[type=text], select {
            width: 80%;
            height: 20px; /* Smaller height */
            padding: 2px 5px;
            font-size: 12px; /* Smaller font size */
            margin: 3px 0;
            display: inline-block;
            border-radius: 15px;
            box-sizing: border-box;
            border: solid 1.5px #fff;
            -webkit-transition: 1s; /* Safari */
            transition: 1s;
            position: relative;


        }
        /*button css*/
        .button-1 {
            background-color: rgba(75, 75, 179, 0.9);
            border-radius: 30px;
            border-style: none;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            font-weight: 600;
            height: 50px;
            width:150px;
            line-height: 20px;
            list-style: none;
            margin: 0;
            outline: none;
            padding: 10px 16px;
            position: relative;
            text-align: center;
            text-decoration: none;
            transition: color 100ms;
            vertical-align: baseline;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            left:0.1%;
            top:10px;

        }

        .button-1:hover,
        .button-1:focus {
            background-color: rgba(94, 94, 220, 0.9);

        }
        #predictionResult{
            position: relative;
            left: -1%;
            top:15px;
            color: rgba(39, 39, 115, 0.9);
            font-weight: bold;
            font-family: Calibri;
        }

        .title1{
         margin-top:
        }
/*#m{
    height: 150px;
    width: 150px;

}*/


   #s{
       color:white;
   }
</style>
<!-- Bootstrap Datatables  -->
<link rel="stylesheet" href="assets/css/vendor/bootstrap.minn.css">
<?php include('include/link_css.php'); ?>
</head>
<body  class="sticky-header">

<a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
<!-- Start Header -->
<?php include('include/header.php'); ?>

<!-- End Header -->

<main class="main-wrapper">

<!-- Start Slider Area -->
<div class="axil-main-slider-area main-slider-style-5">
<div class="container">
<div class="slider-box-wrap">
<div class="slider-activation-two axil-slick-dots">
<div class="single-slide slick-slide">
<div class="main-slider-content">

<h1 class="title" style="font-family: 'Verdana';color:white;">Password Manager</h1>
<span class="subtitle" style="font-family:'Verdana';color:white; "> Keep Your Password Safe</span>

        <?php if( !isset($_SESSION['alogin'])){?>
    <div class="bbtn">

    <a href="sign-up.php" tabindex="0" style="font-family:'Verdana pro';font-weight:700;"> Sign Up Now </a>
    </div>

<?php }?>
</div>
<div class="main-slider-thumb">
    <!--slide1 photo-->
<img  src="assets/images/homeicon.svg" alt="Home Icon" class="resizeimg">
</div>
</div>

<div class="single-slide slick-slide">
<div class="main-slider-content" style="position: relative; text-align: center;">




    <!--slide2--><!--AI form and Code-->
<h1 class="title" style="font-size: 2em; position: relative;
            text-align: center; margin-top:2.15%;left:5%;" >How long Does it Take for a hacker to Crack Your Password
</h1>
    <input style="border-radius: 30px;  height: 50px;padding: 2px 5px;  font-size: 12px" type="text" id="password" name="password"><br>
    <button class="button-1" onclick="predictTime()">Predict Time</button>
    <p id="predictionResult"></p>
    <script>
        async function predictTime() {
            const password = document.getElementById('password').value;
            const url = 'https://predict-time-to-crack-password.onrender.com/api/predict'
            const resp = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ password }),
            });
            console.log(resp);
            if (resp.ok) {
                const res = await resp.json();
                console.log(res);
                const timeInSeconds = res['time_sec'];
                const timeFormatted = formatTime(timeInSeconds);
                document.getElementById('predictionResult').innerText = ` Time needed to crack is: ${timeFormatted}`;
            } else {
                console.error('Error:', resp.statusText);
                document.getElementById('predictionResult').innerText = 'Error predicting time';
            }
        }

        function formatTime(seconds) {
            let timeString = '';

            const centuries = Math.floor(seconds / (3600 * 24 * 365 * 100));
            if (centuries > 0) {
                timeString += `${centuries} Centuries, `;
                seconds %= (3600 * 24 * 365 * 100);
            }

            const years = Math.floor(seconds / (3600 * 24 * 365));
            if (years > 0) {
                timeString += `${years} Years, `;
                seconds %= (3600 * 24 * 365);
            }

            const days = Math.floor(seconds / (3600 * 24));
            if (days > 0) {
                timeString += `${days} Days, `;
                seconds %= (3600 * 24);
            }

            const hours = Math.floor(seconds / 3600);
            if (hours > 0) {
                timeString += `${hours} Hours, `;
                seconds %= 3600;
            }

            const minutes = Math.floor(seconds / 60);
            if (minutes > 0) {
                timeString += `${minutes} Minutes, `;
                seconds %= 60;
            }

            if (seconds > 0) {
                timeString += `${Math.floor(seconds)} Seconds`;
            }

            return timeString.replace(/, $/, '');
        }
    </script>
    <div class="shop-btn">
<?php if( !isset($_SESSION['alogin'])){?>
<!--<a href="sign-up.php" class="axil-btn btn-bg-white" tabindex="0"> Join Now </a>-->
<?php }?></div>
    <img src="" alt="">

</div>
</div>

<div class="single-slide slick-slide">
<div class="main-slider-content">
    <!--slide3-->
<h1 class="title">Save Your Passwords </h1>
<span class="subtitle" id="s">  Keep Your Passwords safe </span>
<div class="shop-btn">
<?php if( !isset($_SESSION['alogin'])){?>
<a href="sign-up.php" class="axil-btn" tabindex="0"></a>
<?php }?></div>
</div>
<div class="main-slider-thumb">
    <!--slide3 photo-->
</div>
</div>
</div>
</div>
</div>
</div>



        <!-- End Slider Area -->


<div class="axil-about-area about-style-3">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-7">
<div class="section-title-wrapper">
    <!--about us content-->
<h2 class="title1">About</h2>
</div>
<div class="row">
<div class="col-sm-6">
<div class="about-features">
<div class="spam sl-number"><br></div>
<h4 class="title2">Unique Access Every Time</h4>
<p> Where each login is unique. Our one-time password system generates a fresh, one-use code for every login attempt, ensuring that access to your account is always new and never repeated.</p>
</div>
</div>
<div class="col-sm-6">
<div class="about-features">
<div class="spam sl-number"><br></div>
<h4 class="title2">Effortless Navigation and Intuitive Design</h4>
<p>Our intuitive design ensures you spend less time searching and more time discovering. Whether you're a tech-savvy user or a first-time visitor, finding what you need is as simple as a click.</p>
</div>
</div>
<div class="col-sm-6">
<div class="about-features">
<div class="spam sl-number"><br></div>
<h4 class="title2">One-Way Road to digital Safety</h4>
<p>Our use of one-way hashing means your data enters a secure vault from which there's no return. This assures that even if someone gets a hold of the hash, deciphering your original data is virtually impossible.</p>
</div>
</div>
<div class="col-sm-6">
<div class="about-features">
<div class="spam sl-number"><br></div>
<h4 class="title2">Responsive Across Devices</h4>
<p>Whether you're on a desktop, tablet, or mobile, our site adapts seamlessly to your screen. Enjoy a consistent, comfortable experience, no matter where you are.</p>
</div>
</div>
</div>
</div>
<div class="col-lg-5">
    <!--about us photos-->
<div class="about-gallery">
<div class="row row--10">
<div class="-6">
<div class="">
    <!--<img style="border-style=none;" src="assets/images/project icons/Enter OTP.gif" alt="About"  id="m">-->
</div>
<div class="">
 <!--<img src="assets/images/project icons/Enter OTP.gif" alt="About"  id="m">-->
</div>
</div>
<div class="col-6">
<div class="">
    <!--<img src="assets/images/project icons/Enter OTP.gif" alt="About"  id="m">-->
</div>
<div class="">
 <!--<img src="assets/images/project icons/Enter OTP.gif" alt="About"   id="m">-->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Start Why Choose Area  -->
<div class="axil-why-choose-area axil-section-gap pb--50 pb_sm--30">
<div class="container">
<div class="section-title-wrapper section-title-center">
<span class="title-highlighter highlighter-secondary"></span>
    <!--last section-->
<h2 class="title2">Premium Add-ons</h2>
</div>
<div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 row--20">
<div class="col">
<div class="service-box">
<div class="icon">
<img src="assets/images/response.svg" alt="Service"style="height: 40px">
</div>
<h6 class="title3">Immediate Response </h6>
</div>
</div>
<div class="col">
<div class="service-box">
<div class="icon">
<img src="assets/images/gear.svg" alt="Service" style="height: 30px">
</div>
<h6 class="title3">  Seamlessly show, add, edit, and delete passwords</h6>
</div>
</div>
<div class="col">
<div class="service-box">
<div class="icon">
<img src="assets/images/notification.svg" alt="Service">
</div>
<h6 class="title3">Notification System</h6>
</div>
</div>
<div class="col">
<div class="service-box">
<div class="icon">
<img src="assets/images/encrypted.svg" alt="Service" style="height: 40px">
</div>
<h6 class="title3">Encryption Algorithms</h6>
</div>
</div>
<div class="col">
<div class="service-box">

<div class="icon">
<img src="assets/images/icons/service4.png" alt="Service">
</div>

<h6 class="title3"> 24/7 Live support.</h6>
</div>
</div>


</div>
</div>
</div>
<!-- End Why Choose Area  -->


<!-- Start Testimonila Area  -->

<div class="axil-testimoial-area axil-section-gap bg-vista-white">
<div class="container">
</div>
</div>
</div>

</main>



<!-- Start Footer Area  -->
<?php include('include/footer.php');   ?>
<?php include('include/jslink.php');   ?>
<!-- End Footer Area  -->
</body>
</html>
