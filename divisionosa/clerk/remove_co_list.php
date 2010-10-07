<?php
require_once 'header.php';
require_once 'subject_functions.php'; 
$course_code = $_POST['course_code'];
?>
<h1 align="center">Remove Course</h1>
<h5 align="center">Key in the course code</h5>
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
		<?php print_table_remove_offering(search_class_offering($course_code)) ?>
	</table>
<?php require_once 'footer.php' ?>