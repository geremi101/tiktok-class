<?php

	$con = mysqli_connect("localhost", "root", "", "tiktok_class");

	// test DB connection
	if(!$con){
		die("Unable to establish DB Connect!");
	}