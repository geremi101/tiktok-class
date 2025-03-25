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

	
	1. Check if the form is submited
	2. retrive the form
	3. validate 
	3. authenticate 


*/
	ob_start();

	if($_SERVER['REQUEST_METHOD'] !== 'POST') {
		header("LOCATION: index.php");
		exit();
	}

	$email = $_POST['email'];
	$password = $_POST['password'];

	/*
		minimum of 6 char
		max of 32 char
		must contain at least 1 upper case
		must contain at least 1 lowercast
		must contain at least 1 special char
		you much change it every 3 months 
			can not reuse old pass
	*/


	$correctEmail = 'geremi@geremi.com';
	$correctPassword = 'geremi';

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    header("LOCATION: index.php?q=invalid Email");
	    exit();
	}

	if (strlen($password) < 6 && strlen($password) > 32 ) {
		header("LOCATION: index.php?q=invalid Password");
	    exit();
	}


	if ($email == $correctEmail && $password === $correctPassword) {

		session_start();
		$_SESSION['email'] = $email;

		header("LOCATION: home.php");
	    exit();
	}else{
		header("LOCATION: index.php?q=invalid Login");
	    exit();
	}

/*
Lesson: RDBMS using mysql DB
Goal: Create Social Media / Bloging Platform

Day 1. Mysql DB
SESSION: 1
Topic: Understading Relationship in RDBMS


store: constrain 

	Custormer
	id 	CId	Name 		Address 	City 		Number 
	1 	001	Geremi 		22 			Benin 		09164324075
	2	002	Lex 		23 			Lagos 		1234567890
	3	003	Rex 		23 			Lagos 		1234565690

	Order
	id 	CId 	item 	deliver is_Pre p_o_d  
	1 	002		116 	az1		true 	0
	2	003		118 	k87		false 	1
	3   001		114 	r5t		false 	1
	4  	003 	112 	n9w		true 	0
	5 	002 	117 	az1		true  	0

	deliver 
	id 	d_id	c_name 		city 	manger 
	1 	az1 	Fedex 		NY 		fred 
	2 	n9w		UPS 		ABJ 	Chibuzor
	3 	k87		DHL 		Accra 	Kofi
	4 	r5t		Aramex 		Belin 	Balack 

	item 
	id 	i_id	i_name  	expire  	manifacturer
	1  	111 	ball 		20/12/20 	Addidas	
	2 	112 	food 		10/10/10 	Dangote
	3 	113     milk 		05/05/05 	Peak 
	4 	114 	shoe 		11/11/11 	gucci 		
	5 	115 	bag 		22/02/22 	prada 
	6 	116		ball 		04/02/25 	Nike 
	7 	117 	milk 		02/08/27 	Cowbel 
	8 	118 	bag 		30/01/29	Fendi 


Day 1.
SESSION 2:
TOPIC: Manipulation MySQL using CMD

MySQL workbench 
CMD / Terminal 
Heidi SQL
PHPMyAdmin 
PHP / Python / Node 


CMD ->	SQL ->	MySQL / Maria DB 

	1. Connect to the DB using CMD
	2. Exit the MySQL DB environment
	3. How to display all DBs
	4. How to display all Tables in the DB
	5. Planing a DB table.
	6. syntax for creating a table 
	6. create DB
	7. Create tables
	8. insert into tables
	9. Retrive data from table


	Register

		users
			-> id int (11)
			-> name => varchar (50) 
			-> Date of Birth => date
			-> gendar => enum ('Male', 'Female')
			-> email => varchar (35)
			-> phone => varchar (11)
			-> username => varchar (32)
			-> password => varchar (32)
			-> priv => enum ('User', 'Admin')
			-> date_created => date
		
			Syntax for creating a table 
			CREATE TABLE table_name (
				colums1 datatype (size),
				colums2 datatype,
				colums3 datatype (size)
			);

			Syntax for inserting data into table

			INSERT INTO table_name (colunm1, colunm, ...)
			VALUES (value1, value2, ...)

			Syntax for selecting data from table 
			SELECT * FROM table_name ;


		CREATE TABLE users (
			id int,
			name varchar (50),
			d_o_b date,
			gender enum ('Male', 'Female'),
			email varchar (32),
			phone varchar (11),
			username varchar (32),
			password varchar (255),
			priv enum('user', 'Admin'),
			created_at date 
		); 

		INSERT INTO users (
			id,
			name,
			d_o_b,
			gender,
			email,
			phone,
			username,
			password,
			priv,
			created_at
		)
		VALUES (
			1,
			'geremi',
			'2008-11-18',
			'Male',
			'geremi@geremi101.com',
			'09164324075',
			'geremi101',
			'geremi',
			'Admin',
			'2025-03-25'
		);

		9164324075
		Eze Geremi Matthew
		Opay 

		ASSignment:

			Post
				when users make post
			Comment
				when comment on a post
			Reply
				when a user reply a comment

		Explain the relationship between 
		all the tables 
			users -> post -> comment -> reply

*/