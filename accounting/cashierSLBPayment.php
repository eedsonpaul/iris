<?php 
  require_once 'cashier_header.php';
?>
<div class="main">
<div id="navigation">
Employee ID : <?php echo $_SESSION['employee_id']?><br>
<?php $query_employee = "SELECT * FROM employee WHERE employee_id ='".$_SESSION['employee_id']."';";
$employee = mysql_query($query_employee);
$employee_last_name = mysql_result($employee,0,"last_name");
$employee_first_name = mysql_result($employee,0,"first_name");
$employee_middle_name = mysql_result($employee,0,"middle_name");?>

Name   :  <?php echo $employee_last_name.", ". $employee_first_name." ".$employee_middle_name;?><br>
Designation :  <br>
Unit:  <br>
<br>
<br>
<center><h1>SLB Payment</h1></center>
<br>
<br>
<br>
<center>
<form action="inputCashierSLBPayment.php" method="get">
	<table>
		<tr>
			<td>Student Number:</td>
			<td><input type="text" name="student_number" value="XXXXXXXXX" onFocus="javascript:this.value=''">
			</td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<table width="288">
	  <tr>
	    <td width="54">&nbsp;</td>
	    <td width="104"><input type="submit" value="Submit" /></td>
	    <td width="55"><input type=button value="Back" onClick="history.go(-1)"></td>
	    <td width="55">&nbsp;</td>
      </tr>
  </table>
	<p>&nbsp;</p>
</form>
</body>
</html>
</div>
<?php 
  require_once 'cashier_footer.php';
?>