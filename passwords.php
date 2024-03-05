<?php

include('include/config.php');
session_start();
if(strlen($_SESSION['alogin'])==0){
header('location:sign-in.php');
}else{
 ?>

<!doctype html>
<html lang="en" class="no-js">
<head>
    <?php include('include/link_css.php'); ?>
    	<!-- Bootstrap Datatables  -->
    <link rel="stylesheet" href="assets/css/vendor/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.minn.css">
<style>


    *{
        -webkit-user-select: none; /* Safari */
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* IE10+/Edge */
        user-select: none; /* Standard syntax */

    }

   .div {
	border: 1px solid #503434;
    margin: 5px 0px;
    font-weight: 900;
       padding:2.1px;

   }
   #zctb {
        margin: 10px;
        text-align: center;
        padding: 20px;

    }
    @media screen and (max-width: 768px) {
        #zctb {
            font-size: smaller; /* Smaller font size for table content */
            width: 100%; /* Full width of the container */
        }

        #zctb th, #zctb td {
            padding: 8px; /* Smaller padding for table cells */
        }

        .col-10 {
            padding: 0; /* Remove padding around the table for more space */
            margin: 0; /* Remove margin around the table for more space */
        }
    }

    @media screen and (max-width: 480px) {
        #zctb th, #zctb td {
            padding: 4px; /* Even smaller padding for smaller devices */
        }
    }
    th{
        text-align: center;
        margin: 10px;
        font-weight: 700;
        padding: -9px;


    }
    table tr:hover {
        background-color: #ddd;
    }

 a:active {
 }
 #how,#how1{
    display: none;
    margin-left: -187px;
    margin-top: 5px;
    font-weight: 700;
 }
 .a{
    margin-left:30px;
 }
 #success{color:green;
 padding:0px; margin:0px }
 #h5{
  background-color: #3577f0;
    color: #ffffff;
    height: 4.8%;
    width: 101.1%;
    padding: 3px;
    font-weight: 600;
    margin: -10px 1px 52px -7px;
 }


   ::-webkit-scrollbar {
       display: none;
   }
