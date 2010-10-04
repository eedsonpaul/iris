
<?php
	require_once 'student_sub_header.php';

    $student_number = $_SESSION['student_number'];	 
	$course_code=$_POST['subject'];

?>



<div id="container">

   <form name="form1" method="post" action="student_show_subject.php">
   <p>Subject: <input type="text" name="subject"  id="subject" />
   <input type="submit" name="search" value="Search">
   </form>

   
<?php

//this will search subjects 
 $result=mysql_query("SELECT course_code from offered_subjects where course_code like '$course_code%'");	 
 $subs = mysql_num_rows($result);
 $counter =0;
	  while($row = mysql_fetch_array($result)){		
		$courses[$counter] = $row['course_code'];
		$counter++;
	 }

	if($subs==0){
		echo "I'm sorry no results were found.";
	}	 

	else{

	$index=0;
	
	for($i = 0;$i < $counter; $i++){
	
	$course = $courses[$i];
	
	$res=mysql_query("SELECT section_label,room_id,total_slots,available_slots,confirmed_count,waitlist_count,class_type from section where course_code='$course'");	
	$count = mysql_num_rows($res);

		while($row = mysql_fetch_array($res)){	
			$subject_name[$index] = $course;
			$section_label[$index] = $row['section_label'];			
			$class_type[$index] = $row['class_type'];	
			$room_id[$index] = $row['room_id'];	
			$total_slots[$index] = $row['total_slots'];
			$available_slots[$index] = $row['available_slots'];
			$waitlist_count[$index] = $row['waitlist_count'];
			$confirmed_count[$index] = $row['confirmed_count'];	
			$index++;
		}
		
	}
	echo "<table width='57.9%' align='center border='1'>";
	echo "<tr>
		<th width='50'><font size='2'>SUBJECT</th>
		<th width='50'><font size='2'>CLASS TYPE</th>
		<th width='50'><font size='2'>SECTION</th>
		<th width='50'><font size='2'>DAY</th>
		<th width='50'><font size='2'>START</th>
		<th width='50'><font size='2'>END</th>
		<th width='50'><font size='2'>ROOM</th>
		<th width='50'><font size='2'>SLOTS/AVAILABLE/CONFIRMED/WAITLISTED</th>
		</tr>";

	//print "</table>"; 

	//echo "<table>";
		for($i = 0;$i < $index; $i++){
			echo "<tr>";
			echo "<td align='center' width='50'><font size='2'>" . $subject_name[$i] . "</td>";
			echo "<td align='center' width='50'><font size='2'>" . $class_type[$i] . "</td>";
			echo "<td align='center' width='50'><font size='2'>" . $section_label[$i] . "</td>";
			echo "<td width='50'><font size='2'>" . checkDay($subject_name[$i],$section_label[$i]) . "</td>";
			echo "<td width='50'><font size='2'>" . checkStartTime($subject_name[$i],$section_label[$i]) . "</td>";
			echo "<td width='50'><font size='2'>" . checkEndTime($subject_name[$i],$section_label[$i]) . "</td>";
			echo "<td align='center' width='50'><font size='2'>" . $room_id[$i] . "</td>";
			echo "<td align='center' width='50'><font size='2'>" . $total_slots[$i] . " / " . $available_slots[$i] . " / " . $confirmed_count[$i] . " / " . $waitlist_count[$i] .  "</td>";
			echo '<td><a href="student_add_subject.php?coursecode='.$subject_name[$i].'&sectionlabel='.$section_label[$i].'"> ADD </a> </td>';
			echo "</tr>";
		}
		echo "</table>";
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
	
?>   
   
   
</div>
</body>
</html>

