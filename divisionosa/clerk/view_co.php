<?php 
require_once 'header.php';
$r = (int)date('Y');
//view_offerings_list
?>
<h1 align=center>View Sections</h1>
<?php
	if(!(isset($_POST['error']))) $_POST['error'] = '';
	echo '<h4 align=center>'.$_POST['error'].'</h4>';
?>
<form action='process.php' method='post'>
<table align=center class='tablestyle'>
<input type='hidden' name='error'>
	<tr>
		<td>Select Semester</td>
		<td><select name='sem'>
		<option value=''>Select Semester</option>
		<option value='0'>Summer</option>
		<option value='1'>First Semester</option>
		<option value='2'>Second Semester</option>
		<option value='3'>First Trimester</option>
		<option value='4'>Second Trimester</option>
		</select></td>
	</tr>
	<tr>
		<td>Select Year</td>
		<td><select name='year'>
		<option value=''>Select Academic Year</option>
		<option value='<?php print($r+1) ?>'><?php print($r .'-'. ($r+1)) ?></option>
		<option value='<?php print($r+2) ?>'><?php print(($r+1) .'-'. ($r +2)) ?></option>
		</select></td>
	</tr>
	<tr>
		<td></td>
		<td><input type='submit' name='view' value='View'></td>
	</tr>
</table>
</form>
<?php require_once '../../admin_footer.php'?>