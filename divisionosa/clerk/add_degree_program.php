<?php
require_once 'header.php';
require_once 'degree_functions.php';
?>
<script language="JavaScript">
	function init(){
		document.degree.reset();
		oStringMask = new Mask("####/##/##");
		oStringMask.attach(document.degree.date_proposed);
		
	}
</script>
	<h1 align=center>Add Degree Program</h1>
	<?php
		if(!(isset($_POST['error']))) $_POST['error']='';
		echo '<h4 align=center>'.$_POST['error'].'</h4>';
	?>
	<table align=center class='tablestyle'>
	<form action='process_dp.php' method='post' name='degree'>
	<input type='hidden' name='error'>
		<input type='hidden' name='degree_program_id' value=0>
		<tr>
			<td>Program code</td>
			<td><input type='text' name='program_code'></td>
		</tr>
		<tr>
			<td>Degree Name</td>
			<td><input type='text' name='degree_name'></td>
		</tr>
		<tr>
			<td>Degree Level</td>
			<td><select name='degree_level'>
			<option value='undergraduate'>undergraduate</option>
			<option value='graduate'>graduate</option>	
			</select></td>
		</tr>
		<tr>
			<td>Required Years</td>
			<td><input type='text' name='required_years'></td>
		</tr>
		<tr>
			<td>Required Units</td>
			<td><input type='text' name='required_units'></td>
		</tr>
		<tr>
			<td>Major</td>
			<td><input type='text' name='major'></td>
		</tr>
		<tr>
			<td>Minor</td>
			<td><input type='text' name='minor'></td>
		</tr>
		<tr>
			<td>Degree Title</td>
			<td><input type='text' name='degree_title'></td>
		</tr>
		<tr>
			<td>Credited</td>
			<td><select name='credited'>
			<option value='0'>No</option>
			<option value='1'>Yes</option>
			</select></td>
		</tr>
		<tr>
			<td>Currently Offered</td>
			<td><select name='currently_offered'>
			<option value='0'>No</option>
			<option value='1'>Yes</option>
			</select></td>
		</tr>
		<tr>
			<td>Entrance Code</td>
			<td><input type='text' name='entrance_code'></td>
		</tr>
		<tr>
			<td>Enrollment Quota</td>
			<td><input type='text' name='enrollment_quota'></td>
		</tr>
		<tr>
			<td>Date Proposed [yyyy/mm/dd]</td>
			<td><input type='text' name='date_proposed'></td>
		</tr>
		<!--<input type=hidden name=date_revised>-->
		<tr>
			<td>Unit</td>
			<td><select name='unit'>
			<?php option_division(select_division()) ?>
			</select></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='submit' value='Add Degree Program' name='dp'></td>
		</tr>
	</form>
	</table>
<br/><br/>
<?php require_once '../../admin_footer.php' ?>