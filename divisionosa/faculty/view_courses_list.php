<?php
require_once 'header.php';
require_once 'offering_functions.php'; 
$year = $_POST['year'];
$sem = $_POST['sem'];
?>
<h1 align="center">View Section</h1>
<h5 align="center">You are currently viewing the courses during the Academic Year <?php echo ($year-1).'-'.$year?> 
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
			<th width='200'>Course Title</th>
			<th width='200'>Units</th>
			<th width='200'>Degree Level</th>
		</tr>
		<?php 
			if($_POST['sem']=='')
			{
				print_course_offering(view_course_year($year));
			}
			else
			{
				print_course_offering(view_course_year_sem($year,$sem));
			}
		?>
	</table>
<br/><br/>
<?php require_once '../../admin_footer.php' ?>