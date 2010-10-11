<?php
require_once 'header.php';
require_once 'offering_functions.php'; 
$year = $_POST['year'];
$sem = $_POST['sem'];
?>
<h1 align="center">View Section</h1>
<h5 align="center">You are currently viewing the sections during the Academic Year <?php echo ($year-1).'-'.$year?> 
<?php 
	if($sem!='') 
	{
		$s = mysql_fetch_array(retrieve_semester($sem));
		echo ' '.$s[0].'';
	}
?></h5>
	<table align='center' class='tablestyle'>
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
		<?php 
			if($_POST['sem']=='')
			{
				print_table_view_class_offering(view_class_offering_year($year));
			}
			else
			{
				print_table_view_class_offering(view_class_offering_year_sem($year,$sem));
			}
		?>
	</table>
<br/><br/>
<?php require_once '../../admin_footer.php' ?>