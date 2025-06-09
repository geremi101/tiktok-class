/*
	DAY1:
		1. how to add JS
			a. Inline
			b. internal
			c. External

		2. Output text
			a. alert
			b. console.log
			c. innerHTML or innerText
			c document.write

		3. JS statements

		4. Comment
		4. Variable in Js
		5. Operators
*/

/*
	Operators
		1. Unary Operators: They accept only one operands 
			a. Increment: increase their operands by 1 
				i. Pre :
					increase before assigning 
				ii. Post: 
					assign before increasing
				
				let x = 10;
				let y;

				y = ++x;

				console.log(x);
				console.log(y);

				x = 11; y = 11; 
				____________________

				let x = 10;
				let y;

				y = x++;

				console.log(x);
				console.log(y);

				x = 11;
				y = 10;

			b. Decrement: Decrease their operands by 1
				Pre: 
					descrease before assigning
				Post: 
					assign before decrease
				
				let x = 10;
				let y;

				y = --x;

				console.log(x);
				console.log(y);

				x = 9; y = 9;

	
				let x = 10;
				let y;

				y = x--;

				console.log(x);
				console.log(y);

				x = 9;
				y = 10;

		2. Binary Operators: They accept 2 operands
			
			Assignment Operators(=): it use to assign a value to variable;
			
			Arithmetic Operators : use to perform basic arithmetic operation
				Addition (+):

					let x = 10; initialization
					let y = 10;
					let z = x + y;
					console.log(z);

				subtration (-)
				division (/)
				multiplication (*)

				modulos (%):

			Comparism / Relative Operators: they are used to compare values
				==
					let x = 5; 
					let y = '5'; 
			
					is x == y
						TRUE

					let i = 10;
					let j = 5;
				
					is i == j
						FALSE
				===
						let x = 5;
						let y = '5';

						is x === y
							FALSE
				<
				>
				<=
				>=
				!=


			Logical / Boolean Operators: TRUE or FALSE
				AND (&&)
				OR (||)
				NOT (!)

				AND execute to a true if and only if both operands are true
					AND 
						T && T ---> TRUE
						F && T ---> FALSE
						T && F ---> FALSE
						F && F ---> FALSE
					
						let x = 10;
						let y = '10';

						is x == y && x === y
							TRUE && FALSE
							FALSE

						let x == 10;
						let y == 5;

						is x < y && x > y && y < x && x == y
							FALSE
				
				OR execute to a true if any of it operand is true
					OR
						T || T ---> TRUE
						T || F ---> TRUE
						F || T ---> TRUE
						F || F ---> FALSE

						let x = 10;
						let y = 5;

						is x > y || x < y || x > y 
							TRUE

				NOT it nagete it operand 
					NOT 
					!T ---> FALSE
					!F ---> TRUE

			Compound:
				+= 
				*=
				\=
				%= 
				!=

		3. Tenary Operator: They accept 3 operands: they accept 3 operand 

			condition ? value if true : value if false
			
			let x = 10;
			let y = 5;

			console.log (x > y ? 'Good Morning' : 'Good Evening ');
			

	DAY 2:
		1. DATA TYPE:
			data type: it determin the kind of value that can be stored in a variable  
			
			variable is named memory location where data is store
		
			Primitive data type:

				numbers
				bigInt

				boolean 
				undefine
				null
				
			abstract: 
				string
				object
				symbols
		
		3. Identifier
			1. must not start with a number 
			2. can not contain as special character 
			3. can not contain spaces


		2. Functions
			fuction is a block of executable statement is perform a specific task

			calling a function:
				1. When an event occurs (when a user clicks a button)
				2. When it is invoked (called) from JavaScript code
				3. Automatically (self invoked)
			function Arguments
			return keyword
*/	

	function myFunction(first, sec) {

		let result = sum(first, sec);
		
		display("The Sum of " + first + " and " + sec + " is = " + result, "alert");

		// The Sum of 3 and 5 is = 100

	}


	function sum(num, num1) {
		let sum = num + num1;
		return sum;
	}


	function display(what, where = "console") {
		
		where == "console" ? console.log(what) : where == "alert" ? alert(what) : document.getElementById('first').innerText = what ;  
	}

	document.getElementById("photo").value = "geremi";