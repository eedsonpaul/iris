<?php
	require_once 'student_header.php';
    $student_number = $_SESSION['student_number'];
?>
<div class="main">
<?php
	require_once 'student_navigation.php';
?>

<div id="right_side">
	<p>
	<table width="660" class="tablestyle">
	<tr>
	<th width=150>#</th>
	<th width=150>ACADEMIC YEAR</th>
	<th width=150>SEMESTER</th>
	<th width=150>PREVIOUS SEMESTER CLASS STANDING</th>
	<th width=150>CURRENT SEMESTER CLASS STANDING</th>
	<th width=150>GWA</th>
	<th width=150>ACTION</th>
	</tr>
	 
	 
	 <?php
	 

		

		
	 $acad =mysql_query("SELECT DISTINCT academic_year from grade where student_number='$student_number'");	 
	 $i= 0;
	 $sub= mysql_num_rows($acad);

		while($row = mysql_fetch_array($acad)){		
				$academic[$i] = $row['academic_year'];	
				$i++;
			}
	  $y=0;

	  $counter=1;
		for($x = 0;$x < $i; $x++){
		 $sem =mysql_query("SELECT DISTINCT semester from grade where student_number='$student_number' and academic_year='$academic[$x]'");
		$sub= mysql_num_rows($sem);	$y=0; 
				while($row = mysql_fetch_array($sem)){	
				$semester[$x][$y] = $row['semester'];
				echo "<tr>";
				echo "<td> " . $counter . "</td> ";
				echo "<td>" .checkAcademicYear($academic[$x]). "</td>";
				echo "<td>" .checkSemester($semester[$x][$y]).   "</td>";
				echo "<td> </td>";
				echo "<td> </td>";
				echo "<td> </td>";
				$a = $semester[$x][$y];
				echo "<td><a href=\"student_display_grade.php?academic_year=$academic[$x]&semester=$a\">VIEW</a></td>";
				echo "</tr>";
				
				$counter++;
				$y++;
				}
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

	function checkAcademicYear($academic_year){

		$start = $academic_year-1;
		
		return "".$start." - ".$academic_year."";

	}	 

	function checkSubjectName($course_code){
		
		 $result=mysql_query("SELECT subject_title from subject where course_code='$course_code'");	 
			while($row = mysql_fetch_array($result)){		
				$subject_title = $row['subject_title'];	
			}
		return $subject_title;
	}
	 
	 ?>
	 </table>
	</div>
</div>

<?php
	require_once 'student_footer.php';
?>