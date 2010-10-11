
<strong>TEMPORARY FORM 5</strong><br><br>

<?php
	require_once 'student_sub_header.php';
	require_once 'query_student.php';
	require_once 'function_section.php';
	require_once 'function_subject.php';
	require_once 'function_section_schedule.php';
    $student_number = $_SESSION['student_number'];	 
	

echo "Student ID:  ". $student_number;
echo "<br>Name:  ".getFirstName($student_number)." ".getMiddleName($student_number)." ".getLastName($student_number);
echo "<br>Degree Program:  ".getDegreeProgram($student_number);
echo "<br>Year Level:  ".getYearLevel($student_number);

?>

<p align=center>
 <table width="600" class="tablestyle">
  <tr>
    <strong><th width='200'><font size='1'>SUBJECT </font></th>
    <th width='100'><font size='1'>SECTION</th>
    <th width='100'><font size='1'>UNITS</th>
    <th width='200'><font size='1'>SCHEDULE</th>
    <th width='100'><font size='1'>ROOM</th></strong>

  </tr>

<?php
 $result=mysql_query("SELECT course_code,section_label from student_status where student_number='$student_number' AND ( status<>'waitlisted' AND status<>'unconfirmed')");   
 $subs = mysql_num_rows($result);
 $units = 0;
  if($subs==0){
    echo "You do not have any subjects confirmed yet";
  }   

  else{
    $index=0;
    while($row = mysql_fetch_array($result)){    
      $course_code[$index] = $row['course_code'];  
      $section_label[$index] = $row['section_label'];
      $index++;
    }


    for($i = 0;$i < $index; $i++){
	  echo "<tr>";
      echo "<td align='center' width='60'><font size='2'>" . $course_code[$i] . " (" . checkClassType($course_code[$i],$section_label[$i]) . ")</td>";
      echo "<td align='center' width='60'><font size='2'>" . $section_label[$i] . "</td>";
      echo "<td align='center' width='60'><font size='2'>" . checkUnits($course_code[$i]) . "</td>";
      echo "<td align='center' width='60'><font size='2'>" . checkDay($course_code[$i],$section_label[$i]) . " " . checkStartTime($course_code[$i],$section_label[$i]) . "-" . checkEndTime($course_code[$i],$section_label[$i]) . "</td>";
      echo "<td align='center' width='60'><font size='2'>" . checkRoom($course_code[$i],$section_label[$i]) . "</td>";
	  echo "</tr>";
	  $units = $units + checkUnits($course_code[$i]);
    }
}
	echo "</table><br><br>";
	echo "Total Units: " . $units;
	


?>	
