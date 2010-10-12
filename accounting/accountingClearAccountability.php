<?php 
  require_once 'accounting_header.php';
  include('connect.php');
?>


<div class="main">
	<div id="navigation">
		
	  <ul>
			<li><a href="accountingAddAccountabilitySearch.php?search_option=&search_query=">Add Accountability</a></li>
			<!--<li><a href="viewClearedAccounts.php">View Already Cleared</a></li>-->
            <li><a href="generateSLB.php">Generate Student Accountabilities</a></li>
			<li><a href="accounting.php">Return</a></li>
		</ul>

	<br>
	</div>

	<div id="right_side">
    <br><br><br><br><br><br><br><br><br>
<body>

<p>&nbsp;</p>
<center>
<center><h1>CLEAR ACCOUNTABILITY</h1></center>
<?php
	include('connect.php');
	$id = $_GET['id'];
	$query = "Select student_number from accountability WHERE accountability_id='".$id."';";
	$result = mysql_query($query);
	$student_number = mysql_result($result,0,"student_number");
?>

<html>
	<head><title>Clear Accountability</title></head>
	<body>
		<form action="clearAccountability.php" method="post" name="accountingform">
		<input type="hidden" name="student_number" value="<?php echo $student_number;?>"/>
		<input type="hidden" name="id" value="<?php echo $id;?>"/>
		<table>
			<tr>
				<td>OR number: </td>
				<td><input type="text" name="or_number"/></td>
			</tr>
			<tr>
				<td>Amount: </td>
				<td><input type="text" name="amount_paid"/></td>
			</tr>
			<tr>
				<td>Details: </td>
				<td><input type="text" name="details"/></td>
				</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
		</table>
		<table width="62">
		  <tr>
		    <td width="54"><input type="submit" value="Clear" /></td>
	      </tr>
		  </table>
		<table width="59">
		  <tr>
		    <td width="51"><a href="accountingSAM.php"><input type=button value="Cancel"></a></td>
	      </tr>
		  </table>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<table>
		  <tr>
		    <td>&nbsp;</td>
	      </tr>
		  </table>
		<p>&nbsp;</p>
        </form>
        
		<!--<script language="JavaScript" type="text/javascript">

  var frmvalidator  = new Validator("accountingform");
    
  frmvalidator.EnableMsgsTogether();
  
  frmvalidator.addValidation("or_number","req","OR Number required.");
  frmvalidator.addValidation("amount_paid","req","Amount Paid required.");
  frmvalidator.addValidation("amount_paid","num","Amount Paid contains invalid input.");
  frmvalidator.addValidation("or_number","num","OR Number contains invalid input.");
  
</script>-->
		
	</body>
</html>
</div>
<?php 
  require_once 'cashier_footer.php';
?>