<?php include 'data_query.php' ?>

<?php

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

$insert_user = "INSERT INTO user VALUES(1,'$name', '$email', '$password')";
insert($insert_user);

setcookie("name", $name);

session_start();
$_SESSION["name"] = $_POST["name"];

if(isset($_COOKIE["name"])){
	$name = $_COOKIE["name"];
}

$sess_name = $_SESSION["name"];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
</head>
<body>
	<?php echo "cookie ".$name; ?>
	<?php echo "session ".$sess_name; ?>
	<a onclick="session_destroy()" href="login.php">Logout</a>
	<!-- <a onclick="update()" href="">Update info</a> -->
</body>
</html>