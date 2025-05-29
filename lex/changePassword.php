<?php
// check if the users login
// check if the form is submited
// check the the form is filled
// trap the data send from the Front End
// check if the new password is same as the old password
// check if the new passwrod matgch teh confirma password
// check if the old password matches the old password
// update the new password;


	ob_start();
	session_start();

	if (!isset($_SESSION['id'])) {
		header("LOCATION: index.php?q=You must Login to see this page");
	    exit();
	}

	if($_SERVER['REQUEST_METHOD'] !== 'POST') {
		header("LOCATION: index.php");
		exit();
	}

	if (empty($_POST['oldPassword']) || empty($_POST['newPassword']) || empty($_POST['confirmPassword'])) {
		header("LOCATION: profile.php?q=All field need to be filled");
		exit();
	}

	$id = $_SESSION['id'];
	require 'connect.php';
	require 'app.php';

	$auth = new Authentication($con);

	if(!$auth->checkPasswordMatch($_POST['newPassword'], $_POST['confirmPassword'])){
		header("LOCATION: profile.php?q=Password do not match ");
		exit();
	}

	if(!$auth->checkOldPasswordMatch($_POST['oldPassword'], $id)){
		header("LOCATION: profile.php?q=Invalid old password ");
		exit();
	}

	

	if($auth->checkPasswordMatch($_POST['newPassword'], $_POST['oldPassword'])){
		header("LOCATION: profile.php?q=New password should be diff from old password ");
		exit();
	}

	if($auth->changePass($_POST['newPassword'], $id)){
		header("LOCATION: profile.php?s=password update successuflly ");
		exit();
	}else{
		header("LOCATION: profile.php?q=unable to update password ");
		exit();
	}

