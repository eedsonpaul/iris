<?php
	require_once 'header.php';
	require_once 'offering_functions.php';
	$course_code = $_POST['course_code'];
	$section = $_POST['section'];
	$v1 = retrieve_section($course_code,$section);
	$v2 = retrieve_section_schedule($course_code,$section);
?>
<h1 align="center">EDIT Section</h1>
<?php
	if(!(isset($_POST['error']))) $_POST['error'] = '';
	echo '<h4 align=center>'.$_POST['error'].'</h4>';
?>
<table align="center" class="tablestyle">
<form action="process.php" method="post" name="osaform">
<input type="hidden" name="ccode" value="<?php print($course_code) ?>">
<input type="hidden" name="slbl" value="<?php print($section) ?>">

<input type='hidden' name='error'>
<input type="hidden" name="course_code" value="<?php print($v1[0]) ?>">
<h4 align="center">You are currently Editing for Class Offering <strong><?php print($v1[0]) ?></strong></h4>
<!--
	<tr>
		<td>Course Code</td>
		<td><select name="course_code" value="<?php //print($v1[0]) ?>">
			<option value="" selected>Select Course Code</option>
			<?php //options_course() ?>
		</select></td>
	</tr>
-->
	<tr>
		<td>Section</td>
		<td><input type="text" name="section" value="<?php print($v1[1]) ?>"></td>
	</tr>
	<tr>
		<td>Room</td>
		<td><input name="room" type="text" value="<?php print($v1[2]) ?>"></td>
	</tr>
	<tr>
		<td>Faculty assigned</td>
		<td><select name="faculty" value="<?php print($v1[3]) ?>">
			<option value="" selected>Select Faculty</option>
			<!--<option value="0">No</option>
			<option value="1">Yes</option>-->
			<?php options_faculty() ?>
		</select></td>
	</tr>
	<tr>
		<td>Total Slots</td>
		<td><input type="text" name="tslots" value="<?php print($v1[4]) ?>"></td>
	</tr>
	<tr>
		<td>Class Type</td>
		<td><select name="ctype" value="<?php print($v1[9]) ?>">
			<option value="" selected>Select Class Type</option>
			<option value="lec">Lecture</option>
			<option value="lab">Laboratory</option>
		</select></td>
	</tr>
	<tr>
		<td>Start Time</td>
		<td><input name="stime" type="text" value="<?php print($v2[2]) ?>"></td>
	</tr>
	<tr>
		<td>End Time</td>
		<td><input name="etime" type="text" value="<?php print($v2[3]) ?>"></td>
	</tr>
	<tr>
		<td>Day</td>
		<td><select name="day" value="<?php print($v2[4]) ?>">
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
		<td><input type="submit" value="Modify Section" name="c"></td>
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
<br/><br/>
<?php require_once '../../admin_footer.php' ?>