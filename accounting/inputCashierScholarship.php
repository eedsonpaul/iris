<?php 
  require_once 'cashier_header.php';
?>


<center>
<br>
<br>
<br>
<?php
	include('cashierClass.php');
	$accountability = new Accountability();
	$accountability->acct_inputScholarshipPayment();
?>
	<br><br><td width="51"><a href="cashierSAM.php"><input type=button value="Back"></a></td>
	<br>
	<br>
	<br>

</center>

<?php 
  require_once 'cashier_footer.php';
?>