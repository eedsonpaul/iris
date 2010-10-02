<?
	class degreeProgram
	{
		$table_name = "osa_degree_program";
	
		private $program_number;
		private $division_id;
		private $program_code;
		private $degree_lvl;
		private $numberOfyears;
		private $requiredUnits;
		private $degreeName;
		private $degreeTitle;
		private $major;
		private $minor;
		private $credited;
		private $currently_offered;
		private $entrance_code;
		private $enrollment_quota;
		private $date_proposed;
		private $date_implemented;
		private $date_revised;
		private $tuition_per_unit;
		private $description;
		
		function degreeProgram($program_number) {}
		
		protected function setProgram_Number($program_number) { $this->program_number = $program_number; }
		public function getProgram_Number() { return $this->program_number; }
		
		protected function setDivision_id($division_id) { $this->division_id = $division_id; }
		public function getDivision_id() { return $this->division_id; }
		
		protected function setProgram_code($program_code) { $this->program_code = $program_code; }
		public function getProgram_code() { return $this->program_code; }
		
		protected function setDegree_lvl($degree_lvl) { $this->degree_lvl = $degree_lvl; }
		public function getDegree_lvl() { return $this->degree_lvl; }
		
		protected function setNumberOfyears($numberOfyears) { $this->numberOfyears = $numberOfyears; }
		public function getNumberOfyears() { return $this->numberOfyears; }
		
		protected function setReqUnits($requiredUnits) { $this->requiredUnits = $requiredUnits; }
		public function getReqUnits() { return $this->requiredUnits; }
		
		protected function setDegreeName($degreeName) { $this->degreeName = $degreeName; }
		public function getDegreeName() { return $this->degreeName; }
		
		protected function setDegreeTitle($degreeTitle) { $this->degreeTitle = $degreeTitle; }
		public function getDegreeTitle() { return $this->degreeTitle; }
		
		protected function setMajor($major) { $this->major = $major; }
		public function getMajor() { return $this->major; }
		
		protected function setMinor($minor) { $this->minor = $minor; }
		public function getMinor() { return $this->minor; }
		
		protected function setCredited($credited) { $this->credited = $credited; }
		public function getCredited() { return $this->credited; }
		
		protected function setCurrently_offered($currently_offered) { $this->currently_offered = $currently_offered; }
		public function getCurrently_offered() { return $this->currently_offered; }
		
		protected function setEntrance_code($entrance_code) { $this->entrance_code = $entrance_code; }
		public function getEntrance_code() { return $this->entrance_code; }
		
		protected function setEnrollment_quota($enrollment_quota) { $this->enrollment_quota = $enrollment_quota; }
		public function getEnrollment_quota() { return $this->enrollment_quota; }
		
		protected function setDate_proposed($date_proposed) { $this->date_proposed = $date_proposed; }
		public function getDate_proposed() { return $this->date_proposed; }
		
		protected function setDate_implemented($date_implemented) { $this->date_implemented = $date_implemented; }
		public function getDate_implemented() { return $this->date_implemented; }
		
		protected function setDate_revised($date_revised) { $this->date_revised = $date_revised; }
		public function getDate_revised() { return $this->date_revised; }
		
		protected function setTuition_per_unit($tuition_per_unit) { $this->tuition_per_unit = $tuition_per_unit; }
		public function getTuition_per_unit() { return $this->tuition_per_unit; }
		
		protected function setDescription($description) { $this->description = $description; }
		public function getDescription() { return $this->description; }
		
		protected function saveTo_DB() {
		}
	}
?>
