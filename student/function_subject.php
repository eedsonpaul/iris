<?php
	//check number of units for specified course_code
	function checkUnits($course_code){
	$res =mysql_query("SELECT units from subject where course_code='$course_code'");
	$units=0;
		while($row = mysql_fetch_array($res)){	
			$units = $row['units'];
		 }	
		 return $units;
	}

	//check title of subject 
	function checkSubjectName($course_code){
	
	 $result=mysql_query("SELECT subject_title from subject where course_code='$course_code'");	 
		while($row = mysql_fetch_array($result)){		
			$subject_title = $row['subject_title'];	
		}
		return $subject_title;
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
			else{
				return "ERROR!!";
			}		
		}
	}

	//THIS FUNCTION WILL CHECK IF CHOSEN SUBJECT HAS A PREREQUISITE
	
	function isTherePreReq($course_code,$student_number){

		$result =mysql_query("SELECT prereq_course_code from prerequisite where course_code='$course_code'");	
		$count = mysql_num_rows($result);
		
		//IF THERE ARE NO PREREQUISITES FUNCTION WILL RETURN NONE. 
		if($count==0){
			return 0;
		}
		//ELSE IT WOULD CHECK IF THE PREREQUISITE SUBJECT HAS ALREADY BEEN TAKEN AND PASSED
		else{
			$index=0;
			while($row = mysql_fetch_array($result)){	
				$prereqs[$index] = $row['prereq_course_code'];
				$index++;
			}
			$checker = 0;
			for($i = 0;$i < $index; $i++){
				if(checkGrade($prereqs[$i],$student_number)=='passed'){
					$checker = $checker;
				}
				else if(checkGrade($prereqs[$i],$student_number)=='failed'){
					$checker = $checker+1;
				}
				else if(checkGrade($prereqs[$i],$student_number)=='inc'){ 
					$checker = $checker+1;
				}
				else if(checkGrade($prereqs[$i],$student_number)=='removal'){;
					$checker = $checker+1;
				}
				else if(checkGrade($prereqs[$i],$student_number)=='not-taken'){;
					$checker = $checker+1;
				}
				else{
					echo "Check Prereq Error";
				}		
			}
				return $checker;
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
			return $prereq_status;
		}
		else{
			return "not-taken";
		}	
	}


?>