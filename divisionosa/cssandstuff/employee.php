<?
	class employee
	{
		$table_name = "osa_employee";
	
		private $employee_Id;
		private $employee_gender;
		private $employee_firstname;
		private $employee_middlename;
		private $employee_lastname;
		private $employee_housingtype;
		private $employee_housenumber;
		private $employee_street;
		private $employee_barangay;
		private $employee_city;
		private $employee_provincial;
		private $employee_phone;
		private $employee_mobile;
		private $employee_birthdate;
		private $employee_birthplace;
		private $employee_civilstatus;
		private $employee_citizenship;
		private $employee_email;
		private $employee_emergencyperson;
		private $employee_emergencynumber;
		private $employee_emergencyaddress;
		private $employee_type;
		private $division;
		
		function employee() {}
		
		//Employee Id
		protected function setEmployee_Id($employee_Id) { $this->employee_Id = $employee_Id; }
		public function getEmployee_Id() { return $this->employee_Id; }
		//Gender
		protected function setEmployee_gender($employee_gender) { $this->employee_gender = $employee_gender; }
		public function getEmployee_gender() { return $this->employee_gender; }
		//First Name
		protected function setEmployee_firstname($employee_firstname) { $this->employee_firstname = $employee_firstname; }
		public function getEmployee_firstname() { return $this->employee_firstname; }
		//Middle Name
		protected function setEmployee_middlename($employee_middlename) { $this->employee_middlename = $employee_middlename; }
		public function getEmployee_middlename() { return $this->employee_middlename; }
		//Last Name
		protected function setEmployee_lastname($employee_lastname) { $this->employee_lastname = $employee_lastname; }
		public function getEmployee_lastname() { return $this->employee_lastname; }
		//Housing type
		protected function setEmployee_housingtype($employee_housingtype) { $this->employee_housingtype = $employee_housingtype; }
		public function getEmployee_housingtype() { return $this->employee_housingtype; }
		//House #
		protected function setEmployee_housenumber($employee_housenumber) { $this->employee_housenumber = $employee_housenumber; }
		public function getEmployee_housenumber() { return $this->employee_housenumber; }
		//Street Address
		protected function setEmployee_street($employee_street) { $this->employee_street = $employee_street; }
		public function getEmployee_street() { return $this->employee_street; }
		//Barangay Address
		protected function setEmployee_barangay($employee_barangay) { $this->employee_barangay = $employee_barangay; }
		public function getEmployee_barangay() { return $this->employee_barangay; }
		//City Address
		protected function setEmployee_city($employee_city) { $this->employee_city = $employee_city; }
		public function getEmployee_city() { return $this->employee_city; }
		//Provincial Address
		protected function setEmployee_provincial($employee_provincial) { $this->employee_provincial = $employee_provincial; }
		public function getEmployee_provincial() { return $this->employee_provincial; }
		//Phone Number
		protected function setEmployee_phone($employee_phone) { $this->employee_phone = $employee_phone; }
		public function getEmployee_phone() { return $this->employee_phone; }
		//Mobile Phone Number
		protected function setEmployee_mobile($employee_mobile) { $this->employee_mobile = $employee_mobile; }
		public function getEmployee_mobile() { return $this->employee_mobile; }
		//Birthdate
		protected function setEmployee_birthdate($employee_birthdate) { $this->employee_birthdate = $employee_birthdate; }
		public function getEmployee_birthdate() { return $this->employee_birthdate; }
		//Birthplace
		protected function setEmployee_birthplace($employee_birthplace) { $this->employee_birthplace = $employee_birthplace; }
		public function getEmployee_birthplace() { return $this->employee_birthplace; }
		//Civil Status
		protected function setEmployee_civilstatus($employee_civilstatus) { $this->employee_civilstatus = $employee_civilstatus; }
		public function getEmployee_civilstatus() { return $this->employee_civilstatus; }
		//Country of Citizenship
		protected function setEmployee_citizenship($employee_citizenship) { $this->employee_citizenship = $employee_citizenship; }
		public function getEmployee_citizenship() { return $this->employee_citizenship; }
		//email address
		protected function setEmployee_email($employee_email) { $this->employee_email = $employee_email; }
		public function getEmployee_email() { return $this->employee_email; }
		//emergency contact person's name
		protected function setEmployee_emergencyperson($employee_emergencyperson) { $this->employee_emergencyperson = $employee_emergencyperson; }
		public function getEmployee_emergencyperson() { return $this->employee_emergencyperson; }
		//contact person's emergency number 
		protected function setEmployee_emergencynumber($employee_emergencynumber) { $this->employee_emergencynumber = $employee_emergencynumber; }
		public function getEmployee_emergencynumber() { return $this->employee_emergencynumber; }
		//address of emergency person
		protected function setEmployee_emergencyaddress($employee_emergencyaddress) { $this->employee_emergencyaddress = $employee_emergencyaddress; }
		public function getEmployee_emergencyaddress() { return $this->employee_emergencyaddress; }
		//employee type/designation
		protected function setEmployee_type($employee_type) { $this->employee_type = $employee_type; }
		public function getEmployee_type() { return $this->employee_type; }
		//employee designated division
		protected function setEmployee_div($division) { $this->division = $division; }
		public function getEmployee_div() { return $this->division; }
		
		public function saveEmployee_DB() {
		}
	}
	
	$emp = new employee();
	echo $emp->firstname;
	$emp->setEmployee_firstname("ee");
	echo $emp->getEmployee_Firstname();
?>