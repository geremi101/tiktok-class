<?php
	ob_start();
	session_start();

	if (!isset($_SESSION['email'])) {
		header("LOCATION: index.php?q=You must Login to see this page");
	    exit();
	}

	echo ' Welcome to your Home page';
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome Home</title>
</head>
<body>
	<br />
	<a href="logout.php"> Logout </a>
</body>
</html>