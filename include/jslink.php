


<!--forms for each add ,edit ,notification*/-->

<div class="header-search-modal" id="Notification">
        <div class="header-search-wrap">
            <!--set notification form*/-->
            <div class="card-body">
                    <div class="axil-signin-form-wrap" style=" text-align:  center !important; margin: -60px 0px 0px 5px  !important;">
                        <div class="axil-signin-form">
                            <h5 class="title mb--35"  id="h5" > Set Date Notification</h5>
                              <div class="form-group" id="success">
                                </div> 
                            <form class="singin-form" id="fupForm" action="save.php"   name="form1" method="post">
                                <div class="form-group">
                                   <label> Date Notification </label>
                                 <input type="datetime-local" id="dateinput" name="Date" required title="Must enter Date">
                                 <input type="hidden" id="ID1" name="ID" >

                                </div> <br>
                                <div class="form-group">
                                <button type="submit" name="Edit_Date"   style="width: 314px; border-radius: 6px !important;"class="axil-btn btn-bg-primary submit-btn" id="butsave">
                                Edit Date
                               </button>
                               </div>
                                   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-search-modal" id="header-search-modal">
        <div class="header-search-wrap">
            <!--add form-->
            <div class="card-body">
                    <div class="axil-signin-form-wrap" style=" text-align:  center !important; margin: -60px 0px 0px 5px  !important;">
                        <div class="axil-signin-form">
                            <h5 class="title mb--35"  id="h5" >Add New Password</h5>
                              <div class="form-group" id="success">
                                </div> 
                            <form class="singin-form"  id="fupForm" action="save.php" name="form1" method="post">
                                <div class="form-group">
                                    <label> Name </label>
                                    <input type="text" class="form-control"id="name" placeholder="Name" name="Names" required title="Must enter name password " >
                                </div>   
                                <div class="form-group">
                                    <label>Password </label>
                                    <input type="password" class="form-control" id="psw" onkeyup="inputpassword()"  name="passwords" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                   <span id="how">Weak Password <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                     </span>
                                </div>
                                <div class="form-group">
                                <button type="submit" name="save"  style="width: 314px; border-radius: 6px !important;"class="axil-btn btn-bg-primary submit-btn" id="butsave">
                                Save
                               </button>
                               </div>
                                   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="header-search-modal" id="cart-dropdown">
    <div class="header-search-wrap">
        <div class="card-body">
            <div class="axil-signin-form-wrap" style=" text-align:  center !important; margin: -60px 0px 0px 5px  !important;">
                <div class="axil-signin-form">
                    <!--edit form-->
                    <h5 class="title mb--35"  id="h5" >Edit</h5>
                    <div class="form-group" id="success">
                    </div>
                    <form class="singin-form" id="fupForm"action="save.php"  method="post">
                        <div class="form-group">
                            <label> Name </label>
                            <input type="text" class="form-control"id="nameEdit" placeholder="Name" name="name"  required title="Must enter name password ">
                            <input type="hidden" id="ID" name="ID" >
                        </div>
                        <div class="form-group">
                            <label>Password </label>
                            <input type="password" class="form-control password " id="pswEdit" onkeyup="inputpassword('Edit')" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required >
                            <span id="how1">Weak Password <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                     </span>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="Edit"  style="    width: 314px; border-radius: 6px !important;"class="axil-btn btn-bg-primary submit-btn" id="butEdit">
                                Edit
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/vendor/js.cookie.js"></script>
    <!-- <script src="assets/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="assets/js/vendor/jquery-ui.min.js"></script>
    <script src="assets/js/vendor/jquery.ui.touch-punch.min.js"></script>
    <script src="assets/js/vendor/jquery.countdown.min.js"></script>
    <script src="assets/js/vendor/sal.js"></script>
    <script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/vendor/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/vendor/isotope.pkgd.min.js"></script>
    <script src="assets/js/vendor/counterup.js"></script>
    <script src="assets/js/vendor/waypoints.min.js"></script>
    <script src="assets/js/Geneator.js"></script>
	<script src="assets/js/vendor/jquery.dataTables.min.js"></script>
	<script src="assets/js/vendor/dataTables.bootstrap.min.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>