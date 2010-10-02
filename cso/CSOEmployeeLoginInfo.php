<?php
	class CSOEmployeeLoginInfo extends CSOEmployee {
	
		#Attributes
		private $employeeLoginName;
		private $employeePassword;
		private $employeeRetypedPassword;
		private $employeeSecurityQuestion;
		private $employeeAnswerSecurityQuestion;
		
		#Setters
		private function setEmployeeLoginName($empLoginName) {
			$this->employeeLoginName = $empLoginName;
		}
		
		private function setEmployeePassword($empPass) {
			$this->employeePassword = $empPass;
		}
		
		private function setEmployeeRetypedPassword($empRePass) {
			$this->employeeRetypedPassword = $empRePass;
		}
		
		private function setEmployeeSecurityQuestion($empSecQuest) {
			$this->employeeSecurityQuestion = $empSecQuest;
		}
		
		private function setEmployeeAnswerSecurityQuestion($empAnsSecQuest) {
			$this->employeeAnswerSecurityQuestion = $empAnsQuest;
		}
		
		#Getters
		public function getEmployeeLoginName() {
			$this->employeeLoginName;
		}
		
		public function getEmployeePassword() {
			$this->employeePassword;
		}
		
		public function getEmployeeRetypedPassword() {
			$this->employeeRetypedPassword;
		}
		
		public function getEmployeeSecurityQuestion() {
			$this->employeeSecurityQuestion;
		}
		
		public function getEmployeeAnswerSecurityQuestion() {
			$this->employeeAnswerSecurityQuestion;
		}
	}
?>