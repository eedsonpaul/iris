<?php
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
		
function gwaStudent($student_number, $semester, $academic_year, $access_level) {
		//if ($access_level != 99999) {
		//	return FALSE;
		//}
		$res = mysql_query("SELECT completion_grade, subject_id FROM {grade} WHERE student_number='$student_number' AND semester='$semester' AND academic_year='$academic_year'"); //enrolled subjects per sem per year and their grades
		$total_grades = 0;
		$number_subjects = 0;
		while ($data = mysql_fetch_array($res)) {
			$total_grades = $total_grades + $data['completion_grade']; //get the total grades of each subject
			$number_subjects++; //get the total number of subjects enrolled for the partcular sem and year
		}
		$gwa = $total_grades / $number_subjects;
		return $gwa;
	} //gwa per sem
	
	function academicStanding($student_number, $semester, $academic_year, $units) {
		$res = mysql_query("SELECT completion_grade, subject_id FROM {grade} WHERE student_number='$student_number' AND semester='$semester' AND academic_year='$academic_year'"); //enrolled subjects per sem per year and their grades
		$total_units = 0;
		$achieved_units = 0;
		while ($data = mysql_fetch_array($res)) {
			$subject_id = $data['subject_id'];
			$units = mysql_result(mysql_query("SELECT units FROM {subject} WHERE subject_id='$subject_id'")); //get units per subject enrolled
			$total_units =  $total_units + $units; //get the total number of units of enrolled subjects
			$completion_grade = $data['completion_grade'];
			if ($completion_grade >= 3) { //total number of units of enrolled subjects that are passed
				$achieved_units = $achieved_units + $units;
			}
		}
		$percent = ($achieved_units / $total_units) * 100;
		if($percentage<25){
          $standing = 'Good Standing';
		} else if ($percent >= 30 && $percent < 75) {
			$status = 'Warning';
		} else if ($percent >= 75 && $percent < 100) {
			$status = 'Probation';
		} else if ($percent == 100) {
			$status = 'PDQ';
		} else {
			$status = 'Good Standing';
		}
		mysql_query("UPDATE student SET academic_standing='$status' WHERE student_number='$student_number'");
		return $status;
	} //function to determine the academic standing of a student
	
	function blockStudent($student_number) {
		$status = mysql_result(mysql_query("SELECT academic_standing FROM student WHERE student_number='$student_number'"));
		if ($status == 'PDQ' or $status == 'Dismissed' or $status == 'LOA2') {
			$block = 'blocked';
			return $block;
		}
	} //function to block a student