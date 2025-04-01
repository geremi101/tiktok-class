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

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$username = $_POST['username'];
	$dob = $_POST['dob'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];

	// run SQL Query
	$insert = mysqli_query($con, "INSERT INTO users (id, name, d_o_b, gender, email, phone, username, password) VALUES(13, '$name', '$dob', '$gender', '$email', '$phone', '$username', '$password') ");

	if($insert){
		header("LOCATION: index.php?q=Account Created Succesfully!!!!");
		exit();
	}else{
		header("LOCATION: register.php?q=Unable to Create Account");
		exit();
	}
?>