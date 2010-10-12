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


	    function getGWA($student_number,$academic_year,$semester){
    
			$grades = 0;
			$grade = 0;
			$units = 0;
			$unit = 0;
			$index = 0;
			$query = "SELECT initial_grade,completion_grade,course_code FROM grade WHERE student_number = '$student_number' AND academic_year=$academic_year AND semester=$semester";
			$result = mysql_query($query);
			while($row = mysql_fetch_array($result)) {
				$igrade[$index] = $row['initial_grade'];
				$cgrade[$index] = $row['completion_grade'];
				$course_code[$index] = $row['course_code'];
        $index++;
			}

			for($i=0;$i<$index;$i++){
	
				$query = "SELECT units FROM subject WHERE course_code = '$course_code[$i]'";
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result)) {
					$unit = $row['units'];
				}
				
				if ($cgrade[$i]==0) {
					$grade = $igrade[$i] * $unit;
				} else if($igrade[$i]==4){
					$grade = ($cgrade[$i]*$unit) + ($igrade[$i]*$unit);
				} else {
					$grade = $cgrade[$i]*$unit;
				}

          $grades = (($grades * $units) + $grade ) / ($units + $unit);
          $units = $units + $unit;
			}
			   	
          return $grades;
		}

		function getClassStanding($student_number,$academic_year,$semester){

		$units_earned = 0;
		$units_taken = 0;
		$grade = 0;
		$percentage = 0;
		$standing = '';
		$index = 0;
    	$query = "SELECT initial_grade,completion_grade,course_code FROM grade WHERE student_number = '$student_number' AND academic_year=$academic_year AND semester=$semester";
			$result = mysql_query($query);
			while($row = mysql_fetch_array($result)) {
				$igrade[$index] = $row['initial_grade'];
				$cgrade[$index] = $row['completion_grade'];
				$course_code[$index] = $row['course_code'];
        $index++;
			}
		for($i=0;$i<$index;$i++){
	
				$query = "SELECT units FROM subject WHERE course_code = '$course_code[$i]'";
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result)) {
					$unit = $row['units'];
				}

				$units_taken = $units_taken + $unit;
				
				if ($cgrade[$i]==0) {
					$grade = $igrade[$i];
				}
				else{
          $grade = $cgrade[$i];
				}
    
        if($grade<=3){
            $units_earned = $units_earned + $unit;
        }
			}

			$percentage = (($units_taken-$units_earned) / $units_taken) * 100;

			if($percentage<25){
          $standing = 'Good Standing';
			}
			else if($percentage<50){
          $standing = 'Warning';
			}
			else if($percentage<75){
          $standing = 'Probation';
			}
			else if($percentage<100){
          $standing = 'PDQ';
			}
			else{
			    $standing = 'Dismissal';
			}			   	
          return $standing;
		}


?>
