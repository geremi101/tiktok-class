<?php
	
	# this is a single line comment too
	// this is a sigle line comment 
	/*
		this is a multi line comment 
	
		String 
		Data Type 
		operator 
		functions 
		solve some probelm
	

	// String 

		$g = "<b>Geremi</b> <br />";

		echo '$g is the man that is MAD! <br />';

	// str lenght 
		echo strlen("GEREMI tha man that is MAD");

	// world count 
		str_word_count("Geremi the man that is MAD");
	// Search for a string 
		strpos("Geremi tha man that is MAD", "Geremi");

	// Convert the upper case

		echo strtoupper($g);
	// Convert to lower 
		echo strtolower($g);
	$txt = "there is a man up there";
	echo str_replace("man", "Woman", $txt);
	echo "<br />";
	echo strrev($txt);

	// Remove white space 
	trim($g);

	// String Concatenation

	$txt1 = " this is another string";

	$newText = $txt . $txt1;

	echo $newText;


	echo "$txt $txt1";

	// PHP Super Globals 

	/*
		09164324075

		1. $_SERVER
		2. $_SESSION
		3. $_REQUEST
		4. $_POST
		5. $_GET
		6. $_FILES
		7. $_GLOBAL
		8. $_ENV
		9. $_COOKIES

		The are pre-defined Var
		accessible regardless of scope
	*/
?>
<?php
	// 09164324075
	/*
	// Return the filename of the currenly executing script
	echo $_SERVER['PHP_SELF'];
	echo '<br />';
	echo $_SERVER['SERVER_NAME'];

	echo '<br />';

	echo $_SERVER['SERVER_ADDR'];
	echo '<br />';
	echo $_SERVER['REQUEST_METHOD'];
	*/
?>
<?php
	ob_start();
 	session_start();

 	if (isset($_SESSION['email'])) {
		header("LOCATION: home.php");
	   exit();
	}

?>

<!DOCTYPE html>
<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>E - Commerce</title>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">		
		</head>
	<body>
		<div class="container-fluid">
			<h1>Your are one step closer!</h1>

			<div class="card">
				<div class="card-header">
				    Register To Join Our Social Blog
				</div>
			  	<div class="card-body">
			  		<?php

			  	echo isset($_GET["q"]) ? 
			  		'<div class="alert alert-danger">'.$_GET["q"].'</div>' : "";

			  	echo isset($_GET["s"]) ? 
			  		'<div class="alert alert-success">'.$_GET["s"].'</div>' : "";
					?>
	<form method="post" action="createuser.php">

		<div class="mb-3">
  <label for="name" class="form-label">Name</label>
  <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name " required />
</div>
<div>
	Gender:
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="male" value="male">
  <label class="form-check-label" for="male">Male</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="female" value="female">
  <label class="form-check-label" for="female">Female</label>
</div>

<div class="mb-3">
  <label for="dob" class="form-label">Date of Birth</label>
  <input type="date" class="form-control" name="dob" id="dob" placeholder="YYYY-MM-DD" required />
</div>

		<div class="mb-3">
  <label for="username" class="form-label">Username</label>
  <input type="text" class="form-control" name="username" id="username" placeholder="
  enter username" required />
</div>
<div class="mb-3">
  <label for="phone" class="form-label">Phone Number</label>
  <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number" required />
</div>
		<div class="mb-3">
  <label for="email" class="form-label">Email address</label>
  <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required />
</div>

<div class="mb-3">
  <label for="password" class="form-label">Password</label>
  <input type="text" class="form-control" name="password" id="password" placeholder="Enter Password" required />
</div>

					  <button type="submit" class="btn btn-success">Create Account</button>

					  <small><a href="index.php"> Click here to Login</a></small>
					</form>
			 	</div>
			</div>

		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


	</body>
</html>
