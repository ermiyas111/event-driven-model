<html>
<head>
<title>
home
</title>
</head>
<body>
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
$the_id=$_COOKIE["main_id"];
$user_info = "SELECT * FROM users WHERE id = '$the_id'";
$result = mysqli_query($conn, $user_info);
$row = mysqli_fetch_assoc($result);
echo "welcome ".$row['firstn'];
$mai=$row['emaila'];
$as=$row['passw'];

$convos = "SELECT * FROM conversations WHERE emaila = '$mai' AND passw= '$as'";
$result = mysqli_query($conn, $chat_id);
$row = mysqli_fetch_assoc($result);
$forein=$row['id'];
?>
</body>
</html>