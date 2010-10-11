<?php
	require_once 'student_header.php';
	require_once 'query_student.php';
	require_once 'student_navigation.php';
?>
<div id="right_side">
		<h4 align="right">First Semester, &nbsp; A.Y. 2010-2011 </h4>
		<h4>Student's Profile </h4>
		<p>
		<?php
		$scholarship_name = "None";
		 $student_number = $_SESSION['student_number'];
		 $res = mysql_query("SELECT student_number,first_name,middle_name,last_name,degree_program,year_level,
		 stfap_bracket_id,scholarship_id FROM student WHERE student_number='" . $_SESSION['student_number'] . "' ");
		 
		 while($row = mysql_fetch_array($res)){
			echo "Student ID: ".$row['student_number'];
			echo "<br>Name: ".$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
			echo "<br>Degree Program: ". getDegreeProgram($row['student_number']);
			echo "<br>Year Level:".$row['year_level'];
			echo "<br>STFAP Bracket: ".getSTFAPBracket($row['stfap_bracket_id']);
			if($row['scholarship_id']!=0)
			{ $scholarship_name = getScholarshipName($row['scholarship_id']);}
			echo "<br>Scholarship: ". $scholarship_name;
					
		 }
	 
		?>	  
		<p>&nbsp;</p>
	</div>
</div>

<?php
  require_once '../admin_footer.php';
?>
