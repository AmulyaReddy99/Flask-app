<?php include 'database.php'?>
<?php create(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP app</title>
</head>
<body>
	<form method="POST" action="welcome.php">
		<input type="text" name="name">
		<input type="email" name="email">
		<input type="password" name="password">
		<input type="submit">
	</form>
</body>
</html>