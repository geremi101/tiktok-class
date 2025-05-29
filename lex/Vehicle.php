<?php
	// parent class / super class / base class
	abstract class Vehicle {
		protected $brand;
		protected $model;
		private $mileage;

		public function __construct($brand, $model, $mileage = 0){
			$this->brand = $brand;
			$this->model = $model;
			$this->mileage = $mileage;
		}

		public function getBrand(){
			return $this->brand;
		}

		public function startEngine(){
			echo 'Engine Started <br />';
		}

		public function getMileage(){
			return $this->mileage;
		}

		public function drive($distance){
			$this->mileage += $distance;
			echo "Driving {$distance} Miles ...<br /> ";
		}

		public function honk ($sound = "Beep Beep"){
			echo $sound."!!! <br />";
		}

		final public function stopEngine(){
			echo "Engine Stoped <br />";
		}
	}

	// child class
	final class ElectricCar extends Vehicle {
		private $batteryLevel;

		public function __construct($brand, $model, $mileage = 0 ){
			parent::__construct($brand, $model, $mileage);
			$this->batteryLevel = 100;
			echo "ElectricCar {$brand} is turn On <br />";
		}

		public function getBatteryLevel(){
			return $this->batteryLevel;
		}

		public function chargeBattery($charge){
			$this->batteryLevel += $charge;
			echo "<br /> Battery {$charge}% Charged !!! <br />";
		}

		private function disCharge($charge){
			$this->batteryLevel -= $charge;
			echo "<br /> {$charge}% of Battery disCharged !!! <br />";
		}

		public function __destruct(){
			echo " ElectricCar {$this->brand} is switched off";
		}
	}

	$innoson = new ElectricCar("geremiBalas", "2025", 20);

	$innoson->startEngine();
	$innoson->drive(100);
	$innoson->getMileage();
	$innoson->honk();
	$innoson->stopEngine();
	$innoson->chargeBattery(100);


