<?php session_start();?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <?php include('include/link_css.php'); ?>
    <link rel="stylesheet" href="assets/css/Geneator.css">
    <?php include('include/header.php'); ?>
    <style>
        ::-webkit-scrollbar {/*hide scroll bar design*/
            display: none;
        }

        *{
            -webkit-user-select: none; /* Safari */
            -moz-user-select: none; /* Firefox */
            -ms-user-select: none; /* IE10+/Edge */
            user-select: none; /* Standard syntax */

        }
        #cont{
            position: relative;
            left:34%;
            margin-top:3%;
        }
    </style>
</head>
<body>
<div class="container1" id="cont">
      <h2>Password Strength Indicator</h2>
      <div class="wrapper">
        <div class="input-box">
        <input   type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required >
           <span class="material-symbols-rounded">copy_all</span>
        </div>
        <div style="color:white;height:40px;border-radius: 9px;margin-top: 10px; font-weight: 900; font-size: large; " class ="pass-indicator" ><span class="span" > weak <span></div>

       <div id="message">
       <h3>Password must contain:</h3>
        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="Symbol" class="invalid">A <b>Symbol</b></p>
         <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>



 <script >

    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var Symbol = document.getElementById("Symbol");
    var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
   myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
   }
// When the user clicks on the password field, show the message box



// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";

}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {

  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters).length>1) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters).length>1) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers).length>2) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
// Validate Symbol

const Symbols = /^(?=.*[~!@#$%^&*()--+={}\[\]|\\:;"'<>,.?/_₹]).*$/;
if (Symbols.test(myInput.value)) {
    Symbol.classList.remove("invalid");
    Symbol.classList.add("valid");
  } else {
    Symbol.classList.remove("valid");
    Symbol.classList.add("invalid");
  }
  // Validate length
  if(myInput.value.length >= 8  ) {
        length.classList.remove("invalid");
        length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }


 // When the user starts to type something inside the password field
 passIndicator = document.querySelector(".pass-indicator"),
  span =document.querySelector(".span"),

passIndicator.id = myInput.value.length <= 6 && myInput.value.match(upperCaseLetters).length>1 ? "weak" : myInput.value.length  <= 8 ? "medium" : "green";
 span.innerHTML=myInput.value.length <= 6 ? "Weak" : myInput.value.length  <= 8 ? "Medium" : "Strong";
 span.style.color=myInput.value.length <= 6 ? "Black" : myInput.value.length  <= 8 ? "red" : "white";

}
   </script>


</body>
</html>
