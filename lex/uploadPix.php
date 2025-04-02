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

	// check if there is an error with the file
	if($_FILES['pix']['error'] > 0){
		header("LOCATION: home.php?q=error with the file you uploaded!");
		exit();
	}

	// check file size
	if($_FILES['pix']['size'] > 500000){
		header("LOCATION: home.php?q=File too large!");
		exit();
	}

	// check if the file is an image
	if(getimagesize($_FILES['pix']['tmp_name']) === false){
		header("LOCATION: home.php?q=File too large!");
		exit();
	}

	// Generate Random name for the image
	// q245202504165443


	$pix = md5(uniqid().date('YmdHis')).
	'.'. 
	strtolower(
		pathinfo($_FILES['pix']['name'], PATHINFO_EXTENSION)
	);

	if (! move_uploaded_file($_FILES['pix']['tmp_name'], "upload/".$pix) ){
		header("LOCATION: home.php?q=There was an error uploading file");
		exit();
	}

	require 'connect.php';

	$id = $_SESSION['id'];
	
	$upd = mysqli_query($con, "UPDATE users SET profile_pix = '$pix' WHERE id = '$id' ");

	if($upd){
		header("LOCATION: home.php?s=File uploaded succefully!");
		exit();
	}else{
		header("LOCATION: home.php?q=There was an error uploading file");
	}

	