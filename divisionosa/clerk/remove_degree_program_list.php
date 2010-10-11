<?php
	require_once 'header.php';
	require_once 'degree_functions.php';
	$degree_name = $_POST['degree_name'];
	//$r = print_edit_degree(search_degree($degree_name));
?>
	<h1 align=center>Remove Degree Program</h1>
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
		<?php print_remove_degree(search_degree($degree_name)) ?>
	</table>
<br/><br/>
<?php require_once '../../admin_footer.php' ?>