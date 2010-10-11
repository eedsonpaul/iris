<?php
	require_once 'header.php';
	require_once 'faculty_functions.php';
	$student_number = $_POST['studnum'];
	$u = count_confirmed(retrieve_confirmed($student_number));
	$stfap = print_bracket_degree(retrieve_bracket_degree($student_number));
	$check_nstp = mysql_numrows(check_nstp($student_number));
	$degree_name = mysql_fetch_array(retrieve_degree_program($stfap[1]));
?>
<h1 align="center">Register Student</h1>
<h5 align="center">You are currently viewing the enlisted subjects of <strong><?php echo $student_number ?></strong></h5>
<p>STFAP BRACKET: <?php echo $stfap[0] ?></p>
<p>DEGREE PROGRAM: <?php echo $degree_name[0] ?></p>
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
<table>
	<form method="post" action="process_faculty.php">
	
	<td><input type=checkbox name='non_citizen_fee' value='1'>Non-Citizen Fee</td>
	<td><input type=checkbox name='entrance' value='1'>Entrance</td>
	<td><input type=checkbox name='deposit' value='1'>Deposit</td>
	<td><input type=checkbox name='id_fee' value='1'>ID Fee</td>
	<td><input type=checkbox name='in_residence' value='1'>In Residence</td>
</table>
	</br>
		<input type="hidden" name="studnum" value="<?php echo $student_number ?>">
		<input type="hidden" name="unitcount" value="<?php echo $u[0]?>">
		<input type="hidden" name="labcount" value="<?php echo $u[1] ?>">
		<input type="hidden" name="nstp" value="<?php echo $check_nstp ?>">
		<input type="submit" name="action" value="View Accountability"/>
		<input type="submit" name="action" value="Assessment"/>
	</form>
<br/><br/>
<?php require_once '../../admin_footer.php' ?>