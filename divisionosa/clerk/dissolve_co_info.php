<?php 
require_once 'header.php';
require_once 'offering_functions.php';
$course_code = $_POST['course_code'];
$section = $_POST['section'];
$z = mysql_fetch_array(retrieve_class_offering($course_code,$section));
?>
<h1 align="center">Dissolve Section</h1>
<table align=center class=tablestyle>
<form action='process.php' method='post'>
<input type=hidden name='course_code' value='<?php echo $course_code?>'>
<input type=hidden name='section' value='<?php echo $section?>'>
	<tr>
		<th width='200'>Course Code</th>
		<th width='200'>Section Label</th>
		<th width='200'>Room</th>
		<th width='200'>Faculty Name</th>
		<th width='200'>Total Slots</th>
		<th width='200'>Class Type</th>
		<th width='200'>Time</th>
		<th width='200'>Day</th>
	</tr>
	<tr>
		<td><?php echo $z[0]?></td>
		<td><?php echo $z[1]?></td>
		<td><?php echo $z[2]?></td>
		<td><?php echo $z[3].', '.$z[4]?></td>
		<td><?php echo $z[5]?></td>
		<td><?php echo $z[6]?></td>
		<td><?php echo $z[7].' - '.$z[8]?></td>
		<td><?php echo $z[9]?></td>
	</tr>
	</table>
<p>Are you sure you want to dissolve the selected section?</p>
	<input type='submit' name='dissolve' value='Yes'/>
	<input type='submit' name='dissolve' value='No'/>
</form>
<?php require_once 'footer.php'?>