<?php
	/*
		if($_SERVER['REQUEST_METHOD'] !== 'POST') {
			header("LOCATION: index.php");
			exit();
		} 

		if(!isset($_POST['email'], $_POST['passdfword']) ){
			header("LOCATION: index.php?q=Fill the login Form");
			exit();
		}

	*/

	// $_REQUEST
	// $_POST 
	// $_GET
	/*
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];

		$email = trim($email);
		$email = strtolower( $email );

		if ($email == "geremi@geremi.com" && $password === "geremi")
			echo "Login Successfull";
		else
			header("LOCATION: index.php?q=wrong login details");	

	*/

	/*
		buildv a simple company website with minimum of 4 pages 
		create a contact form and process the form

	*/

		// var dump
		// var_dump($_SERVER);

	/*
		ASSIGNMENT:

		Create a Registration Form
		the field include 
			Name
			Email
			Phone
			username
			password
			confirm password
			Gender
			Country 

	*/

/*
	algorithm 
	1. take my bath
	2. wake up from sleep 
	3. eat break on dining at home 
	4. get to the office 
	5. take off my night gown 
	6. greet my boss
	7. attend to client
	8. wear my office cloth 
	9. do excecise
	10. take the bus going to my officey


	1. wake up from sleep
	2. do excecise
	3. take off the night gown
	4. take my bath
	5. wear office cloth
	6. eat break fast on dining talbe
	7. take a bus going to the office
	8. get to the office
	9. greet my boss
	10. attend to client 

	-> algorithm ambiguous 
	-> it start and end 
	-> 
	
	upload files to server


	1. check if the form is submit
	2. get the form
	3. check file type
	3. check the size
	4. update the file that i upload 
	5. 

	1. check if the form is submited
	2. check if there is an error with the file 
	3. check the size 
	3. chech the file type
	4. save the file

	Assignment
	 Correct the logical error on this code.
	 the uploaded image will replace the already
	 stored image in the upload folder
	 if the name if the same.

*/
/*

	// Check if the form is submited 
	if($_SERVER['REQUEST_METHOD'] !== 'POST') {
		header("LOCATION: index.php");
		exit();
	} 

	// check if there is an error with the file
	if($_FILES['pix']['error'] > 0){
		header("LOCATION: index.php?q=error with the file you uploaded!");
		exit();
	}

	// check file size
	if($_FILES['pix']['size'] > 500000){
		header("LOCATION: index.php?q=File too large!");
		exit();
	}

	// check if the file is an image
	if(getimagesize($_FILES['pix']['tmp_name']) === false){
		header("LOCATION: index.php?q=File too large!");
		exit();
	}


	if ( move_uploaded_file($_FILES['pix']['tmp_name'], "upload/".$_FILES['pix']['name']) ){
		header("LOCATION: index.php?s=File uploaded succefully!");
		exit();
	}else{
		header("LOCATION: index.php?q=There was an error uploading file");
		exit();
	}
*/
	ob_start();
	session_start();








