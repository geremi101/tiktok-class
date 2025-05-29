<?php

	class Authentication {

		// properties 
		private $con;

		function __construct($con){
			$this->con = $con;
		}

		// methods 
		/*
			login
			register
			forget password
			change password 
			OTP
			2FA 
		*/

		public function login($cred, $password){
			$user = mysqli_query($this->con, "SELECT id FROM users 
					WHERE (email = '$cred' OR 
				phone = '$cred' OR 
				username = '$cred') AND 
				password = '$password' ");

			if (mysqli_num_rows($user) > 0) {
				$user = mysqli_fetch_assoc($user);
				session_start();
				$_SESSION['id'] = $user['id'];
				return true;
			}else{
				return false;
			}
		}

		public function register ($name, $email, $phone, $username, $dob, $password, $gender){
			
			// run SQL Query
			$insert = mysqli_query($this->con, "INSERT INTO users (id, name, d_o_b, gender, email, phone, username, password) 
				VALUES(13, '$name', '$dob', '$gender', '$email', '$phone', '$username', '$password') ");

			if($insert){
				return true;
			}else{
				return false;
			}
		}

		public function forgePassword($email){
		}

		public function changePass($newPass, $id){
			$upd = mysqli_query($this->con, "UPDATE users SET password = '$newPass' WHERE id = '$id' ");

			if($upd){
				return true;
			}else{
				return false;
			}
		}

		public function checkPasswordMatch($newPass, $conPass){
			if($newPass === $conPass){
				return true;
			}else{
				return false;
			}
		}

		public function checkOldPasswordMatch($old, $id){
			$user = mysqli_query($this->con, "SELECT password FROM users WHERE id = '$id' ");

			$user = mysqli_fetch_assoc($user);
			
			if($user['password'] === $old){
				return true;
			}else{
				return false;
			}
		}

		public function checkNewPasswordMatch($pass, $old){
			if($pass === $old){
				return true;
			}else{
				return false;
			}
		}

		public function twoFA ($cred){

		}

		private function sendOtp(){

		}
		private function checkOtp(){

		}
		private function checkOTPLocation(){

		}
	}
