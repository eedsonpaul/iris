<?php

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
		$time = date('g:i',strtotime($time));
		return $time;
}
function checkEndTime($course_code,$section_label){
	
	$result=mysql_query("SELECT end_time from section_schedules where course_code='$course_code' AND section_label='$section_label'");	 
		while($row = mysql_fetch_array($result)){		
			$time = $row['end_time'];	
		}
		$time = date('g:i',strtotime($time));
		return $time;
}
function checkScheduleConflict($student_number,$course_code,$section_label){

	//check schedule for requested subject
	$result=mysql_query("SELECT day_of_the_week,start_time,end_time from section_schedules where course_code='$course_code' AND section_label='$section_label'");	 
		while($row = mysql_fetch_array($result)){		
			$end_time = $row['end_time'];	
			$start_time = $row['start_time'];	
			$day_of_the_week = $row['day_of_the_week'];	
		}
	// check schedules for subjects that are already added
	$sched=mysql_query("SELECT course_code,section_label from student_status where student_number='$student_number'");	
	$conflict = 0;	
	$x=0;
		while($row = mysql_fetch_array($sched)){		
			$course[$x] = $row['course_code'];	
			$section[$x] = $row['section_label'];
			$x++;
		}
		
		for($y = 0;$y < $x; $y++){
			$schedule=mysql_query("SELECT day_of_the_week,start_time,end_time from section_schedules where course_code='$course[$y]' AND section_label='$section[$y]'");
			$index = 0;
			while($row = mysql_fetch_array($schedule)){		
				$time_end[$index] = $row['end_time'];	
				$time_start[$index] = $row['start_time'];	
				$day[$index] = $row['day_of_the_week'];	
				$index++;
			}
				
			for($i = 0;$i < $index; $i++){
			//if same day
				if(isSameDay($day_of_the_week,$day[$i])){
					if(isTimeConflict($start_time,$end_time,$time_start[$i],$time_end[$i])){
						$conflict = $conflict+1;
					}
					else{
						$conflict = $conflict;
					}
				}
				else{
					$conflict = $conflict;
				}
			}
		}
		

		if($conflict>0) { return false;}
		else { return true; }
}

function isSameDay($day1, $day2){

	if($day1=='M'&&$day2=='M'){ return true;}
	else if(($day1=='M'&&$day2=='MTh')||($day1=='MTh'&&$day2=='M')){ return true;}
	else if($day1=='T'&&$day2=='T'){ return true;}
	else if(($day1=='T'&&$day2=='TF')||($day1=='TF'&&$day2=='T')){ return true;}
	else if($day1=='W'&&$day2=='W'){ return true;}
	else if($day1=='Th'&&$day2=='Th'){ return true;}
	else if($day1=='F'&&$day2=='F'){ return true;}
	else if($day1=='S'&&$day2=='S'){ return true;}
	else { return false;}
}

function isTimeConflict($start1,$end1,$start2,$end2){

	$start1 = strtotime($start1);
	$start2 = strtotime($start2);
	$end1 = strtotime($end1);
	$end2 = strtotime($end2);
	$intersect = min($end1, $end2) - max($start1, $start2);

		if ( $intersect < 0 ){ $intersect = 0;}
		$overlap = $intersect / 3600;
		if ( $overlap <=0 ){
			return false;
		}
		else{
			return true;
		}
}
?>
