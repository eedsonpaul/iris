<?php
	require_once 'header.php';
	$course_code = $_POST['course_code'];
	$section_label = $_POST['section_label'];
	$semester=1;
	$academic_year=2011;
?>
	<h1 align='center'>Select Student To Submit Grade</h1>
	<h4 align='center'>You are currently submitting grades under section <strong><?php echo $course_code.''.$section_label ?></strong></h4>
	<table align='center' class='tablestyle'>
		<tr>
			<th width='200'>Student Number</th>
			<th width='200'>Inital Grade</th>
			<!--<th width='200'>Grade Status</th>-->
			<th width='200'>Remarks</th>
			<th width='200'>Action</th>
		</tr>
		<?php print_table_students_enrolled(students_enrolled($course_code,$section_label),$course_code,$section_label,$semester,$academic_year) ?>
	</table>
<?php
	require_once 'footer.php';
?>