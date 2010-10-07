<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UPC IRIS FORM 5</title>
<style type="text/css">
<!--
.style1 {font-family: Arial, Helvetica, sans-serif}
.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 9px; }
.style4 {font-size: 9px}
.style5 {
	font-size: 16px;
	font-weight: bold;
}
.style7 {
	font-size: 11px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}
.style9 {font-size: 10; font-weight: bold; }
.style10 {font-family: Arial, Helvetica, sans-serif; font-size: 9px; font-weight: bold; }
.style12 {font-family: Arial, Helvetica, sans-serif; font-size: 7px; }
.style16 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; font-weight: bold; }
.style20 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style23 {font-size: 7}
.style25 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
	font-style: italic;
	font-weight: bold;
}
.style27 {font-size: 8px}
.style30 {font-family: Arial, Helvetica, sans-serif; font-size: 8px; }
.style31 {font-size: 8.5px}
.style32 {font-family: Arial, Helvetica, sans-serif; font-size: 8.5px; }
-->
</style></head>
<?php
	$student_id = $_GET['id'];
	$semester = 0;
	$academic_year = 0;
	session_start();
	$_SESSION['student_number'] = $student_id;
	$_SESSION['current_semester'] = $semester;
	$_SESSION['current_year'] = $academic_year;
	require_once 'cso_form5_class.php';
	//include("sql_queries.php");
	
	//initialization of variables
	$birthdate = "";
	$gender = '';
	$degree_level = '';
	$citizenship = '';
	$civil_status = '';
	$place_of_birth = '';
	$place_of_birth = '';
	$stfap_id = '';
	$presadd_no = '';
	$presadd_strt = '';
	$presadd_brgy = '';
	$presadd_city = '';
	$presadd_prov = '';
	$pres_contact = '';
	$emailadd = '';
	$parentadd_no = '';
	$parentadd_strt = '';
	$parentadd_brgy = '';
	$parentadd_city = '';
	$parentadd_prov = '';
	$parent_contact = '';
	$bracket = '';
	$units = 0;
	$course_code = '';
	$section_label = '';
	$sem = '';
	$year = '';
	$degree = '';
	$parent = '';
	$scholarship_id = '';
	$scholarship = '';
	
	$query = new SqlQueries();
	$result = $query->querysql("SELECT * from student WHERE student_number = '$student_id'");
	
	while ($row = mysql_fetch_array($result)) {
			$first_name = $row['first_name'];
			$middle_name = $row['middle_name'];
			$last_name = $row['last_name'];
			$year_level = $row['year_level'];
			$academic_standing = $row['academic_standing'];
			$student_number = $row['student_number'];
			$birthdate = $row['birthdate'];
			$gender = $row['gender'];
			$degree_level = $row['degree_level'];
			$citizenship = $row['citizenship'];
			$civil_status = $row['civil_status'];
			$place_of_birth = $row['home_city_municipality'];
			$stfap_id = $row['stfap_bracket_id'];
			$presadd_no = $row['present_home_number'];
			$presadd_strt = $row['present_street'];
			$presadd_brgy = $row['present_barangay'];
			$presadd_city = $row['present_city_municipality'];
			$presadd_prov = $row['present_province'];
			$pres_contact = $row['present_contact_number'];
			$emailadd = $row['email_address'];
			$parent = $row['guardian'];
			$parentadd_no = $row['guardian_house_number'];
			$parentadd_strt = $row['guardian_street'];
			$parentadd_brgy = $row['guardian_barangay'];
			$parentadd_city = $row['guardian_city_municipality'];
			$parentadd_prov = $row['guardian_province'];
			$parent_contact = $row['guardian_contact_number'];
			$degree_program = $row['degree_program'];
			$scholarship_id = $row['scholarship_id'];
	}
	
	$query = new SqlQueries();
	$result = $query->querysql("SELECT * from stfap WHERE stfap_bracket_id = '$stfap_id'");
	
	while ($row = mysql_fetch_array($result)) {
		$bracket = $row['stfap_bracket'];
	}
	
	$query = new SqlQueries();
	$result = $query->querysql("SELECT * from scholarship WHERE scholarship_id = '$scholarship_id'");
	
	while ($row = mysql_fetch_array($result)) {
		$scholarship = $row['scholarship_name'];
	}
	
	$query = new SqlQueries();
	$result = $query->querysql("SELECT * from degree_program WHERE degree_program_id = '$degree_program'");
	
	while ($row = mysql_fetch_array($result)) {
		$degree = $row['degree_name'];
	}
	
	$query = new SqlQueries();
	$result = $query->querysql("SELECT * from student_status WHERE student_number = '$student_id'");
	
	while ($row = mysql_fetch_array($result)) {
		$course_code = $row['course_code'];
		$section_label = $row['section_label'];
		$sem = $row['semester'];
		$year = $row['academic_year'];
		
		$query = new SqlQueries();
		$result = $query->querysql("SELECT * from subject WHERE course_code = '$course_code'");
	
		while ($row = mysql_fetch_array($result)) {
			$units = $units + $row['units'];
		}
	}

	$accountability_id = "";
	$or_number = "";
	$query = new SqlQueries();
	$result = $query->querysql("SELECT * from accountability WHERE student_number = '$student_id' && accountability_type_id = 7");
	
	while ($row = mysql_fetch_array($result)) {
		$accountability_id = $row['accountability_id'];
	}

	if ($accountability_id!="") {		
	$query = new SqlQueries();
	$result = $query->querysql("SELECT * from payment WHERE accountability_id = '$accountability_id'");
	
	while ($row = mysql_fetch_array($result)) {
		$or_number = $row['official_receipt_number'];
	}
	}
	
	require_once 'cso_date_converter.php';
	$newdate = new dateConverter();
	$newbirthdate = $newdate->dateConvert($birthdate);
