<?php
	ob_start();
	session_start();

	if (!isset($_SESSION['email'])) {
		header("LOCATION: index.php?q=You must Login to see this page");
	    exit();
	}
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
		
		<div class="card mb-3 mt-4">
		  <img src="https://geremi101.com/assets/images/banner.jpg" class="card-img-top" alt="...">
		  <div class="card-body">
		    <h5 class="card-title">Card title</h5>
		    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
		    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
		  </div>
		</div>
	</div>

	<div class="row m-2">
	  <div class="col-sm-6 mb-3 mb-sm-0">
	    <div class="card">
	      <div class="card-body">
	        <h5 class="card-title">Special title treatment</h5>
	        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
	        <a href="#" class="btn btn-primary">Go somewhere</a>
	      </div>
	    </div>
	  </div>
	  <div class="col-sm-6">
	    <div class="card">
	      <div class="card-body">
	        <h5 class="card-title">Special title treatment</h5>
	        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
	        <a href="#" class="btn btn-primary">Go somewhere</a>
	      </div>
	    </div>
	  </div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>