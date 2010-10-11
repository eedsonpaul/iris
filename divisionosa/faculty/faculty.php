<?php 
require_once 'header.php';
require_once 'faculty_functions.php';
$employee_id = $_SESSION['employee_id'];
$info = mysql_fetch_array(retrieve_name($employee_id)); 
?>

<p align="left" class="style4">staff's logged in page content here </p>
<h4 align="right">First Semester, &nbsp; A.Y.2010-2011 </h4>
<h4>Staff Profile </h4>
<table cellpadding="1" cellspacing="2">
	<tr>
		<td>Emp ID :</td>
		<td><?php echo $info[0]?></td>
    </tr>
    <tr>
		<td>Name</td>
		<td><?php echo $info[1].' '.$info[2]?></td>
    </tr>
    <tr>
		<td>Unit</td>
		<td><?php echo $info[3]?></td>
    </tr>
    <tr>
		<td>Designation</td>
		<td><?php echo $info[4]?></td>
    </tr>
</table>

<br/><br/>
<?php require_once '../../admin_footer.php' ?>

