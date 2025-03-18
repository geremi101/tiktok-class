/*
	Js Arrays 
	
	Array as variable that store multiple value		
*/

// what is an array 
// why use
// create an array in Js
// Accessing the value/element
// Array index
// Array length

const cars = ["Camry", "BMW", "Benz", "Lexus"];
const persons = [
	'Geremi', 
	'Anord', 
	'Eze', 
	'Jessy'
];

persons[3] = "Brigth";

persons[4] = "Daniel";

persons.push("Fai");
persons.push("Joy");
persons.push("Gold");

persons[persons.length] = "Matthew";

//console.log(persons.length);

// Write a program that ask the user to enter 
// 3 pet names and store it in an array
// display the pet stored in the array


const person = {
	firstName : "Geremi",
	lastName : "Eze",
	age : 15,
	eyeColor : "brown",
	hairColor : "Black",

	fullName : function () {
		return this.firstName + " " + this.lastName;
	},

	intro : function () {
		return "My Name is " + this.lastName + this.firstName + ". I am " + this.age + "yrs Old";
	},

	favQuote : function (){
		return " The namne is " + this.lastName + this.firstName + this.closing;
	}
};

const pets = [];
function store(){
	pets[0] = document.getElementById('first').value;
	pets[1] = document.getElementById('second').value;
	pets[2] = document.getElementById('third').value;

	console.log(pets[1]);

}
/*
 Js Iterations: 
 	loop construct:
 		for loop
 			foreach
 			for in
 			for off
 		while loop
 		do...while loop
 	Recussion:
*/
// for loop
//
/*
	for (initialization; condition; increament){
		statement;
	}
	count from 0 to 10
*/
persons.push("Diamon");
persons.push("Blessing");
persons.push("Peace");
persons.push("Grace");
persons.push("John");
persons.push("Doe");

/*
	for (let c = 0; c < persons.length; c++){
		console.log(persons[c]);
	}
*/
/*
	while loop

	initialization;
	while(condition){
		statement;
		increamentation
	}
*/
/*



initialization
	do {
		increamentation
	}while(condition);

	the do while loop will execute atleast once
	even if the first condition is false
*/

/*
	for loop is used when you already know the number of time
	the statment will execute: for loop is best working with 
	numbers

	while loop is used when you dont know the number of times
	the statement will execute. it best working with text 

	do while loop is when you want to statement to execute
	atleast once 

	WhatsApp: 09164324075
*/

// Break and Continue statement


/*
let c = 0;
while(c < 9){
	c++;
	console.log(c);

	if(c == 5)
		continue;

	console.log("This will stop displaying after continue");
	//statement	
}

*/
/*
	Js String and String Manipulations
*/

/*
	Write a program that count the number
	of characters the user enter in the comment box.

	if the box is empty
		disable to Post button

	if the character is more than 20 words
	disable to Post button

	091 6432 4075
*/


// write a program that reverse a string
// geremi imereg


function reverseStr(str){
	let rev = "";

	for(let c = str.length - 1; c >= 0 ; c--){
		rev = rev + str[c];
	}

	return rev;
}
let str = reverseStr("olleh");
//console.log(str);

/*
	Date Object in JS
		1. Date() constructor
		2. Date(date string)
		3. Date(year, month)
		4. Date(year, month, day)
		5. Date(year, month, day, hours)
		6. Date(year, month, day, hours, min)
		7. Date(year, month, day, hours, min, sec)
		8. Date(year, month, day, hours, min, sec, ms)
		9. Date(ms)

		Date Methods
			-- Display
				-- .toDateString() //display date in a readable fmt
				-- parse() // convert date to miliseconds
			-- get
				-- getFullYear() // display only year
				-- getMonth() // display month 0-11
				-- getDate() // get day 1-31
				-- getDay() // week day 0-6
				-- getHours() // hour 0-23
				-- getMinutes() // min 0-59
				-- getSeconds() // sec 0-59
				-- getMillisconds() // ms 0-999
				-- getTime() // time in ms 1970
			-- Set
				-- setFullYear() // set year YYYY
				-- setMonth() // set 0-11
				-- setDate() // set day as 1-31
				-- setHours() // set hour 0-23
				-- setMinutes() // 0-59
				-- setSeconds() // 0-59
				-- 


const days = ["Dimach", "Lendi", "Mardi", "Mecredi",
	"Jeudi", "Vendredi", "Samendi"];

const d = new Date();
d.setFullYear(1990, 10, 18);

console.log(d);
*/

// Js Maths Obeject 
/*
	
	Math Object 
		1. Math Property 
		 -- Syntax of Math property
		2. Math Method
			-- Syntax


*/
// whatsapp 09164324075
// Math.property
// Math.method(number)

// Js Round method round a number to the nearest integer
const roundedNumber = Math.round(3.1);

// Js Ceil method round up to the nearest interger
const ceilNumber = Math.ceil(4.1);

// Js Floor method round down to the nearest interger
const flooredNumber = Math.floor(4.3);

// Js pow. math.pow(x, y) return the value of x to the power of y
const pw = Math.pow(2, 3);

// Js sqrt. Math.sqrt(x) return the square root of x 
const rt = Math.sqrt(64);

// Js abs. Math.abs(x) return absolute value of x 
const abs = Math.abs(-4.7);

// Js Min and Max method. 
const min = Math.min(7, 6, 3, 9, 8, 10, 200);

const max = Math.max(7, 6, 3, 9, 8, 10, 200);

// Js Random return a random 0 
const rnd = Math.floor( Math.random() * 100);

// a function to generate random number btw 2 int 
function getRndNumber(min, max){
	return Math.floor( Math.random() * (max - min) ) + min;
}

console.log( getRndNumber(10, 100)  );
console.log( getRndNumber(20, 1000)  );
console.log( getRndNumber(1, 10)  );

/*

	P Hypertext Prepocessor 
	Server side scripting 


	How to setup for PHP
		-- install xampp suit

	What can PHP Do
		-- Generate Dynamic page content
		-- Create File, Read File, open, write, delete, close
		-- Collect Form Data
		-- Send/receive cookies
		-- Perform DB operation
		-- Encrypt data
*/