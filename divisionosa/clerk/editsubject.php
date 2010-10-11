<?php require_once 'header.php' ?>
<?php
	require_once 'subject_functions.php';
	$sub = $_POST['sub'];
	$values = retrieve_subject($sub);
	$d = (int)date('Y');
?>
<table align="center" class="tablestyle">
<h1 align="center">Edit Course</h1>
<?php
	if(!(isset($_POST['error']))) $_POST['error'] = '';
	echo '<h4 align=center>'.$_POST['error'].'</h4>';
?>
<form action="process.php" method="post" name="osaform">
<input type="hidden" name="sub" value="<?php echo $sub ?>">
<h4 align="center">You are currently Editing for Course Code <strong><?php print($values[0]) ?></strong></h4>
<input type='hidden' name='error'>
<input type="hidden" name="course_code" value="<?php print($values[0]) ?>">
	<tr>
		<td>Course Title</td>
		<td><input type="text" name="subject_title" value="<?php echo $values[1] ?>"></td>
	</tr>
<!--<td>Action Taken</td>
<td>-->
<input type="hidden" name="action_taken" value="updated">
	<tr>
		<td>Date Proposed	</td>
		<td><input name="pdate" type="text" value="<?php echo date('Y-m-d',$values[3]) ?>"></td>
<!--<td><input name="pmonth" type="text" value="mm" maxlength="2" width="40">
 <input name="pday" type="text" value="dd" maxlength="2" width="40">
  <input name="pyear" type="text" value="yyyy" width="55"></td>-->
	</tr>
	<tr>
		<td>Date Approved	</td>
		<td><input name="apdate" type="text" value="<?php echo date('Y-m-d',$values[4]) ?>"></td>
	</tr>
<input name="fdate" type="hidden" value="<?php echo date('Y-m-d',$values[5]) ?>">
<input name="rdate" type="hidden" value="<?php echo date('Y-m-d',$values[6]) ?>">
<input name="abdate" type="hidden" value="<?php echo date('Y-m-d',$values[7]) ?>">
	<tr>
		<td>Academic Year</td>
		<td><select name="year" value="<?php echo $values[9] ?>">
			<option value="<?php print($d+1) ?>"><?php print($d .'-'. ($d+1)) ?></option>
			<option value="<?php print($d+2) ?>"><?php print(($d+1) .'-'. ($d+2)) ?></option>
		</select></td>
	</tr>
	<tr>
		<td>Units</td>
		<td><input type="text" name="units" value="<?php echo $values[10] ?>"></td>
	</tr>
	<tr>
		<td>Lab Fee</td>
		<td><input type="text" name="lab_fee" value="<?php echo $values[14] ?>"></td>
	</tr>
	<tr>
		<td>Degree Level</td>
		<td><select name="deg"  value="<?php echo $values[11] ?>">
			<option value="undergraduate">Undergraduate</option>
			<option value="graduate">Graduate</option>
		</select></td>
	</tr>
	<tr>
		<td>Semester Offered</td>
		<td><select name="sem"  value="<?php echo $values[12] ?>">
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
<br/><br/>
<?php require_once '../../admin_footer.php' ?>