.ts-main-content{
    margin-top:50px;
   position: relative;
    margin-left: -60px;
}
    table tr:nth-child{background-color: #f2f2f2;}

    table tr:hover {background-color: #ddd;}

    table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #fff;
        color: #772c77;
        align-content: center;

    }


    .gfg {
        border-collapse:separate;
        border-spacing:0 15px;


    }

    td:first-child{
        border-left:0.1px solid gray;
        border-radius: 10px 0 0 10px;

    }
table{
    border-collapse:separate;
    border-spacing:0 15px;
}
table tr{
    border-radius: 10px;


}
    td:last-child {
        border-right:0.1px solid gray;
        border-radius: 10px 0 0 10px;


    }
    td:first-child,
    th:first-child {
        border-radius: 10px 0 0 10px;

    }
    td:last-child,
    th:last-child {
        border-radius: 0 10px 10px 0;
    }
    .Add{
        margin-top: -70px;
    }

    /*body{
    box-sizing: border-box
  }

  table {
    font-family: Arial, Helvetica, sans-serif;
    width: 100%;
    border: none
  }


  table tr:nth-child{background-color: #f2f2f2;}

  table tr:hover {background-color: #ddd;}

  table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #fff;
    color: #210e85;
  }
  table #head{
          border:none;
    ;}

   .gfg {
              border-collapse:separate;
              border-spacing:0 15px;


          }
  table td{
  width:120px;
              text-align:center;
              border-bottom:0.1px solid gray;
              border-top:0.1px solid gray;
              padding:10px
  }
  td:first-child{
  border-left:0.1px solid gray;
    border-radius: 10px 0 0 10px;

  }
  td:last-child {
  border-right:0.1px solid gray;
    border-radius: 10px 0 0 10px;

  }
  td:first-child,
  th:first-child {
    border-radius: 10px 0 0 10px;

  }
  td:last-child,
  th:last-child {
    border-radius: 0 10px 10px 0;
  }*/
</style>
</head>
<body class="sticky-header">
    <a href="#top" class="back-to-top" id="backto-top" ><i class="fal fa-arrow-up"></i></a>

<?php include('include/header.php'); ?>

<div class="ts-main-content">
<div class="content-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-10"  style=" padding:5px;/*border: 1px #beb4b4   solid;*/ border-radius: 10px; margin: 10px;margin-left:130px">
<?php if(isset($_GET['error'])){?><div class="errorWrap"><strong></strong><?php echo htmlentities($_GET['error']); ?> </div><?php }
else if(isset($_GET['msg'])){?><div class="succWrap"><strong></strong><?php echo htmlentities($_GET['msg']); ?> </div><?php }?>
<h4 style="color: #782c78; font-size: large" > Welcome <?php echo $_SESSION['alogin']; ?>
</h4>
<table id="zctb" width="100%" >

<thead style="color: rgb(119,44,119); font-size: large" id="head" ><tr>
<th><a class="Add" href="javascript:void(0)">
<img src="assets/images/project icons/plus (1).svg" width="35px" alt="Site Logo"></a><span style="margin-left: 80px; margin-top:80px;">Name</span></th>
<th>Password</th>
<th>Action</th>
</tr>
</thead>
    <!--show user passwords-->
<?php

$id= $_SESSION['ID'];  $sql = "SELECT * from Passwords where ID_User='$id' ";
$query= $conn->query($sql);
if($query->num_rows > 0){
while($result=$query->fetch_assoc() )
  {				?>    	<tr >
				<td style="border: 1px solid #beb4b4; padding: 0px;border-right:0px; border-top-left-radius: 10px; border-bottom-left-radius: 10px;"> <?php echo $result['Name'] ;?></td>
				<td style="border-top: 1px solid #beb4b4; border-bottom: 1px solid #beb4b4; padding: 0px; color: rgba(50,50,114,0.9);" id='change_<?php echo $result['ID'] ;?>' >  ********** </td>
				<td style="border: 1px solid #beb4b4; margin-right: 15px;padding:0px;border-radius: 0px 10px 10px 0px;border-left:0px;">

        <!--notification javascript-->
        <a class="a Edit_Notification" onclick="Notification(
            '<?php echo htmlspecialchars($result['RememberDate']);?>',
            '<?php echo htmlspecialchars($result['ID']);?>')" href="javascript:void(0)">
          <img src="assets/images/project icons/calender icon.svg" width="25px" alt="Site Logo">
       </a>&nbsp;&nbsp;
       <!--show password-->

                    <?php $password= base64_decode($result['Password']); ?>
                    <a  class="a PasswordToggle"href="javascript:void(0)" > <img src="assets/images/project icons/hidden .svg" width="25px" alt="Site Logo" id="<?php echo $result['ID'] ;?>" data-product-thumbnail  data-autoserial="<?php echo $password ;?>" > </a>

                    <!--edit password javascript-->
      <a class="a Edit"href="javascript:void(0)"  onclick="Edit(
           '<?php echo htmlspecialchars($result['ID']);?>',
           '<?php echo htmlspecialchars($result['Name']);?>',
          ' <?php echo htmlspecialchars(base64_decode($result['Password']));?>' )">
        <img src="assets/images/project icons/edit icon.svg" width="25px" alt="Site Logo"></a>
        <!--delete password alert box-->
        <a  class="a" href="save.php?del=<?php echo $result['ID'];?>" onclick="return   confirm('Are you sure you want to delete the password');"><img src="assets/images/project icons/delete icon.svg"
         width="25.4px" alt="Site Logo">  </a>
                    </div></td>
			 					</tr>	<?php  }} ?>
								</table>
								</div>	</div></div>
							</div>
    <script>
        const productThumbnails = document.querySelectorAll("[data-product-thumbnail]");

        for (let i = 0; i < productThumbnails.length; i++)
            productThumbnails[i].addEventListener("click", function () {
                var id =this.id;
                var check;
                if ($("#change_"+id).text()!==$(this).data("autoserial")) {
                    this.src="assets/images/project icons/show.svg";
                    $("#change_"+id).text($(this).data("autoserial"));
                    document.getElementById("change_"+id).style.fontSize = "small";
                    document.getElementById("change_"+id).style.padding = "7.2px";
                    check='eye';
                }else{
                    $("#change_"+id).text('**********');
                    this.src="assets/images/project icons/hidden .svg";
                    check='hidden';

                }
            });

    </script>

<!--

    <table class="gfg">
        <tr id="head">
            <th>Name</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>Temitope</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Alfred</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Bello</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>John</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>James</td>
            <td></td>
            <td></td>
        </tr>
    </table>
-->


    <?php include('include/jslink.php'); ?>
<script src="assets/js/passowrd.js"></script>
</body>
</html>
<?php } ?>
