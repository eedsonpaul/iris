<?php
	require_once 'header.php';
	require_once 'faculty_functions.php';
	$employee_id = '2342343';
?>
	<h1 align='center'>Select Section To Submit Grade</h1>
	<table align='center' class='tablestyle'>
		<tr>
			<th width='200'>Course Code</th>
			<th width='200'>Section Label</th>
			<th width='200'>Units</th>
			<th width='200'>Day of the Week</th>
			<th width='200'>Time</th>
			<th width='200'>Room</th>
			<th width='200'>Class Type</th>
			<th width='200'>Action</th>
		</tr>
		<?php print_table_handled_sections(search_handled_sections($employee_id),$employee_id) ?>
	</table>
<br/></br>
<?php require_once '../../admin_footer.php' ?>