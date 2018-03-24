<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vibase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$irst= $_POST["first"];
$ast= $_POST["last"];
$mail= $_POST["email"];
$assword= $_POST["pass"];
$hone= $_POST["phone"];
$user = "INSERT INTO users (firstn, lastn, emaila, passw, phonen)
VALUES ($irst, $ast, $mail, $assword, $hone)";

if (mysqli_query($conn, $user)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $user . "<br>" . mysqli_error($conn);
}
$mains_id = "SELECT id FROM users WHERE firstn = '$irst' AND lastn = '$ast' AND emaila = '$mail' AND passw = '$assword' AND phonen = '$hone'";
$result = mysqli_query($conn, $mains_id);
$row = mysqli_fetch_assoc($result);
$cookie_value2 =$row['id'];
setcookie("main_id", $cookie_value2, time() + (86400 * 30), "/");
$_COOKIE['main_id']=$cookie_value2;

if(!isset($_COOKIE["main_id"])) {
    echo "Cookie named 'main_id' is not set!";
} else {
    echo "Cookie 'main_id' is set!<br>";
    echo "Value is: " . $_COOKIE["main_id"];
}
?>

<html>
<head>
<title>
register
</title>
</head>
<body>

<?php
include("home.php");

mysqli_close($conn);
?>

</body>
</html>