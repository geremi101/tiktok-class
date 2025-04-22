<?php

	ob_start();
	session_start();

	if (!isset($_SESSION['id'])) {
		header("LOCATION: index.php?q=You must Login to see this page");
	    exit();
	}

	if($_SERVER['REQUEST_METHOD'] !== 'POST') {
		header("LOCATION: home.php");
		exit();
	} 

	if(!isset($_POST['post']) ){
		header("LOCATION: index.php?q=Fill the login Form");
		exit();
	}

	$post = $_POST['post'];

	require 'connect.php';
	$id = $_SESSION['id'];

	$insert = mysqli_query($con, "INSERT INTO posts (user_id, post) VALUES('$id', '$post') ");

	if($insert){
		header("LOCATION: home.php?s=Post Successfull");
		exit();
	}else{
		header("LOCATION: home.php?q=Unable to make post");
		exit();
	}
	

