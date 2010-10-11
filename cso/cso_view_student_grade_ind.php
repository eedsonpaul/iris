<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UPC</title>
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 24px;
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style4 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
.style5 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 15px;
	font-weight: bold;
}
.style10 {
	font-size: 12px;
	font-weight: bold;
}
.style14 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold; }
.style15 {color: #000000}
.style16 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold; color: #000000; }
-->
</style>
</head>

<body>
<p>
  <?php
//File: CSO View Student Grade
//Version 1: Date: October 05, 2010
//By: Mae Ann A. Amarado
//CSO TEAM
?>
<script>
		document.write("<input type='button' " + "onClick='window.print()' " + "class='printbutton' " + "value='Print Grade'/>");
</script>
</p>
<?php
	include("connect_to_database.php");
	$stud_num = $_GET['id'];
	$semp = $_GET['sem'];
	$ayp = $_GET['ay'];
	
	$first_name = "";
	$last_name = "";
	$middle_name = " ";
	$degree_id = "";
	$degree = "";
	$name = "";
	
	$query = "SELECT * FROM student WHERE student_number = '$stud_num'";
	$result = mysql_query($query);
	while($student = mysql_fetch_array($result)) {
		$first_name = $student['first_name'];
		$last_name = $student['last_name'];
		$middle_name = $student['middle_name'];
		$degree_id = $student['degree_program'];
	}
	
	$name = $last_name.", ".$first_name." ".$middle_name[0];
	 
	$query = "SELECT * FROM degree_program WHERE degree_program_id = '$degree_id'";
	$result = mysql_query($query);
	while($deg = mysql_fetch_array($result)) {
		$degree = $deg['degree_name'];
	}
	
	$query = "SELECT * FROM semester WHERE semester_id = '$semp'";
	$result = mysql_query($query);
	while($sems = mysql_fetch_array($result)) {
		$semname = $sems['semester_type'];
	}
?>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="116" rowspan="2"><div align="center"></div></td>
    <td colspan="2" rowspan="2"><div align="right"><img src="logo.jpg" width="70" height="70" /></div></td>
    <td height="45" colspan="6"><span class="style1">UNIVERSITY OF THE PHILIPPINES CEBU COLLEGE</span></td>
  </tr>
  <tr>
    <td height="19" colspan="6"><span class="style2">CEBU CITY, CEBU</span></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    <td width="243" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="6"><div align="center" class="style5">UP CEBU COLLEGE</div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="6"><div align="center" class="style4">STUDENT'S COPY OF GRADES</div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="6"><div align="center" class="style4">(<?php echo $semname;?>/AY <?php echo $start = ($ayp-1).' - '.$ayp;?> )</div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="12">&nbsp;</td>
    <td width="59">&nbsp;</td>
    <td width="270">&nbsp;</td>
    <td width="164">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="77">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style4">Student Number</span></td>
    <td class="style4"><div align="center" class="style10">:</div></td>
    <td colspan="2" class="style4"><?php echo $stud_num?></td>
    <td colspan="3"><div align="right"><span class="style4">Degree Program &nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong class="style4">&nbsp;&nbsp;:</strong></div></td>
    <td colspan="2" class="style4"><?php echo $degree;?></td>
  </tr>
  <tr>
    <td><span class="style4">Name</span></td>
    <td class="style4"><div align="center" class="style10">:</div></td>
    <td colspan="2" class="style4"><?php echo $name;?></td>
    <td colspan="3">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="175" height="47"><div align="center" class="style14 style15">Subject</div></td>
    <td width="338"><div align="center" class="style16">Descriptive Title</div></td>
    <td width="65"><div align="center" class="style16">Final Grade</div></td>
    <td width="91"><div align="center" class="style16">Remarks</div></td>
    <td width="112"><div align="center" class="style16">Completion Grade</div></td>
    <td width="77"><div align="center" class="style16">Remarks</div></td>
    <td width="92"><div align="center" class="style16">Credits</div></td>
  </tr>
<?php

			$count = 1;
			$units = 0;
			//$semester = $_SESSION['current_semester'];
			//$academic_year = $_SESSION['current_year'];
			$ay = "";
			$sem = "";
			$standing = "";
			$semname = "";
			$subject = "";
			$gwa = 0;
			$grades = 0;
			$grade = 0;
			$com_grade = 0;	
			$query = "SELECT * FROM grade WHERE student_number = '$stud_num' order by academic_year";
			$result = mysql_query($query);
			while($grade = mysql_fetch_array($result)) {
				$ay = $grade['academic_year'];
				$sem = $grade['semester'];
				$standing = $grade['remarks'];
				$igrade = $grade['initial_grade'];
				$com_grade = $grade['completion_grade'];
				$remarks = $grade['remarks'];
				$subject = $grade['course_code'];
				
				$query = "SELECT * FROM semester WHERE semester_id = '$sem'";
				$result = mysql_query($query);
				while($sems = mysql_fetch_array($result)) {
					$semname = $sems['semester_type'];
				}
				
				$query = "SELECT * FROM subject WHERE course_code= '$subject'";
				$result = mysql_query($query);
				while($sub = mysql_fetch_array($result)) {
					$subtitle = $sub['subject_title'];
					$unit = $sub['units'];
				}
				if ($com_grade==0) {
					$grade = $igrade * $unit;
				} else if($igrade==4){
					$grade = ($com_grade*$unit) + ($igrade*$unit);
				} else {
					$grade = $com_grade*$unit;
				}
		?>
  <tr>
    <td><div align="left" class="style15"><?php echo $subject;?></div>
    <div align="center"></div></td>
    <td><div align="center" class="style15"><?php echo $subtitle;?></div></td>
    <td><div align="center" class="style15"><?php echo number_format($igrade, 2, '.', '');?></div></td>
    <td><div align="center" class="style15"><?php echo $remarks;?></div></td>
    <td><div align="center" class="style15"><?php echo number_format($com_grade, 2, '.', '');?></div></td>
    <td><div align="center"><span class="style15"></span></div></td>
    <td><div align="center" class="style15"><?php echo number_format($unit, 1, '.', '');?></div></td>
  </tr>
 <?php $units = $units + $unit;
 		$gwa  = (($gwa+$grade)/$units);
		$count++;}
		include("cso_functions.php");
		session_start();
		if ($gwa<=3) {
			$standing = "Good Standing";
		} else if ($gwa>3 && $gwa<=5) {
			$standing = academicStanding($stud_num, $sem, $ay, $units, $_SESSION['access_level_id']);
		}
 ?>
   <tr>
    <td><div align="left"><span class="style15"></span></div></td>
    <td><div align="center"><span class="style15"></span></div></td>
    <td><div align="center"><span class="style15"></span></div></td>
    <td><div align="center"><span class="style15"></span></div></td>
    <td><div align="center"><span class="style15"></span></div></td>
    <td><div align="center"><span class="style15"></span></div></td>
    <td><div align="center"><span class="style15"></span></div></td>
  </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
</table>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" class="style15">Total Number of Units: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo number_format($units, 1, '.', '');?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="style15">Class Standing: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $standing;?></td>
    <td class="style15">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="style15">General Weighted Average: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo number_format($gwa, 2, '.', '');?></td>
    <td class="style15">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p align="center">&nbsp;</p>
</body>
</html>
