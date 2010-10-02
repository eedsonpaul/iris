<?
	class subject
	{
		private $sub_num;
		private $sub_name;
		private $sub_title;
		private $course_code;
		private $credited;
		private $numeric_grades;
		private $repeatable_to;
		private $date_proposed;
		private $date_approved;
		private $date_first;
		private $date_revision;
		private $date_abolished;
		private $unit;
		private $lab_fee;
		private $rgep;
		private $desc;
		
		function subject($sub_num,$sub_name,$sub_title,$course_code,$credited,$numeric_grades,$repeatable_to,$date_proposed,$date_approved,$date_first,$date_revision,$date_abolished,$unit,$lab_fee,$rgep,$desc)
		{
			$this->$sub_num			=	$sub_num;
			$this->$sub_name		=	$sub_name;
			$this->$sub_title		=	$sub_title;
			$this->$course_code		=	$course_code;
			$this->$credited		=	$credited;
			$this->$numeric_grades	=	$numeric_grades;
			$this->$repeatable_to	=	$repeatable_to;
			$this->$date_proposed	=	$date_proposed;
			$this->$date_approved	=	$date_approved;
			$this->$date_first		=	$date_first;
			$this->$date_revision	=	$date_revision;
			$this->$date_abolished	=	$date_abolished;
			$this->$unit			=	$unit;
			$this->$lab_fee			=	$lab_fee;
			$this->$rgep			=	$rgep;
			$this->$desc			=	$desc;
		}
	}
?>