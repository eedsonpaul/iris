<?php
require_once 'header.php';
require_once 'subject_functions.php'; 
$course_code = $_POST['course_code'];
$section = $_POST['section'];
$classes = mysql_fetch_array(retrieve_class_offering($course_code,$section));
?>
<h1 align="center">Remove Course</h1>
<h5 align="center">Key in the course code</h5>
	<form action='process.php' method='post'>
	<input type=hidden name='course_code' value='<?php echo $course_code?>'>
	<input type=hidden name='section' value='<?php echo $section?>'>
	<table align='center' class='tablestyle'>
		<tr>
			<th width='200'>Course Code</th>
			<th width='200'>Section Label</th>
			<th width='200'>Room</th>
			<th width='200'>Name</th>
			<th width='200'>Total Slots</th>
			<th width='200'>Class Type</th>
			<th width='200'>Time</th>
			<th width='200'>Day</th>
			<th width='200'>Action</th>
		</tr>
		<tr>
			<td><?php echo $classes[0]?></td>
			<td><?php echo $classes[1]?></td>
			<td><?php echo $classes[2]?></td>
			<td><?php echo $classes[3].', '.$classes[4] ?></td>
			<td><?php echo $classes[5]?></td>
			<td><?php echo $classes[6]?></td>
			<td><?php echo $classes[7].' - '.$classes[8]?></td>
			<td><?php echo $classes[9]?></td>
		</tr>
	</table>
	<p>Do you want to Remove the selected Course?</p>
	<input type='submit' name='c' value='Proceed'/>
	<input type='submit' name='c' value='Not'/>
<?php require_once 'footer.php' ?>