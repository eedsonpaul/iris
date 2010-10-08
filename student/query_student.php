<?php

	$employer_name	= " ";
    $employer_address = " ";    


function getScholarshipId($student_number){
	$result=mysql_query("SELECT scholarship_id from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$scholarship_id = $row['scholarship_id'];
	 }
		return $scholarship_id;
}
function getUnitId($student_number){
	$result=mysql_query("SELECT unit_id from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$unit_id = $row['unit_id'];
	 }
		return $unit_id;
}
function getDegreeProgram($student_number){
	$result=mysql_query("SELECT degree_program from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$degree_program = $row['degree_program'];
	 }
		return $degree_program;
}
function getMajor($student_number){
	$result=mysql_query("SELECT major from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$major = $row['major'];
	 }
		return $major;
}
function getMinor($student_number){
	$result=mysql_query("SELECT minor from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$minor = $row['minor'];
	 }
		return $minor;
}
function getYearLevel($student_number){
	$result=mysql_query("SELECT year_level from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$year_level = $row['year_level'];
	 }
		return $year_level;
}
function getDegreeLevel($student_number){
	$result=mysql_query("SELECT degree_level from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$degree_level = $row['degree_level'];
	 }
		return $degree_level;
}
function getAcademicYear($student_number){
	$result=mysql_query("SELECT academic_year from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$academic_year = $row['academic_year'];
	 }
		return $academic_year;
}
function getSemester($student_number){
	$result=mysql_query("SELECT semester from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$semester = $row['semester'];
	 }
		return $semester;
}
function getSTFAPId($student_number){
	$result=mysql_query("SELECT stfap_bracket_id from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$stfap_bracket_id = $row['stfap_bracket_id'];
	 }
		return $stfap_bracket_id;
}
function getStudentType($student_number){
	$result=mysql_query("SELECT student_type from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$student_type = $row['student_type'];
	 }
		return $student_type;
}
function getStudentStatus($student_number){
	$result=mysql_query("SELECT student_status from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$student_status = $row['student_status'];
	 }
		return $student_status;
}
function getGender($student_number){
	$result=mysql_query("SELECT gender from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$gender = $row['gender'];
	 }
		return $gender;
}
function getCivilStatus($student_number){
	$result=mysql_query("SELECT civil_status from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$civil_status = $row['civil_status'];
	 }
		return $civil_status;
}
function getProgramCode($student_number){
	$result=mysql_query("SELECT program_code from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$program_code = $row['program_code'];
	 }
		return $program_code;
}
function getProgramRevCode($student_number){
	$result=mysql_query("SELECT program_rev_code from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$program_rev_code = $row['program_rev_code'];
	 }
		return $program_rev_code;
}
function getContactNumber($student_number){
	$result=mysql_query("SELECT contact_number from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$contact_number = $row['contact_number'];
	 }
		return $contact_number;
}
function getRegStat($student_number){
	$result=mysql_query("SELECT registration_stat from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$registration_stat = $row['registration_stat'];
	 }
		return $registration_stat;
}
function getGradeInfo($student_number){
	$result=mysql_query("SELECT grade_info from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$grade_info = $row['grade_info'];
	 }
		return $grade_info;
}
function getForeignInfo($student_number){
	$result=mysql_query("SELECT foreign_info from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$foreign_info = $row['foreign_info'];
	 }
		return $foreign_info;
}
function getCitizenship($student_number){
	$result=mysql_query("SELECT citizenship from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$citizenship = $row['citizenship'];
	 }
		return $citizenship;
}
function getEmployment($student_number){
	$result=mysql_query("SELECT employment from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$employment = $row['employment'];
	 }
		return $employment;
}
function getEmployerName($student_number){
	$result=mysql_query("SELECT  employer_name from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$employer_name = $row['employer_name'];
	 }
		return $employer_name;
}
function getEmployerAddress($student_number){
	$result=mysql_query("SELECT employer_address from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$employer_address = $row['employer_address'];
	 }
		return $employer_address;
}
function getEmployerZipcode($student_number){
	$result=mysql_query("SELECT employer_zipcode from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$employer_zipcode = $row['employer_zipcode'];
	 }
		return $employer_zipcode;
}
function getEmployerNum($student_number){
	$result=mysql_query("SELECT employer_number from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$employer_number = $row['employer_number'];
	 }
		return $employer_number;
}
function getFamilyIncome($student_number){
	$result=mysql_query("SELECT family_income from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$family_income = $row['family_income'];
	 }
		return $family_income;
}
function getPersonalIncome($student_number){
	$result=mysql_query("SELECT personal_income from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$personal_income = $row['personal_income'];
	 }
		return $personal_income;
}
function getAddInfo($student_number){
	$result=mysql_query("SELECT add_info from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$add_info = $row['add_info'];
	 }
		return $add_info;
}
function getFirstName($student_number){
	$result=mysql_query("SELECT first_name from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$first_name = $row['first_name'];
	 }
		return $first_name;
}
function getMiddleName($student_number){
	$result=mysql_query("SELECT middle_name from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$middle_name = $row['middle_name'];
	 }
		return $middle_name;
}
function getLastName($student_number){
	$result=mysql_query("SELECT last_name from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$last_name = $row['last_name'];
	 }
		return $last_name;
}
function getPassword($student_number){
	$result=mysql_query("SELECT password from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$password = $row['password'];
	 }
		return $password;
}
function getSecurityQuestion($student_number){
	$result=mysql_query("SELECT security_question from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$security_question = $row['security_question'];
	 }
		return $security_question;
}
function getAnswer($student_number){
	$result=mysql_query("SELECT answer from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$answer = $row['answer'];
	 }
		return $answer;
}
function getBirthdate($student_number){
	$result=mysql_query("SELECT birthdate from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$birthdate = $row['birthdate'];
	 }
		return $birthdate;
}
function getBirthplace($student_number){
	$result=mysql_query("SELECT birthplace from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$birthplace = $row['birthplace'];
	 }
		return $birthplace;
}
function getFatherName($student_number){
	$result=mysql_query("SELECT father_name from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$father_name = $row['father_name'];
	 }
		return $father_name;
}
function getMotherName($student_number){
	$result=mysql_query("SELECT mother_name from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$mother_name = $row['mother_name'];
	 }
		return $mother_name;
}
function getGraduationInfo($student_number){
	$result=mysql_query("SELECT graduating from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$graduating = $row['graduating'];
	 }
		return $graduating;
}
function getResidency($student_number){
	$result=mysql_query("SELECT residency from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$residency = $row['residency'];
	 }
		return $residency;
}
function getEntryAY($student_number){
	$result=mysql_query("SELECT entry_academic_year from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$entry_academic_year = $row['entry_academic_year'];
	 }
		return $entry_academic_year;
}
function getEntrySem($student_number){
	$result=mysql_query("SELECT entry_semester from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$entry_semester = $row['entry_semester'];
	 }
		return $entry_semester;
}
function getAcademicStanding($student_number){
	$result=mysql_query("SELECT academic_standing from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$academic_standing = $row['academic_standing'];
	 }
		return $academic_standing;
}
function getDegreeProgramId($student_number){
	$result=mysql_query("SELECT degree_program_id from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$degree_program_id = $row['degree_program_id'];
	 }
		return $degree_program_id;
}
function getEmailAdd($student_number){
	$result=mysql_query("SELECT email_address from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$email_address = $row['email_address'];
	 }
		return $email_address;
}
function getLastUpdated($student_number){
	$result=mysql_query("SELECT last_updated from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$last_updated = $row['last_updated'];
	 }
		return $last_updated;
}
function getLastUpdatedBy($student_number){
	$result=mysql_query("SELECT last_updated_by from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$last_updated_by = $row['last_updated_by'];
	 }
		return $last_updated_by;
}
function getHomeNumber($student_number){
	$result=mysql_query("SELECT home_house_number from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$home_house_number = $row['home_house_number'];
	 }
		return $home_house_number;
}
function getHomeStreet($student_number){
	$result=mysql_query("SELECT home_street from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$home_street = $row['home_street'];
	 }
		return $home_street;
}
function getHomeBarangay($student_number){
	$result=mysql_query("SELECT home_barangay from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$home_barangay = $row['home_barangay'];
	 }
		return $home_barangay;
}
function getHomeCityMunicipality($student_number){
	$result=mysql_query("SELECT home_city_municipality from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$home_city_municipality = $row['home_city_municipality'];
	 }
		return $home_city_municipality;
}
function getHomeProvince($student_number){
	$result=mysql_query("SELECT home_province from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$home_province = $row['home_province'];
	 }
		return $home_province;
}
function getHomeContactNum($student_number){
	$result=mysql_query("SELECT home_contact_number from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$home_contact_number = $row['home_contact_number'];
	 }
		return $home_contact_number;
}
function getPresentHomeNum($student_number){
	$result=mysql_query("SELECT present_home_number from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$present_home_number = $row['present_home_number'];
	 }
		return $present_home_number;
}
function getPresentStreet($student_number){
	$result=mysql_query("SELECT present_street from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$present_street = $row['present_street'];
	 }
		return $present_street;
}
function getPresentBarangay($student_number){
	$result=mysql_query("SELECT present_barangay from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$present_barangay = $row['present_barangay'];
	 }
		return $present_barangay;
}
function getPresentCityMunicipality($student_number){
	$result=mysql_query("SELECT present_city_municipality from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$present_city_municipality = $row['present_city_municipality'];
	 }
		return $present_city_municipality;
}
function getPresentProvince($student_number){
	$result=mysql_query("SELECT present_province from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$present_province = $row['present_province'];
	 }
		return $present_province;
}
function getPresentContactNum($student_number){
	$result=mysql_query("SELECT present_contact_number from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$present_contact_number = $row['present_contact_number'];
	 }
		return $present_contact_number;
}
function getGuardian($student_number){
	$result=mysql_query("SELECT guardian from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$guardian = $row['guardian'];
	 }
		return $guardian;
}
function getGuardianHouseNum($student_number){
	$result=mysql_query("SELECT guardian_house_number from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$guardian_house_number = $row['guardian_house_number'];
	 }
		return $guardian_house_number;
}
function getGuardianStreet($student_number){
	$result=mysql_query("SELECT guardian_street from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$guardian_street = $row['guardian_street'];
	 }
		return $guardian_street;
}
function getGuardianBarangay($student_number){
	$result=mysql_query("SELECT guardian_barangay from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$guardian_barangay = $row['guardian_barangay'];
	 }
		return $guardian_barangay;
}
function getGuardianCityMunicipality($student_number){
	$result=mysql_query("SELECT guardian_city_municipality from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$guardian_city_municipality = $row['guardian_city_municipality'];
	 }
		return $guardian_city_municipality;
}
function getGuardianProvince($student_number){
	$result=mysql_query("SELECT guardian_province from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$guardian_province  = $row['guardian_province'];
	 }
		return $guardian_province;
}
function getGuardianContactNum($student_number){
	$result=mysql_query("SELECT guardian_contact_number from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$guardian_contact_number  = $row['guardian_contact_number'];
	 }
		return $guardian_contact_number;
}
function getRecipientName($student_number){
	$result=mysql_query("SELECT recipient_name from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$recipient_name  = $row['recipient_name'];
	 }
		return $recipient_name;
}
function getRecipientStreet($student_number){
	$result=mysql_query("SELECT recipient_street from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$recipient_street  = $row['recipient_street'];
	 }
		return $recipient_street;
}
function getRecipientCity($student_number){
	$result=mysql_query("SELECT recipient_city from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$recipient_city= $row['recipient_city'];
	 }
		return $recipient_city;
}
function getRecipientZipcode($student_number){
	$result=mysql_query("SELECT recipient_zipcode from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$recipient_zipcode= $row['recipient_zipcode'];
	 }
		return $recipient_zipcode;
}
function getRecipientPhone($student_number){
	$result=mysql_query("SELECT recipient_phone from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$recipient_phone= $row['recipient_phone'];
	 }
		return $recipient_phone;
}
function getMaxUnitsAllowed($student_number){
	$result=mysql_query("SELECT max_units_allowed from student where student_number=$student_number");	 
	while($row = mysql_fetch_array($result)){		
		$max_units_allowed= $row['max_units_allowed'];
	 }
		return $max_units_allowed;
}


?>