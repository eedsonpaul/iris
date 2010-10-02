<?php
	require_once 'header.php';
	require_once 'scholarship_stfap.php';
	$sid = $_POST['snum'];
?>
	<h1 align='center'>Remove Student Scholarship</h1>
	<table align='center' class='tablestyle'>
		<tr>
			<th width='200'>Student Number</th>
			<th width='200'>Student Name</th>
			<th width='200'>Scholarship</th>
			<th width='200'>Action</th>
		</tr>
		<?php print_table_remove_student_scholarship(search_student_scholarship($sid)) ?>
	</table>
<?php
	require_once 'footer.php';
?>