?>
<body>

<table width="1056" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="886"><span class="style5">UPC IRIS Form 5</span></td>
    <td width="170" class="style5">
    <div align="right">
	<script>
		document.write("<input type='button' " + "onClick='window.print()' " + "class='printbutton' " + "value='Print Form 5'/>");
	</script>
	</div></td>
  </tr>
  </table>
<?php
	$loop_count = 0;
	
	while ($loop_count < 2) {
?>
<br />
<table width="1056" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="32" height="27"><span class="style7"><img src="logo.jpg" width="30" height="25" /></span></td>
    <td width="907"><span class="style7"> UP FORM 5. UNIVERSITY OF THE PHILIPPINES VISAYAS CERTIFICATE OF REGISTRATION (REV. 05-2010)</span></td>
    <td class="style7">Semester, AY</td>
  </tr>
</table>
<table width="1056" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" valign="middle">
    <div align="center" class="style3">
      	<table width="680" border="1" cellspacing="0" cellpadding="0">
        	<tr>
          		<td width="99" height="26"><div align="center">STUDENT NUMBER
                	<br /><strong><?php echo $student_number;?></strong></div></td>
          		<td colspan="4" height="26">NAME (Last, Given, Middle)
                	<br />&nbsp;&nbsp;&nbsp;<strong><?php echo strtoupper($last_name.', '.$first_name.' '.$middle_name);?></strong></td>
          		<td width="95" height="26">COLLEGE
                	<br /><strong><div align="center">UPCC</div></strong></td>
          		<td width="182" height="26">DEGREE
                	<br /><strong><?php echo strtoupper($degree);?></strong></td>
        	</tr>
        	<tr>
          		<td height="25">NATIONALITY
                	<br /><strong><div align="center"><?php echo $citizenship;?></div></strong></td>
          		<td width="65" height="25">GENDER
                	<br /><strong><div align="center"><?php echo $gender;?></div></strong></td>
          		<td width="77" height="25">CIVIL STATUS
                	<br /><strong><div align="center"><?php echo $civil_status;?></div></strong></td>
          		<td width="76" height="25">DATE OF BIRTH
                	<br /><strong><div align="center"><?php echo $newbirthdate;?></div></strong></td>
          		<td width="84" height="25">PLACE OF BIRTH
                	<br /><div align="center"><strong><?php echo $place_of_birth;?></strong></div></td>
          		<td height="25">DEGREE LEVEL
                	<br /><div align="center"><strong><?php echo $degree_level;?></strong></div></td>
          		<td valign="top">STUDENT TYPE <br /></td>
        	</tr>
      	</table>
    </div>
    </td>
    <td colspan="4" valign="middle">
    <div align="center" class="style3">
    	<table width="372" border="1" cellspacing="0" cellpadding="0">
        	<tr>
          		<td width="148" height="26" valign="top">MAJOR 
                	<br /> </td>
          		<td width="139" height="26" valign="top">MINOR 
                	<br /> </td>
          		<td width="85" height="26" valign="top">YR LEVEL
                	<br /><strong><div align="center"><?php echo $year_level;?></div></strong></td>
        	</tr>
        	<tr>
          		<td colspan="2" height="25" valign="top">REGISTRATION STATUS 
                	<br /> </td>
          		<td valign="top" height="25">GRADUATING? 
                	<br /> </td>
        	</tr>
      	</table>
    </div>
    </td>
  </tr>
  <tr height="300">
    <td height="300" colspan="3" valign="top"><div align="center">
      <?php
	  	$enrolled_subj = new form5();
		$enrolled_subj->viewEnrolledSubjects($student_id);
	  ?>
    </div>
    </td>
    <td colspan="4" height="300"  valign="top"><div align="center">
      <?php
	  	$assessment = new form5();
		$assessment->viewBreakdown($student_id);
	  ?>
		</div></td>
  </tr>
  <tr>
    <td width="277" height="41" class="style10" valign="top">TOTAL NUMBER OF UNITS
    	<br /><strong><div align="right"><?php echo number_format($units, 1, '.', '');?></div></strong></td>
    <td colspan="2" class="style10" valign="top">IF UNDERLOAD, SPECIFY REASON</td>
    <td width="70" class="style10" valign="bottom"><div align="center"><?php echo $or_number?><br/>O.R. No.</div></td>
    <td width="109" class="style10" valign="bottom"><div align="center">Date</div></td>
    <td width="75" class="style10" valign="bottom"><div align="center">Amount Paid</div></td>
    <td width="112" class="style10" valign="bottom"><div align="center">Collected By</div></td>
  </tr>
  <tr>
    <td height="37" rowspan="2" class="style10" valign="top">ADVISER: (Name and Signature)</td>
    <td width="132" height="27" class="style10" valign="top">STFAP BRACKET NUMBER</td>
    <td width="267" class="style10"><strong><div align="center"><?php echo $bracket;?></div></strong></td>
    <td colspan="4" class="style10" valign="top">SCHOLARSHIP/PRIVILEGE &nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $scholarship;?></div></strong></td>
  </tr>
  <tr>
    <td height="23" class="style10" valign="bottom">ENCODED BY</td>
    <td height="23" class="style10">&nbsp;</td>
    <td colspan="4" class="style10" valign="bottom">ENCODED BY</td>
  </tr>
  <tr>
    <td height="18" colspan="3" class="style10">PRESENT ADDRESS &nbsp;&nbsp;<strong><?php echo $presadd_no.' '.$presadd_strt.' '.$presadd_brgy.' '.$presadd_city.', '.$presadd_prov;?></div></strong></td>
    <td colspan="4" rowspan="9" class="style9">
    <div align="center">
      <div align="center" class="style25">
        <table width="277" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><p align="center" class="style3">I hereby certify that all the information given in this form are true and correct. In consideration of my admission to the UNIVERSITY OF THE PHILIPPINES and of the priveleges of a student in this institution, I hereby promise and pledge to abide by and comply with all the rules and regulations laid down by competent authority in the University and in the College in which I am enrolled.</p>
                <p align="center" class="style3">Signature:_______________________</p></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            </tr>
          </table>
        </div>
    </div>
    </td>
  </tr>
  <tr>
    <td height="17" colspan="3" class="style10">TEL. NO. &nbsp;&nbsp;<strong><?php echo $pres_contact;?></div></strong></td>
  </tr>
  <tr>
    <td height="16" colspan="3" class="style10">EMAIL ADDRESS &nbsp;&nbsp;<strong><?php echo $emailadd;?></div></strong></td>
  </tr>
  <tr>
    <td height="17" colspan="3" class="style10">PARENT/GUARDIAN/SPOUSE &nbsp;&nbsp;<strong><?php echo $parent;?></div></strong></td>
  </tr>
  <tr class="style10">
    <td height="17" colspan="3" class="style9">ADDRESS &nbsp;&nbsp;<strong><?php echo $parentadd_no.' '.$parentadd_strt.' '.$parentadd_brgy.' '.$parentadd_city.', '.$parentadd_prov;?></td>
  </tr>
  <tr class="style10">
    <td height="15" colspan="3" class="style9">TEL. NO. &nbsp;&nbsp;<strong><?php echo $parent_contact;?></div></strong></td>
  </tr>
  <tr class="style10">
    <td height="15" colspan="3" class="style9">NAME OF EMPLOYER</td>
  </tr>
  <tr class="style10">
    <td height="15" colspan="3" class="style9">ADDRESS</td>
  </tr>
  <tr class="style10">
    <td height="14" colspan="3" class="style9">TEL. NO.</td>
  </tr>
</table>
<br />
<b>_______________________________________________________________________________________________________________________________________________</b>
<br />
<?php
		$loop_count++;
	}
?>
</body>
</html>
