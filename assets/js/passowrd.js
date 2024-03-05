$(document).ready(function () {
      $('#zctb').DataTable({
          lengthMenu: [
              [5, 10, 25, 50, -1],
              [5, 10, 25, 50, 'All']
          ]     });
  
    });

  function Notification(date,ID) {
          $('#dateinput').val(date); 
          $('#ID1').val(ID);};

function Edit(ID, Name, password) {
    $('#nameEdit').val(Name);
    $('.password').attr('type', 'text');
    $('.password').val(password);
    $('#ID').val(ID);
}
function inputpassword(type) {
    var myInput = document.getElementById("psw");
    var myInputEdit = document.getElementById("pswEdit");
    var lowerCaseLetters = /[a-z]/g;
    var upperCaseLetters = /[A-Z]/g;
    var numbers = /[0-9]/g;
    const Symbols = /^(?=.[~`!@#$%^&()--+={}\[\]|\\:;"'<>,.?/_₹]).*$/;
    if(type==='Edit'){
        if(myInputEdit.value.match(lowerCaseLetters).length>1 &&  myInputEdit.value.match(upperCaseLetters).length>1 &&
            myInputEdit.value.match(numbers).length>1 && Symbols.test(myInputEdit.value) && myInputEdit.value.length <= 8) {
            document.getElementById("how1").style.display = "block";
            document.getElementById("how1").style.color = "green";
            document.getElementById("how1").innerHTML = " Strong Password  ";
        } else if(myInput.value.match(lowerCaseLetters).length>1 && myInput.value.match(numbers).length>2){
            document.getElementById("how1").style.display = "block";
            document.getElementById("how1").style.color = "#ffab00";
            document.getElementById("how1").innerHTML = "Medium Password  ";
        }else {
            document.getElementById("how1").style.display = "block";
            document.getElementById("how1").style.color = "red";
            document.getElementById("how1").innerHTML = "Weak Password  ";
        }
    }else{
        if(myInput.value.match(lowerCaseLetters).length>1 &&  myInput.value.match(upperCaseLetters).length>1 &&
            myInput.value.match(numbers).length>1 && Symbols.test(myInput.value) && myInput.value.length <= 8) {

            document.getElementById("how").style.display = "block";
            document.getElementById("how").style.color = "green";
            document.getElementById("how").innerHTML = " Strong Password  ";
        } else if(myInput.value.match(lowerCaseLetters).length>1 && myInput.value.match(numbers).length>2){
            document.getElementById("how").style.display = "block";
            document.getElementById("how").style.color = "#ffab00";
            document.getElementById("how").innerHTML = "Medium Password  ";
        }else {
            document.getElementById("how").style.display = "block";
            document.getElementById("how").style.color = "red";
            document.getElementById("how").innerHTML = "Weak Password  ";
        }}
};