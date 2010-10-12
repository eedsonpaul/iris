
<?php
	require_once 'student_sub_header.php';
	require_once '../student/function_section.php';
	require_once '../student/function_section_schedule.php';
    $student_number = $_SESSION['student_number'];	 
	$course_code=$_POST['subject'];
	echo "ADD SUBJECT HERE";
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
		echo "<table width='57.9%' align='center border='1'>";
		echo "<tr>
		<th width='50'><font size='1'>SUBJECT</th>
		<th width='50'><font size='1'>CLASS TYPE</th>
		<th width='50'><font size='1'>SECTION</th>
		<th width='50'><font size='1'>DAY</th>
		<th width='50'><font size='1'>START</th>
		<th width='50'><font size='1'>END</th>
		<th width='50'><font size='1'>ROOM</th>
		<th width='50'><font size='1'>SLOTS/AVAILABLE/CONFIRMED/WAITLISTED</th>
		<th width='50'><font size='1'></th>
		</tr>";

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


		for($i = 0;$i < $index; $i++){
			echo "<tr>";
			echo "<td align='center' width='50'><font size='1'>" . $subject_name[$i] . "</td>";
			echo "<td align='center' width='50'><font size='1'>" . $class_type[$i] . "</td>";
			echo "<td align='center' width='50'><font size='1'>" . $section_label[$i] . "</td>";
			echo "<td width='50'><font size='1'>" . checkDay($subject_name[$i],$section_label[$i]) . "</td>";
			echo "<td width='50'><font size='1'>" . checkStartTime($subject_name[$i],$section_label[$i]) . "</td>";
			echo "<td width='50'><font size='1'>" . checkEndTime($subject_name[$i],$section_label[$i]) . "</td>";
			echo "<td align='center' width='50'><font size='1'>" . $room_id[$i] . "</td>";
			echo "<td align='center' width='50'><font size='1'>" . $total_slots[$i] . " / " . $available_slots[$i] . " / " . $confirmed_count[$i] . " / " . $waitlist_count[$i] .  "</td>";
			echo "<td><a href='student_add_subject.php?action=not&coursecode=".$subject_name[$i]."&sectionlabel=".$section_label[$i]."'> ADD </a> </td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	
?>   
   
   
</div>
</body>
</html>

