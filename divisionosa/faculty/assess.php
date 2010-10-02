<?php
	require_once 'header.php';
	require_once 'faculty_functions.php';
	require_once 'tuition_compute.php';
	$student_number = $_POST['studnum'];
	$unit = $_POST['unitcount'];
	$lab = $_POST['labcount'];
	$stfap = print_bracket_degree(retrieve_bracket_degree($student_number));//$student_number
	$student_name=mysql_fetch_array(retrieve_student_name($student_number));
	$scholarship = mysql_fetch_array(retrieve_amount_shouldered($student_number));
	$college='UPVCC';
	
	
?>
<h1 align="center">Assessment of Fees</h1>
<h5 align='center'>First Semester, A.Y. 2010-2011</h1>
<table>
	<tr>
		<td><h4>STUDENT NAME: </h4></td>
		<td><h4><?php echo $student_name[0].' '.$student_name[1]?></h4></td>
		<td><h4>Degree Program: </h4></td>
		<td><h4><?php echo $stfap[1] ?></h4></td>
	</tr>
	<tr>
		<td><h4>STUDENT Number: </h4></td>
		<td><h4><?php echo $student_number?></h4></td>
		<td><h4>College:</h4></td>
		<td><h4><?php echo $college ?></h4></td>
	</tr>
</table>
<p>STFAP BRACKET: <?php echo $stfap[0] ?></p>
<p>SCHOLARSHIP: <?php echo $scholarship[1] ?></p>

<h1>Breakdown of Payment</h1>
<table class=assesstable><!--"tablestyleassess"-->
<tr>
	<th width="150">Payment Name</th>
    <th width="150">Amount Due</th>
    <th width="150">Less(STFAP)</th>
    <th width="150">Less(Scholarship)</th>
    <th width="150">TOTAL LESS</th>
    <th width="150">To pay</th>
</tr>
<tr>
	<td>Tuition</td>
	<td class='data'><?php echo $a[0] ?></td>
	<td class='data'><?php echo $a[1] ?></td>
	<td class='data'><?php echo $a[2] ?></td>
	<td class='data'><?php echo $a[3] ?></td>
	<td class='data'><?php echo $a[4] ?></td>
</tr>
<tr>
	<td>Miscellaneous</td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
</tr>
<tr>
	<td class="indent">Athletics</td>
	<td class='data'><?php echo $b[0] ?></td>
	<td class='data'><?php echo $b[1] ?></td>
	<td class='data'></td>
	<td class='data'><?php echo $b[3]?></td>
	<td class='data'><?php echo $b[4]?></td>
</tr>
<tr>
	<td class="indent">Cultural</td>
	<td class='data'><?php echo $c[0] ?></td>
	<td class='data'><?php echo $c[1] ?></td>
	<td class='data'></td>
	<td class='data'><?php echo $c[3]?></td>
	<td class='data'><?php echo $c[4]?></td>
</tr>
<tr>
	<td class="indent">Energy</td>
	<td class='data'><?php echo $d[0] ?></td>
	<td class='data'><?php echo $d[1] ?></td>
	<td class='data'></td>
	<td class='data'><?php echo $d[3]?></td>
	<td class='data'><?php echo $d[4]?></td>
</tr>
<tr>
	<td class="indent">Internet</td>
	<td class='data'><?php echo $e[0] ?></td>
	<td class='data'><?php echo $e[1] ?></td>
	<td class='data'></td>
	<td class='data'><?php echo $e[3]?></td>
	<td class='data'><?php echo $e[4]?></td>
</tr>
<tr>
	<td class="indent">Library</td>
	<td class='data'><?php echo $f[0] ?></td>
	<td class='data'><?php echo $f[1] ?></td>
	<td class='data'></td>
	<td class='data'><?php echo $f[3]?></td>
	<td class='data'><?php echo $f[4]?></td>
</tr>
<tr>
	<td class="indent">Medical</td>
	<td class='data'><?php echo $g[0] ?></td>
	<td class='data'><?php echo $g[1] ?></td>
	<td class='data'></td>
	<td class='data'><?php echo $g[3]?></td>
	<td class='data'><?php echo $g[4]?></td>
</tr>
<tr>
	<td class="indent">Registration</td>
	<td class='data'><?php echo $h[0] ?></td>
	<td class='data'><?php echo $h[1] ?></td>
	<td class='data'></td>
	<td class='data'><?php echo $h[3]?></td>
	<td class='data'><?php echo $h[4]?></td>
</tr>
<tr>
	<td>Student Fund</td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
</tr>
<tr>
	<td class="indent">Community Chest</td>
	<td class='data'><?php echo $i[0]?></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'><?php echo $i[4]?></td>
</tr>
<tr>
	<td class="indent">Publication</td>
	<td class='data'><?php echo $j[0]?></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'><?php echo $j[4]?></td>
</tr>
<tr>
	<td class="indent">Student Council</td>
	<td class='data'><?php echo $k[0]?></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'><?php echo $k[4]?></td>
</tr>
<tr>
	<td>Laboratory Fee</td>
	<td class='data'><?php echo $l[0] ?></td>
	<td class='data'><?php echo $l[1] ?></td>
	<td class='data'></td>
	<td class='data'><?php echo $l[3] ?></td>
	<td class='data'><?php echo $l[4] ?></td>
</tr>
<tr>
	<td>NSTP-CWTS/MS</td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
</tr>
<tr>
	<td>Non-Citizen Fee</td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
</tr>
<tr>
	<td>Entrance</td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
</tr>
<tr>
	<td>Deposit</td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
</tr>
<tr>
	<td>ID Fee</td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
</tr>
<tr>
	<td>In Residence</td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
</tr>
<tr>
	<td>Other Fees</td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
</tr>
<tr>
	<td></td>
	<td class='data'><strong><?php echo $total_amount_due ?></strong></td>
	<td class='data'><strong><?php echo $total_less_stfap ?></strong></td>
	<td class='data'><strong><?php echo $total_less_scholarship ?></strong></td>
	<td class='data'><strong><?php echo $total_less ?></strong></td>
	<td class='data'><strong><?php echo $total ?></strong></td>
</tr>
</table>
<!--
<?php
	print_table_course(retrieve_course($student_number));
?>-->	
	<h2>Total Payment:<strong><?php echo $total ?></strong></h2>
	<form method="post" action="process_faculty.php">
		<input type="hidden" name="studnum" value="<?php echo $student_number ?>">
		<input type="submit" name="action" value="Assess Student"/>
	</form>
<?php
	require_once 'footer.php';
?>