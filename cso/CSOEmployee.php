<?php

	class CSOEmployee {
	
		#Attributes
		private $employeeID;
		private $employeeLastName;
		private $employeeFirstName;
		private $employeeMiddleName;
		private $employeeGender;
		
		#Setters
		private function setEmployeeID($empID) {
			$this->employeeID = $empID;
		}
		
		private function setEmployeeLastName($empLastName) {
			$this->employeeLastName = $empLastName;
		}
		
		private function setEmployeeFirstName($empFirstName) {
			$this->employeeFirstName = $empFIrstName;
		}
		
		private function setEmployeeMiddleName($empMidName) {
			$this->employeeMiddleName = $empMidName;
		}
		
		private function setEmployeeGender($empGender) {
			$this->employeeGender = $empGender;
		}
		
		#Getters
		public function getEmployeeID() {
			$this->employeeID;
		}
		
		public function getEmployeeLastName() {
			$this->employeeLastName;
		}
		
		public function getEmployeeFirstName() {
			$this->employeeFirstName;
		}
		
		public function getEmployeeMiddleName() {
			$this->employeeMiddleName;
		}
		
		public function getEmployeeGender() {
			$this->employeeGender;
		}
		
	}
?>