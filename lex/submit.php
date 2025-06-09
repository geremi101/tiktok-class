<?php

	ob_start();

	if($_SERVER['REQUEST_METHOD'] !== 'POST') {
		header("LOCATION: index.php");
		exit();
	}

	if (strlen($_POST['password']) < 6 && strlen($_POST['password']) > 32 ) {
		header("LOCATION: index.php?q=invalid Password");
	    exit();
	}

	require 'connect.php';
	require 'app.php';
	
	$auth = new Authentication($con);
	
	if ($auth->login($_POST['email'], $_POST['password'])) {
		header("LOCATION: home.php");
	    exit();
	}else{
		header("LOCATION: index.php?q=invalid Login");
	    exit();
	}
