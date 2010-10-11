<?php 
  require_once 'cashier_header.php';
?>

<div id="navigation">

<br>
<br>
<center><h1>Underassessment/Lab Fees Payment</h1></center>
<br>
<br>
<br>
<center>
<form action="inputCashierOthers.php" method="get" name="cashierform">
	<table>
		<tr>
			<td>Student Number:</td>
			<td><input type="text" name="student_number" onFocus="javascript:this.value=''">
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

<script language="JavaScript" type="text/javascript">

    var frmvalidator  = new Validator("cashierform");
    
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("student_number","req","Student Number Required.");

  </script>

</body>
</html>
</div>
<?php 
  require_once 'cashier_footer.php';
?>