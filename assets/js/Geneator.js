let lengthSlider = document.querySelector(".pass-length input"),
options = document.querySelectorAll(".option input"),
copyIcon = document.querySelector(".input-box span"),
passwordInput = document.querySelector(".input-box input"),
passIndicator = document.querySelector(".pass-indicator"),
generateBtn = document.querySelector(".generate-btn");

/* passworde generator  */
const characters = { // object of letters, numbers & symbols
    lowercase: "abcdefghijklmnopqrstuvwxyz",
    uppercase: "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
    numbers: "0123456789",
    symbols: "^!$%&|[](){}:;.,*+-#@<>~"
}

const generatePassword = () => {
    let staticPassword = "",
    randomPassword = "",
    excludeDuplicate = false,
    passLength = lengthSlider.value;

    options.forEach(option => { // looping through each option's checkbox
        if(option.checked) { // if checkbox is checked
            // if checkbox id isn't exc-duplicate && spaces
            if(option.id !== "exc-duplicate" && option.id !== "spaces") {
                // adding particular key value from character object to staticPassword
                staticPassword += characters[option.id];
            } else if(option.id === "spaces") { // if checkbox id is spaces
                staticPassword += `  ${staticPassword}  `; // adding space at the beginning & end of staticPassword
            } else { // else pass true value to excludeDuplicate
                excludeDuplicate = true;
            }
        }
    });

    for (let i = 0; i < passLength; i++) {
        // getting random character from the static password
        let randomChar = staticPassword[Math.floor(Math.random() * staticPassword.length)];
        if(excludeDuplicate) { // if excludeDuplicate is true
            // if randomPassword doesn't contains the current random character or randomChar is equal 
            // to space " " then add random character to randomPassword else decrement i by -1
            !randomPassword.includes(randomChar) || randomChar == " " ? randomPassword += randomChar : i--;
        } else { // else add random character to randomPassword
            randomPassword += randomChar;
        }
    }
    passwordInput.value = randomPassword; // passing randomPassword to passwordInput value
}

const upadatePassIndicator = () => {
    // if lengthSlider value is less than 8 then pass "weak" as passIndicator id else if lengthSlider 
    // value is less than 16 then pass "medium" as id else pass "strong" as id
    passIndicator.id = lengthSlider.value <= 8 ? "weak" : lengthSlider.value <= 16 ? "medium" : "strong";

}

const updateSlider = () => {
    // passing slider value as counter text
    document.querySelector(".pass-length span").innerText = lengthSlider.value;
    generatePassword();
    upadatePassIndicator();
}
updateSlider();

const copyPassword = () => {
    navigator.clipboard.writeText(passwordInput.value); // copying random password
    copyIcon.innerText = "check"; // changing copy icon to tick
    copyIcon.style.color = "#4285F4";
    setTimeout(() => { // after 1500 ms, changing tick icon back to copy
        copyIcon.innerText = "copy_all";
        copyIcon.style.color = "#707070";
    }, 1500);
}

copyIcon.addEventListener("click", copyPassword);
lengthSlider.addEventListener("input", updateSlider);
generateBtn.addEventListener("click", generatePassword);


$(document).ready(function () {

    $('#zctb').DataTable({
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, 'All']
        ]
    });

    });
//-------------------------------------------------------------------------------

// for(password strength indicator) to make a strong password................................................................................

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



  // for   Confirm password in sign-in page -----------------------------------------------------------------
function validateForm() {
  //collect form data in JavaScript variables
  var pw1 = document.getElementById("pswd1").value;
  var pw2 = document.getElementById("pswd2").value;
  if(pw1 != pw2) {
       document.getElementById("message2").innerHTML = "**Passwords are not same";
       document.getElementById("message2").style.color= "red";
       $("#register").attr("disabled", "disabled");

  } else {
     document.getElementById("message2").innerHTML = "**Passwords are  same";
     document.getElementById("message2").style.color= "green";
     $("#register").removeAttr("disabled");


  }
}

// for check password in sign-in page -----------------------------------------------------------------
function validateForm1() {
var myInput = document.getElementById("pswd1");
 var lowerCaseLetters = /[a-z]/g;
  var upperCaseLetters = /[A-Z]/g;
   var numbers = /[0-9]/g;
   const Symbols = /^(?=.*[~`!@#$%^&*()--+={}\[\]|\\:;"'<>,.?/_₹]).*$/;

if(myInput.value.match(lowerCaseLetters).length>1 &&  myInput.value.match(upperCaseLetters).length>1 &&
myInput.value.match(numbers).length>2 && Symbols.test(myInput.value) && myInput.value.length >= 8) {
     document.getElementById("pswd1").style.border = "2px green solid ";

} else if(myInput.value.match(lowerCaseLetters).length>1 && myInput.value.match(numbers).length>2){
     document.getElementById("pswd1").style.border = "2px #ffab00 solid ";

}else {
     document.getElementById("pswd1").style.border = "2px red solid ";

 }}
