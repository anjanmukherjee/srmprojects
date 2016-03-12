<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
 
// grab recaptcha library
require_once "recaptchalib.php";

// your secret key
$secret = "6LfO9foSAAAAAGz98ZHFfMJ0aVjo5IMI9bhC4n40";
 
// empty response
$response = null;
 
// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
 
?>


<?php
  if ($response != null && $response->success) {
  

$con = mysqli_connect("mysql.hostinger.in","u911797012_pe","secure1234","u911797012_pe");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
$servername = "mysql.hostinger.in";
$username = "u911797012_pe";
$password = "secure1234";
$dbname = "u911797012_pe";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$pname = $_POST["pname"] ;
$phead = $_POST["phead"] ;
$sdate = $_POST["sdate"] ;
$edate = $_POST["edate"] ;
$pdesc = $_POST["pdesc"] ;
$link = $_POST["link"] ;

echo $desc;
$sql = "INSERT INTO pro (pname,phead,sdate,edate,link,pdesc)
VALUES ('$pname','$phead','$sdate','$edate','$link','$pdesc')";

if (mysqli_query($conn, $sql)) {
   header('Location: final.html');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>


<?php } ?>


</body>
</html>