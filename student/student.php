<?php
	require_once 'student_header.php';
?>

<div class="main">
<?php
	require_once 'student_navigation.php';
?>
<div id="right_side">
		<h4 align="right">First Semester  			, &nbsp; A.Y.  			  			2010-2011 </h4>
		<h4>Student's Profile </h4>
		<p>
		<?php
		 $student_number = $_SESSION['student_number'];
		 $res = mysql_query("SELECT student_number,first_name,middle_name,last_name,degree_program,year_level,
		 stfap_bracket_id,scholarship_id FROM student WHERE student_number='" . $_SESSION['student_number'] . "' ");
		 
		 while($row = mysql_fetch_array($res)){
			echo "Student ID:".$row['student_number'];
			echo "<br>Name:".$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
			echo "<br>Degree Program:".$row['degree_program'];
			echo "<br>Year Level:".$row['year_level'];
			echo "<br>STFAP Bracket:".$row['stfap_bracket_id'];
			echo "<br>Scholarship:".$row['scholarship_id'];
					
		 }
	 
		?>	  
		<p>&nbsp;</p>
	</div>
</div>

<?php
	require_once 'student_footer.php';
?>
