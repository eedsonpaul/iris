<?php

	//THIS WILL CHECK NO. OF AVAILABLE SLOTS FOR THE CHOSEN SUBJECT AND SECTION.
	function checkSlots($course_code,$section_label){
	
		$result =mysql_query("SELECT available_slots from section where course_code='$course_code' AND section_label='$section_label'");	
		 while($row = mysql_fetch_array($result)){	
				$slots = $row['available_slots'];
		 }		 
			return $slots;
	}
	function checkClassType($course_code,$section_label){
	
		$result =mysql_query("SELECT class_type from section where course_code='$course_code' AND section_label='$section_label'");	
		 while($row = mysql_fetch_array($result)){	
				$class_type = $row['class_type'];
		 }		 
			return $class_type;
	}
	
	
	//THIS WILL CHECK THE CURRENT NO. OF WAITLISTED STUDENTS  FOR THE CHOSEN SUBJECT AND SECTION.
	function countWaitlist($course_code,$section_label){
	
		$result =mysql_query("SELECT waitlist_count from section where course_code='$course_code' AND section_label='$section_label'");	
		 while($row = mysql_fetch_array($result)){	
				$waitlist = $row['waitlist_count'];
		 }		 
			return $waitlist;
	}

	//THIS WILL CHECK THE CURRENT NO. OF CONFIRMED STUDENTS  FOR THE CHOSEN SUBJECT AND SECTION.
	function countConfirmed($course_code,$section_label){
	
		$result =mysql_query("SELECT confirmed_count from section where course_code='$course_code' AND section_label='$section_label'");	
		 while($row = mysql_fetch_array($result)){	
				$confirmed = $row['confirmed_count'];
		 }		 
			return $confirmed;
	}
	//THIS WILL CHECK THE CURRENT NO. OF CONFIRMED STUDENTS  FOR THE CHOSEN SUBJECT AND SECTION.
	function countEnrolled($course_code,$section_label){
	
		$result =mysql_query("SELECT enrolled_count from section where course_code='$course_code' AND section_label='$section_label'");	
		 while($row = mysql_fetch_array($result)){	
				$enrolled = $row['enrolled_count'];
		 }		 
			return $enrolled;
	}
	
	//THIS WILL CHECK ROOM NO. FOR COURSE AND SECTION
	
	function checkRoom($course_code,$section_label){

		$building_name = " ";
	
		$room= mysql_query("SELECT room_id from section where course_code='$course_code' AND section_label='$section_label'");	 
		while($row = mysql_fetch_array($room)){		
			$room_id= $row['room_id'];	
		}
		
		$building=mysql_query("SELECT building_id from room where room_id='$room_id' ");	 
		while($row = mysql_fetch_array($building)){		
			$building_id= $row['building_id'];	
		}
		
		$name=mysql_query("SELECT building_name from building where building_id='$room_id' ");	 
		while($row = mysql_fetch_array($name)){		
			$building_name= $row['building_name'];	
		} 
		$roomname = $building_name . " " . $room_id;
		return $roomname;
	}



?>