<?php 
require_once 'header.php';
require_once 'subject_functions.php'; 
$sub = $_POST['sub'];
?>
<h1 align="center">Remove Course</h1>
	<table align='center' class='tablestyle'>
		<tr>
			<th width='200'>Course Code</th>
			<th width='200'>Course Title</th>
			<th width='200'>Academic Year</th>
			<th width='200'>Units</th>
			<th width='200'>Degree Level</th>
			<th width='200'>Semester Offered</th>
			<th width='200'>Action</th>
		</tr>
		<?php print_table_remove_course(search_course($sub)) ?>
	</table>
<br/><br/>
<?php require_once '../../admin_footer.php' ?>