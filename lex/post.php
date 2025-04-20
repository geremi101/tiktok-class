<?php
	ob_start();
	// start sessions
	session_start();

	// check if user is loged in
	if (!isset($_SESSION['id'])) {
		header("LOCATION: index.php?q=You must Login to see this page");
	    exit();
	}

	// check if the form is filled 
	if($_SERVER['REQUEST_METHOD'] !== 'POST') {
		header("LOCATION: home.php");
		exit();
	} 

	// check if the post field is fill
	if (!isset($_POST['post']) || empty(trim($_POST['post']))) {
		header("LOCATION: home.php?q=Fill the post");
		exit();
	}

	// connect to database
	require "connect.php";
	$id = $_SESSION['id'];

	// sanitize the input
	$post = mysqli_real_escape_string($con, trim($_POST['post']));

	// INSERT INTO DB
	$insert = mysqli_query($con, "INSERT INTO posts (user_id, post) VALUES ('$id', '$post') ");

	// check if the query was success
	if($insert){
		header("LOCATION: home.php?s=Post Operation Succefull");
		exit();
	}else{
		header("LOCATION: home.php?q=Unable to Perform Post Operations");
		exit();
	}

?>