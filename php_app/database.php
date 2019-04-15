<?php 

$conn = new mysqli("localhost", "root", "", "test");

if ($conn->connect_error){
	die("Failed ". mysqli_connect_error());
}
echo "GOOD";

function create(){
	global $conn;
	$create_table = "CREATE TABLE user(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		username VARCHAR(30) NOT NULL,
		email VARCHAR(30) NOT NULL,
		password VARCHAR(30) NOT NULL
	);";

	if(mysqli_query($conn, $create_table)){
		echo "created table";
	}else {
		echo "Failed to create user table";
	}
}

function delete_table(){
	global $conn;
	$delete_t = "DROP TABLE user;";
	if(mysqli_query($conn, $delete_t)){
		echo "deleted user table";
		header("/login.php");
	}else {
		echo "Failed to delete user";
	}
}

?>

