<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Welcome to our PHP Class</title>
	</head>
	<body>
		<!-- Comment goes here -->
		Geremi the man that is MAD!
		<h1>Geremi101</h1>

		<?php
			// this is a single line comments 
			ECHO 'this is from the PHP block';
		?>

		<br /><br />

		<?php
			# another single line comment 
			echo 'I an jump in and out of PHP';
		?>

		<br /><br />

		<?php
			/* 
				this is for multiple
				plenty 
				lines comments 
			*/
			ecHo 'I can switch from Plain HTML to PHP <br /><br />';


			$name = 'Eze Geremi Matthew';
			/*
				1. A variable must start with $ sign, followed by the name of the variable
				e.g $name, $age, $gender, $etc.

				2. A variable name must start with a letter or the underscore. eg. $n; $_good;

				3. a variable name can not start with a number. eg. $5generation
				4. a variable can only contain alpha-numeric characters and underscore. eg.
				$g763_g; (A-Z, 0-9, _)

				5. variable names in PHP are case sensitive.
				($name and $NAME are two diff variables)
			*/

			echo $name;

			$age = 17;

			echo '<br /><br />';

			print $age;


		?>	
	</body>
</html>



