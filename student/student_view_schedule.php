<?php
	require_once 'student_sub_header.php';

    $student_number = $_SESSION['student_number'];	 
	echo "VIEW SUBJECT HERE";
?>

<div id="container">
<?php

echo "<table width='57.9%' align='center border='1'>";
print "<tr>	
		<th width='50'><font size='1'>SUBJECT </font></th>
		<th width='50'><font size='1'>TYPE</th>
		<th width='50'><font size='1'>SECTION</th>
		<th width='50'><font size='1'>DAY</th>
		<th width='50'><font size='1'>TIME</th>
		<th width='50'><font size='1'>ROOM</th>
		<th width='50'><font size='1'>STATUS</th>
		</tr>";

	print "</table>"; 


 $result=mysql_query("SELECT course_code,section_label,status,waitlist_counter from student_status where student_number='$student_number'");	 
 $sub= mysql_num_rows($result);
 
	if($sub==0){
		echo "You do not have any subjects added yet";
	}	 
 
	else{
		$index=0;
		while($row = mysql_fetch_array($result)){		
			$course_code[$index] = $row['course_code'];	
			$section_label[$index] = $row['section_label'];
			$status[$index] = $row['status'];	
			$waitlist_counter[$index] = $row['waitlist_counter'];	
			$index++;
		}
	
	echo "<table>";
		for($i = 0;$i < $index; $i++){
			echo "<tr>";
			echo "<td align='center' width='60'><font size='2'>" . $course_code[$i] . "</td>";
			echo "<td align='center' width='60'><font size='2'>                                              </td>";
		    echo "<td align='center' width='60'><font size='2'>". $section_label[$i] . "</td>";
			echo "<td align='center' width='60'><font size='2'>" . checkDay($course_code[$i],$section_label[$i]) . "</td>";
			echo "<td align='center' width='45'><font size='2'>" . checkStartTime($course_code[$i],$section_label[$i]) . "-" . checkEndTime($course_code[$i],$section_label[$i]) . "</td>";
			echo "<td align='center' width='60'><font size='2'>" . checkRoom($course_code[$i],$section_label[$i]) . "</td>";
			echo "<td align='center' width='60'><font size='2'>" . $status[$i] .  " " . $waitlist_counter[$i] . "</td>";
			echo "</tr>";
		}
	echo "</table>";


	}

	
function checkRoom($course_code,$section_label){

	$result=mysql_query("SELECT room_id from section where course_code='$course_code' AND section_label='$section_label'");	 
	while($row = mysql_fetch_array($result)){		
			$room= $row['room_id'];	
		}
		return $room;
}

function checkDay($course_code,$section_label){

	$result=mysql_query("SELECT day_of_the_week from section_schedules where course_code='$course_code' AND section_label='$section_label'");	 
	while($row = mysql_fetch_array($result)){		
			$day = $row['day_of_the_week'];	
		}
		return $day;
}


function checkStartTime($course_code,$section_label){
	
	$result=mysql_query("SELECT start_time from section_schedules where course_code='$course_code' AND section_label='$section_label'");	 
		while($row = mysql_fetch_array($result)){		
			$time = $row['start_time'];	
		}
		return $time;
}

function checkEndTime($course_code,$section_label){
	
	$result=mysql_query("SELECT end_time from section_schedules where course_code='$course_code' AND section_label='$section_label'");	 
		while($row = mysql_fetch_array($result)){		
			$time = $row['end_time'];	
		}
		return $time;
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
</body>
</html>