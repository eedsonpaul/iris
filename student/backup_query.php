


<?php



function getScholarshipId($student_number){
	$result=mysql_query("SELECT scholarship_id from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$scholarship_id = $row['scholarship_id'];
	 }
		return $scholarship_id;
}
function getUnitId($student_number){
	$result=mysql_query("SELECT unit_id from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$unit_id = $row['unit_id'];
	 }
		return $unit_id;
}
function getDegreeProgram($student_number){
	$result=mysql_query("SELECT degree_program from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$degree_program = $row['degree_program'];
	 }
		return $degree_program;
}
function getAcademicYear($student_number){
	$result=mysql_query("SELECT academic_year from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$academic_year = $row['academic_year'];
	 }
		return $academic_year;
}
function getSemester($student_number){
	$result=mysql_query("SELECT semester from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$semester = $row['semester'];
	 }
		return $semester;
}
function getSTFAPId($student_number){
	$result=mysql_query("SELECT stfap_bracket_id from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$stfap_bracket_id = $row['stfap_bracket_id'];
	 }
		return $stfap_bracket_id;
}
function getStudentType($student_number){
	$result=mysql_query("SELECT student_type from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$student_type = $row['student_type'];
	 }
		return $student_type;
}
function getStudentType($student_number){
	$result=mysql_query("SELECT student_type from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$student_type = $row['student_type'];
	 }
		return $student_type;
}

?>