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
$mai= $_POST['emel'];
$as= $_POST['pas'];
$chat_id = "SELECT id FROM users WHERE emaila = '$mai' AND passw= '$as'";
$result = mysqli_query($conn, $chat_id);
$row = mysqli_fetch_assoc($result);
$forein=$row['id'];

$live = "INSERT INTO online (users_id)
VALUES ('$forein')";

if (mysqli_query($conn, $live)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $live . "<br>" . mysqli_error($conn);
}

$cookie_value1 = $forein;
setcookie("main_id", $cookie_value1, time() + (86400 * 30), "/");
$_COOKIE['main_id']=$cookie_value1;

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