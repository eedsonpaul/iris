
<?php
require 'dbconnect.php';
	session_start();
    $student_number = $_SESSION['student_number'];	 
 
	$course_code = $_GET['subjectid'];
	$section_label =$_GET['sectionlabel'];

	$stat = ' ';
	$res=mysql_query("SELECT status,waitlist_counter from student_status where course_code='$course_code' AND section_label='$section_label'  AND student_number=$student_number  ");	 
		while($row = mysql_fetch_array($res)){		
			$stat = $row['status'];	
			$counter = $row['waitlist_counter'];	
		}
	 
	$result=mysql_query("SELECT available_slots,confirmed_count,waitlist_count from section where course_code='$course_code' AND section_label='$section_label' ");	 
		while($row = mysql_fetch_array($result)){		
			$avail = $row['available_slots'];	
			$conf = $row['confirmed_count'];
			$wait = $row['waitlist_count'];	
		}
		
		if($stat=='confirmed'){
			$conf = $conf-1;
			if($wait>0){
				$wait = $wait-1;	
								$count=mysql_query("SELECT student_number,course_code,section_label ,waitlist_counter from student_status where waitlist_counter>$counter  order by waitlist_counter");	 
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
				
			}
			else{
				$avail = $avail+1;
			}
		}
		else if($stat=='unconfirmed'){
			if($wait>0){
				$wait = $wait-1;	
								$count=mysql_query("SELECT student_number,course_code,section_label ,waitlist_counter from student_status where waitlist_counter>$counter  order by waitlist_counter");	 
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
			}
			else{
				$avail = $avail+1;
			}
		}
		else if($stat=='waitlisted'){

				$count=mysql_query("SELECT student_number,course_code,section_label ,waitlist_counter from student_status where waitlist_counter>$counter  order by waitlist_counter");	 
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
		}

	mysql_query("UPDATE section SET available_slots=$avail where course_code='$course_code' AND section_label='$section_label' ");
	mysql_query("UPDATE section SET waitlist_count = $wait where course_code='$course_code' AND section_label='$section_label'");
	mysql_query("UPDATE section SET confirmed_count = $conf where course_code='$course_code' AND section_label='$section_label'");
	mysql_query("DELETE from student_status where course_code='$course_code' AND student_number=$student_number AND section_label='$section_label' ");
	echo "SUBJECT DELETED";
		
	
	?>

