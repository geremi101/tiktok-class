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
			<title>Connection to DB</title>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">		
		</head>
	<body>
		<div class="container-fluid">
			<h1>Provide Connection Details Below</h1>

			<div class="card col-sm-6 offset-sm-3">
				<div class="card-header">
				    <b>Connect to DB </b>
				</div>
			  	<div class="card-body">
			  		<?php

			  			echo isset($_GET["q"]) ? 
			  			'<div class="alert alert-danger"><b>'.$_GET["q"].'</b></div>' : "";

			  			echo isset($_GET["r"]) ? 
			  				'<small class="text-muted">'.$_GET["r"].'</small>' : "";


			  			echo isset($_GET["s"]) ? 
			  				'<div class="alert alert-success">'.$_GET["s"].'</div>' : "";

			  			echo isset($_GET["rs"]) ? 
			  				'<small class="text-success">'.$_GET["rs"].'</small>' : "";
					?>

	<form method="post" action="configure.php">
		<div class="mb-3">
		  <label for="host" class="form-label">Host</label>
		  <input type="text" class="form-control" name="host" id="host" placeholder="Enter Database Host" required />
		</div>

		<div class="mb-3">
		  <label for="host" class="form-label">Username</label>
		  <input type="text" class="form-control" name="username" id="username" placeholder="Enter Database User" required />
		</div>

		<div class="mb-3">
		  <label for="password" class="form-label">Password</label>
		  <input type="text" class="form-control" name="password" id="password" placeholder="Enter Database Password" />
		</div>

		<div class="mb-3">
		  <label for="host" class="form-label">Database</label>
		  <input type="text" class="form-control" name="database" id="database" placeholder="Enter Database Name" required />
		</div>
					  <button type="submit" class="btn btn-success">Connect To Database</button>

					</form>
			 	</div>
			</div>

		</div>
	</body>
</html>
