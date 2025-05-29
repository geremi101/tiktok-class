<?php
	ob_start();
	session_start();

	if (!isset($_SESSION['id'])) {
		header("LOCATION: index.php?q=You must Login to see this page");
	    exit();
	}

	require 'connect.php';

	$id = $_SESSION['id'];

	$user = mysqli_query($con, "SELECT name, profile_pix FROM users WHERE id = '$id' ");

	$user = mysqli_fetch_assoc($user);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome Home</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">		
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body data-bs-theme="dark">
	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="#">LexApp</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="home.php">Dashboard</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="profile.php">Profile</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="logout.php">Logout</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>

		<?php

	  	echo isset($_GET["q"]) ? 
	  		'<div class="alert alert-danger">'.$_GET["q"].'</div>' : "";

	  	echo isset($_GET["s"]) ? 
	  		'<div class="alert alert-success">'.$_GET["s"].'</div>' : "";
		?>

		<form method="post" action="ChangePassword.php">
		  <div class="mb-3">
		    <label for="oldPassword" class="form-label">
		    	Old PAssword
		    </label>
		    <input type="text" name="oldPassword" class="form-control" id="oldPassword" aria-describedby="oldPassword">
		  </div>
		  <div class="mb-3">
		    <label for="newPassword" class="form-label">
		    	Password
		    </label>
		    <input type="text" name="newPassword" class="form-control" id="newPassword">
		  </div>
		  <div class="mb-3">
		    <label for="confirmPassword" class="form-label">
		    	Password
		    </label>
		    <input type="text" name="confirmPassword" class="form-control" id="confirmPassword">
		  </div>
		  <button type="submit" class="btn btn-primary">Change Password</button>
		</form>

	</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>