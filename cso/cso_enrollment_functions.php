<?php
	function checkEnrolledSubjects ($student_number) {
	
		$check_array = mysql_query("SELECT status FROM student_status WHERE student_number=$student_number ");
		$status_count = mysql_num_rows($check_array);
		if ($status_count == 0) return 0;
		while ($check_all = mysql_fetch_array($check_array)) {
			extract($check_all);
			if ($status != 'enrolled') return 0;
		}
		return 1;
	}
	
	function countStudents($query) {
		$count =0;
		
		$sql = mysql_query ($query);
		while ($fetch = mysql_fetch_array($sql)) {
			extract($fetch);
			$enrolled = checkEnrolledSubjects($student_number);
			if ($enrolled == 1) $count ++;
		}
		return $count;
	}
	
	function enrolledStudents($query) {
		$students = array();
		
		$size=0;
		$count=1;
		$sql = mysql_query($query);
		while ($fetch=mysql_fetch_array($sql)) {
			extract($fetch);
			$enrolled = checkEnrolledSubjects($student_number);
			if ($enrolled == 1) {
				$students[$size] = array(
					"count" => $count, 
					"student_number" => $student_number, 
					"last_name" => $last_name, 
					"first_name" => $first_name, 
					"middle_name" => $middle_name, 
					"gender" => $gender, 
					"degree_name" => $degree_name,
					"year_level" => $year_level, 
					"citizenship" => $citizenship, 
					"registration_stat" => $registration_stat );
				$count++;
				$size++;
			}
		}
		
		return $students;
	}
?>