<?php

 	ob_start();
 	session_start();

 	session_destroy();
 	header("LOCATION: index.php?q=Logout Successfully!!!");
	exit();