<?php
	require_once '../cssandstuff/http.php';
	require_once 'header.php';
	require_once 'degree_functions.php';
	$degree_program_id = $_POST['degree_program_id'];
	$p = mysql_fetch_array(retrieve_degree($degree_program_id));
	//$r = print_edit_degree(search_degree($degree_name));
?>
	<!--
	<h1 align=center>Edit Degree Program</h1>
	<form action=process_dp.php method=post>
	<table align=center class=tablestyle>
		<tr>
			<th width=200>Program Code</th>
			<th width=200>Degree Level</th>
			<th width=200>Degree Name</th>
			<th width=200>Degree Title</th>
			<th width=200>Entrance Code</th>
			<th width=200>Enrollment Quota</th>
			<th width=200>Unit Name</th>
			<th width=200>Action</th>
		</tr>
	</table>
	<input type='submit' name='dp' value='Yes'/>
	<input type='submit' name='dp' value='No'/>
	-->
	<h1 align=center>Edit Degree Program</h1>
	<?php
		if(!(isset($_POST['error']))) $_POST['error'] = '';
		echo '<h4 align=center>'.$_POST['error'].'</h4>';
	?>
	<table align=center class='tablestyle'>
	<form action=process_dp.php method=post>
	<input type='hidden' name='error'>
		<input type='hidden' name='degree_program_id' value="<?php echo $p[0]?>">
		<tr>
			<td>Program code</td>
			<td><input type='text' name='program_code' value="<?php echo $p[1]?>"></td>
		</tr>
		<tr>
			<td>Degree Name</td>
			<td><input type='text' name='degree_name' value="<?php echo $p[2]?>"></td>
		</tr>
		<tr>
			<td>Degree Level</td>
			<td><select name='degree_level' value="<?php echo $p[3]?>">
			<option value='undergraduate'>undergraduate</option>
			<option value='graduate'>graduate</option>	
			</select></td>
		</tr>
		<tr>
			<td>Required Years</td>
			<td><input type='text' name='required_years' value="<?php echo $p[4]?>"></td>
		</tr>
		<tr>
			<td>Required Units</td>
			<td><input type='text' name='required_units' value="<?php echo $p[5]?>"></td>
		</tr>
		<tr>
			<td>Major</td>
			<td><input type='text' name='major' value="<?php echo $p[6]?>"></td>
		</tr>
		<tr>
			<td>Minor</td>
			<td><input type='text' name='minor'  value="<?php echo $p[7]?>"></td>
		</tr>
		<tr>
			<td>Degree Title</td>
			<td><input type='text' name='degree_title' value="<?php echo $p[8]?>"></td>
		</tr>
		<tr>
			<td>Credited</td>
			<td><select name='credited' value="<?php echo $p[9]?>">
			<option value='0'>No</option>
			<option value='1'>Yes</option>
			</select></td>
		</tr>
		<tr>
			<td>Currently Offered</td>
			<td><select name='currently_offered' value="<?php echo $p[10]?>">
			<option value='0'>No</option>
			<option value='1'>Yes</option>
			</select></td>
		</tr>
		<tr>
			<td>Entrance Code</td>
			<td><input type='text' name='entrance_code' value="<?php echo $p[11]?>"></td>
		</tr>
		<tr>
			<td>Enrollment Quota</td>
			<td><input type='text' name='enrollment_quota' value="<?php echo $p[12]?>"></td>
		</tr>
		<tr>
			<td>Date Proposed [yyyy/mm/dd]</td>
			<td><input type='text' name='date_proposed' value="<?php echo date('Y/m/d',$p[13])?>"></td>
		</tr>
		<input type='hidden' name='date_revised' value=''>
		<!--<input type=hidden name=date_revised>-->
		<tr>
			<td>Unit</td>
			<td><select name='unit' value="<?php echo $p[14]?>">
			<?php option_division(select_division()) ?>
			</select></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='submit' value='Edit Degree Program' name='dp'></td>
		</tr>
	</form>
	</table>
<br/></br>
<?php require_once 'footer.php'?>