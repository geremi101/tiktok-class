<?php

	try {
		ob_start();
		error_reporting(0);

		// check if config.php file exist
		if (!(@include 'config.php')) throw new Exception("Error Processing Request");		
		
		// establising mysql connection
		$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

		if(!$con) throw new Exception("Error Processing Request");
		ob_end_flush();

	} catch (Exception $e) {
		ob_end_clean();
		header("LOCATION: connection.php?q=Could not established Connection to the server.&r=Kindly provide Database connnection Details with form below");
		exit();
	}


