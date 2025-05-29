<?php
	
	if($_SERVER['REQUEST_METHOD'] !== 'POST') {
		header("LOCATION: register.php");
		exit();
	} 

	if (!isset($_POST['name']) || !isset($_POST['dob']) || !isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['phone']) || !isset($_POST['password'])) {
		header("LOCATION: register.php?q=You must register");
		exit();
	}

	if($_POST['gender'] != 'male' && $_POST['gender'] != 'female'){
		header("LOCATION: register.php?q=Invalid gender");
		exit();
	}

	// connect to the DB

	require 'connect.php';
	require 'app.php';

	$auth = new Authentication($con);

	$result = $auth->register($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['username'], $_POST['dob'], $_POST['password'], $_POST['gender']);


	if($result){
		header("LOCATION: index.php?q=Account Created Succesfully!!!!");
		exit();
	}else{
		header("LOCATION: register.php?q=Unable to Create Account");
		exit();
	}
?>