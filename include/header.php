    <style>
    .mainmenu li a img ,.mainmenu li a i{
    /* margin-right:10px;*/

    }
    </style>
    </head>
    <body class="sticky-header" >
    <a href="#top" class="back-to-top" id="backto-top" ><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->




    <header class="header axil-header header-style-5">

    <!-- Start Mainmenu Area  -->
    <div id="axil-sticky-placeholder"> </div>
    <div class="axil-mainmenu">
    <div class="container">
    <div class="header-navbar">
    <div class="header-brand">
    <a href="index.php" class="logo logo-dark">
    <img src="assets/images/logo/logo.png" alt="Site Logo" width="180px">
    </a>
    <a href="index.php" class="logo logo-light">
    <img src="assets/images/logo/logo.png" alt="Site Logo" width="180px">
    </a>
    </div>
    <div class="header-main-nav">
    <!-- Start Mainmanu Nav -->
    <nav class="mainmenu-nav">
    <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
    <div class="mobile-nav-brand">
    <a href="index.php" class="logo">
    <img src="assets/images/logo/logo.png" alt="Site Logo">
    </a>
    </div>
    <ul class="mainmenu">
    <li >
    <a href="index.php"><i class="fa fa-home fa-lg "  aria-hidden="true"></i>Home</a>
    </li>
    <li><a href="Password-Generator.php">Generator</a></li>
    <li><a href="Password Strength Indicator.php">Strength Indicator</a></li>



        <?php if( isset($_SESSION['alogin'])){?>

    <span class="cart-count" id="spanl" style="display:none"> <?php if( isset($_SESSION['alogin'])){ echo $_SESSION['alogin'];} ?> <img src="assets/images/project icons/profile-icon.svg" width="26px" alt="Site Logo"></span>
    </li>

    <?php   }else{?>
    <li > <a href="sign-up.php">Join Us</a></li>
    <li><a href="sign-in.php"> Sign In</a></li>
    <?php     }  ?>

    </ul>
    </nav>
    <!-- End Mainmanu Nav -->
    </div>
    <div class="header-action">
    <ul class="action-list">

    <li class="shopping-cart">
    <span class="cart-count"> <?php if( isset($_SESSION['alogin'])){echo $_SESSION['alogin'];} ?></span>
    </li>

    <li class="my-account">
    <a href="javascript:void(0)" class=""><!--person background color the class for it is "open"-->
    <i class="flaticon-person"></i>
    </a>
    <div class="my-account-dropdown">
    <!--<span class="title">QUICKLINKS</span>-->
    <ul>
    <li>
    <a href="passwords.php">My Page</a>
    </li>
    <li>
    <a href="Notification.php">Notification</a>
    </li>
    <li>
        <a href="Password-Generator.php">Generator</a>
    </li>
    <li>
        <a href="Password Strength Indicator.php">Strength Indicator</a>
    </li>
    <li>
    <a href="contact-us.php">Support</a>
    </li>

    </ul>
    <?php if( isset($_SESSION['alogin'])){?>
    <a  class="a" href="save.php?Delete_Account=<?php echo $_SESSION['ID'];?>"onclick="return confirm('Are you sure you want to delete Your account? ');">
    Delete Account </a>
    <br>    <br>
    <a href="LogOut.php" class="axil-btn btn-bg-primary" style="text-align: center;
">LOG OUT</a>

    <?php   }else{?>
    <a href="sign-in.php" class="axil-btn btn-bg-primary">Login</a>
    <div class="reg-footer text-center">No account yet? <a href="sign-up.php" class="btn-link">REGISTER HERE.</a></div>

    <?php }  ?>

    </div>
    </li>
    <li class="axil-mobile-toggle">
    <button class="menu-btn mobile-nav-toggler">
    <i class="flaticon-menu-2"></i>
    </button>
    </li>
    </ul>
    </div>
    </div>
    </div>
    </div>

    </header>
    <!-- End Header -->

