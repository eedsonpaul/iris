<?
	class section{
		private $section_number;
		private $academic_year;
		private $academic_sem;
		private $course_code;
		//private $subject_number;//
		private $section;
		private $units;//
		private $day;//
		private $start_time;//
		private $end_time;//
		private $class_type;//
		private $room;//
		private $dissolved;
		private $faculty_number;
		private $available_slots;
		
		function section($section_number,$academic_year,$academic_sem,$course_code,$section,$units,$day,$start_time,$end_time,$class_type,$room,$dissolved,$faculty_number,$available_slots) {
			$this->$section_number	= $section_number;
			$this->$academic_year	= $academic_year;
			$this->$academic_sem	= $academic_sem;
			$this->$course_code		= $course_code;
			$this->$section			= $section;
			$this->$units			= $units;
			$this->$day				= $day;
			$this->$start_time		= $start_time;
			$this->$end_time		= $end_time;
			$this->$class_type		= $class_type;
			$this->$room			= $room;
			$this->$dissolved		= $dissolved;
			$this->$faculty_number	= $faculty_number;
			$this->$available_slots	= $available_slots;
		}
		
		protected function setSection_num($section_number) { $this->section_number = $section_number; }
		public function getSection_num() { return $this->section_number; }
		
		protected function setAcademic_year($academic_year) { $this->academic_year = $academic_year; }
		public function getAcademic_year() { return $this->academic_year; }
		
		protected function setAcademic_sem($academic_sem) { $this->academic_sem = $academic_sem; }
		public function getAcademic_sem() { return $this->academic_sem; }
		
		protected function setCourse_code($course_code) { $this->course_code = $course_code; }
		public function getCourse_code() { return $this->course_code; }
		
		protected function setSection($section) { $this->section = $section; }
		public function getSection() { return $this->section; }
		
		protected function setDissolved($dissolved) { $this->dissolved = $dissolved; }
		public function getDissolved() { return $this->dissolved; }
		
		protected function setFaculty_num($faculty_num) { $this->faculty_num = $faculty_num; }
		public function getFaculty_num() { return $this->faculty_num; }
		
		protected function setAvailable_slots($available_slots) { $this->available_slots = $available_slots; }
		public function getAvailable_slots() { return $this->available_slots; }
	}
?>