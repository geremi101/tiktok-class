<?php
	ob_start();
	session_start();
	// check if user is loggedin
	if (!isset($_SESSION['id'])) {
		header("LOCATION: index.php?q=You must Login to see this page");
	    exit();
	}
	// if the liked button was clicked
	if(!isset($_GET['id']) ){
		header("LOCATION: home.php?q=Fill the login Form");
		exit();
	}
	// check if the post id contain any value
	if (empty($_GET['id'])) {
		header("LOCATION: home.php?q=Fill the login Form");
		exit();
	}


	// check if id is a number
 	if (!is_numeric($_GET['id'])) {
 		header("LOCATION: home.php?q=Fill the login Form");
		exit();
 	}
 	require 'connect.php';
 	$id = $_SESSION['id'];
 	// sanitizing the id
	$postID = mysqli_real_escape_string($con, $_GET['id']);
	
	// check if the post with id exist
	$check = mysqli_query($con, "SELECT id FROM posts WHERE id='$postID' ");

	if(mysqli_num_rows($check) < 1){
		header("LOCATION: home.php?q=the post you tried to like has been deleted or invalid");
		exit();
	}

	// check if the post with id exist
	$check = mysqli_query($con, "SELECT reaction FROM reactions WHERE user_id = '$id' AND 
	content_id = '$postID' AND 
	content_type = '1' ");

	if(mysqli_num_rows($check) < 1){

		$insert = mysqli_query($con, "INSERT INTO reactions (user_id, content_id, content_type, reaction ) VALUES ('$id', '$postID', '1', '1')");
	}else{
		$getPrevReaction = mysqli_fetch_assoc($check)['reaction'];

		if($getPrevReaction == 1){
			$insert = mysqli_query($con, "UPDATE reactions SET reaction = '0' WHERE user_id = '$id' AND 
			content_id = '$postID' AND 
			content_type = '1' ");
		}else{
			// this means he did not liked or disliked
			$insert = mysqli_query($con, "UPDATE reactions SET reaction = '1' WHERE user_id = '$id' AND 
			content_id = '$postID' AND 
			content_type = '1' ");
		}
	}

	if ($insert) {
		header("LOCATION: home.php?s=Post Liked");
		exit();
	}else{
		header("LOCATION: home.php?q=Unable to like post");
		exit();
	}


