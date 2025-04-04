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
		</head>
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
		          <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Profile</a>
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
		<div class="row m-2">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<div class="card mb-3 mt-4">
				  <img  src="upload/<?php echo $user['profile_pix']; ?>" class="card-img-top" style="height: 300px; cursor: pointer;" alt="..." data-bs-toggle="modal" data-bs-target="#profilePix">

				  <!-- Upload Profile Pix Modal -->
		<div class="modal fade" id="profilePix" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h1 class="modal-title fs-5" id="exampleModalLabel">Change Profile Picture</h1>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		       
		       <form method="post" action="uploadPix.php" enctype="multipart/form-data" >

		       	<div class="mb-3">
  <label for="formFileSm" class="form-label">Select Pic To upload:</label>
  <input class="form-control form-control-sm" name="pix" id="formFileSm" type="file" required>
</div>
		       	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save changes</button>

		       </form>

		      </div>
		    </div>
		  </div>
		</div>
				  <div class="card-body">
				    <h5 class="card-title">Welcome <?php echo ucwords($user['name']) ?></h5>
				    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
				  </div>
				</div>
			</div>

			<div class="col-sm-6 mb-3 mt-4 mb-sm-0">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">What's on your mind</h5>
			        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
			        <a href="#" class="btn btn-primary">Go somewhere</a>
			      </div>
			    </div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>