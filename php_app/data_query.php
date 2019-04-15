<?php include 'database.php' ?>

<?php

function insert($insert_user){
	global $conn;
	if(mysqli_query($conn, $insert_user)){
		echo "created user";
	}else {
		echo "Failed to insert user";
		echo mysqli_error($conn);
		delete_table();
	}
}

function update(){
	global $conn;
	$update_form = '<form method="POST"><input type="text" name="new_name"><input type="submit"></form>';

	echo htmlspecialchars_decode($update_form);

	$update_user = "UPDATE user SET username='".$_POST['new_name']."'";
	setcookie("name",$_POST['new_name']);

	if(mysqli_query($conn, $update_user)){
		echo "updated user";
		header("/welcome.php");
	}else {
		echo "Failed to update user";
	}
}

?>