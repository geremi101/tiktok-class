<?php
	ob_start();
	session_start();

	if (isset($_SESSION['email'])) {
	    header("Location: home.php");
	    exit();
	}

	if($_SERVER['REQUEST_METHOD'] !== 'POST') {
		header("LOCATION: configure.php");
		exit();
	}

	if(!isset($_POST['host'], $_POST['username'], $_POST['database']) ){
		header("LOCATION: index.php?q=Fill the login Form");
		exit();
	}

	function checkConnection($file){
 		if (file_exists($file)) {
	        include_once $file;
	        if (defined('HOST') && defined('USERNAME') && defined('PASSWORD') && defined('DATABASE')) {
	        	try{
	        		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	            	$con = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
	            	$con->close();
	            	return true;
	            } catch (Exception $e) {
	            	return false;
				}
	        }
	    }
	    return false;
 	}

    if(checkConnection('config.php')){
    	header("Location: connection.php?q=A database connection already established.&r=There is an active DATABASE connection, so the system did not create a new one!");
        exit();
    }

	$connectionDetails = "<?php
		define('HOST', '".addslashes($_POST['host'])."');
		define('USERNAME', '".addslashes($_POST['username'])."');
		define('PASSWORD', '".addslashes($_POST['password'])."');
		define('DATABASE', '".addslashes($_POST['database'])."');
	?>";

	$config = fopen('config.php', 'w');
	if ($config) {
		fwrite($config, $connectionDetails);
		fflush($config);
		fclose($config);
		clearstatcache(true, 'config.php');
		usleep(100000);
	}
	
	if(checkConnection('config.php')){
    	header("Location: connection.php?s=Connection established Sucessfully.&rs=The System has established a secure connection with the credentials you provided!");
        exit();
    }else{
    	header("Location: connection.php?q=Invalid credentials.&r=The System could not established a connection with the credentials you provided!");
        exit();
    }

 	