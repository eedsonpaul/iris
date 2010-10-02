<?php
	require_once 'header.php';
	require_once 'faculty_functions.php';
	$student_number = $_POST['studnum'];
	$u = count_confirmed(retrieve_confirmed($student_number));
	$stfap = print_bracket_degree(retrieve_bracket_degree($student_number));
?>
<h1 align="center">Register Student</h1>
<h5 align="center">You are currently viewing the enlisted subjects of <strong><?php echo $student_number ?></strong></h5>
<p>STFAP BRACKET: <?php echo $stfap[0] ?></p>
<p>DEGREE PROGRAM: <?php echo $stfap[1] ?></p>
<table class="tablestyle">
<tr>
	<th width="107">Course Code</th>
    <th width="80">Section</th>
	<th width="80">Units</th>
    <th width="80">Day</th>
    <th width="129">Time</th>
    <th width="80">Room</th>
    <th width="81">Class Type</th>
    <th width="59">Status</th>
</tr>
<?php
	print_table_course(retrieve_course($student_number));
?>
</table>
	<h2>Total Units Confirmed:<strong><?php echo $u[0] ?></strong></h2>
	<form method="post" action="process_faculty.php">
		<input type="hidden" name="studnum" value="<?php echo $student_number ?>">
		<input type="hidden" name="unitcount" value="<?php echo $u[0]?>">
		<input type="hidden" name="labcount" value="<?php echo $u[1] ?>">
		<input type="submit" name="action" value="View Accountability"/>
		<input type="submit" name="action" value="Assess Student"/>
	</form>
<?php
	require_once 'footer.php';
?>