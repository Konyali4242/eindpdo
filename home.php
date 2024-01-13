<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h1>THIS IS USER HOME PAGE</h1><?php echo $_SESSION["emailadres"] ?>

<a href="logout.php">Logout</a>

</body>
</html>