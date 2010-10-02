<?php require_once 'header.php' ?>
<?php
	require_once 'subject_functions.php';
	$sub = $_POST['sub'];
	$values = retrieve_subject($sub);
	$d = (int)date('Y');
?>
<table align="center">
<h1 align="center">Edit Course</h1>
<form action="process.php" method="post" name="osaform">
<input type="hidden" name="sub" value="<?php echo $sub ?>">
	<tr>
		<td>Course Code</td>
		<td><input type="text" name="course_code"  value="<?php echo $values[0] ?>"></td>
	</tr>
	<tr>
		<td>Course Title</td>
		<td><input type="text" name="subject_title" value="<?php echo $values[1] ?>"></td>
	</tr>
<!--<td>Action Taken</td>
<td>-->
<input type="hidden" name="action_taken" value="updated">
	<tr>
		<td>Repeatable To</td>
		<td><input type="text" name="repeatable_to" value="<?php echo $values[3] ?>"></td>
	</tr>
	<tr>
		<td>Date Processed	</td>
		<td><input name="pdate" type="text" value="<?php echo date('Y-m-d',$values[4]) ?>"></td>
<!--<td><input name="pmonth" type="text" value="mm" maxlength="2" width="40">
 <input name="pday" type="text" value="dd" maxlength="2" width="40">
  <input name="pyear" type="text" value="yyyy" width="55"></td>-->
	</tr>
	<tr>
		<td>Date Approved	</td>
		<td><input name="apdate" type="text" value="<?php echo date('Y-m-d',$values[5]) ?>"></td>
	</tr>
<input name="fdate" type="hidden" value="<?php echo date('Y-m-d',$values[6]) ?>">
<input name="rdate" type="hidden" value="<?php echo date('Y-m-d',$values[7]) ?>">
<input name="abdate" type="hidden" value="<?php echo date('Y-m-d',$values[8]) ?>">
	<tr>
		<td>Academic Year</td>
		<td><select name="year" value="<?php $values[10] ?>">
			<option value="<?php print($d+1) ?>"><?php print($d .'-'. ($d+1)) ?></option>
			<option value="<?php print($d+2) ?>"><?php print(($d+1) .'-'. ($d+2)) ?></option>
		</select></td>
	</tr>
	<tr>
		<td>Units</td>
		<td><input type="text" name="units" value="<?php echo $values[11] ?>"></td>
	</tr>
	<tr>
		<td>Degree Level</td>
		<td><select name="deg"  value="<?php echo $values[12] ?>">
			<option value="undergraduate">Undergraduate</option>
			<option value="graduate">Graduate</option>
		</select></td>
	</tr>
	<tr>
		<td>Semester Offered</td>
		<td><select name="sem"  value="<?php echo $values[13] ?>">
			<option value="1">First Semester</option>
			<option value="2">Second Semester</option>
		</select></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Modify Course" name="c"></td>
	</tr>
</form>

<script language="JavaScript" type="text/javascript">

  var frmvalidator  = new Validator("osaform");
    
  frmvalidator.EnableMsgsTogether();  
  
  frmvalidator.addValidation("subject_code","req","Subject Code required.");
  frmvalidator.addValidation("course_code","req","Course Code required.");
  frmvalidator.addValidation("subject_name","req","Subject Name required.");
  frmvalidator.addValidation("subject_full","req","Subject Full Name required..");
  frmvalidator.addValidation("subject_title","req","Subject Title required..");
  frmvalidator.addValidation("credited","dontselect=0");
  frmvalidator.addValidation("ngrades","dontselect=0");
  frmvalidator.addValidation("repeatable_to","req","Repeatable To field required..");
  frmvalidator.addValidation("unit_in_charge","req","Unit In Charge required..");
  frmvalidator.addValidation("labfee","req","Lab Fee required..");
  frmvalidator.addValidation("labfee","num","Lab Fee: Numbers only..");
  frmvalidator.addValidation("rnpname","req","RGEP/NSTP/PE Name required..");
  frmvalidator.addValidation("desc","req","Description required..");
  frmvalidator.addValidation("units","req","Units required..");
  frmvalidator.addValidation("units","num","Units: Numbers only..");
  
</script>

</table>
<?php require_once 'footer.php' ?>