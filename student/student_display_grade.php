<?php
	require_once 'student_header.php';
    $student_number = $_SESSION['student_number'];	 
	$academic_year = $_GET['academic_year'];
	$semester = $_GET['semester'];	
?>

<div class="main">

<?php
	require_once 'student_navigation.php';
?>

	<div id="right_side">

	THIS IS FOR VIEWING PURPOSES ONLY AND NOT AN OFFICIAL COPY OF YOUR GRADES<br>
	Obtain the Official Copy from your College<br><br>
	 
	<?php


	echo "( " .checkSemester($semester). "  / AY " .checkAcademicYear($academic_year). " )";

		 $res=mysql_query("SELECT student_number,first_name,middle_name,last_name,degree_program,year_level,
		 stfap_bracket_id,scholarship_id from student where student_number=$student_number");
		 
		 while($row = mysql_fetch_array($res)){
			echo "<br><br>Student ID:".$row['student_number'];
			echo "<br>Student Name:".$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
			echo "<br>Degree Program:".$row['degree_program'];
			echo "<br><br>";		
		 }
	?>
		 
	
		
	<p>
	<table width="660" class="tablestyle">
	<tr>
			<th width=150>SUBJECT</th>
			<th width=150>UNITS</th>
			<th width=150>INITIAL GRADE</th>
			<th width=150>FINAL GRADE</th>
			<th width=150>REMARKS</th>
  </tr>

	<?php
	 $result=mysql_query("SELECT course_code,initial_grade,completion_grade,grade_status from grade where student_number='$student_number' and academic_year=$academic_year and semester=$semester");	 
	 $sub= mysql_num_rows($result);
	 
		if($sub==0){
			echo "You do not have any grades";
		}	 
	 
		else{
			$index=0;
			while($row = mysql_fetch_array($result)){		
				$course_code[$index] = $row['course_code'];	
				$initial_grade[$index] = $row['initial_grade'];	
				$completion_grade[$index] = $row['completion_grade'];	
				$grade_status[$index] = $row['grade_status'];
				$index++;
			}
		$totalunits = 0;
			for($i = 0;$i < $index; $i++){
				echo "<tr>";
				echo "<td width='150'>" .$course_code[$i]. "</td>";
				echo "<td width='150'>" .checkUnits($course_code[$i]). "</td>";
				echo "<td align='center' width='150'>" . $initial_grade[$i] . "</td>";
				echo "<td align='center' width='150'>" . $completion_grade[$i] . "</td>";
				echo "<td align='center' width='150'>" . $grade_status[$i] . "</td>";
				echo "</tr>";
				$totalunits = $totalunits + checkUnits($course_code[$i]);
			}
		echo "</table>";

		echo "<br>TOTAL NUMBER OF UNITS EARNED :" .$totalunits;
		echo "<br>CLASS STANDING :" ;
		echo "<br>GWA :" ;
		
		}
	function checkUnits($course_code){
	 
	 $result=mysql_query("SELECT units from subject where course_code='$course_code'");	 
				while($row = mysql_fetch_array($result)){		
				$units = $row['units'];	
				}
		return $units;
	}

	function checkAcademicYear($academic_year){

		$start = $academic_year-1;
		
		return "".$start." - ".$academic_year."";

	}	 
		 
	function checkSemester($sem){

		if($sem==1){
			return "First Semester";
		}
		else if($sem==2){
			return "Second Semester";
		}
		else if($sem==3){
			return "Summer";
		}

	}

	?>
	</div>
</div>

<?php
	require_once 'student_footer.php';
?>
