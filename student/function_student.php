<?php


//THIS WILL CHECK TOTAL # OF UNITS ADDED TO SCHEDULE
	function totalUnitsAdded($student_number,$course_code){
	
	$units=0;
	
	$result =mysql_query("SELECT course_code from student_status where student_number=$student_number ");	
		 while($row = mysql_fetch_array($result)){	
				$subject = $row['course_code'];
					$res =mysql_query("SELECT units from subject where course_code='$subject'");	
					while($row = mysql_fetch_array($res)){	
						$unit = $row['units'];
						$units = $units+$unit;
					}		
		 }		 
			return $units;
	}
// THIS WILL GET MAX UNITS STUDENT IS ALLOWED TO ENLIST
	function getMaxUnits($student_number){
		
		$res =mysql_query("SELECT max_units_allowed from student where student_number=$student_number");
		$max_units_allowed = 0;
		while($row = mysql_fetch_array($res)){	
				$max_units_allowed = $row['max_units_allowed'];
		 }	
			return $max_units_allowed;
	}	

//THIS WILL CHECK STUDENT'S ENLISTED SUBJECTS

	function checkStudentSched($student_number,$course_code,$section_label){
	
	$result = mysql_query("SELECT status from student_status where course_code='$course_code' AND student_number=$student_number");
	$count =  mysql_num_rows($result);
	
		if($count==0){	//this means that subject has not been added to current schedule
			return true;
		}
	
		else{  // this means subjecthas  been added to current schedule
			return false;
		}
	}



?>