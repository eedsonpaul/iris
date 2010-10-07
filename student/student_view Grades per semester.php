<?php
	require_once 'student_header.php';
    $student_number = $_SESSION['student_number'];
?>
<div class="main">
	<div id="navigation">
	<ul>
	  <li> <a href="#"> PERSONAL DATA </a>

		<ul>
			<ul><li><a href="student.php">student profile </a><a href="student_edit_login_account.php">Edit login account</a></li>
			</ul>
			<li><a href="student_add_editpersonal_data.php">add/edit personal data</a></li>
		  </ul>
		</li>
		
		<li> <a href="#">registration</a>

		  <ul>
			<li> <a href="student_View accountabilities.php">View accountabilities </a></li>
			<li><a href="student_view study plan.php">view study plan </a>
			  <ul>
				<ul>
				  <li><a href="student_view Grades per semester.php">view Grades per semester </a></li>
				</ul>
			  </ul>
			</li>
		  </ul>
		</li>
		
		<li>
		  <ul>
			<li><a href="student_confirm subject here.php">edit subject here </a></li>
		  </ul>
		</li>
	  </ul>

	</div>
	<div id="right_side">
	 
	 <?php
	 
	 echo "<table width='100%' align='center border='1'>";
	print "<tr>
			<th width=150>#</th>
			<th width=150>ACADEMIC YEAR</th>
			<th width=150>SEMESTER</th>
			<th width=150>PREVIOUS SEMESTER CLASS STANDING</th>
			<th width=150>CURRENT SEMESTER CLASS STANDING</th>
			<th width=150>GWA</th>
			<th width=150>ACTION</th>
			</tr>";

		print "</table>"; 
		

		
	 $acad =mysql_query("SELECT DISTINCT academic_year from grade where student_number='$student_number'");	 
	 $i= 0;
	 $sub= mysql_num_rows($acad);

		while($row = mysql_fetch_array($acad)){		
				$academic[$i] = $row['academic_year'];	
				$i++;
			}
	  $y=0;
	  
	  echo "<table>";
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
				$a = $semester[$x][$y];
				echo "<td><a href=\"student_display_grade.php?academic_year=$academic[$x]&semester=$a\">VIEW</a></td>";
				echo "</tr>";
				
				$counter++;
				$y++;
				}
		  }

		echo "</table>";
		
		
		
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
	</div>
</div>

<?php
	require_once 'student_footer.php';
?>