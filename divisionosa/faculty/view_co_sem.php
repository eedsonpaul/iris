<?php 
require_once 'header.php';
$r = (int)date('Y');
?>
<h1 align=center>View Class Offerings</h1>
<form action='process_faculty.php' method='post'>
<table align=center class='tablestyle'>
	<tr>
		<td>Select Semester</td>
		<td><select name='sem'>
		<option value='0'>Summer</option>
		<option value='1'>First Semester</option>
		<option value='2'>Second Semester</option>
		<option value='3'>First Trimester</option>
		<option value='4'>Second Trimester</option>
		</select></td>
	</tr>
	<tr>
		<td>Select Year</td>
		<td><select>
		<option value='<?php print($r+1) ?>'><?php print($r .'-'. ($r+1)) ?></option>
		<option value='<?php print($r+2) ?>'><?php print(($r+1) .'-'. ($r +2)) ?></option>
		</select></td>
	</tr>
	<tr>
		<td></td>
		<td><input type='submit' name='view_sem' value='View'></td>
	</tr>
</table>
</form>
<?php require_once '../../admin_footer.php'?>