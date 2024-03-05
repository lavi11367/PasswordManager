<?php
    require 'include/config.php';
    $data = "This is some secret data";

   // $encrypted_data = openssl_encrypt($data, "AES-256-CBC", $key, 0, $iv);
    $encrypted_data = base64_encode($data); 
    echo $encrypted_data;
    
    echo "<br>";
    $decrypted_data =base64_decode($encrypted_data);
    echo "<br>";
			// $password=openssl_decrypt(base64_decode($result['Password']), 'AES-256-CBC', $key, 0, $iv);
        echo $decrypted_data;
    // For storage or transmission
    
   // $decrypted_data = openssl_decrypt(base64_decode($encrypted_data), "AES-256-CBC", $key, 0, $iv);
    
 $sql = "SELECT * from Passwords";
$query= $conn->query($sql);
if($query->num_rows > 0){
while($result=$query->fetch_assoc() )

  { $password=$result['Password'];
    $decrypted_data =base64_decode($password);
    //$decrypted_data = openssl_decrypt(base64_decode($password), "AES-256-CBC", $key, 0, $iv);
    echo "<br>";
			// $password=openssl_decrypt(base64_decode($result['Password']), 'AES-256-CBC', $key, 0, $iv);
        echo $decrypted_data;}}
        
$str = "Hello world! وّه";
echo $str . "<br>";
//echo convert_cyr_string($str,'w','a'); 


/*
$password="asDF123!";
$hashed =password_hash(hash('sha512',$password),PASSWORD_DEFAULT);
$verify ='mohammed al homaidi';
$email='alhomaidisoft@gmail.com';

$sql= "SELECT * FRom User WHERE Email='$email' LIMIT   1 ";
$check_email_run= $conn->query($sql);

while($result=$check_email_run->fetch_assoc() )
{
if(password_verify(hash('sha512', $password),$result['Passwords'])){
    echo $verify;

}else{
    echo 'false';
}}
if(password_verify(hash('sha512', $password),$hashed)){

    echo $verify;

}else{
    echo 'false';
}

$data = ["name" => "John Doe", "age" => 25];

echo json_encode($data);

$input = "mohaammed";

$encrypted = encryptIt( $input );
$decrypted = decryptIt( $encrypted );

echo $encrypted . '<br />' . $decrypted;

function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}*/


 // For ciphers requiring an IV

$data = "This is some secret data";

$encrypted_data = openssl_encrypt($data, "AES-256-CBC", $key, 0, $iv);
$encrypted_data = base64_encode($encrypted_data); 



// For storage or transmission

$decrypted_data = openssl_decrypt(base64_decode($encrypted_data), "AES-256-CBC", $key, 0, $iv);

echo "Encrypted data: " . $encrypted_data . "\n";
echo "Decrypted data: " . openssl_decrypt(base64_decode($encrypted_data), "AES-256-CBC", $key, 0, $iv) . "\n";
;

echo date(date_default_timezone_set('UTC'));
$t=time();
echo($t . "<br>");
$data=date("Y-m-d-h",$t);
$data1=date("Y-m-d-h");;
if($data1==$data){
echo"mohammed";
echo "<br>";echo "<br>";echo "<br>";
echo(date("Y-m-d h:i",$t));
echo "<br>";echo "<br>";echo "<br>";
}else{
    echo "<br>";echo "<br>";echo "<br>";
echo(date("Y-m",$t));
}
/*
echo "<br>";
echo date($data1, mktime(0,0,0,10,3));
echo "<br>";
echo date("  Y-m-d h:i");
$id=5;
$sql = "SELECT ID from Passwords where ID='$id'  LIMIT   1";
$query= $conn->query($sql);
echo "<br>";
echo "<br>";
echo "<br>";
while($result=$query->fetch_assoc() ){
echo'Update Your Password' . $result['ID'] ;
}

*/


?>
<html>
<body>
<head>  
<title>Font Awesome 5 Icons</title>
<?php include('include/link_css.php'); ?>   

<Style>
input[type="date"]:focus{
border:2px solid blue;
box-shadow:0 0 5px rgba(0,0,255,0.5);}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!--Get your own code at fontawesome.com-->
</head>

<?php
$t=time();
echo($t . "<br>");
$data=date("Y-m-d H:i:s");
$data1=date("Y-m-d H:i");;
if($data1==$data or $data1<$data ){
echo"mohammed";
}else{
echo(date("Y-m",$t));
}
$d=mktime(11, 14, 54, 8, 12, 2014);
echo "Created date is " . date("Y-m-d h:i", $d);

echo "<br>";
echo date($data1, mktime(0,0,0,10,3));
echo "<br>";
echo date("  Y-m-d h:i");
?>


<input type="date">
<input type="date" >
<br>
<br>
<br>

<div class="container">
  <h2>Simple Collapsible</h2>
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Simple collapsible</button>
  
  <div class= "date-input-weapper "id="demo" class="collapse">
<input type="datetime-local" id="dateinput" >
<i class="fa fa-calendar"></i>
</div>

<script>
window.onload=function(){
document.getElementById("dateinput").onblur();
};

</script>
</body>
</html>