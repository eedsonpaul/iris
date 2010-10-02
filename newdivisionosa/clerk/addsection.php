<?php require_once 'header.php' ?>
  <script language="JavaScript" src="masks.js"></script>


<?php
	include("offering_functions.php");
	$r = (int)date('Y');
?>
<h1 align="center">ADD CLASS OFFERING</h1>
<table align="center">
<form action="process.php" method="post" name="osaform">
	<tr>
		<td>Course Code</td>
		<td><select name="course_code">
			<option value="" selected>Select Course Code</option>
			<?php options_course() ?> 
		</select></td>
	</tr>
	<tr>
		<td>Section</td>
		<td><input type="text" name="section"></td>
	</tr>
	<tr>
		<td>Room</td>
		<td><input name="room" type="text"></td>
	</tr>
	<tr>
		<td>Faculty assigned</td>
		<td><select name="faculty">
			<option value="" selected>Select Faculty</option>
			<!--<option value="0">No</option>
			<option value="1">Yes</option>-->
			<?php options_faculty() ?>
		</select></td>
	<tr>
		<td>Total Slots</td>
		<td><input type="text" name="tslots"></td>
	</tr>
<input type="hidden" name="aslots">
	<tr>
		<td>Class Type</td>
		<td><select name="ctype">
			<option value="" selected>Select Class Type</option>
			<option value="lec">Lecture</option>
			<option value="lab">Laboratory</option>
		</select></td>
	</tr>
	<tr>
		<td>Start Time [hh:mm]</td>
		<td><input name="stime" type="text"></td>
	</tr>
	<tr>
		<td>End Time [hh:mm]</td>
		<td><input name="etime" type="text"></td>
	</tr>
	<tr>
		<td>Day</td>
		<td><select name="day">
			<option value="" selected>Select Day</option>
			<option value="m">Monday</option>
			<option value="t">Tuesday</option>
			<option value="w">Wednesday</option>
			<option value="th">Thursday</option>
			<option value="f">Friday</option>
			<option value="s">Saturday</option>
			<option value="mth">Monday and Thursday</option>
			<option value="tf">Tuesday and Friday</option>
		</select></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name = "c" value="Add Section"></td>
	</tr>
</form>

<script language="JavaScript" type="text/javascript">

  var frmvalidator  = new Validator("osaform");
    
  frmvalidator.EnableMsgsTogether();

  frmvalidator.addValidation("section_label","alphanum","Invalid Section Label.");
  frmvalidator.addValidation("room","alphanum","Invalid Room.");
  frmvalidator.addValidation("tslots","num","Invalid total slot input.");
  frmvalidator.addValidation("aslots","num","Invalid available slot input.");
  frmvalidator.addValidation("ccount","num","Invalid confirmed count input.");
  frmvalidator.addValidation("ecount","num","Invalid enrollment count input.");
  frmvalidator.addValidation("ctype","alphanum","Invalid total slot input.");
  
  frmvalidator.addValidation("section_label","req","Section Label required.");
  frmvalidator.addValidation("room","req","Room required.");
  frmvalidator.addValidation("tslots","req","Total slots required.");
  frmvalidator.addValidation("aslots","req","Available slots required..");
  frmvalidator.addValidation("ccount","req","Confirmed count required..");
  frmvalidator.addValidation("ecount","req","Enrolled count required..");
  frmvalidator.addValidation("ctype","req","Class Type required.");
  
  frmvalidator.addValidation("stime","req","Start time required.");
  frmvalidator.addValidation("etime","req","End time required.");
  frmvalidator.addValidation("day","dontselect=0");
  
  
</script>
</table>
<?php require_once 'footer.php' ?>