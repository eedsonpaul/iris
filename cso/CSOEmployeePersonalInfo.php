<?php

	class CSOEmployeePersonalInfo extends CSOEmployee {
	
		#Attributes
		private $employeeEmailAddress;
		private $employeeTINID
		private $employeeGSISID;
		private $employeeSSSID;
		private $employeePAGIBIGID;
		private	$employeePHILHEALTHID;
		private $employeeParentsAddressBgry;
		private $employeeParentsAddressCityMunicipality;
		private $employeePresentAddressBgry;
		private $employeePresentAddressCityMunicipality;
		private $employeeContactPersonGuardianName;
		private $employeeContactPersonGuardianAddressBrgy;
		private $employeeContactPersonGuardianAddressCityMunicipality;
		private $employeeMaidenName;
		private $employeeCivilStatus;
		private $employeeBirthdate;
		private $employeeBirthplaceMunicipality;
		private $employeeBloodType;
		private $employeeHeight;
		private $employeeWeight;
		private $employeeLandlineMobilePhoneNumber;
		private $employeeSpouseName;
		private $employeeSpouseOccupation;
		private $employeeSpouseEmployer;
		private $employeeSpousePhoneNumber;
		private $employeeFathersName;
		private $employeeMothersName;
		private $employeeParentsAddressHouseNumber;
		private $employeeParentsAddressStreet;
		private $employeeParentsContactNumber;
		private $employeePresentAddressHouseNumber;
		private $employeePresentAddressStreet;
		private $employeeHomeProvincialAddressHouseNumber;
		private $employeeHomeProvincialAddressStreet;
		private $employeeHomeProvincialAddressBrgy;
		private $employeeHomeProvincialAddressCityMunicipality;
		private $employeeContactPersonGuardianAddressHouseNumber;
		private $employeeContactPersonGuardianAddressStreet;
		
		#Setters
		private function setEmployeeEmailAddress($empEAdd) {
			$this->employeeEmailAddress = $empEAdd;
		}
		
		private function setEmployeeTINID($empTinID) {
			$this->employeeTINID = $empTInID;
		}
		
		private function setEmployeeGSISID($empGsisID){
			$this->employeeGSISID = $empGsisID;
		}
		
		private function setEmployeeSSSID($empSssID) {
			$this->employeeSSSID = $empSssID;
		}
		
		private function setEmployeePAGIBIGID($empPagibigID) {
			$this->employeePAGIBIGID = $empPagibigID;
		}
		
		private	function setEmployeePHILHEALTHID($empPhilhealthID) {
			$this->employeePHILHEALTHID = $empPhilhealthID;
		}
		
		private function setEmployeeParentsAddressBgry($empParAddBrgy) {
			$this->employeeParentsAddressBgry = $empParAddBrgy;
		}
		
		private function setEmployeeParentsAddressCityMunicipality($empParAddCtyMuni) {
			$this->employeeParentsAddressCityMunicipality = $empParAddCtyMuni;
		}
		
		private function setEmployeePresentAddressBgry($empPresAddBrgy) {
			$this->employeePresentAddressBgry = $empPresAddBrgy;
		}
		
		private function setEmployeePresentAddressCityMunicipality($empPresAddCtyMuni) {
			$this->employeePresentAddressCityMunicipality = $empPresAddCtyMuni;
		}
		
		private function setEmployeeContactPersonGuardianName($empContactGuardName) {
			$this->employeeContactPersonGuardianName = $empContactGuardName;
		}
		
		private function setEmployeeContactPersonGuardianAddressBrgy($empContactGuardAddBrgy) {
			$this->employeeContactPersonGuardianAddressBrgy = $empContactGuardAddBrgy;
		}
		
		private function setEmployeeContactPersonGuardianAddressCityMunicipality($empContactGuardAddCtyMuni) {
			$this->employeeContactPersonGuardianAddressCityMunicipality = $empContactGuardAddCtyMuni;
		}
		
		private function setEmployeeMaidenName($empMaidName) {
			$this->employeeMaidenName = $empMaidName;
		}
		
		private function setEmployeeCivilStatus($empCivilStat) {
			$this->employeeCivilStatus = $empCivilStat;
		}
		
		private function setEmployeeBirthdate($empBDate) {
			$this->employeeBirthdate = $empBDate;
		}
		
		private function setEmployeeBirthplaceMunicipality($empBPlaceMuni) {
			$this->employeeBirthplaceMunicipality = $empBPlaceMuni;
		}
		
		private function setEmployeeBloodType($empBloodtype) {
			$this->employeeBloodType = $empBloodtype;
		}
		
		private function setEmployeeHeight($empHeight) {
			$this->employeeHeight = $empHeight;
		}
		
		private function setEmployeeWeight($empWeight) {
			$this->employeeWeight = $empWeight;
		}
		
		private function setEmployeeLandlineMobilePhoneNumber($empLandMobPhoneNum) {
			$this->employeeLandlineMobilePhoneNumber = $empLandMobPhoneNum;
		}
		
		private function setEmployeeSpouseName($empSpName) {
			$this->employeeSpouseName = $empSpName;
		}
		
		private function setEmployeeSpouseOccupation($empSpOccu) {
			$this->employeeSpouseOccupation = $empSpOccu;
		}
		
		private function setEmployeeSpouseEmployer($empSpEmp) {
			$this->employeeSpouseEmployer = $empSpEmp;
		}
		
		private function setEmployeeSpousePhoneNumber($empSpPhoneNum) {
			$this->employeeSpousePhoneNumber = $empSpPhoneNum;
		}
		
		private function setEmployeeFathersName($empFatherName) {
			$this->employeeFathersName = $empFatherName;
		}
		
		private function setEmployeeMothersName($empMotherName) {
			$this->employeeMothersName;
		}
		
		private function setEmployeeParentsAddressHouseNumber($empParAddHouseNum) {
			$this->employeeParentsAddressHouseNumber = $empParAddHouseNum;
		}
		
		private function setEmployeeParentsAddressStreet($empParAddStr) {
			$this->employeeParentsAddressStreet = $empParAddStr;
		}
		
		private function setEmployeeParentsContactNumber($empParContactNum) {
			$this->employeeParentsContactNumber = $empParContactNum;
		}
		
		private function setEmployeePresentAddressHouseNumber($empPresAddHouseNum) {
			$this->employeePresentAddressHouseNumber = $empPressAddHouseNum;
		}
		
		private function setEmployeePresentAddressStreet($empPresAddStr) {
			$this->employeePresentAddressStreet = $empPresAddStr;
		}
		
		private function setEmployeeHomeProvincialAddressHouseNumber($empHomeProvAddHouseNum) {
			$this->employeeHomeProvincialAddressHouseNumber = $empHomeProvAddHouseNum;
		}
		
		private function setEmployeeHomeProvincialAddressStreet($empHomeProvAddStr) {
			$this->employeeHomeProvincialAddressStreet = $empHomeProvAddStr;
		}
		
		private function setEmployeeHomeProvincialAddressBrgy($empHomeProvAddBrgy) {
			$this->employeeHomeProvincialAddressBrgy = $empHomeProvAddBrgy;
		}
		
		private function setEmployeeHomeProvincialAddressCityMunicipality($empHomeProvAddCtyMuni) {
			$this->$employeeHomeProvincialAddressCityMunicipality = $empHomeProvAddCtyMuni;
		}
		
		private function setEmployeeContactPersonGuardianAddressHouseNumber($empContactGuardAddHouseNum) {
			$this->employeeContactPersonGuardianAddressHouseNumber = $empContactGuardAddHouseNum;
		}
		
		private function setEmployeeContactPersonGuardianAddressStreet($empContactGuardAddStr) {
			$this->employeeContactPersonGuardianAddressStreet = $empContactGuardAddStr;
		} 
		
		#Getters
		public function getEmployeeEmailAddress() {
			return $this->employeeEmailAddress;
		}
		
		public function getEmployeeTINID() {
			return $this->employeeTINID;
		}
		
		public function getEmployeeGSISID(){
			return $this->employeeGSISID;
		}
		
		public function getEmployeeSSSID() {
			return $this->employeeSSSID;
		}
		
		public function getEmployeePAGIBIGID() {
			return $this->employeePAGIBIGID;
		}
		
		public	function getEmployeePHILHEALTHID() {
			return $this->employeePHILHEALTHID;
		}
		
		public function getEmployeeParentsAddressBgry() {
			return $this->employeeParentsAddressBgry;
		}
		
		public function getEmployeeParentsAddressCityMunicipality() {
			return $this->employeeParentsAddressCityMunicipality;
		}
		
		public function getEmployeePresentAddressBgry() {
			return $this->employeePresentAddressBgry;
		}
		
		public function getEmployeePresentAddressCityMunicipality() {
			return $this->employeePresentAddressCityMunicipality;
		}
		
		public function getEmployeeContactPersonGuardianName() {
			return $this->employeeContactPersonGuardianName;
		}
		
		public function getEmployeeContactPersonGuardianAddressBrgy() {
			$this->employeeContactPersonGuardianAddressBrgy;
		}
		
		public function getEmployeeContactPersonGuardianAddressCityMunicipality() {
			$this->employeeContactPersonGuardianAddressCityMunicipality;
		}
		
		public function getEmployeeMaidenName() {
			$this->employeeMaidenName;
		}
		
		public function getEmployeeCivilStatus() {
			$this->employeeCivilStatus;
		}
		
		public function getEmployeeBirthdate() {
			$this->employeeBirthdate;
		}
		
		public function getEmployeeBirthplaceMunicipality() {
			$this->employeeBirthplaceMunicipality;
		}
		
		public function getEmployeeBloodType() {
			$this->employeeBloodType;
		}
		
		public function getEmployeeHeight() {
			$this->employeeHeight;
		}
		
		public function getEmployeeWeight() {
			$this->employeeWeight;
		}
		
		public function getEmployeeLandlineMobilePhoneNumber() {
			$this->employeeLandlineMobilePhoneNumber;
		}
		
		public function getEmployeeSpouseName() {
			$this->employeeSpouseName;
		}
		
		public function getEmployeeSpouseOccupation() {
			$this->employeeSpouseOccupation;
		}
		
		public function getEmployeeSpouseEmployer() {
			$this->employeeSpouseEmployer;
		}
		
		public function getEmployeeSpousePhoneNumber() {
			$this->employeeSpousePhoneNumber;
		}
		
		public function getEmployeeFathersName() {
			$this->employeeFathersName;
		}
		
		public function getEmployeeMothersName() {
			$this->employeeMothersName;
		}
		
		public function getEmployeeParentsAddressHouseNumber() {
			$this->employeeParentsAddressHouseNumber;
		}
		
		public function getEmployeeParentsAddressStreet() {
			$this->employeeParentsAddressStreet;
		}
		
		public function getEmployeeParentsContactNumber() {
			$this->employeeParentsContactNumber;
		}
		
		public function getEmployeePresentAddressHouseNumber() {
			$this->employeePresentAddressHouseNumber;
		}
		
		public function getEmployeePresentAddressStreet() {
			$this->employeePresentAddressStreet;
		}
		
		public function getEmployeeHomeProvincialAddressHouseNumber() {
			$this->employeeHomeProvincialAddressHouseNumber;
		}
		
		public function getEmployeeHomeProvincialAddressStreet() {
			$this->employeeHomeProvincialAddressStreet;
		}
		
		public function getEmployeeHomeProvincialAddressBrgy() {
			$this->employeeHomeProvincialAddressBrgy;
		}
		
		public function getEmployeeHomeProvincialAddressCityMunicipality() {
			$this->$employeeHomeProvincialAddressCityMunicipality;
		}
		
		public function getEmployeeContactPersonGuardianAddressHouseNumber() {
			$this->employeeContactPersonGuardianAddressHouseNumber;
		}
		
		public function getEmployeeContactPersonGuardianAddressStreet() {
			$this->employeeContactPersonGuardianAddressStreet;
		} 
	}
?>