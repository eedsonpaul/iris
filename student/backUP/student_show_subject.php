<?php

	require 'dbconnect.php';
	session_start();
    $student_number = $_SESSION['student_number'];	 
	$subject_title=$_POST['subject']; // from year
	echo "ADD SUBJECT HERE";

?>


<html>
<head>
<title>Search Subject</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
@import url("default.css");

   body {
	width:102%;
	background-color: #FFF4F4;
	margin-left: 5px;
	margin-top: 5px;
   }
#Layer1 {
	position:absolute;
	width:200px;
	height:auto;
	z-index:1;
	left: 10px;
	top: 250px;
}
.style4 {color: #FF0000}
</style>
</head>
<body>
<div id="container">

   <form name="form1" method="post" action="student_show_subject.php">
   <p>Subject: <input type="text" name="subject"  id="subject" />
   <input type="submit" name="search" value="Search">
   </form>

   
<?php



 $result=mysql_query("SELECT course_code from subject where subject_title='$subject_title'");	 
 $subs = mysql_num_rows($result);
	  while($row = mysql_fetch_array($result)){		
		$course_code = $row['course_code'];	
	 }
	if($subs==0){
		echo "I'm sorry no results were found.";
	}	 
 
	else{

	$res=mysql_query("SELECT section_label,room_id,total_slots,available_slots,confirmed_count,waitlist_count,class_type from section where course_code='$course_code'");	
	$count = mysql_num_rows($res);
	$index=0;
		while($row = mysql_fetch_array($res)){	
			$section_label[$index] = $row['section_label'];			
			$class_type[$index] = $row['class_type'];	
			$room_id[$index] = $row['room_id'];	
			$total_slots[$index] = $row['total_slots'];
			$available_slots[$index] = $row['available_slots'];
			$waitlist_count[$index] = $row['waitlist_count'];
			$confirmed_count[$index] = $row['confirmed_count'];	
			$index++;
		}
	echo "<table width='80%' align='center border='1'>";
	echo "<tr>
		<th>SUBJECT</th>
		<th>CLASS TYPE</th>
		<th>SECTION</th>
		<th>DAY</th>
		<th>START</th>
		<th>END</th>
		<th>ROOM</th>
		<th>TOTAL SLOTS</th>
		<th>AVAILABLE</th>
		<th>CONFIRMED</th>
		<th>WAITLISTED</th>
		</tr>";

	//print "</table>"; 

	//echo "<table>";
		for($i = 0;$i < $index; $i++){
			echo "<tr>";
			echo "<td align='center' width='88'>" . $subject_title . "</td>";
			echo "<td align='center' width='88'>" . $class_type[$i] . "</td>";
			echo "<td align='center' width='85'>" . $section_label[$i] . "</td>";
			echo "<td width='50'>" . checkDay($course_code,$section_label[$i]) . "</td>";
			echo "<td width='85'>" . checkStartTime($course_code,$section_label[$i]) . "</td>";
			echo "<td width='85'>" . checkEndTime($course_code,$section_label[$i]) . "</td>";
			echo "<td align='center' width='88'>" . $room_id[$i] . "</td>";
			echo "<td align='center' width='88'>" . $total_slots[$i] . "</td>";
			echo "<td align='center' width='187'>" . $available_slots[$i] . "</td>";
			echo "<td align='center' width='117'>" . $confirmed_count[$i] . "</td>";
			echo "<td align='center' width='150'>" . $waitlist_count[$i] . "</td>";
			echo '<td><a href="student_add_subject.php?coursecode='.$course_code.'&sectionlabel='.$section_label[$i].'"> ADD SUBJECT </a> </td>';
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

