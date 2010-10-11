<?php
	require_once 'student_sub_header.php';
    $student_number = $_SESSION['student_number'];	 
require_once 'query_student.php';
require_once 'function_subject.php';
require_once 'function_student.php';
require_once 'function_section.php';
require_once 'function_section_schedule.php';

 
	$course_code = $_GET['coursecode'];
	$section_label =$_GET['sectionlabel'];

	//CHECK # OF UNITS FOR REQUESTED SUBJECT TO BE ADDED
	$units = checkUnits($course_code); 
	//CHECK TOTAL # OF UNITS ENLISTED
	$total_units = totalUnitsAdded($student_number,$course_code);
	//CHECK MAX UNITS STUDENT IS ALLOWED TO TAKE
	$max_units_allowed = getMaxUnitsAllowed($student_number);
	
	if(($total_units+$units)<=$max_units_allowed){
	
		//THIS WILL CHECK IF SUBJECT IS NOT YET ENLISTED
		if(checkStudentSched($student_number,$course_code,$section_label)==true){	
			//CHECK IF SUBJECT WAS TAKEN BEFORE
			if((checkSubject($student_number,$course_code)=="not-taken") || (checkSubject($student_number,$course_code)=="failed")){
				//IF NOT TAKEN YET OR FAILED BEFORE, CHECK PREREQ 
				//IF NO PREREQ OR PREREQ PASSED,
				if(isTherePreReq($course_code,$student_number)==0){
					//CHECK CONFLICT IN SCHEDULE
					if(checkScheduleConflict($student_number,$course_code,$section_label)){
						addSub($student_number,$course_code,$section_label);
					}
					else{
						echo "Subject can't be added due to schedule conflict.";
					}
				}
				else{
					echo "Subject can't be added. Check prerequisite.";
				}
			}			
			else if(checkSubject($student_number,$course_code)=="passed"){
				echo "subject has already been taken before and passed";
			}	
			else if(checkSubject($student_number,$course_code)=="inc"){
				echo "subject has already been taken before and was not completed (INC) ";
			}	
			else if(checkSubject($student_number,$course_code)=="removal"){
				echo "subject has already been taken before needs removal of grade 4 ";
			}					
			else{
				echo "error";
			}
		}
		else{
			echo "Subject already enlisted";
		}
	}
	else{ 
		echo "MAX UNITS ALREADY TAKEN"; 
	}
	
	
	//IF SUBJECT CAN BE ADDED
	function addSub($student_number,$course_code,$section_label){
		// THIS  WILL CHECK IF THE CHOSEN SUBJECT STILL HAS SLOTS
			//IF THERE ARE SLOTS. SUBJECT IS THEN ADDED
			if(($slots=checkSlots($course_code,$section_label))!=0){
				$slots = $slots-1;
				mysql_query("INSERT INTO student_status (student_number,course_code,section_label,status) values ('".$student_number."','".$course_code."','".$section_label."','unconfirmed')");
				mysql_query("UPDATE section SET available_slots = $slots where course_code='$course_code' AND section_label='$section_label'");	
				echo "Subject successfully added";
			}
			// IF THERE ARE NO LONGER ANY AVAILABLE SLOTS, THE STUDENT WILL BE WAITLISTED
			else{
				$waitlist = countWaitlist($course_code,$section_label)+1;
				mysql_query("INSERT INTO student_status (student_number,course_code,section_label,status,waitlist_counter) values ('".$student_number."','".$course_code."','".$section_label."','waitlisted','".$waitlist."')");											
				mysql_query("UPDATE section SET waitlist_count = $waitlist where course_code='$course_code' AND section_label='$section_label'");
				echo "Subject successfully added. You are waitlisted #".$waitlist;
			}
	}
?>

<script language="Javascript">
<!-- Start
document.write('<a href="student_search_subject.php"><br><br><br>BACK TO SEARCH<br></a>');

document.write('<a href="javascript:self.close()" onClick="opener.location.reload(true);">CLOSE THIS WINDOW</a>');
// Stop -->
</script>