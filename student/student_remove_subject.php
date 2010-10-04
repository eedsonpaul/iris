
<?php
require 'dbconnect.php';
	session_start();
    $student_number = $_SESSION['student_number'];	 
 
	$course_code = $_GET['subjectid'];
	$section_label =$_GET['sectionlabel'];

	mysql_query("DELETE from student_status where course_code='$course_code' AND student_number=$student_number AND section_label='$section_label' ");
	echo "SUBJECT DELETED";
	 
	$result=mysql_query("SELECT available_slots from section where course_code='$course_code' AND section_label='$section_label' ");	 
		while($row = mysql_fetch_array($result)){		
			$slots = $row['available_slots'];	
		}

	$res=mysql_query("SELECT waitlist_count from section where course_code='$course_code' AND section_label='$section_label' ");	 
		while($row = mysql_fetch_array($res)){		
			$wait = $row['waitlist_count'];	
		}
		
		if($wait>0){
			$wait = $wait-1;	
		}
		else{
			$slots = $slots+1;
		}

	mysql_query("UPDATE section SET available_slots=$slots where course_code='$course_code' AND section_label='$section_label' ");
	mysql_query("UPDATE section SET waitlist_count = $wait where course_code='$course_code' AND section_label='$section_label'");
	
	$count=mysql_query("SELECT student_number,course_code,section_label ,waitlist_counter from student_status where waitlist_counter>0  order by waitlist_counter");	 
	 $num= mysql_num_rows($count);
	 $index=0;
	 		while($row = mysql_fetch_array($count)){		
				
			    $student[$index] = $row['student_number'];
				$course[$index] = $row['course_code'];	
				$section_label[$index] = $row['section_label'];	
				$waitlist_counter[$index] = $row['waitlist_counter'];	
				$index++;
			}
		for($x=0;$x<$index;$x++){
		
		if($waitlist_counter[$x]>1){
			$waitlist_counter[$x] = $waitlist_counter[$x]-1;
		
				mysql_query("UPDATE student_status SET waitlist_counter=$waitlist_counter[$x] where student_number=$student[$x] AND course_code='$course[$x]' AND section_label='$section_label[$x]' ");
		}
		else if($waitlist_counter[$x]=1){
			$waitlist_counter[$x] = $waitlist_counter[$x]-1;
				mysql_query("UPDATE student_status SET waitlist_counter=$waitlist_counter[$x] where student_number=$student[$x] AND course_code='$course[$x]' AND section_label='$section_label[$x]' ");
				mysql_query("UPDATE student_status SET status='unconfirmed' where student_number=$student[$x] AND course_code='$course[$x]' AND section_label='$section_label[$x]' ");
		}
		
	
			
		
		}
		
	
	?>

