<?php
require 'dbconnect.php';
	session_start();
    $student_number = $_SESSION['student_number'];	 
 
	$course_code = $_GET['coursecode'];
	$section_label =$_GET['sectionlabel'];

	//CHECK # OF UNITS FOR REQUESTED SUBJECT TO BE ADDED
	$res =mysql_query("SELECT units from subject where course_code='$course_code'");
	$units=0;
	while($row = mysql_fetch_array($res)){	
				$units = $row['units'];
		 }	
	
	//CHECK MAX UNITS STUDENT IS ALLOWED TO TAKE
	$res =mysql_query("SELECT max_units_allowed from student where student_number=$student_number");
	$max_units_allowed = 0;
	while($row = mysql_fetch_array($res)){	
				$max_units_allowed = $row['max_units_allowed'];
		 }	 
	
	if((totalUnitsAdded($student_number,$course_code)+$units)<=$max_units_allowed){
	
	//THIS WILL CHECK IF SUBJECT HAS ALREADY BEEN ADDED TO CURRENT SCHEDULE
	
	$result = mysql_query("SELECT status from student_status where course_code='$course_code' AND student_number=$student_number");
	$count =  mysql_num_rows($result);
	
		if($count==0){	//this means that subject has not been added to current schedule
						
			//CHECK IF SUBJECT HAS ALREADY BEEN TAKEN BEFORE
			if(checkSubject($student_number,$course_code)=="not-taken"){
				addSub( $student_number,$course_code,$section_label);
			}	
			else if(checkSubject($student_number,$course_code)=="passed"){
				echo "subject has already been taken before and passed";
			}	
			else if(checkSubject($student_number,$course_code)=="failed"){
				addSub($student_number,$course_code,$section_label);	
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
	
		else{  // this means subjecthas  been added to current schedule
			echo "SUBJECT ALREADY ON CURRENT SCHEDULE";
		}
	}
	
	else{ 
		echo "MAX UNITS ALREADY TAKEN"; 
	}
	
	
	//IF SUBJECT CAN BE ADDED
	function addSub($student_number,$course_code,$section_label){
		

						
			//IF THERES A PREREQ AND IS PASSED
					if(isTherePreReq($course_code,$student_number)=="passed" || isTherePreReq($course_code,$student_number)=="none" ){
	
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

					else if(isTherePreReq($course_code,$student_number)=="failed"){
							echo "PREREQ FAILED";
					}
					else if(isTherePreReq($course_code,$student_number)=="inc"){
							echo "PREREQ INCOMPLETED";
					}
					else if(isTherePreReq($course_code,$student_number)=="removal"){
							echo "PREREQ NEEDS REMOVAL";
					}
					else if(isTherePreReq($course_code,$student_number)=="not-taken"){
							echo "PREREQ NOT TAKEN";
					}
	
	}
	
	
	
	//THIS FUNCTION WILL CHECK IF SUBJECT HAS ALREADY BEEN TAKEN BEFORE
	function checkSubject($student_number,$course_code){
		
		

		$result = mysql_query("SELECT grade_status from grade where course_code='$course_code' AND student_number=$student_number");
		$count =  mysql_num_rows($result);
			
			if($count==0){	//this means that subject has not been taken  before.
						return "not-taken";
			}
			else{  // this means subject has been taken before
							while($row = mysql_fetch_array($result)){	
							$grade_status = $row['grade_status'];
							}
							
					if($grade_status =="passed"){
						return "passed";
					}
					else if($grade_status =="failed"){
						return "failed";
					}
					else if($grade_status =="inc"){
						return "inc";
					}
					else if($grade_status =="removal"){
						return "removal";
					}
					
			}
	}
	
	//THIS FUNCTION WILL CHECK IF CHOSEN SUBJECT HAS A PREREQUISITE
	
	function isTherePreReq($course_code,$student_number){

	
		$result =mysql_query("SELECT prereq_course_code from prerequisite where course_code='$course_code'");	
		$count = mysql_num_rows($result);
		
		//IF THERE ARE NO PREREQUISITES FUNCTION WILL RETURN NONE. 
		if($count==0){
			return "none";
		}
		//ELSE IT WOULD CHECK IF THE PREREQUISITE SUBJECT HAS ALREADY BEEN TAKEN AND PASSED
		else{
			$index=0;
			while($row = mysql_fetch_array($result)){	
				$prereqs[$index] = $row['prereq_course_code'];
				$index++;
			}

			for($i = 0;$i < $index; $i++){
					return checkGrade($prereqs[$i],$student_number);
			}
		}			
	}
	
	// THIS WILL CHECK STATUS OF GRADE 
	function checkGrade($prereqs,$student_number){
	
		$result=mysql_query("SELECT grade_status from grade where course_code='$prereqs' AND student_number=$student_number");	
		$count = mysql_num_rows($result);
		
		if($count!=0){
			while($row = mysql_fetch_array($result)){		
				$prereq_status = $row['grade_status'];	
			} 
			if($prereq_status=='passed'){
				return "passed";
			}
			else if($prereq_status=='failed'){
				return "failed";
			}
			else if($prereq_status=='inc'){ 
				return "inc";
			}
			else if($prereq_status=='removal'){
				return "removal";
			}
		}
		else{
			return "not-taken";
		}
		
		
	}
	
	//THIS WILL CHECK NO. OF AVAILABLE SLOTS FOR THE CHOSEN SUBJECT AND SECTION.
	function checkSlots($course_code,$section_label){
	
		$result =mysql_query("SELECT available_slots from section where course_code='$course_code' AND section_label='$section_label'");	
		 while($row = mysql_fetch_array($result)){	
				$slots = $row['available_slots'];
		 }		 
			return $slots;
	}
	
	//THIS WILL CHECK THE CURRENT NO. OF WAITLISTED STUDENTS  FOR THE CHOSEN SUBJECT AND SECTION.
	function countWaitlist($course_code,$section_label){
	
		$result =mysql_query("SELECT waitlist_count from section where course_code='$course_code' AND section_label='$section_label'");	
		 while($row = mysql_fetch_array($result)){	
				$waitlist = $row['waitlist_count'];
		 }		 
			return $waitlist;
	}
	
	//THIS WILL CHECK TOTAL # OF UNITS ADDED TO SCHEDULE
	function totalUnitsAdded($student_number,$course_code){
	
	$units=0;
	
	$result =mysql_query("SELECT course_code from student_status where student_number=$student_number ");	
		 while($row = mysql_fetch_array($result)){	
				$subject = $row['course_code'];
					$res =mysql_query("SELECT units from subject where course_code='$subject'");	
					while($row = mysql_fetch_array($res)){	
						$unit = $row['units'];
						$units = $units+$unit;
					}		
		 }		 
			return $units;
	
	
	}
?>

<script type="text/javascript">


</script>